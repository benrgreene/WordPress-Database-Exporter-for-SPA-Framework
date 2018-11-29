# WordPress Database Export Tool for SPA Framework

This is a plugin with the entire purpose of creating a file that can be imported into the [SPA Framework I built](https://github.com/benrgreene/Single-Page-Framework).

The page the file can be downloaded from the WP admin panel is accessible from the menu via the 'SPA Exporter' tab, and the file is a JSON file. 

By default, the plugin only exports the posts and pages of the site. Extra post types can be added through the filter `brg/spa/post_types` - it's just an array of post types.