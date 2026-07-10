# Best Design Furniture WordPress Theme

A custom WordPress theme created for Best Design Furniture and developed by Nischhal Raj Subba.

## What this repository contains

- WordPress theme templates written in PHP
- Custom furniture-brand layout and styling
- Theme images and branding assets
- WordPress navigation integration
- Responsive frontend behavior

This is not a standalone static HTML website. It must be installed inside a WordPress site's `wp-content/themes/` directory and activated from the WordPress admin area.

## Local setup

1. Install a local WordPress environment.
2. Copy this repository into:

```text
wp-content/themes/bestdesign
```

3. Activate the theme from **Appearance → Themes**.
4. Create or assign the navigation menu expected by the theme.
5. Configure pages, media, and content from WordPress.

## Main files

| File | Purpose |
|---|---|
| `style.css` | Theme metadata and main styles |
| `functions.php` | Theme setup and WordPress integrations |
| `header.php` | Document head, site branding, and navigation |
| `footer.php` | Footer markup and WordPress footer hook |
| `index.php` | Main fallback template |
| `front-page.php` | Homepage template when configured |

## Maintenance notes

- Use WordPress URL helpers rather than hard-coded `.html` links.
- Escape URLs and dynamic output with WordPress escaping functions.
- Preserve `wp_head()`, `wp_body_open()`, and `wp_footer()` hooks.
- Test menus, widgets, images, and templates against a supported WordPress version.
- Optimize large furniture images before production use.

## Status

This is an older custom-theme project retained as part of Nischhal's frontend and WordPress development history. It may require modernization before use on a current production website.

## Author

**Nischhal Raj Subba**

Current portfolio: https://nischhalsubba.com.np/
