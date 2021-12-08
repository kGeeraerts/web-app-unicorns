# Feedback Whiz Kids

Enkel de topics waarin problemen worden gevonden zullen worden aangehaald, indien we geen problemen hebben gevonden zullen topics niet worden vermeld.

## Gebruikte Tools
- Command Line
- Visual Studio Code
- [Owasp Zap](https://www.zaproxy.org/)
- [DNSimple](https://support.dnsimple.com/articles/caa-record/#querying-caa-records)

## Acceptance Criteria

### User Stories
- Een afspraak kan aangemaakt worden als bezoeker (enkel email invullen, register/login is niet nodig)
- Ik kan als lid geen hond uit een cart verwijderen
- Ik kan als lid geen honden adopteren (functionaliteit niet gevonden op website)
- Ik kan als admin geen nieuwe honden toevoegen (weg erond door jezelf owner/vendor role te geven, maar dit zorgt voor elevation of privilege)
- Ik kan als admin niet alle gemaakte afspraken bekijken

### API
- API stuurt status codes niet terug (error 500)


## Evaluation createria

### Aanmelden

- Een gebruiker kan zich aanmelden zonder dat deze heeft aangegeven controle te hebben over het ingegeven registratie email-adres
  - Er wordt een mail verstuurd, maar er loopt iets mis binnen de mailclient, waardoor deze mails niet (allemaal) effectief worden verstuurd. 
  - Hoewel je wel bepaalde dingen kan doen met een onbevestigd account, is dit redelijk beperkt. 
  - Indien de bevestiging van de client toch nodig is wordt dit nog is vermeld via een popup


### Wachtwoorden

- De toepassing verdedigt zichzelf niet tegen brute-force en credential stuffing aanvallen
  - Lengte van timeout wordt niet verhoogd bij meerdere inbreuken
  - Maximaal aantal login bestaat niet
  - Multi-factor authentication wel aanwezig, maar niet required

### Web Vulnerabilities

#### QA Tool
- SQL injection gebeurd, niet 100% hoe een grote impact deze kan hebben 
 - https://dogshop.desideriushogeschool.be/livewire/livewire.js?id=5cdaa3ec393c09829366+AND+1=1+--+
- .htaccess (gaf als information leak, bij manual input gaf het "invalid response")
  - https://dogshop.desideriushogeschool.be/cdn-cgi/challenge-platform/.htaccess
- CSP, inline javascript is unsafe(sommigen door livewire), veranderen naar inladen 
  - index.blade.php
- No anti-CSRF tokens 
  - https://dogshop.desideriushogeschool.be/user/profile
    - updateProfileInformation
    - updatePassword

### Rest
(overgebleven vulnerabilities, gebrekken, etc. die we niet makkelijk in een categorie konden steken)
- Indien een hond "gebookt" wordt verdwijnt deze uit de DB
- Mogelijk om zelfde honden oneindig veel keer toe te voegen aan afspraak (zou voor overload server kunnen zorgen)
- Contact formulier wordt verstuurd, maar geeft 500 error wanneer het redirect naar ‘/contact/create’ met een succes status
- Indien hond uit cart wordt verwijderd, verdwijnt deze uit DB
- Core-js is uitdated (current: 3.15.2, latest: 3.19.1)
- Geen http-header voor X-XSS-protection
- File-type en file-size niet gecontroleerd bij "edit dog"
  - Input van scripts
  - File-size deels tegengehouden door cloudflare (tot 100mb)
  - Mogelijke DOS-aanval door meerdre bestanden van 100mb tegelijk up te loaden (add validation)
- File-size niet gecontroleerd bij "create dog"
- Na 500 mails worden geen meer verstuurd
  - Geen contact forms
  - Geen registration 
