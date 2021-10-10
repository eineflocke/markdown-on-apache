# markdown-on-apache

parses and shows markdown directly on Apache, powered by marked.js
desirable if some framework css (e.g.: bootstrap) would be applied

## Procedure

1. put `md/markdown-renderer.php` below DocumentRoot
1. put `conf-available/markdown.conf` on your Apache conf-available directory
1. `a2enconf markdown` and `systemctl restart apache2`
1. access to your `*.md` files via browsers
