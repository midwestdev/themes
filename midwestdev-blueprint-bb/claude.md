# WordPress Beaver Builder Child Theme - Development Guide

**Version:** 1.0.0

> **📋 Template Documentation**
>
> This guide uses **"Midwest Dev"** as a reference example throughout. When applying to your projects, substitute:
> - `midwestdev` → `{your-client-slug}` (lowercase, no spaces)
> - `Midwest Dev` → `{Your Client Name}` (proper case)
> - `MIDWESTDEV` → `{YOURCLIENTNAME}` (uppercase)
>
> **Constants across all projects:**
> - Text domain: `'midwestdev'` (used for WordPress i18n)
> - Author: `Midwest Dev`
>
> Module examples (slick-carousel, slick-testimonials, slick-timeline) are project-specific references and may not exist in your theme.

This is a custom **Beaver Builder Theme child theme** with custom modules and SCSS-based styling.

**Theme Setup:**
- Parent theme: **Beaver Builder Theme** (bb-theme)
- Child theme naming convention: `{client-name}-bb` (the `-bb` suffix signifies Beaver Builder child theme)
- Example: `midwest-dev-bb`, `acme-corp-bb`
- Built with Beaver Builder page builder and Beaver Themer

## New Project Setup Checklist

When starting a new WordPress project, **ALWAYS** perform these steps first:

### 1. Check Default Child Theme Name

The child theme likely starts with default naming:
- **Default folder name**: `bb-theme-child`
- **Default theme name**: "Beaver Builder Child Theme"

### 2. Establish Client Naming Convention

Before making any changes, establish the three naming formats:

**Example for client "Midwest Dev":**
- **Client Name** (Proper Case): `Midwest Dev`
- **Folder Name** (kebab-case): `midwest-dev-bb`
- **Function Prefix** (snake_case or concatenated): `midwestdev_` OR `midwest_dev_`

**Example for client "Acme Corporation":**
- **Client Name**: `Acme Corporation`
- **Folder Name**: `acme-corporation-bb`
- **Function Prefix**: `acmecorporation_` OR `acme_corporation_`

### 3. Rename Theme Folder

1. Rename the theme folder from `bb-theme-child` to `{client-name}-bb`
2. Example: `bb-theme-child` → `midwest-dev-bb`

### 4. Update style.css Header

Update the child theme's style.scss header with client information:

```scss
/*********************************************************************
 *
 *      Theme Name: [Client Name]
 *      Theme URI: https://www.[client-domain].com
 *      Version: 1.0
 *      Description: Custom Beaver Builder Child Theme built for [Client Name].
 *      Author: Midwest Dev
 *      Author URI: https://www.midwestdev.io
 *      Template: bb-theme
 *
 *********************************************************************/
```

**Example:**
```scss
/*********************************************************************
 *
 *      Theme Name: Midwest Dev
 *      Theme URI: https://www.midwestdev.com
 *      Version: 1.0
 *      Description: Custom Beaver Builder Child Theme built for Midwest Dev.
 *      Author: Midwest Dev
 *      Author URI: https://www.midwestdev.io
 *      Template: bb-theme
 *
 *********************************************************************/
```

### 5. Update functions.php File Header

Replace the generic "Beaver Builder Child Theme" header with client-specific information:

**Before:**
```php
<?php
/**
 * Beaver Builder Child Theme
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://docs.wpbeaverbuilder.com/
 * @version 1.0
 */
```

**After (using client name):**
```php
<?php
/**
 * Midwest Dev Custom Theme
 * Built on Beaver Builder Child Theme
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 * https://docs.wpbeaverbuilder.com/
 *
 * @version 1.0
 * @author Midwest Dev
 */
```

**Pattern for any client:**
- First line: `{Client Name} Custom Theme`
- Second line: `Built on Beaver Builder Child Theme`
- Keep BB documentation reference
- Include version and author

### 6. Update Function Prefixes

Replace all generic function prefixes in functions.php with client-specific prefixes:

**Before:**
```php
function flavor_register_bb_modules() { }
add_action('init', 'flavor_register_bb_modules');
```

**After (using client prefix):**
```php
function midwestdev_register_bb_modules() { }
add_action('init', 'midwestdev_register_bb_modules');
```

**Why use client-specific prefixes:**
1. **Better code organization** - Easy to identify custom functions vs plugin functions
2. **Prevents naming collisions** - Reduces conflicts with plugins/other themes
3. **Professional appearance** - Shows attention to detail in code review

### 7. Update Theme Constants (Optional but Recommended)

Consider updating generic constants to be client-specific:

**Before:**
```php
define('FLAVOR_THEME_DIR', get_stylesheet_directory());
define('FLAVOR_THEME_URL', get_stylesheet_directory_uri());
```

**After:**
```php
define('MIDWESTDEV_THEME_DIR', get_stylesheet_directory());
define('MIDWESTDEV_THEME_URL', get_stylesheet_directory_uri());
```

### 8. Compile SCSS

After updating style.scss header, compile to generate style.css with proper theme information.

### 9. Collect Client Brand Assets & Setup

Gather and implement client brand assets early in the project:

#### Primary Logo Files

Request logo files from client in multiple formats:
- **SVG version** (preferred for scalability)
- **PNG version** with transparent background (fallback)
- Multiple sizes if available (standard, icon-only, alternate)

Save to: `assets/img/` directory

#### Color Palette Documentation

**Color System Architecture:**

This theme uses a **dual variable system** that combines Beaver Builder's global colors with SCSS variables:

1. **BB Global Colors** (CSS Custom Properties) - Primary variables for output
2. **Hex Fallbacks** - For SCSS color manipulation functions

---

**Step 1: Set Up Beaver Builder Global Colors**

Before editing `_variables.scss`, configure colors in WordPress:

1. Go to **WordPress Admin → Customize → Global Settings → Colors**
2. Add each brand color as a global color
3. Name them with client prefix pattern (names are flexible per project):
   - Example: "Midwest Dev Dark Blue"
   - Example: "Midwest Dev Red"
   - Example: "Midwest Dev Light Grey"
4. Beaver Builder auto-generates CSS variable names:
   - "Midwest Dev Dark Blue" becomes `--fl-global-midwest-dev-dark-blue`
5. Save and publish

**Why use BB Global Colors?**
- Colors can be updated site-wide from BB Customizer
- No need to recompile SCSS when adjusting shades
- Non-technical users can tweak colors post-launch
- BB modules automatically have access to these colors

---

**Step 2: Document in `assets/scss/_variables.scss`**

Use the **dual variable pattern** - BB CSS variables + hex fallbacks:

