# Best Design WordPress Theme

Legacy WordPress theme for the Best Design agency site. The theme contains custom home/about/work/contact templates, three custom content types, responsive navigation, Owl Carousel presentation, and a small jQuery interaction layer.

## Structure

- `functions.php` — theme setup, assets, menus, post types, ACF options support, sidebars, and content helpers.
- `header.php` / `footer.php` — shared document chrome and navigation/footer content.
- `front-page.php` — featured services, introduction, service explorer, work carousel, CTA, and testimonials.
- `page-about-us.php` — about content plus the service directory.
- `page-our-work.php` — portfolio/work listing.
- `page-contact-us111.php` — legacy contact page template and map embed.
- `page.php` / `single.php` / `index.php` — functional WordPress fallbacks for pages, single posts, and archives.
- `category-work.php` — archive presentation for the legacy Work post category.
- `style.css` — required WordPress theme metadata and stylesheet entry point.
- `css/legacy-theme.css` — preserved compiled CSS from the original theme; its source Sass/build pipeline is not present in this repository.
- `css/README.md` — ownership note for the preserved compiled stylesheet.
- `js/index.js` — menu, navigation/logo state, carousels, and service preview behavior.
- `owl carousel/` — bundled third-party Owl Carousel distribution; treat it as vendor code.
- `images/` and `icons/` — theme artwork and media assets.

## WordPress content model

The theme registers these custom post types:

- `bestdesign_services`
- `bestdesign_work`
- `bd_testimonial`

It also exposes `header-menu` and `footer-menu` navigation locations plus the `sidebar-home` and `shortcode-home` widget areas.

Advanced Custom Fields is optional at bootstrap time, but existing home/about templates read configured ACF fields when the plugin is available.

## Installation

Copy or clone the repository into a WordPress installation under `wp-content/themes/bestdesign`, then activate **Best Design** from the WordPress admin area.

The theme uses WordPress's bundled jQuery, the bundled Owl Carousel files, Google Fonts/Material Icons, Font Awesome, and the public Parallax.js CDN script.

## Maintenance rules

Keep WordPress queries scoped with `WP_Query` instead of replacing the global query with `query_posts()`. Use `get_template_directory_uri()` or WordPress URL helpers for theme assets rather than hard-coded localhost paths.

The root `style.css` is intentionally small because WordPress requires its theme metadata there; the historical compiled theme rules live in `css/legacy-theme.css`. That legacy stylesheet is treated as generated/compiled output because the original source pipeline is absent. The Owl Carousel directory is third-party vendor code and should not receive project-specific comments or manual edits.

Repository README rewriting workflows, duplicate CSS backups/minified copies, dead template placeholders, and machine-generated repository reports are not part of the maintained theme.

## Status

This is a legacy theme and has no committed automated test suite. Changes should be smoke-tested in a WordPress installation with representative Services, Works, Testimonials, menus, widgets, and any ACF fields used by the site.
