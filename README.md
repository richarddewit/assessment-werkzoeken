# Developer Assessment (PHP/MySQL & HTML/CSS/JS)

## Applicatie draaien

1. Clone deze repo
2. Voer `docker-compose up --build` uit
3. Open `http://localhost:8080`

Om code te formatten, voer dit uit:
```bash
docker-compose run --rm php-cs-fixer fix .
```

## Opdracht

Maak een compact vacaturesoverzicht en vacaturepagina met mogelijkheid om direct te
solliciteren.

### Functionaliteiten

1. Vacature Overzicht
   - [x] Toon een eenvoudige lijst van vacatures, dynamisch geladen uit een MySQL-
   database via PHP.
   - [x] Toon per vacature: titel, bedrijf, locatie en een knop "Bekijk vacature".
   - [x] Voeg bovenaan een zoekformulier toe om in de vacatures te zoeken, 1 veld met
   ‘wat’ en 1 veld met ‘waar’.
   - [x] Toon 100 vacatures van circa 25 bedrijven.
2. Vacaturedetailpagina
   - [x] Toon de volledige vacature-informatie (titel, bedrijf, omschrijving, locatie,
   contactpersoon).
   - [x] Voeg een knop "Solliciteer" toe op deze detailpagina.
3. Sollicitatieformulier (HTML/CSS/JS)
   - [x] Bij klikken op "Solliciteer" verschijnt een eenvoudig formulier (native JS).
   - [x] Formulier bevat: naam, e-mail, CV-upload en korte motivatie.
   - [x] Voeg simpele JS-validatie toe (controleer verplichte velden).
4. PHP/MySQL Sollicitatie-afhandeling
   - [x] Sla ingestuurde sollicitaties eenvoudig op in MySQL via PHP.

### Belangrijk bij oplevering
   - Gebruik géén frameworks of externe libraries.
   - Host online en geef toegang tot de scripts.
   - Voeg korte toelichtingen toe als comments bij je code. 

### Waar letten we op
   - Structuur en leesbaarheid van je code
   - Logische denkwijze en oplossingsgerichtheid
   - Security
   - Op design wordt niet gelet