```scss
// ===========================================
// Midwest Dev Theme Variables
// ===========================================

// ===========================================
// Colors - CSS Custom Properties with Hex Fallbacks
// ===========================================

// CSS Variables (uses Beaver Builder global colors)
$midwestdev-dk-blue: var(--fl-global-midwest-dev-dark-blue);
$midwestdev-blue: var(--fl-global-midwest-dev-blue);
$midwestdev-md-blue: var(--fl-global-midwest-dev-medium-blue);
$midwestdev-lt-blue: var(--fl-global-midwest-dev-light-blue);
$midwestdev-red: var(--fl-global-midwest-dev-red);
$midwestdev-black: var(--fl-global-midwest-dev-black);
$midwestdev-white: var(--fl-global-midwest-dev-white);
$midwestdev-lt-grey: var(--fl-global-midwest-dev-light-grey);

// Hex Fallbacks (for SCSS color manipulation)
$midwestdev-dk-blue-hex: #050561;
$midwestdev-blue-hex: #0E0E96;
$midwestdev-md-blue-hex: #1E60FF;
$midwestdev-lt-blue-hex: #33ADFF;
$midwestdev-red-hex: #FD210D;
$midwestdev-black-hex: #1E1E1E;
$midwestdev-white-hex: #FFFFFF;
$midwestdev-lt-grey-hex: #F2F2F2;
```

**Pattern Explanation:**
- **Primary variables** use `var(--fl-global-{client-name}-{color-name})`
- **Hex fallbacks** append `-hex` suffix and contain actual hex values
- Both use the same client prefix: `$midwestdev-`

---

**Step 3: Usage Guidelines**

**Use PRIMARY variables (with `var()`) for:**
- Direct color output in CSS
- Background colors, text colors, borders
- Any property that outputs to compiled CSS

```scss
.button {
    background-color: $midwestdev-md-blue;  // Outputs: var(--fl-global-midwest-dev-medium-blue)
    color: $midwestdev-white;
}
```

**Use HEX FALLBACK variables (with `-hex`) for:**
- SCSS color manipulation functions
- `lighten()`, `darken()`, `rgba()`, `mix()`, etc.
- Any SCSS function that needs a hex value

```scss
.button {
    background-color: $midwestdev-md-blue;
    &:hover {
        // Use -hex version for darken() function
        background-color: darken($midwestdev-md-blue-hex, 10%);
    }
}

.overlay {
    // Use -hex version for rgba() function
    background-color: rgba($midwestdev-black-hex, 0.5);
}
```

**Why two versions?**
- CSS custom properties (`var()`) don't work with SCSS functions
- SCSS functions process at compile-time, `var()` resolves at runtime
- Hex fallbacks enable SCSS color manipulation

---

**Step 4: Keeping Values in Sync**

**Important:** The hex fallback values should match the BB global colors.

**When to verify sync:**
- During initial brand asset setup
- When client requests color changes
- Before major launches/redesigns

**Manual Verification:**
1. Open site in browser
2. Inspect element and check computed value of `--fl-global-{color-name}`
3. Compare to hex value in `_variables.scss`
4. Update hex fallback if needed

**Note:** Minor discrepancies are acceptable if you're using the primary `var()` variables for output. The hex fallbacks are primarily for SCSS manipulation, so exact matches matter most when you're using functions like `darken()` or `lighten()`.

---

**Color Variable Naming Convention:**
- All color variables prefixed with `${client-name}-`
- Use descriptive names: `-dark-blue`, `-md-blue`, `-lt-grey`
- Avoid generic names like `$primary-color` or `$text-color`
- BB global color names are flexible per project (no strict pattern required)

**Ask client for:**
- Primary brand color(s) with hex codes
- Secondary/accent colors
- Any specific color usage guidelines or hierarchy

#### Typography & Fonts Setup

Identify and set up client's brand fonts:

**Adobe Fonts (Typekit):**
1. Get Adobe Fonts project ID from client
2. Add to functions.php (see existing pattern in this project)
3. Register fonts with Beaver Builder
4. Document font families in `_variables.scss`

**Google Fonts:**
1. Identify font names and weights needed
2. Enqueue via functions.php or SCSS @import
3. Document in `_variables.scss`

**Custom Fonts:**
1. Get font files (.woff, .woff2)
2. Add to `assets/fonts/` directory
3. Define @font-face rules in SCSS
4. Document in `_variables.scss`

**Variables Example (use client prefix):**
```scss
// Typography - Use client prefix for font variables
$font-basic-sans: 'basic-sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
$font-nexa: 'nexa', 'Futura', 'Century Gothic', sans-serif;
$font-body: $font-basic-sans;
$font-heading: $font-nexa;

// Font Weights
$font-light: 300;
$font-regular: 400;
$font-medium: 500;
$font-bold: 700;
$font-black: 900;

// Transitions (for consistency)
$transition-fast: 0.25s ease-in-out;
$transition-medium: 0.5s ease-in-out;
$transition-slow: 0.75s ease-in-out;
```

#### JavaScript File Setup

A blank JavaScript file should be created in `assets/js/` for potential custom scripts:

**Setup Steps:**
1. Create blank file: `assets/js/{client-name}.js`
2. Example: `assets/js/midwestdev.js`
3. Add enqueue function to functions.php (commented out by default)

**Enqueue Function (add to functions.php, commented out):**
```php
/**
 * Enqueue custom theme JavaScript
 * Uncomment when custom JS is needed
 */
// function midwestdev_enqueue_scripts() {
//     wp_enqueue_script(
//         'midwestdev-js',
//         MIDWESTDEV_THEME_URL . '/assets/js/midwestdev.js',
//         array('jquery'),
//         filemtime(MIDWESTDEV_THEME_DIR . '/assets/js/midwestdev.js'),
//         true
//     );
// }
// add_action('wp_enqueue_scripts', 'midwestdev_enqueue_scripts');
```

**Notes:**
- JS file starts empty - only uncomment enqueue when custom scripts are needed
- Handle naming: `{client-name}-js` (e.g., `midwestdev-js`)
- Loads after jQuery (dependency)
- Uses `filemtime()` for cache busting (not version numbers)
- Loads in footer (`true` parameter)

#### Screenshot.png Replacement

**Note for later (near launch):**
- Replace default `screenshot.png` with actual site homepage screenshot
- Size: 1200x900px
- Shows client's actual designed site
- Take screenshot when design is finalized

### Setup Checklist Summary

**Theme Naming & Structure:**
- [ ] Rename theme folder from `bb-theme-child` to `{client-name}-bb`
- [ ] Update Theme Name in style.scss header
- [ ] Update Theme URI with client's domain
- [ ] Update Description with client name
- [ ] Update functions.php file header with client name
- [ ] Replace all function prefixes (`flavor_` → `clientname_`)
- [ ] Update theme constants (optional)

**Brand Assets & Styling:**
- [ ] Collect primary logo files (SVG, PNG)
- [ ] Document color palette in `assets/scss/_variables.scss` with client-prefixed names
- [ ] Set up client fonts (Adobe Fonts, Google Fonts, or custom)
- [ ] Update font variables in `_variables.scss`
- [ ] Create `assets/js/{client-name}.js` file
- [ ] Add commented-out JS enqueue function to functions.php

**Finalization:**
- [ ] Compile SCSS to generate updated style.css
- [ ] Test theme activation in WordPress
- [ ] Replace screenshot.png with actual site preview (near launch)

## Project Structure

