# The DogShop by The Unicorns :unicorn:

## Goal

Het creëren van een dynamische website voor een vzw die zich bezighoud met het adopteren van honden/puppy's.
Deze website bevat enkele statische pagina's voor informatie rond de vzw zelf. Maar er zijn ook dynamishe pagina's beschikbaar, namelijk één voor het bekijken van de honden en ook een om een afspraak te maken om de hond te gaan bezoeken. Er zal ook een User Management systeem aan gekoppeld zijn, zodat mensen een account kunnen aanmaken en kunnen inloggen op de website. Enkel de Administrator zal honden kunnen toevoegen of verwijderen en zal alle afspraken kunnen bekijken.

Om deze website te maken, gaan we gebruik maken van het web framework Laravel en de hierbij horende database. Indien nodig zal er ook gebruikt gemaakt worden van een externe API (zelfgeschreven).
In de database zullen de gegevens van de gebruikers en de honden terug te vinden zijn.

Indien mogelijk zouden we alles in de cloud laten draaien: bv. web hosting via Combell, api hosting via AWS amplify (of ec2) en database hosting via aws of azure.

## Acceptance criteria

### User stories

- Als een bezoeker kan ik informatie lezen over de vzw.
- Als een bezoeker kan ik kijken welke honden voor adoptie openstaan.
- Als een bezoeker kan ik mij registreren om lid te worden van de website.
- Als lid kan ik mij inloggen op mijn account.
- Als lid kan ik mijn profielpagina wijzigen.
- Als lid kan ik informatie lezen over de vzw.
- Als lid kan ik ik kijken welke honden voor adoptie openstaan.
- Als lid kan ik een afspraak maken om de hond te gaan bezoeken.
- Als lid kan ik een hond adopteren.
- Als lid kan ik mij uitloggen.
- Als admin kan ik mij inloggen op mijn account.
- Als admin kan ik mijn profielpagina wijzigen.
- Als admin kan ik informatie over de vzw wijzigen.
- Als admin kan ik nieuwe honden toevoegen.
- Als admin kan ik honden verwijderen wanneer deze zijn geadopteerd.
- Als admin heb ik toegang tot alle afspraken.
- Als admin heb ik toegang tot de database van alle leden.
- Als admin heb ik toegang tot de database van alle honden.
- Als admin kan ik mij uitloggen.

### Security

#### Website

- CSRF tokens
- SQL Injection protection
- HTTPS

#### API

- API tokens
- Inkomende JSON controleren voor gebruik
- Stuurt status code terug

#### Database

- Alle data bewaren aan de hand van de GDPR regels
- Wachtwoorden encrypten
- Enkel noodzakelijke informatie bijhouden

## Threat model

*describe your threat model. One or more architectural diagram expected. Also a list of the principal threats and what you will do about them*

mogelijke threats en oplossingen

- admin pagina extra beveiligd
- 2FA
- gdpr
- werken met authZ rollen
- SQL injection
- Form Validation
- Max aantal inlog pogingen

## Deployment

*minimally, this section contains a public URL of the app. A description of how your software is deployed is a bonus. Do you do this manually, or did you manage to automate? Have you taken into account the security of your deployment process?*

## *you may want further sections*

*especially if the use of your application is not self-evident*

## Handy dev links

- [Trello](https://trello.com/b/k9sE6Qd0/dogshop)
- [Canvas](https://ehb.instructure.com/courses/22745/assignments)
- [GitHub](https://github.com/EHB-TI/web-app-unicorns)
- [Website](https://desideriushogeschool.be)
