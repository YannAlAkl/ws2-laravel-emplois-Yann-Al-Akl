# Site interne d'offres d'emploi — Laravel

un site interne permettant de publier des offres d'emploi, de consulter
les offres disponibles et de postuler en téléversant un CV.


## Prérequis

- PHP 8.2+
- Composer
- Node.js 18+ et npm

## Installation

Windows (PowerShell) :

```powershell
composer install
npm install
copy .env.example .env
php artisan key:generate
New-Item -ItemType File -Force database\database.sqlite
php artisan migrate:fresh --seed
npm run dev
```

macOS / Linux :

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
npm run dev
```

Dans un second terminal, démarrer le serveur :

```bash
php artisan serve
```

L'application est disponible sur http://127.0.0.1:8000 (la racine redirige vers /emplois).
Laisser `npm run dev` actif pour servir les styles Tailwind (Vite), ou compiler une
version finale avec `npm run build`.

## Base de données

- Connexion SQLite (`DB_CONNECTION=sqlite`), fichier `database/database.sqlite`.
- `php artisan migrate:fresh --seed` recrée les tables et insère 
  de démonstration, dont une inactive pour illustrer la gestion du statut.

## Routes principales

| Méthode | URI | Rôle |
|---|---|---|
| GET | `/` | Redirection vers `/emplois` |
| GET | `/emplois` | Liste publique des offres actives |
| GET | `/emplois/{offreEmploi}` | Détail d'une offre |
| GET | `/emplois/{offreEmploi}/postuler` | Formulaire de candidature |
| POST | `/emplois/{offreEmploi}/postuler` | Enregistrement d'une candidature avec CV |
| GET | `/admin/offres` | Liste admin des offres + nombre de candidatures |
| GET | `/admin/offres/create` | Formulaire de création |
| POST | `/admin/offres` | Enregistrement d'une offre |
| GET | `/admin/offres/{offreEmploi}/edit` | Formulaire de modification |
| PUT/PATCH | `/admin/offres/{offreEmploi}` | Mise à jour d'une offre |
| DELETE | `/admin/offres/{offreEmploi}` | Suppression d'une offre |
| GET | `/admin/offres/{offreEmploi}/candidatures` | Candidatures reçues pour une offre |
| GET | `/admin/candidatures/{candidature}/cv` | Consulter le CV (`?download=1` pour télécharger) |

Lister toutes les routes : `php artisan route:list`.



