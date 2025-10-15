# Copilot Instructions for NeoGRH

## Project Overview
NeoGRH is a Laravel-based web application for HR management. The codebase follows standard Laravel conventions but includes customizations for HR workflows and data management.

## Architecture & Key Components
- **app/**: Core application logic. Contains:
  - **Http/Controllers/**: Route handlers and business logic.
  - **Models/**: Eloquent ORM models (e.g., `User.php`).
  - **Providers/**: Service providers for bootstrapping.
  - **View/Components/**: Blade UI components.
- **routes/**: Route definitions (`web.php`, `auth.php`, `console.php`).
- **resources/views/**: Blade templates for UI. Organized by feature (e.g., `profile/`, `personnel/`, `projets/`).
- **database/**: Migrations, seeders, and factories for test data.
- **public/**: Entry point (`index.php`) and static assets.
- **config/**: Application configuration files.

## Developer Workflows
- **Build assets**: Use Vite and Tailwind. Run `npm run build` for production assets, `npm run dev` for development.
- **Run tests**: Use Pest and PHPUnit. Run `vendor\bin\pest` or `vendor\bin\phpunit` from the project root.
- **Database migrations**: Run `php artisan migrate` to apply migrations. Use `php artisan db:seed` for seeding.
- **Serve locally**: Run `php artisan serve` to start the development server.

## Project-Specific Conventions
- **Blade Views**: Use feature-based folders in `resources/views/` (e.g., `profile/`, `personnel/`). Shared layouts/components in `layouts/` and `components/`.
- **Controllers**: Grouped by domain in `app/Http/Controllers/`. Follow RESTful conventions.
- **Models**: Eloquent models in `app/Models/`. Relationships and scopes are defined here.
- **Requests**: Form request validation classes in `app/Http/Requests/`.
- **Testing**: Feature tests in `tests/Feature/`, unit tests in `tests/Unit/`. Use Pest for expressive test syntax.

## Integration Points
- **External Packages**: Managed via Composer (`composer.json`).
- **Frontend**: Uses Vite, Tailwind, and Blade. JS/CSS in `resources/js/` and `resources/css/`.
- **Authentication**: Configured in `config/auth.php` and routes in `routes/auth.php`.

## Examples
- To add a new HR feature, create a controller in `app/Http/Controllers/`, a model in `app/Models/`, migrations in `database/migrations/`, and views in `resources/views/[feature]/`.
- For a new Blade component, add to `resources/views/components/` and register if needed in `app/View/Components/`.

## Useful Commands
- `php artisan migrate:fresh --seed` — Reset and seed database
- `npm run dev` — Start asset watcher
- `php artisan tinker` — Interactive shell

## References
- [Laravel Docs](https://laravel.com/docs)
- [Pest Docs](https://pestphp.com/docs/introduction)

---
_If any conventions or workflows are unclear, please ask for clarification or provide feedback to improve these instructions._
