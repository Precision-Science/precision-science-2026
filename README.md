# Precision Science Website

## Table of Contents
- [Overview](#overview)
- [Theme Status](#theme-status)
- [Contributors](#contributors)
- [Theme features](#theme-features)
- [Technical details](#technical-details)
- [Wordpress plugin dependencies](#wordpress-plugin-dependencies)
- [Development dependencies](#development-dependencies)
- [Development process](#development-process)
- [Hosting](#hosting)
- [Changelog](#changelog)

## Overview
Custom theme based on [Root's Sage theme](https://roots.io/sage/) for ongoing estabished community maintaince and security. Uses [WP-Papi](https://wp-papi.github.io/) for field customizations and page type management. [WP-JSON](https://developer.wordpress.org/rest-api/) for async content calls support animated page loads. The website has zero paid dependencies (themes, plugins, font libraries, or services) with exception of hosting and 3rd party marketing tools (MailChimp, SalesFoce).

Theme fully documented and code reposiotory publically hosted for easy developer hand-off to **ensure that the client "owns" the code for their website**.

## Theme Status 
**Last updated June/July 2023**
- Modify analytics with Google Tag Manager and GA4
- Currently supports for Wordpress 6.2.2 
- Introduce Tag Manager custom events into the javascript
- Upgrade build scripts with latest libraries
- Modify build to support db updates for WP 6.2.2

**Last updated February 2022**
- W3C A11y compliant (Accessility Insights FastPass)
- Currently supports for Wordpress 5.9.2 
- Zero use of depreciated PHP or Wordpress functions
- All plugins up-to-date
- Latest LightHouse report
    - Performance: 98
    - Accessibility: 92
    - Best Practices: 92
    - SEO: 89
- Originally launched April 25, 2016.

## Theme features
### Public-facing website
- Fully customized page and post templates for easy no-code editting
- Marketing landing pages with MailChimp mailing list integration
- Contact form and newsletter signup with SalesForce integration
- Blog with templated stylization for unique post layouts
- W3C accessibility compliance
    - appropriate heading hiearchy
    - screen-reader support with off-screen text and image tags
    - efficient keyboard navigation and visual focus
- Async animated page loading & lazy load
- Animated UI controls and page scrolling
- Google analytics and site integration
- Google recaptcha form security
- Embedded and background video integration

### Admin experience
Reference [admin experience](dev/screenshots/admin.md) documentation to review website customization.

## Technical details
- Object-oriented scss classes for improved consistency
- Object-oriented js with limited dependency on 3rd party libraries. Exceptions noted below as "supporting javascript"
- Web-font with locally hosted font files
- Minified css and js code and gzipping
    - 22.7KB uncompressed app javascript
    - 296.2KB upcompressed supporting javascript
        - Google analytics
        - Google recaptcha
        - jQuery
        - videoJS

## Wordpress plugin dependencies 
### Mandatory
- WP-Papi (field and page type customiztion) 
- Papi REST API (async wp_query of custom fields)

### Enchancements
- Yoast SEO (SEO metadata)
- WP Super Cache (reduces server load and page load speed)
- BackUpWordPress (automated backups)
- Disable Comments (prevent api hacking since blog )
- Imagify (automated image compression)
- Redirection (SEO redirects)
- Classic Editor (preferred client editor)

## Development dependencies
- Node + NPM
- NPM packages
- Wordpress test environment using [Local](https://localwp.com/) or alternate
- wp-config settings set to `_DEV`

## Development process
1. Clone the [repo](https://github.com/Precision-Science/website)
2. Ensure dev dependencies are met
3. Download mandatory Wordpress plugins and install
4. Set up local dev environment
5. Run `npm install` for dev package dependencies
6. Run `npm dev` for auto-refresh development of css/js
7. To build for release run ``

## Hosting

__Client hosted - private details__

## Change log

### December 2025
- Fixed contact form double-sending email issue
- Added submission guards to prevent multiple form submissions
- Improved form event handler management during AJAX page navigation

### September 2025
- SendGrid started charging for base plan (no longer free)
- Transition to Resend.com for email handling
- Contact form updated to use Resend API directly instead of Make.com webhook
- Simplified form submission process with improved error handling
- Contact form now sends emails directly through Resend.com
- Email processing is handled on Vercel using the Resend Nodejs SDK.  
    - CORS is set to only allow PS, so local dev, postman won't work

### February 2024
- Leverage Make.com webhook to handle contact form submissions into Pipedrive
- Adopt Pipedrive and deprecate Salesforce

### May/June 2023
- Remove dates from the news index and news articles
- Stylize links in the manufacturing section of the capabilities page

### June 2022
- Careers page & social sharing functionality
- Security patches
- Replace deprecated development libraries

### February 2022
- Contact and mailing list processing update to improve spam filtering
- Contact email template update
- Add additional fields for contact form

### November 2020
- Mailing list form update (reduce required fields)

### September 2020
- Marketing campaign template build and published

### March 2020
- Add SalesForce integration
- Migrate recaptcha to v3 to replace "I'm not a robot" with "Invisible recaptcha"

### June 2019
- Incorporate recaptcha to webforms to reduce spam

### December, 2018
- Remove no-breaking depreciated Wordpress functions for future-proof compatiability with Wordpress 5.0

### December, 2017
- SEO audit
- Modify image compression
- Accessibility adjustments for better keyboard navigation
- Modify heading hierarchy for improved screenreader usage

### April 25, 2016
- Site launch on Wordpress 4.5