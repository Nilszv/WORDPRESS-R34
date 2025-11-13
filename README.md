# Custom WordPress Theme

A clean, modern, and fully responsive WordPress theme built from scratch. This theme follows WordPress coding standards and best practices.

## 🚀 Quick Start - Run Locally with Docker

**Want to see your site live right now?** This repository includes Docker configuration for instant local development!

### Prerequisites
- Install [Docker Desktop](https://www.docker.com/products/docker-desktop/)

### Run Your WordPress Site
```bash
# Clone the repository
git clone <your-repo-url>
cd WORDPRESS-R34

# Start WordPress
docker-compose up -d

# Visit your site
# WordPress: http://localhost:8080
# Database Admin: http://localhost:8081
```

**That's it!** Complete the WordPress installation wizard, activate the "Custom Theme", and your site is live.

📖 **[See detailed setup instructions in SETUP.md](SETUP.md)**

---

## Features

- Fully responsive design
- Clean and modern layout
- SEO-friendly markup
- Custom logo support
- Featured images support
- Widget-ready sidebar and footer
- Custom navigation menus
- Search functionality
- Comments system
- Custom post thumbnails
- Accessibility-ready
- Translation-ready
- HTML5 markup
- Block editor support

## Installation

### Method 1: Direct Installation

1. Download or clone this repository
2. Navigate to your WordPress installation directory
3. Copy the `wp-content/themes/custom-theme` folder to your WordPress themes directory:
   ```bash
   cp -r wp-content/themes/custom-theme /path/to/wordpress/wp-content/themes/
   ```
4. Log in to your WordPress admin panel
5. Go to Appearance > Themes
6. Find "Custom Theme" and click "Activate"

### Method 2: ZIP Upload

1. Compress the `custom-theme` folder into a ZIP file
2. Log in to your WordPress admin panel
3. Go to Appearance > Themes > Add New
4. Click "Upload Theme" and choose the ZIP file
5. Click "Install Now"
6. After installation, click "Activate"

## Setup and Configuration

### 1. Set Up Navigation Menus

1. Go to Appearance > Menus
2. Create a new menu or edit an existing one
3. Assign it to the "Primary Menu" location
4. Optionally create a footer menu and assign it to "Footer Menu"

### 2. Configure Widgets

1. Go to Appearance > Widgets
2. Add widgets to:
   - **Sidebar**: Appears on blog posts and archive pages
   - **Footer**: Appears in the footer area of all pages

### 3. Customize Theme Settings

1. Go to Appearance > Customize
2. Configure:
   - Site Identity (logo, site title, tagline)
   - Colors (if using a child theme)
   - Menus
   - Widgets
   - Homepage settings

### 4. Set Featured Images

For best results, use images with these dimensions:
- Featured images: 800 x 450 pixels
- Thumbnails: 400 x 300 pixels
- Post thumbnails: 1200 x 630 pixels (default)

## Theme Structure

```
custom-theme/
├── js/
│   └── navigation.js          # Mobile menu functionality
├── template-parts/
│   ├── content.php             # Default post content template
│   ├── content-none.php        # No posts found template
│   └── content-search.php      # Search results template
├── 404.php                     # 404 error page
├── archive.php                 # Archive pages (categories, tags, dates)
├── comments.php                # Comments template
├── footer.php                  # Site footer
├── functions.php               # Theme functions and features
├── header.php                  # Site header
├── index.php                   # Main template file
├── page.php                    # Page template
├── search.php                  # Search results page
├── searchform.php              # Search form template
├── sidebar.php                 # Sidebar template
├── single.php                  # Single post template
└── style.css                   # Main stylesheet with theme headers
```

## Customization

### Child Theme

For customizations, it's recommended to create a child theme:

1. Create a new folder: `custom-theme-child`
2. Create `style.css`:
   ```css
   /*
   Theme Name: Custom Theme Child
   Template: custom-theme
   */
   ```
3. Create `functions.php`:
   ```php
   <?php
   add_action('wp_enqueue_scripts', 'custom_theme_child_enqueue_styles');
   function custom_theme_child_enqueue_styles() {
       wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
   }
   ```

### Adding Custom CSS

1. Go to Appearance > Customize > Additional CSS
2. Add your custom CSS rules

### Modifying Templates

Copy template files from the parent theme to your child theme and modify as needed.

## Development

### Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

### Local Development Setup

**Recommended: Use Docker (Easiest)**

See the [Quick Start section](#-quick-start---run-locally-with-docker) above and [SETUP.md](SETUP.md) for complete Docker instructions.

**Alternative: Traditional Tools**

1. Install a local WordPress environment (XAMPP, MAMP, Local by Flywheel, etc.)
2. Clone or copy this theme to `wp-content/themes/`
3. Activate the theme in WordPress admin
4. Start developing!

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Theme Support

This theme includes support for:

- `automatic-feed-links`
- `title-tag`
- `post-thumbnails`
- `html5`
- `customize-selective-refresh-widgets`
- `custom-logo`
- `align-wide`
- `responsive-embeds`
- `editor-styles`
- `wp-block-styles`

## Hooks and Filters

The theme uses standard WordPress hooks and filters. Some key ones:

- `after_setup_theme` - Theme setup
- `widgets_init` - Register widget areas
- `wp_enqueue_scripts` - Enqueue styles and scripts
- `excerpt_length` - Custom excerpt length (30 words)
- `excerpt_more` - Custom excerpt "more" string

## Troubleshooting

### Menu not showing?
- Make sure you've created and assigned a menu to the "Primary Menu" location

### Sidebar not appearing?
- Add widgets to the "Sidebar" widget area in Appearance > Widgets

### Featured images not showing?
- Make sure "Featured Image" is set for your posts
- Check if post thumbnails are enabled in your theme

## Credits

- Theme developed by: Your Name
- Built with WordPress best practices
- Icons: Built-in SVG icons

## License

This theme is licensed under the GNU General Public License v2 or later.

## Changelog

### Version 1.0.0
- Initial release
- Basic theme structure
- Responsive design
- Widget areas
- Custom menus
- Search functionality
- Comments support

## Support

For issues, questions, or contributions, please visit the theme repository or contact the theme author.

---

**Note:** This is a starter theme. Feel free to customize it according to your needs or use it as a base for more complex themes.
