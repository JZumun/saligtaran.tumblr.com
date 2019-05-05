    <footer id="footer" class="footing">
      <section class="footer-container">
        <section class="tags-cloud">
          <h3>Categories</h3>
          <ul>
            <?php wp_list_categories('title_li='); ?>
          </ul>
        </section>
        <section class="tags-cloud">
          <h3>Tags</h3>
          <?php wp_tag_cloud( array() ); ?>
        </section>
        <ul class="listing" id="credits">
          <li>Copyright &copy; 2016-2019.</li>
          <li>Theme by <a href="https://jzumun.ph">JZumun</a>.</li>
        </ul>
      </section>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>