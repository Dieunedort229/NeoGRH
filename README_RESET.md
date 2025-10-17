# Reset complet du projet NeoGRH

Ce guide explique comment réinitialiser complètement le projet, recréer la base de données (via phpMyAdmin), appliquer les migrations et les seeders pour retrouver un état fonctionnel (y compris la création d'un SuperAdmin).

> Prérequis : MySQL installé (accessible via phpMyAdmin), PHP, Composer, Node/npm si vous souhaitez aussi recompiler les assets.

## 1) Sauvegarde (optionnel)
- Si vous avez des données importantes, exportez-les via phpMyAdmin ou mysqldump.

## 2) Recréer la base de données via phpMyAdmin
1. Ouvrez phpMyAdmin (ex : http://localhost/phpmyadmin).
2. Si la base `neogrh` existe déjà, supprimez-la (ou choisissez un autre nom).
3. Créez une nouvelle base de données `neogrh` (collation utf8mb4_general_ci recommandée).

> Note : si vous préférez en ligne de commande MySQL :
>
> mysql -u root -p
> CREATE DATABASE neogrh CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

## 3) Configurer le fichier .env
- Ouvrez `.env` et vérifiez les variables DB :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=neogrh
DB_USERNAME=root
DB_PASSWORD=
```
- Optionnel : changer `AUTH_ALLOW_REGISTRATION=false` (par défaut) pour garder les inscriptions publiques désactivées.

- Pour le seeder du SuperAdmin, vous pouvez définir :
```
SEED_SUPERADMIN_EMAIL=superadmin@example.com
SEED_SUPERADMIN_PASSWORD=password
```

## 4) Installer les dépendances
```powershell
composer install
npm install
npm run build   # ou npm run dev pendant le développement
```

## 5) Lancer les migrations et seeders
```powershell
php artisan migrate:fresh --seed
```
- `migrate:fresh` supprime toutes les tables et exécute les migrations.
- `--seed` exécutera `DatabaseSeeder`, qui appelle le seeder `RolesAndAdminSeeder` et créera le SuperAdmin.

## 6) Vérifier l'utilisateur SuperAdmin
- Après le seed, vous devriez pouvoir vous connecter avec les identifiants du seeder (voir `.env` SEED_SUPERADMIN_* ou les valeurs par défaut `superadmin@example.com` / `password`).
- Accédez à `http://localhost:8000/admin/users` après vous être connecté pour gérer les utilisateurs.

## 7) Commandes utiles
- Lancer le serveur local :
```powershell
php artisan serve
```
- Exécuter tests :
```powershell
vendor\bin\pest
```
- Réinitialiser la base + seed :
```powershell
php artisan migrate:fresh --seed
```

## 8) Résolution des problèmes fréquents
- Erreur duplicate column lors des tests/migrations : j'ai ajusté les migrations pour ajouter des contrôles `Schema::hasColumn` afin d'éviter les doublons.
- 403 sur `/admin/*` : connectez-vous avec un compte qui a le rôle `SuperAdmin`.