```
theme-root/
├── functions.php              # Main theme functions and module registration
├── style.scss                 # Main stylesheet (compiles to style.css)
├── assets/
│   ├── scss/
│   │   ├── _variables.scss    # Global SCSS variables (colors, fonts, etc.)
│   │   ├── _functions.scss    # SCSS functions (rem(), fluid-type(), etc.)
│   │   └── _reset.scss        # CSS reset/normalize
│   └── img/                   # Theme images and SVGs
└── modules/
    └── [module-name]/         # Custom Beaver Builder modules
        ├── [module-name].php  # Module class and registration
        ├── includes/
        │   └── frontend.php   # Frontend HTML template
        ├── css/
        │   └── frontend.scss  # Module styles (compiles to .css/.min.css)
        └── js/
            └── frontend.js    # Module JavaScript
```

## Typical Plugin Stack

These projects typically use the following WordPress plugins and tools. Assume these are available and active unless stated otherwise.

### Page Builder & Theme (Always Active)

**Beaver Builder Theme (bb-theme)**
- Parent theme for all child themes
- Provides base theme functionality and BB integration
- Child theme built on top of this

**Beaver Builder (Plugin)**
- Visual page builder for creating layouts
- Used for all page building and content layout
- Assume BB is always available and active

**Beaver Themer**
- Advanced theme building capabilities
- Create custom headers, footers, layouts, and theme parts
- Integrates with custom post types and ACF fields
- Use for creating dynamic templates

### Core Plugins (Always Active)

**Advanced Custom Fields PRO (ACF PRO)**
- Used for custom fields and flexible content
- Commonly integrated with BB modules for custom data
- Field groups often created for custom post types, page templates, or BB modules
- Access fields via `get_field()`, `the_field()`, or `get_sub_field()` in templates
- Can be used to add custom settings to BB modules via ACF integration

**Gravity Forms**
- Primary form solution for contact forms, applications, etc.
- Embed using shortcode: `[gravityform id="X" title="false" description="false"]`
- Can be styled to match theme design
- Hooks available: `gform_after_submission`, `gform_confirmation`, etc.
- Often styled in theme's style.scss for consistency

**Gravity Forms Zero Spam**
- Bot protection for Gravity Forms
- No configuration needed in code
- Automatically protects all forms

**Gravity Forms Turnstile**
- Cloudflare Turnstile integration for Gravity Forms
- CAPTCHA alternative for bot protection
- User-friendly verification

**Gravity Perks (Spellbook)** (Frequently Available)
- Collection of add-ons/perks for Gravity Forms
- Extends Gravity Forms with additional functionality
- **Check Spellbook for solutions BEFORE writing custom code** for Gravity Forms issues
- Common perks: Conditional Logic, Nested Forms, Limit Submissions, etc.
- Available on most projects - assume it's available unless noted otherwise

**All in One SEO (AIOSEO)**
- SEO meta management
- Don't create custom meta tags - use AIOSEO's built-in functionality
- Sitemap and schema automatically generated

**Google Site Kit**
- Connects site to Google services
- Handles Google Analytics, Search Console, and Tag Manager
- Analytics and tracking managed through this plugin
- Occasionally used for Google Ads integration
- Configuration done through WordPress dashboard, not code

**Safe SVG**
- Allows SVG uploads to media library
- Sanitizes SVGs for security
- Assume SVG images can be used freely in media library

**Mailgun**
- SMTP relay for reliable email delivery
- Handles all WordPress transactional emails
- Configuration handled in plugin settings, not code
- Active on production/live sites

**WP Mail Logging**
- Tracks all emails sent from WordPress
- Used to verify emails are being sent correctly
- Active on production sites alongside Mailgun
- Helps troubleshoot email delivery issues
- View logs in WordPress Admin → Tools → Email Log

**Redirection**
- Manages 301/302 redirects
- Use for URL changes, don't hardcode redirects in .htaccess or functions.php
- Accessible in WP admin for redirect management

**Disable Comments**
- Comments functionality disabled site-wide
- Don't build comment-related features

**Performance Lab**
- Collection of performance optimization modules
- Includes Modern Image Formats and Enhanced Responsive Images
- Handles WebP/AVIF image format conversion automatically
- Improves responsive image handling
- Don't manually implement features that Performance Lab handles

**Modern Image Formats** (part of Performance Lab)
- Automatically serves WebP/AVIF formats to supporting browsers
- Converts images on upload
- Fallback to original format for older browsers

**Enhanced Responsive Images** (part of Performance Lab)
- Improves WordPress responsive image functionality
- Better srcset generation
- Automatic image optimization

**Autoptimize**
- Minifies and concatenates CSS/JS
- Handles code optimization automatically
- Don't manually minify assets - Autoptimize handles this

### Optional/Utility Plugins

**FileBird Lite** (Optional)
- Organizes media library into folders
- Helps manage large media libraries
- May or may not be active on a given project
- Don't rely on folder structure in code - use standard WordPress media functions

### Environment-Specific Plugins

**Wordfence Security**
- **Production only** - Active on live sites
- **Not active in staging/local** - Don't rely on this in development
- Handles firewall, malware scanning, login security
- Configuration is environment-specific

**Disable Blog** (Site-Dependent)
- Only active on sites without a blog/news section
- Removes blog-related menus and pages
- Check if active before building blog functionality
- If you need to add a blog, this plugin should be deactivated

### Plugin Integration Patterns

#### ACF + Beaver Builder Modules
Custom BB modules often pull data from ACF fields:
```php
// In frontend.php template
$acf_field = get_field('field_name');
if ($acf_field) {
    echo '<div class="custom-data">' . esc_html($acf_field) . '</div>';
}
```

#### Gravity Forms Styling
Add form styles to theme's style.scss:
```scss
.gform_wrapper {
    // Custom form styles
    .gfield_label {
        font-family: $font-nexa;
    }

    .gform_button {
        // Match theme button styles
    }
}
```

#### SVG Usage
With Safe SVG active, use SVGs in BB modules via photo picker:
```php
$svg_icon = $settings->icon; // Photo field
if ($svg_icon) {
    echo '<img src="' . esc_url($svg_icon) . '" alt="Icon" class="svg-icon">';
}
```

### Plugin Assumptions

When developing:
- **Assume Beaver Builder & Beaver Themer are active** - Use BB functions and Themer templates freely
- **Parent theme is bb-theme** - This is a child theme of Beaver Builder Theme
- **Child theme naming** - Folders named `{client-name}-bb` pattern
- **Assume ACF PRO is available** - Use ACF functions without checking if plugin exists
- **Custom Post Types via ACF PRO** - CPTs and custom taxonomies created through ACF PRO UI, not code
- **Always check CPT/taxonomy existence** - Use `post_type_exists()` and `taxonomy_exists()` before querying
- **Assume Gravity Forms is available** - Can reference GF shortcodes and hooks
- **Check Spellbook first for GF solutions** - Before writing custom Gravity Forms code, check if Gravity Perks/Spellbook has a perk that solves the problem
- **Bot protection handled** - Gravity Forms Zero Spam and Turnstile handle form security
- **Don't handle email delivery** - Mailgun handles all email transport (WP Mail Logging tracks sends)
- **Don't build SEO features** - AIOSEO handles all meta/schema
- **Don't create redirect code** - Use Redirection plugin for URL management
- **Don't build security features** - Wordfence handles security on production
- **Check environment for Wordfence** - Don't expect security features in staging/local
- **Don't manually optimize assets** - Performance Lab and Autoptimize handle image formats, minification, and optimization

