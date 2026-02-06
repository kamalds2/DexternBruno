
# DexternBruno

DexternBruno is a lightweight, modular PHP website and CMS platform inspired by CodeIgniter's structure. Designed for rapid development and easy customization, it provides a robust foundation for building dynamic websites with both frontend and admin panel capabilities. The project is ready to run out-of-the-box on XAMPP/Apache with MySQL, making it ideal for local development, small business sites, or as a starting point for custom PHP applications.

## About the Project

DexternBruno aims to simplify PHP web development by offering:
- A clean, modular architecture for maintainable code.
- Built-in admin panel for content and user management.
- Support for custom modules (pages, jobs, services, sliders, testimonials, users) to extend functionality easily.
- RESTful API entry point for modern integrations.
- Compatibility with PHP 7.x and 8.x, and optimized for XAMPP/Apache environments.

Whether you're a developer looking for a quick-start PHP CMS, or need a flexible base for a new project, DexternBruno provides the essentials to get you up and running quickly.

## Quick summary

## Requirements
- PHP 7.2+ (7.4 or 8.0 recommended)
- MySQL / MariaDB
- Apache with mod_rewrite (XAMPP on Windows is convenient)

## Important paths
- `admin/` — Admin panel and controllers for back-office features.
- `controllers/` — Frontend controllers.
- `core/` — Base framework files (`Controller.php`, `Model.php`, `View.php`, etc.).
- `libs/` — Configuration, drivers, helpers. Update `libs/config.php` for DB credentials.
- `models/` — Data models used by controllers.
- `views/` — Frontend templates.
- `uploads/` — Uploaded assets (banners, pages, sliders, testimonials).
- `restful/` — REST API routes and config.

## Configuration notes
- Edit database settings and other environment values in `libs/config.php`.
- If deploying to a production server, ensure `display_errors` is off and proper file permissions for `uploads/` and `logs/` are set.

## Admin access
- The admin area is located under `admin/` (e.g., `http://localhost/DexternBruno/admin/`).
- Controller files: `admin/controllers/` — look at `login.php`, `dashboard.php`, and `settings.php` for admin workflows.

## Contributing
- Follow existing code structure. Keep core changes minimal; add new modules under `modules/` and controllers under `controllers/`.

## Troubleshooting
- If you see blank pages, enable `display_errors` temporarily or check `logs/error_logs/` for PHP errors.
- Ensure `libs/drivers/Database.php` matches your PHP MySQL extension (`Mysqli` vs `Mysql`).



