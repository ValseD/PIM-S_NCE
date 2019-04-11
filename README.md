# PIM-S'NCE

This is a PHP development exercise which purpose is to implement a basic PIM system, required to accomplish the tech interview for S'NCE candidates.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

You must have an Apache/MySQL/PHP software platform pre-installed on your system
This version has been developed on XAMPP.

### Installing

A step by step series of examples that tell you how to get a development env running

- Install the last version of Symfony following the steps described in the official website
- Install the last version of Composer as described in the official website 
- Start your Apache/MySQL/PHP platform to activate the local instance 
- Clone this project into a folder under ..\htdocs  
- Change the file "app/config/parameters.yml" with all the reference of your mySQL instance
- Open the Apache <virtual host> file and add the node related to the local folder where the project has been cloned on the localhost:80 port as the example below:
    <VirtualHost *:80>
        # This first-listed virtual host is also the default for *:80
        ServerName www.example.com
        ServerAlias example.com 
        DocumentRoot "/www/domain"
    </VirtualHost>
- Browse the project folder using the terminal
- Run command: composer install to install dependencies*
- Run command: php bin/console doctrine:database:create
- Run command: php bin/console doctrine:schema:update --force
- Open your browser and digit: localhost:80  

===========

### Specifiche S'NCE:
===========

1) Pagina "Crea Prodotto"
La pagina risponde alla rotta /product/create
Come amministratore del sito voglio poter inserire una nuova tipologia di prodotto all'interno di un catalogo.
  - Voglio definirne il nome
  - Voglio poter caricare un'immagine
  - Voglio poter inserire una descrizione
  - Voglio poter aggiungere uno o più tag (almeno uno è obbligatorio) al prodotto

  
2) Pagina "Listato Prodotti"
La pagina di listato risponde alla rotta /product/list
Come amministratore del sito voglio vedere il catalogo di tutti i prodotti da me inseriti in una lista, dove vedo il nome e un'anteprima dell'immagine ridotta, i prodotti sono ordinati per data di creazione. 
Vedo la data di creazione accanto a ciascun prodotto.
Voglio inoltre poter filtrare per ricerca LIKE sul nome dei tag associati.


3) Pagina "Edit Prodotto"
La pagina di modifica risponde alla rotta /product/{product}/edit
Come amministratore del sito cliccando sul link di una riga della lista o sull'immagine, voglio andare al form di modifica delle proprietà del prodotto. 


### Richieste implementative:
=========================
- Il progetto deve essere realizzato utilizzando Symfony4
- Doctrine 2 deve essere utilizzato per la gestione del Database 
- Usa i Bundle/Package/Component in maniera significativa
- Puoi usare qualsiasi bundle o package per gestire l'upload delle immagini col framework scelto
- Correda il repository di un README.md in inglese che aiuti nella configurazione del progetto
- Non serve che tu implementi un meccanismo di autenticazione per l'area amministrativa
- Utilizza i Repository di Doctrine 2


### Il lavoro valutato per:
=====================
- Completezza rispetto alle specificheadd
- Organizzazione e struttura del progetto
- Organizzazione e struttura del codice
- Eleganza delle soluzioni adottate


### Modalità di rilascio:
=====================
- Il progetto deve essere rilasciato su repository pubblico github
