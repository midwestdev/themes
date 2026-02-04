# [Client Name] Custom Theme

**Version:** 1.0.0
**Parent Blueprint:** [midwestdev-blueprint-bb](https://github.com/midwestdev/themes/blob/main/midwestdev-blueprint-bb/claude.md)

---

## 📋 Blueprint Documentation

This theme is built from the **Midwest Dev Blueprint**. For complete development guidelines, refer to the parent blueprint documentation:

**Remote (GitHub):**
https://github.com/midwestdev/themes/blob/main/midwestdev-blueprint-bb/claude.md

**Local (if available):**
`D:\Local Sites\aa-blueprint\app\public\wp-content\themes\midwestdev-blueprint-bb\claude.md`

---

## Project Information

**Client Name:** [Client Name]
**Theme Folder:** `[client-slug]-bb`
**Function Prefix:** `[clientprefix]_`
**Text Domain:** `midwestdev` (constant across all projects)

**Live Site:** [URL]
**Staging Site:** [URL]
**Local Site:** [URL]

---

## Project-Specific Setup

### Brand Assets

**Primary Logo:**
- SVG: `assets/img/[client]-logo.svg`
- PNG Fallback: `assets/img/[client]-logo.png`

**Color Palette:**
- Configured in: **WordPress Admin → Customize → Global Settings → Colors**
- Documented in: `assets/scss/_variables.scss`
- Primary colors:
  - [Color Name]: `#HEXCODE`
  - [Color Name]: `#HEXCODE`
  - [Color Name]: `#HEXCODE`

**Typography:**
- Primary Font: [Font Family]
- Heading Font: [Font Family]
- Font Loading: [Adobe Fonts / Google Fonts / Custom]
- Font Project ID: [If applicable]

### Custom Post Types

Document any custom post types created via ACF PRO:

- **[Post Type Slug]** - [Description]
  - Supports: [Features]
  - Archive: [Yes/No]
  - Custom Fields: [List key ACF field groups]

### Custom Taxonomies

Document any custom taxonomies:

- **[Taxonomy Slug]** - [Description]
  - Assigned to: [Post Type]
  - Hierarchical: [Yes/No]

### Custom Modules

List custom Beaver Builder modules created for this project:

- **[Module Name]** - `modules/[module-slug]/`
  - Purpose: [Description]
  - Dependencies: [External libraries, if any]

### Plugins

Document any project-specific plugins not covered in the blueprint:

- **[Plugin Name]** - [Purpose/configuration notes]

### Environment-Specific Notes

**Local Development:**
- [Any local-specific setup notes]

**Staging:**
- [Any staging-specific configuration]

**Production:**
- [Any production-specific configuration]
- Wordfence: [Active/Configuration notes]
- Caching: [Configuration notes]

---

## Development Notes

### Active Features

Document features specific to this project:

- [Feature description and implementation notes]

### Known Issues / TODOs

Track project-specific issues:

- [ ] [Issue or task description]

### Custom Code Patterns

Document any custom implementations that differ from the blueprint:

**Example:**
```php
// Custom functionality for [feature]
// Location: functions.php or specific module
```

---

## Deployment Checklist

Before going live:

- [ ] Replace screenshot.png with actual site homepage
- [ ] Verify all brand assets are in place (logos, fonts, colors)
- [ ] Test all custom modules in production environment
- [ ] Verify Gravity Forms are working and protected (Zero Spam/Turnstile)
- [ ] Test email delivery (Mailgun + WP Mail Logging)
- [ ] Flush Beaver Builder cache
- [ ] Flush Autoptimize cache
- [ ] Flush permalinks
- [ ] Verify Google Site Kit connection
- [ ] Test responsive layouts on real devices (especially iPhone Safari)
- [ ] Verify all custom post types and archives are displaying
- [ ] Check 404 page
- [ ] SSL certificate active and valid
- [ ] Wordfence configured (production only)

---

## Support & Resources

**Blueprint Documentation:** See parent blueprint link at top of file
**Beaver Builder Docs:** https://docs.wpbeaverbuilder.com/
**ACF PRO Docs:** https://www.advancedcustomfields.com/resources/
**Gravity Forms Docs:** https://docs.gravityforms.com/

---

## Project History

### Version 1.0.0 - [Date]
- Initial theme setup from blueprint
- [Other initial setup notes]

### [Future versions]
- Document significant changes, new features, or major updates
