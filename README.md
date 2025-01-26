# Gestion de Contact - PHP/MySQL

![Badge](https://img.shields.io/badge/version-1.0.0-blue)
![Badge](https://img.shields.io/badge/license-MIT-green)
![Badge](https://img.shields.io/badge/php-8.2+-brightgreen)
![Badge](https://img.shields.io/badge/mysql-8.0+-orange)

## 📖 Description

Application web de gestion de contacts basique développée en PHP avec MySQL comme base de données. Cette application permet :

- La gestion des contacts (CRUD)
- L'affichage des contacts
- L'authentification des utilisateurs 
- La gestion des profiles utilisateurs


## 🚀 Fonctionnalités

### Pour tous les utilisateurs

- Inscription et connexion
- La page de profile de l'utilisateur
- Consultation de la liste des contacts
- Ajouter un contact(connecté seulement)

### Pour les utilisateurs connectés

- Visualisation des contacts sauvegarder
- Modification du profil
- Ajouter un contact
- Rechercher un contact
- Supprimer un contact
- Modifier un contact


## 🛠️ Installation

### Pré-requis

- Docker et Docker Compose installés
- PHP 8.2+
- MySQL 8.0+


### Étapes d'installation

1. Cloner le dépôt :

   ```bash
   git clone https://github.com/votre-utilisateur/gestion-contact.git
   cd gestion-contact
   ```

2. Configurer l'environnement :

   ```bash
   cp .env.example .env
   ```

3. Démarrer les containers Docker :

   ```bash
   docker-compose up -d
   ```

4. Installer les dépendances :

   ```bash
   docker-compose exec web composer install
   ```

5. Initialiser la base de données :

   ```bash
   docker-compose exec db mysql -u root -psecret contact_db < initdb/db.sql
   ```

6. Accéder à l'application :
   - Application : http://localhost:8080
   - phpMyAdmin : http://localhost:8081

## 🧑‍💻 Utilisation

### Comptes par défaut

   - Utilisateur :
   - Identifiant : mariama9024@gmail.com
   - Mot de passe : Azerty12@

### Ajouter un contact

1. Connectez-vous avec un compte utilisateur
2. Cliquez sur "Ajouter Contact" pour ajouter un contact
3. Consultez vos contacts en cliquant sur "Accueil" 


## 🗂️ Structure du projet

```
gestion-contact/
├── app/
│   ├── Controllers/
│   ├── Models/
├── config/
├── initdb/
├── src/
├── templates/
├── views/
│   ├── auth/
│   ├── users/
├── .env.example
├── docker-compose.yml
├── Dockerfile
├── README.md
└── index.php
```

## ⚙️ Configuration

Modifiez le fichier `.env` pour configurer :

```env
DB_HOST=db
DB_NAME=contact_db
DB_USER=root
DB_PASSWORD=secret
APP_ENV=development
APP_URL=http://localhost:8080
```

## 🧪 Tests

Pour exécuter les tests :

```bash
docker-compose exec web vendor/bin/phpunit
```

## 🤝 Contribution

1. Forker le projet
2. Créer une branche (`git checkout -b feature/AmazingFeature`)
3. Committer vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Pousser la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

## 📄 Licence

Ce projet est sous licence MIT - voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 🙏 Remerciements


- [Docker](https://www.docker.com/) pour l'environnement de développement
- [phpMyAdmin](https://www.phpmyadmin.net/) pour la gestion de la base de données

## 📧 Contact

Pour toute question ou suggestion, contactez :

- [mamadousaliouba588@gmail.com](mailto:mamadousaliouba588@gmail.com)
- [@votre-x](https://x.com/@xenon0567)
