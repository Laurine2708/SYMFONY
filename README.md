# Projet de site de e-commerce avec gestion des mots de passe avec hash

## Description

Ce projet montre les jointures entre les tables, les liens entre les produits, les références et les distributeurs ainsi que comment **sécuriser un mot de passe avant de l'enregistrer dans une base de données**.

Au lieu de stocker le mot de passe en clair, il est transformé grâce à une **fonction de hachage**.
Seule l’empreinte du hash est enregistrée, ce qui permet de **protéger les informations des utilisateurs**.

## Fonctionnement

1. L'utilisateur saisit un mot de passe.
2. Le mot de passe est transformé avec une fonction de hash.
3. Le hash obtenu est enregistré dans la base de données.
4. Lors de la connexion, le mot de passe saisi est à nouveau hashé puis comparé avec celui stocké.

## Technologies utilisées

* PHP
* Symfony
* MySQL
* Composer
* Doctrine

## Installation

Cloner le projet :

```
git clone https://github.com/votre-utilisateur/nom-du-projet.git
```

Installer les dépendances :

```
composer install
```

Configurer la base de données dans le fichier `.env`.

Lancer le serveur :

```
symfony server:start
```

