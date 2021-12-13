<style>
table {
    width:100%;
}
</style>
# Feedback Security Unicorns

## Evaluatiecriteria i.v.m. aanmelden:

| Requirements                         | Implemented |
|:-------------------------------------|-----:|
| gebruiker moet zich kunnen aanmelden |   ✓   |
| applicatie geeft ten alle tijde duidelijk aan of de gebruiken al dan niet aangemeld is | ✓ |
| na aanmelden kan de gebruiker zijn of haar gegevens opvragen | ✓ |
| een gebruiker mag zich pas kunnen aanmelden als hij of zij controle over een email adres opgegeven tijdens registratie heeft aangetoond * | ✗ |
| Op je profielpagina kan je alle browser zien waarop je aangemeld staat. Er is daar ook een knop voorzien om je uit te loggen op andere browsers, hiervoor wordt eerst nog eens het wachtwoord ter bevestiging gevraagd. | ✓ |

*Er wordt een mail verstuurd, maar er loopt (voorlopig) iets mis met de mailclient, waardoor die niet effectief (allemaal) verstuurd worden. Echter kan je bepaalde dingen wel doen als onbevestigd account, maar dit is eerder beperkt. Indien het toch vereist is, komt dezelfde pop-up tevoorschijn dat je eerst je account moet bevestigen via mail.

## Evaluatiecriteria i.v.m. wachtwoorden:

| Requirements                         | Implemented |
|:-------------------------------------|-----:|
| te kunnen kopiëren uit een passwordmanager en in een passwordveld van de registratiepagina plakken | ✓ |
| verplicht te worden een wachtwoord te kiezen van minstens 8 karakters | ✓ |
| een zeer lang wachtwoord te kunnen kiezen met lengte minstens 64 karakters | ✓ |
| elk 'printable' ASCII karakter te kunnen opnemen in het wachtwoord | ✓ |
| verplicht te worden een wachtwoord te kiezen dat niet vaak voorkomt | ✓ |
| wachtwoorden mogen nooit in plaintext worden opgeslagen | ✓ |
| de toepassing verdedigt zich tegen brute force en credential stuffing attacks* | ✗ |
| MFA | ✓ |

*Multi Factor Authetication is mogelijk maar niet verplicht, verder is er een rate limiter op de login na enkele attempts maar deze blokkeerd de account niet en is ook niet exponentieel.

## HTTPS:

| Requirements                         | Implemented |
|:-------------------------------------|-----:|
| Alle publiek bereikbare onderdelen in HTTPS | ✓ |
| Server X.509 certificate | ✓ |
| A score | ✓ |
| HSTS Header | ✓ |
| HSTS preload list | ✓ |
| CAA DNS | ✓ |

## QA Tool (OWASP ZAP):

| Risk | Alert | Url | Parameter/Evidence | Evaluation |
|:-----|:-----:|:----|:---------:|:-----------|
| Path Traversal | High | /user/profile | show_email | biography=%0A++++++++++++&show_email=%5Cprofile: show_email is foutief aangeduid als potentieel kwetsbaar |
| Path Traversal | High | /login & /register | password & email | Login en register geven extra paths vrij maar dit is de bedoeling van een login en register path |
| SQL Injection | Medium | /livewire/livewire.js | id | id=5cdaa3ec393c09829366+AND+1%3D1+--+: livewire.js kan aangepast worden door sql injection maar dit geeft niets van informatie of toegang vrij |
| SQL Injection | Medium | /cdn-cgi/rum | entryType, fetchStart... | de cloudflare route kan door sql injection aangepast worden maar dit geeft wederom niets vrij |
| .htaccess information Leak | Medium | /cdn-cgi/challenge-platform/.htaccess | HTTP/1.1 200 OK | cloudflare htaccess is zogezegd accessable maar als response krijgt men "Invalid request" |
| CSP: script-src unsafe-inline | Medium | All routes (in laravel layout blade) | content-security-policy | Content-Security-Policy header correct configureren, inline script in js file steken  |
| CSP: style-src unsafe-inline | Medium | All routes (in laravel layout blade) | content-security-policy | Content-Security-Policy header correct configureren, inline style in css file steken |
| Absence of Anti-CSrF Tokens | Low | /user/profile | "updateProfileInformation" & "updatePassword" | Forms bevatten geen CSRF token, eenvoudig op te lossen door @CSRF toe te voegen in blade |
| Application Error Disclosure | Low | /cart & /forgot-password | HTTP/1.1 500 Internal Server Error | Als gevolg van de mailer die max 500 mails per dag kan sturen |
| Cookie No HttpOnly Flag | Low | All routes | Set-Cookie: XSRF-TOKEN | Cookie correct instellen in middleware |
| Incomplete or No Cache-control Header Set | Low | /forgot-password, /login & /register | Cache-Control | Whenever possible ensure the cache-control HTTP header is set with no-cache, no-store, must-revalidate |


## Onafgewerkte acceptance criteria:
- Afspraak maken als bezoeker is niet mogelijk, login is noodzakelijk
- Als lid is het niet mogelijk honden uit de cart te verwijderen
- Als lid is het niet mogelijk honder te adopteren
- Als admin is het niet mogelijk nieuwe honden toe te voegen
- Als admin kan je gemaakte afspraken niet zien
- API Status codes sturen error 500


## Overige vulnarabilities:
- Gebookte honden worden uit de database verwijdert
- Honden uit de cart verwijderen, verwijdert de hond uit de database
- '/contact/create' na submit geeft een 500 error, contact form wordt wel correct verstuurd achterliggend
- File type bij edit dogs wordt niet gecontrolleerd
    - Het is mogelijk om files te uploaden die geen image zijn: https://dogshop.desideriushogeschool.be/dogs/15 
    - php wordt niet uitgevoerd en geeft dus geen vulnarable information van de server, maar wel javascript.
- File size wordt niet gecontrolleerd door laravel
    - Cloudflare zal wel een maximum tegen gaan van 100Mb en laravel zal een "payload too large" geven boven de 10Mb. Dit zal pas voorkomen na een groot deel te uploaden. Mogelijks dus een (D)DOS door grote files te uploaden?
- Max 500 mails per dag, gebruikers kunnen dus niet meer registreren nadat deze zijn verzonden. Heel eenvoudig aan dit maximum te geraken door 500 contact forms te versturen.
