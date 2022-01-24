# Installer les dépendences
composer install

# Générer la clé JWT
php artisan jwt:secret

#  Modifier le .env pour pointer sur la bdd et lancer les migrations pour la base de données
DB_CONNECTION=tp-quiz
php artisan migrate:fresh


# Lancer le serveur Apache pour l'application
php artisan serve