# Bienvenue sur notre projet Pokémon ! 

## Notre équipe

Notre équipe se compose de 6 personnes : 

- Ridwan SOOCOORMAANEE
- Toshiro MPIKA
- Thomas MORALDI
- Hugo CORNIQUET
- Kemici CAGNARD 
- Allan GERME

## Notre projet

Ce projet permet d'insérer une liste de pokémons que vous et vos amies aimez ! 
Vous pouvez ensuite créer un pokédex pour chacun de vos amis et y insérer selon vos préférences et vos envies, différents pokémons présents dans la liste ! 

Pour les pokedex, il est possible de les créer, modifier, afficher et supprimer. En les modifiants, vous pouvez récupérer tous les pokémons de votre choix présents dans la liste. 

Pour les pokémons, il est possible de les créer, modifier, afficher et supprimer. 

### Les technologies utilisés

Le projet est réalisé en PHP avec le framework Symfony.
Pour la partie 'front', nous avons utilisé Twig et Bootstrap. 

### Lancement du projet

Après avoir cloner le projet, il faut réaliser les commandes suivantes : 

#### composer update 
-> pour installer les dépendances

#### php bin/console doctrine:database:create
-> après avoir modifier votre ".env" pour créer votre BDD

#### php bin/console make:migration 
-> pour créer les fichiers de migrations

#### php bin/console doctrine:migrations:migrate
-> pour migrer les données et créer les tables

#### symfony server:start
-> pour lancer le projet

Le site est donc prêt !

Good Luck !!


