<div class="wrap">
    <h1>SPA Export Tool</h1>
    <p>
      This is a tool meant to help create exports for the SPA Framework (see <a target="_blank" href="https://github.com/benrgreene/Single-Page-Framework">here</a>). If you are having issues with the tool, please report them <a target="_blank" href="https://github.com/benrgreene/Single-Page-Framework/issues">here</a>.
    </p>
    <p>
      This tool only downloads posts, pages, and media tied with them. It is possible to add custom post types to be downloaded using the `brg/spa/post_types` filter.
    </p>
    <form class="export-form"  method="POST" action="">
      <input name="export-spa-content" value="yes" type="hidden" />
      <?php submit_button( 'Download Export' ); ?>
    </form>
  </div>