### Plugin Documentation References
- [ACF PRO Documentation](https://www.advancedcustomfields.com/resources/)
- [Gravity Forms Documentation](https://docs.gravityforms.com/)
- [Gravity Perks/Spellbook Documentation](https://gravitywiz.com/documentation/)
- [AIOSEO Documentation](https://aioseo.com/docs/)

## Theme Constants

The theme uses custom constants defined in [functions.php](functions.php):
- `MIDWESTDEV_THEME_DIR` - Absolute path to theme directory
- `MIDWESTDEV_THEME_URL` - URL to theme directory

**Important**: Use these constants instead of `get_stylesheet_directory()` throughout module development.

## Child Theme Setup

### style.css Header

The child theme's [style.scss](style.scss) (which compiles to style.css) must include the proper header to identify it as a child theme:

```scss
/*********************************************************************
 *
 *      Theme Name: [Client Name]
 *      Theme URI: https://www.clientwebsite.com
 *      Version: 1.0
 *      Description: Custom Beaver Builder Child Theme built for [Client Name].
 *      Author: Midwest Dev
 *      Author URI: https://www.midwestdev.io
 *      Template: bb-theme
 *
 *********************************************************************/
```

**Critical:** The `Template: bb-theme` line tells WordPress this is a child of Beaver Builder Theme.

### Theme Structure

As a BB Theme child theme:
- Parent theme styles are inherited automatically
- Override parent styles in child theme's style.scss
- Custom modules extend BB's module system
- Beaver Themer templates can be created for headers, footers, singular posts, archives, etc.

### Beaver Themer Usage

**Common Themer Templates:**
- **Header** - Site-wide header (often sticky)
- **Footer** - Site-wide footer
- **Singular** - Post/page templates with dynamic content
- **Archive** - Category, tag, CPT archive layouts
- **404 Page** - Custom 404 error page

**Themer + ACF Integration:**
Beaver Themer can display ACF fields directly:
1. Add field connection in BB module
2. Select "Advanced Custom Fields" as connection type
3. Choose the ACF field
4. Field displays dynamically based on current post/page

**Themer + Custom Post Types:**
- Create singular templates for each CPT (team member, portfolio item, etc.)
- Create archive templates for CPT archives
- Use conditional logic to show/hide sections based on CPT
- Display custom taxonomy terms automatically

## Development Environment

### Local by Flywheel

Projects are typically developed using **Local by Flywheel** (local WordPress environment).

**Environment Details:**
- Local site path structure: `d:\Local Sites\[site-name]\app\public\`
- Theme path: `app\public\wp-content\themes\[theme-name]\`
- Database accessible via Local's Adminer tool
- PHP/MySQL versions configured per site in Local

**Common Local Workflow:**
1. Start site in Local
2. Open theme folder in VS Code
3. Enable Live Sass Compiler watch mode
4. Make changes and test in browser
5. Changes compile automatically on save

**Local-Specific Notes:**
- Use Local's "Open Site Shell" for WP-CLI commands
- SSL certificates auto-generated by Local (https://sitename.local)
- Email testing: Use Mailgun for email delivery even in local environment
- Database exports available through Local's Database tab

## SCSS Architecture

### Compilation Workflow

**Live Sass Compiler (VS Code Extension)** is used for SCSS compilation.

**VS Code Settings (`.vscode/settings.json`):**
```json
{
  "liveSassCompile.settings.formats": [
    {
      "format": "expanded",
      "extensionName": ".css",
      "savePath": null
    },
    {
      "format": "compressed",
      "extensionName": ".min.css",
      "savePath": null
    }
  ],
  "liveSassCompile.settings.generateMap": true,
  "liveSassCompile.settings.autoprefix": [
    "> 1%",
    "last 2 versions"
  ]
}
```

**To Start Compilation:**
1. Open theme folder in VS Code
2. Click "Watch Sass" in status bar (bottom right)
3. Save any `.scss` file to trigger compilation
4. All `.scss` files compile automatically on save

**Important:**
- Never edit `.css` files directly - always edit `.scss` source files
- Both `style.scss` and module `frontend.scss` files compile on save
- Compiled files are auto-generated - don't manually edit them

### Compilation Output
Every `.scss` file compiles to 4 files:
- `filename.css` - Compiled CSS with formatting
- `filename.css.map` - Source map for development
- `filename.min.css` - Minified production CSS
- `filename.min.css.map` - Minified source map

### Main Stylesheet
[style.scss](style.scss) imports partials in this order:
```scss
@import 'assets/scss/functions';
@import 'assets/scss/variables';
@import 'assets/scss/reset';
```

### SCSS Functions & Mixins

Custom functions and mixins available (or recommended to add) in `_functions.scss`:

#### Core Functions (Already Included)
- `rem($px)` - Converts pixels to rem units
- `fluid-type($min, $max)` - Creates responsive fluid typography using clamp()

#### Additional Powerful Functions & Mixins to Add

**Unit Conversion:**
```scss
// Convert px to em units
@function em($px, $base: 16) {
  @return ($px / $base) * 1em;
}

// Strip units from a value
@function strip-unit($value) {
  @return $value / ($value * 0 + 1);
}
```

**Media Queries:**
```scss
// Responsive breakpoint mixin
@mixin breakpoint($size) {
  @if $size == mobile {
    @media (max-width: 767px) { @content; }
  } @else if $size == tablet {
    @media (min-width: 768px) and (max-width: 1024px) { @content; }
  } @else if $size == desktop {
    @media (min-width: 1025px) { @content; }
  } @else if $size == wide {
    @media (min-width: 1200px) { @content; }
  } @else {
    @media (min-width: $size) { @content; }
  }
}

// Usage: @include breakpoint(tablet) { /* styles */ }
```

**Layout Helpers:**
```scss
// Maintain aspect ratio
@mixin aspect-ratio($width, $height) {
  position: relative;
  &:before {
    display: block;
    content: "";
    width: 100%;
    padding-top: ($height / $width) * 100%;
  }
  > * {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
  }
}

// Center element with absolute positioning
@mixin center($horizontal: true, $vertical: true) {
  position: absolute;
  @if ($horizontal and $vertical) {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  } @else if ($horizontal) {
    left: 50%;
    transform: translateX(-50%);
  } @else if ($vertical) {
    top: 50%;
    transform: translateY(-50%);
  }
}

// Clearfix for floats
@mixin clearfix {
  &::after {
    content: "";
    display: table;
    clear: both;
  }
}
```

**Typography:**
```scss
// Truncate text with ellipsis
@mixin truncate {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

// Multiline truncate
@mixin line-clamp($lines) {
  display: -webkit-box;
  -webkit-line-clamp: $lines;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

// Hide text (for image replacement)
@mixin hide-text {
  text-indent: 100%;
  white-space: nowrap;
  overflow: hidden;
}

// Font smoothing
@mixin font-smoothing {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
```

**Interactive Elements:**
```scss
// Apply styles to hover and focus
@mixin hover-focus {
  &:hover,
  &:focus {
    @content;
  }
}

// Style input placeholders
@mixin placeholder {
  &::-webkit-input-placeholder { @content; }
  &:-moz-placeholder { @content; }
  &::-moz-placeholder { @content; }
  &:-ms-input-placeholder { @content; }
}

// Style text selection
@mixin selection {
  ::selection {
    @content;
  }
  ::-moz-selection {
    @content;
  }
}
```

**Z-Index Management:**
```scss
// Z-index function for layer management
$z-layers: (
  'modal': 1000,
  'dropdown': 900,
  'header': 800,
  'overlay': 700,
  'default': 1,
  'below': -1
);

@function z($layer) {
  @return map-get($z-layers, $layer);
}

// Usage: z-index: z('header');
```

**Recommended _functions.scss Structure:**
```scss
// Unit Conversion
@function rem($px) { /* existing function */ }
@function em($px, $base: 16) { /* add this */ }
@function strip-unit($value) { /* add this */ }

// Fluid Typography
@function fluid-type($min, $max) { /* existing function */ }

// Z-Index Management
$z-layers: ( /* add this */ );
@function z($layer) { /* add this */ }

// Mixins - Media Queries
@mixin breakpoint($size) { /* add this */ }

// Mixins - Layout
@mixin aspect-ratio($width, $height) { /* add this */ }
@mixin center($horizontal: true, $vertical: true) { /* add this */ }
@mixin clearfix { /* add this */ }

// Mixins - Typography
@mixin truncate { /* add this */ }
@mixin line-clamp($lines) { /* add this */ }
@mixin hide-text { /* add this */ }
@mixin font-smoothing { /* add this */ }

// Mixins - Interactive
@mixin hover-focus { /* add this */ }
@mixin placeholder { /* add this */ }
@mixin selection { /* add this */ }
```

### SCSS Variables
Common variables in `_variables.scss`:
- Color variables (e.g., `$midwestdev-md-blue`, `$midwestdev-black`)
- Font family variables (e.g., `$font-nexa`, `$font-basic-sans`)
- Transition variables (e.g., `$transition-fast`)

**Always check [assets/scss/_variables.scss](assets/scss/_variables.scss) before hardcoding values.**

## Custom Beaver Builder Modules

### Module File Structure
Each custom module follows this pattern:

**[module-name]/[module-name].php** - Main module class:
```php
class ModuleNameModule extends FLBuilderModule {
    public function __construct() {
        parent::__construct(array(
            'name'            => __( 'Module Name', 'midwestdev' ),
            'description'     => __( 'Description', 'midwestdev' ),
            'category'        => __( 'Advanced Modules', 'midwestdev' ),
            'dir'             => MIDWESTDEV_THEME_DIR . '/modules/[module-name]/',
            'url'             => MIDWESTDEV_THEME_URL . '/modules/[module-name]/',
            'icon'            => 'icon-name.svg',
            'editor_export'   => true,
            'enabled'         => true,
        ));
    }

    public function enqueue_scripts() {
        // Enqueue module CSS
        $this->add_css('module-name',
            $this->url . 'css/frontend.css',
            array(),
            filemtime($this->dir . 'css/frontend.css')
        );

        // Enqueue module JS
        $this->add_js('module-name',
            $this->url . 'js/frontend.js',
            array('jquery'),
            filemtime($this->dir . 'js/frontend.js'),
            true
        );
    }
}

// Register the module
FLBuilder::register_module('ModuleNameModule', array(
    // Module settings tabs and fields
));
```

### Module Registration in functions.php
Add new modules to the `$modules` array in [functions.php:61-65](functions.php#L61-L65):
```php
$modules = array(
    'slick-carousel',
    'slick-timeline',
    'slick-testimonials',
    'your-new-module', // Add here
);
```

### Module Settings Pattern
Module settings use tabs → sections → fields structure:
```php
FLBuilder::register_module('ModuleName', array(
    'tab_name' => array(
        'title'    => __('Tab Title', 'midwestdev'),
        'sections' => array(
            'section_name' => array(
                'title'  => __('Section Title', 'midwestdev'),
                'fields' => array(
                    'field_name' => array(
                        'type'    => 'text', // text, textarea, select, photo, etc.
                        'label'   => __('Field Label', 'midwestdev'),
                        'default' => 'default value',
                    ),
                ),
            ),
        ),
    ),
));
```

### Repeatable Fields (Form Field Type)
For repeatable content (like testimonials, slides):
```php
'field_name' => array(
    'type'         => 'form',
    'label'        => __('Item', 'midwestdev'),
    'form'         => 'item_form_name', // Reference to settings form below
    'preview_text' => 'title_field', // Field to show in preview
    'multiple'     => true,
),
```

Then register the sub-form:
```php
FLBuilder::register_settings_form('item_form_name', array(
    'title' => __('Item', 'midwestdev'),
    'tabs'  => array(
        // Tab structure same as above
    ),
));
```

### Frontend Template
**[module-name]/includes/frontend.php** - HTML template with access to `$module` and `$settings`:
```php
<?php
$carousel_id = 'carousel-' . $module->node;
$items = isset($settings->items) ? $settings->items : array();
?>

<div class="module-wrapper" id="<?php echo $carousel_id; ?>">
    <?php foreach ($items as $item) : ?>
        <div class="item">
            <?php echo $item->field_name; ?>
        </div>
    <?php endforeach; ?>
</div>
```

### Module Styles
**[module-name]/css/frontend.scss** - Module-specific styles:
- Import global partials if needed: `@import '../../../assets/scss/variables';`
- Use BEM-style naming for module classes
- Leverage global SCSS functions: `rem()`, `fluid-type()`

### Module JavaScript
**[module-name]/js/frontend.js** - Module JS initialization:
```javascript
(function($) {
    $('.module-class').each(function() {
        var $module = $(this);
        // Initialize plugin/functionality
    });
})(jQuery);
```

## Common Field Types

| Type | Description | Common Options |
|------|-------------|----------------|
| `text` | Single-line text input | `default`, `placeholder` |
| `textarea` | Multi-line text input | `rows`, `default` |
| `select` | Dropdown selection | `options`, `default` |
| `unit` | Number with units | `default`, `units`, `slider` |
| `photo` | Image picker | `show_remove` |
| `color` | Color picker | `default`, `show_reset` |
| `form` | Repeatable sub-form | `form`, `multiple`, `preview_text` |

## Text Domain

**Text domain is constant across all projects:** `'midwestdev'`

Always use `'midwestdev'` as the text domain for WordPress internationalization (i18n) functions:

```php
__( 'Text to translate', 'midwestdev' )
_e( 'Text to echo', 'midwestdev' )
_n( 'Singular', 'Plural', $count, 'midwestdev' )
```

**Why constant?**
- Simplifies translation workflows across all your projects
- Text domain doesn't need to be client-specific (it's internal)
- Easier to maintain one translation pipeline
- Your developer brand as the identifier

**In BB modules:**
```php
'name' => __( 'Module Name', 'midwestdev' ),
'description' => __( 'Module description', 'midwestdev' ),
```

## Enqueuing External Assets

### Naming Convention for Handles

**Local theme files** (style.css, custom JS):
- Use `{client-name}-style` for child theme style.css (e.g., `midwestdev-style`)
- Use `{client-name}-js` for custom theme JS (e.g., `midwestdev-js`)
- Always use `filemtime()` for cache busting on local files

**External resources** (Adobe Fonts, CDN libraries):
- Use descriptive handle names (e.g., `adobe-fonts`, `slick-carousel`)
- Can use `null` for version parameter on external CDN resources

### In functions.php

**Enqueuing Child Theme Style (example):**
```php
function midwestdev_enqueue_scripts() {
    // Child theme style.css - use client-prefixed handle
    wp_enqueue_style(
        'midwestdev-style',
        get_stylesheet_uri(),
        array( 'fl-automator-skin' ),
        filemtime( get_stylesheet_directory() . '/style.css' )
    );

    // Custom theme JS - use client-prefixed handle
    wp_enqueue_script(
        'midwestdev-js',
        get_stylesheet_directory_uri() . '/assets/js/midwestdev.js',
        array( 'jquery' ),
        filemtime( get_stylesheet_directory() . '/assets/js/midwestdev.js' ),
        true
    );

    // External fonts - can use null for version
    wp_enqueue_style(
        'adobe-fonts',
        'https://use.typekit.net/usn5qee.css',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'midwestdev_enqueue_scripts');
```

### In Modules (via enqueue_scripts method)

**Module CSS/JS always uses filemtime():**
```php
public function enqueue_scripts() {
    // Module CSS
    $this->add_css(
        'module-name-css',
        $this->url . 'css/frontend.css',
        array(),
        filemtime( $this->dir . 'css/frontend.css' )
    );

    // Module JS
    $this->add_js(
        'module-name-js',
        $this->url . 'js/frontend.js',
        array( 'jquery' ),
        filemtime( $this->dir . 'js/frontend.js' ),
        true
    );

    // External CDN library (can use version string or null)
    $this->add_js(
        'slick-carousel',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js',
        array( 'jquery' ),
        '1.8.1',
        true
    );
}
```

**Cache Busting Best Practices:**
- **Local files**: Always use `filemtime()` - auto-updates when file changes
- **External CDN files**: Use version string (e.g., `'1.8.1'`) or `null`
- **Never use** `wp_get_theme()->get('Version')` for local file cache busting

## Common Customizations

### Adding a New BB Module
1. Create folder: `modules/new-module/`
2. Create file: `modules/new-module/new-module.php` (extend `FLBuilderModule`)
3. Create template: `modules/new-module/includes/frontend.php`
4. Create styles: `modules/new-module/css/frontend.scss`
5. Create JS (if needed): `modules/new-module/js/frontend.js`
6. Register in [functions.php:61-65](functions.php#L61-L65) `$modules` array
7. Compile SCSS to CSS

### Adding Custom Fonts
See [functions.php:38-54](functions.php#L38-L54) for the pattern:
1. Enqueue font stylesheet via `wp_enqueue_scripts`
2. Register fonts with BB via `fl_builder_font_families_system` filter

### Modifying Global Styles
Edit [style.scss](style.scss) and compile. Common sections:
- Header styles (lines 17-58)
- Navigation/menus (lines 60-109)
- Typography (lines 111-157)
- Button styles (lines 159-200)

### Working with Custom Post Types & Taxonomies

Custom post types and custom taxonomies are frequently used for portfolios, team members, case studies, testimonials, etc.

**Registration Method:**
CPTs and custom taxonomies are created through **ACF PRO's Post Types & Taxonomies UI**, NOT through code in functions.php.

**To Create CPTs/Taxonomies:**
1. Go to WordPress Admin → ACF → Post Types (or Taxonomies)
2. Click "Add New"
3. Configure post type settings (labels, slug, supports, etc.)
4. Publish

**Common Custom Post Types:**
- `team_member` - Team/staff profiles
- `portfolio` - Portfolio/project items
- `case_study` - Case studies
- `testimonial` - Client testimonials (alternative to BB module)

**Common Custom Taxonomies:**
- `portfolio_category` - Categories for portfolio items
- `project_type` - Types of projects/case studies

**ACF Field Integration:**
1. Create ACF field group for the custom post type
2. Set location rules: "Post Type is equal to [your_cpt]"
3. Add fields (position, bio, social links, etc.)
4. Access in templates: `get_field('field_name', $post_id)`

**Displaying CPTs with Fallback Checks:**

Since CPTs are registered via ACF PRO (not code), always check if the post type exists before querying:

```php
// Check if post type exists before querying
if (post_type_exists('team_member')) {
    $args = array(
        'post_type'      => 'team_member',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );
    $team_query = new WP_Query($args);

    if ($team_query->have_posts()) :
        while ($team_query->have_posts()) : $team_query->the_post();
            // Display team member
            $position = get_field('position');
            ?>
            <div class="team-member">
                <h3><?php the_title(); ?></h3>
                <p class="position"><?php echo esc_html($position); ?></p>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;
} else {
    // Fallback if CPT doesn't exist
    echo '<p>Team members are not available.</p>';
}
```

**Querying with Custom Taxonomies:**

```php
if (post_type_exists('portfolio') && taxonomy_exists('portfolio_category')) {
    $args = array(
        'post_type' => 'portfolio',
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio_category',
                'field'    => 'slug',
                'terms'    => 'web-design',
            ),
        ),
    );
    $portfolio_query = new WP_Query($args);

    if ($portfolio_query->have_posts()) :
        // Display portfolio items
    endif;
    wp_reset_postdata();
}
```

**Important Notes:**
- **Always use `post_type_exists()` before querying CPTs** - ACF PRO could be deactivated or CPT not yet registered
- **Always use `taxonomy_exists()` before querying custom taxonomies**
- CPTs/taxonomies persist in database even if ACF is deactivated, but registration won't load
- Export CPT/taxonomy definitions from ACF PRO for version control/backup

### Image Optimization & Handling

**Image Size Registration:**
Register custom image sizes in functions.php for consistent cropping:
```php
function register_custom_image_sizes() {
    // Hero images - 16:9 ratio
    add_image_size('hero-large', 1920, 1080, true);

    // Card/thumbnail images - 4:3 ratio
    add_image_size('card-thumb', 800, 600, true);

    // Team member headshots - 1:1 ratio (square)
    add_image_size('team-headshot', 600, 600, true);

    // Portrait images - 4:5 ratio
    add_image_size('portrait', 800, 1000, true);
}
add_action('after_setup_theme', 'register_custom_image_sizes');
```

**Using Custom Image Sizes:**
```php
// In templates
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_url($image_id, 'hero-large');
$image_tag = wp_get_attachment_image($image_id, 'card-thumb', false, array('class' => 'custom-class'));

// ACF image field
$image = get_field('image_field');
if ($image) {
    echo wp_get_attachment_image($image['ID'], 'team-headshot');
}
```

**Responsive Images:**
WordPress automatically generates srcset for responsive images. Use `wp_get_attachment_image()` to get automatic srcset/sizes:
```php
// This automatically includes srcset and sizes attributes
echo wp_get_attachment_image($image_id, 'large', false, array(
    'class' => 'responsive-img',
    'loading' => 'lazy', // Native lazy loading
));
```

**Image Optimization Workflow:**
1. **Before Upload**: Resize images to reasonable dimensions (max 2000px wide for hero images)
2. **File Format**:
   - Upload JPG for photos - Performance Lab automatically converts to WebP/AVIF
   - Use PNG for graphics with transparency
   - Use SVG for icons/logos (Safe SVG plugin handles sanitization)
   - **Don't manually create WebP/AVIF versions** - Performance Lab handles this automatically
3. **Compression**: Compress images before upload (TinyPNG, ImageOptim, etc.)
4. **Lazy Loading**: Use native `loading="lazy"` attribute for images below the fold
5. **Background Images**: For CSS background images in modules, consider adding custom image size selection in module settings
6. **Responsive Images**: Enhanced Responsive Images (via Performance Lab) improves srcset generation automatically

**Module Image Settings Pattern:**
```php
'image' => array(
    'type'        => 'photo',
    'label'       => __('Image', 'midwestdev'),
    'show_remove' => true,
),
'image_size' => array(
    'type'    => 'select',
    'label'   => __('Image Size', 'midwestdev'),
    'default' => 'large',
    'options' => array(
        'thumbnail'    => __('Thumbnail', 'midwestdev'),
        'medium'       => __('Medium', 'midwestdev'),
        'large'        => __('Large', 'midwestdev'),
        'full'         => __('Full Size', 'midwestdev'),
        'hero-large'   => __('Hero (1920x1080)', 'midwestdev'),
    ),
),
```

## Development Workflow

1. **Before making changes**: Check if SCSS compilation is set up
2. **When editing styles**: Edit `.scss` files, never `.css` files directly
3. **After SCSS changes**: Compile to generate `.css` and `.min.css` files
4. **New modules**: Follow the complete module structure above
5. **Testing**: Test in both BB editor and frontend
6. **Cache**: Clear browser and BB cache when testing changes

## Git & Version Control

### .gitignore Recommendations

Your WordPress child theme `.gitignore` should exclude:

**Compiled Files:**
```
# Compiled CSS from SCSS
*.css
*.css.map
*.min.css
*.min.css.map

# Exception: Keep style.css (required by WordPress)
!style.css
```

**Editor & System Files:**
```
# VS Code
.vscode/
*.code-workspace

# OS Files
.DS_Store
Thumbs.db
desktop.ini

# Logs
*.log
npm-debug.log*
error_log
```

**Local Environment:**
```
# Local by Flywheel
.local-sync.json

# Node (if using)
node_modules/

# Composer (if using)
/vendor/
```

**WordPress Core (if tracking full site):**
```
# If you're tracking the full site, exclude WP core
/wp-admin/
/wp-includes/
wp-*.php
xmlrpc.php
license.txt
readme.html
```

**Typical Child Theme .gitignore:**
```gitignore
# Compiled SCSS outputs (keep style.css)
*.css.map
*.min.css
*.min.css.map
modules/**/css/*.css
modules/**/css/*.css.map

# Editor files
.vscode/
.DS_Store
Thumbs.db

# Logs
*.log
```

**Best Practices:**
- Commit source `.scss` files, not compiled `.css` (except style.css)
- Exclude editor/IDE config files unless team needs them
- Don't commit environment-specific configuration
- Include a `.gitignore` at the theme root level

## Deployment & Migration

### Local → Staging → Production Workflow

**Database Migration:**
1. Export database from source environment (Local's Adminer or WP-CLI)
2. Search & replace URLs using dedicated migration plugin or WP-CLI
   - Use: WP Migrate DB Pro, Better Search Replace, or `wp search-replace` command
3. Import to destination environment
4. Clear all caches (WordPress, BB, browser)

**File Sync:**
- Sync theme files: Use FTP/SFTP or Git deployment
- Sync uploads directory: Use rsync or manual FTP for `/wp-content/uploads/`
- Don't overwrite `wp-config.php` or `.htaccess` on destination

**Post-Migration Checklist:**
- [ ] Flush permalinks (Settings → Permalinks → Save)
- [ ] Clear Beaver Builder cache (Tools → Clear Cache)
- [ ] Clear Autoptimize cache (if active)
- [ ] Test forms (Gravity Forms submissions)
- [ ] Test email delivery (WP Mail Logging)
- [ ] Verify Google Site Kit connection
- [ ] Check custom post type archives
- [ ] Test responsive layouts on mobile

**Common Tools:**
- **WP-CLI**: `wp db export`, `wp search-replace`, `wp cache flush`
- **WP Migrate DB Pro**: Handles search/replace + push/pull between environments
- **Better Search Replace**: Manual search/replace for URLs in database

**Environment Variables:**
- Database credentials differ per environment (in `wp-config.php`)
- Mailgun API keys may differ staging vs production
- Google Site Kit needs re-authentication per environment

## Browser Support & Testing

### Supported Browsers

**Primary Support (Modern Versions):**
- **Google Chrome** - Latest 2 versions
- **Mozilla Firefox** - Latest 2 versions
- **Microsoft Edge** (Chromium) - Latest 2 versions

**Mobile Support:**
- **Safari on iPhone** - Latest iOS version
  - **Primary mobile focus**: iPhone Safari is the priority for mobile testing
  - **Safari-specific CSS issues**: Be vigilant for Safari compatibility issues, especially:
    - Flexbox rendering differences
    - Position fixed/sticky behavior
    - CSS Grid implementation quirks
    - Viewport units (vh/vw) calculations
    - Transform and transition issues
    - Input focus styling

**Testing Priority:**
1. Chrome/Firefox/Edge typically have excellent CSS standards support
2. **Safari requires extra attention** - test Safari/iPhone early and often
3. Desktop Safari is less critical than iPhone Safari

### Common Safari Issues to Watch For

- **Sticky positioning**: Safari has known bugs with `position: sticky` in flex/grid containers
- **100vh on mobile**: Safari's mobile address bar affects viewport height - use `min-height: 100vh` carefully or use `-webkit-fill-available`
- **Backdrop-filter**: Requires `-webkit-` prefix
- **Flexbox gaps**: Older Safari versions don't support `gap` property in flexbox (grid only)
- **Date inputs**: Safari date picker styling is very different from Chrome
- **Input zoom on focus**: Safari zooms in on inputs with font-size < 16px - set `font-size: 16px` on form fields

### Browser Testing Workflow

1. **Primary development**: Chrome/Firefox (fastest dev tools)
2. **Early Safari testing**: Test in Safari before finalizing any layout/animation
3. **Mobile testing**: Use real iPhone device or BrowserStack/Sauce Labs
4. **Responsive testing**: Chrome DevTools device emulation, then real devices
5. **Cross-browser check**: Final QA pass in all supported browsers before launch

### CSS Best Practices for Compatibility

- Use autoprefixer (configured in Live Sass Compiler settings)
- Test flexbox/grid layouts in Safari early
- Avoid cutting-edge CSS features without fallbacks
- Provide vendor prefixes for animations, transforms, transitions
- Test form inputs and buttons across browsers

## Common Troubleshooting

Reference these common issues when debugging:

### SCSS Compilation Issues

**Problem**: Changes to SCSS not appearing on site
- [ ] Check if Live Sass Compiler is running (Watch Sass in status bar)
- [ ] Verify compilation succeeded (check for errors in VS Code output)
- [ ] Look for syntax errors in SCSS files
- [ ] Check `@import` paths are correct in style.scss
- [ ] Ensure parent folder path is correct for Live Sass Compiler

**Problem**: Compiled CSS missing or outdated
- [ ] Save the `.scss` file to trigger compilation
- [ ] Check `.css` file timestamp vs `.scss` file timestamp
- [ ] Look in VS Code "Output" panel for compilation errors

### Beaver Builder Issues

**Problem**: Module not appearing in BB editor
- [ ] Verify module is registered in functions.php `$modules` array
- [ ] Check module file path matches folder structure exactly
- [ ] Ensure module PHP file has no syntax errors
- [ ] Clear Beaver Builder cache (Tools → Clear Cache in WordPress admin)
- [ ] Check that `FLBuilder::register_module()` is called correctly

**Problem**: Module changes not showing
- [ ] Clear BB cache (Settings → Beaver Builder → Tools → Clear Cache)
- [ ] Clear browser cache (hard refresh: Ctrl+Shift+R / Cmd+Shift+R)
- [ ] Re-save the page in BB editor
- [ ] Check if module SCSS compiled to CSS
- [ ] Verify `filemtime()` cache busting in enqueue_scripts()

**Problem**: Module settings not saving
- [ ] Check field names match between registration and frontend.php
- [ ] Verify field types are valid BB field types
- [ ] Look for JavaScript console errors in browser
- [ ] Check module settings array structure (tabs → sections → fields)

### Custom Post Type Issues

**Problem**: CPT not appearing in queries
- [ ] Verify CPT exists: Use `post_type_exists('cpt_name')` check
- [ ] Check ACF PRO is active (CPTs registered via ACF UI)
- [ ] Flush permalinks (Settings → Permalinks → Save)
- [ ] Verify CPT slug matches in query args
- [ ] Check `WP_Query` args are correct

**Problem**: ACF fields returning null/empty
- [ ] Verify field group is assigned to correct post type
- [ ] Check field name (use field key if field name fails: `get_field('field_123456')`)
- [ ] Ensure you're inside The Loop or passing post ID
- [ ] Verify ACF PRO is active and up to date
- [ ] Check field type matches usage (repeater needs `have_rows()`)

### Performance/Caching Issues

**Problem**: Changes not appearing on frontend
- [ ] Clear Beaver Builder cache
- [ ] Clear Autoptimize cache (if active)
- [ ] Clear browser cache / hard refresh
- [ ] Clear server-side cache (if hosting has caching layer)
- [ ] Disable Wordfence caching temporarily (production only)

### Form Issues (Gravity Forms)

**Problem**: Forms not submitting or receiving spam
- [ ] Verify Gravity Forms Zero Spam is active
- [ ] Check Turnstile is configured (if required for bot protection)
- [ ] Test with Gravity Forms logging enabled
- [ ] Check WP Mail Logging for email delivery (production)
- [ ] Verify Mailgun is connected (production)

**Problem**: Need custom form functionality
- [ ] **Check Gravity Perks (Spellbook) FIRST** before writing custom code
- [ ] Look for existing Spellbook perk that solves the problem
- [ ] Check Gravity Forms documentation for hooks/filters
- [ ] Test in staging before deploying custom form code

### Font/Typography Issues

**Problem**: Custom fonts not loading
- [ ] Verify font enqueue function is hooked to `wp_enqueue_scripts`
- [ ] Check Adobe Fonts/Google Fonts URL is correct
- [ ] Verify fonts registered with Beaver Builder filter
- [ ] Check browser network tab for font loading errors
- [ ] Verify font file paths for custom fonts

### Module JavaScript Issues

**Problem**: Module JS functionality not working
- [ ] Check browser console for JavaScript errors
- [ ] Verify jQuery is loaded before module script
- [ ] Check module JS enqueued with correct dependencies
- [ ] Ensure module initialization waits for DOM ready
- [ ] Test if external library (Slick, etc.) loaded successfully

### Quick Debugging Checklist

When something isn't working:
1. **Check browser console** for JavaScript errors
2. **Check PHP error logs** for server-side errors
3. **Clear all caches** (BB, Autoptimize, browser)
4. **Hard refresh browser** (Ctrl+Shift+R / Cmd+Shift+R)
5. **Verify file paths** in enqueues and includes
6. **Check conditionals** (post_type_exists, taxonomy_exists, etc.)
7. **Test with default theme** to isolate issue
8. **Disable plugins** to check for conflicts (staging only)

## Module Examples
Reference these existing modules for patterns:
- [modules/slick-testimonials/slick-testimonials.php](modules/slick-testimonials/slick-testimonials.php) - Form field type, repeatable content
- [modules/slick-carousel/](modules/slick-carousel/) - Carousel implementation
- [modules/slick-timeline/](modules/slick-timeline/) - Timeline layout

## Important Notes

- **Never edit compiled CSS files** - Always edit `.scss` sources
- **Use theme constants** - Client-specific constants like `MIDWESTDEV_THEME_DIR` and `MIDWESTDEV_THEME_URL` instead of WP functions
- **Check variables** - Before hardcoding colors/fonts, check `_variables.scss`
- **Follow BB patterns** - Study existing modules before creating new ones
- **Text domain** - Always use `'midwestdev'` for translations (constant across all projects)
- **Module icons** - Reference valid Dashicons or use custom SVG
- **Cache busting** - Use `filemtime()` for version numbers in `enqueue_scripts()`
- **Responsive settings** - Many modules have mobile/tablet/desktop breakpoint settings

## Additional Resources
- [Beaver Builder Developer Docs](https://docs.wpbeaverbuilder.com/)
- [BB Custom Module Guide](https://docs.wpbeaverbuilder.com/beaver-builder/developer/custom-modules/)
- [BB Settings Fields Reference](https://docs.wpbeaverbuilder.com/beaver-builder/developer/custom-modules/custom-module-settings-fields/)
