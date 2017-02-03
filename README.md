# KDNPFallback
This is PHP code used in conjunction with a Apache mod_rewrite that falls back to perform a "type" of page caching.

1. The Apache mod_rewrite defaults to fallback.php when it encounters a page that cannot be found.

2. The fallback.php file checks the requested URL to see if it matches the set pattern for one in the archive.

3. The fallback.php processes a URL request for a valid HTML file by finding it in a pairtree_root directory structure, making a copy of it from pairtree_root to the cache directory where it can be publicly accessed.

4. The BASH file included can be run manually to clear the cache directory.  It can also be set up as a cron job to execute and clear the cache on a set schedule.

5. The index.php file is used to redirect the base URL to a given directory where the Omeka install lives.
