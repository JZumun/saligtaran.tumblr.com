<?php get_header(); ?>

<main>
  <section id="content" class="site-content <?php echo ( !is_singular() ? 'index-content' : '' ) ?>">

    <?php if(is_search()) :?> <h2> Results for "<?php the_search_query() ?>" </h2> <?php endif; ?>
    <?php if(is_tag()) : ?> <h2> Posts tagged "<?php single_tag_title() ?>" </h2> <?php endif; ?>
    <?php if(is_category()) : ?> <h2> Posts in "<?php single_cat_title() ?>" </h2> <?php endif; ?>

    <?php 
    if ( have_posts() ) { 
      while ( have_posts() ) : the_post();
    ?>
    <article class="post <?php
      $posttags = get_the_tags();
      $postcategories = get_the_category();
      if ($posttags) {
        foreach(array_merge($posttags, $postcategories) as $tag) {
          echo strtolower($tag->name) . ' '; 
        }
      }?>" id="post-<?php the_ID()?>">
      
      <section class="post-head">
      <?php if (has_post_thumbnail()) : ?>
        <label for="c-<?php the_ID()?>" class="ambigram-animator-label">Animate</label>
        <input type="checkbox" class="ambigram-animator" id="c-<?php the_ID()?>"/>
        <a class="photo-box ambigram-holder"  <?php  if (!is_singular()) : ?>href="<?php the_permalink() ?>"<?php endif; ?> >
          <?php the_post_thumbnail(); ?>
        </a>
      <?php endif; ?>
      </section>
      <?php if (is_singular() || !has_post_thumbnail()) : ?>
      <section class="post-body">
        <a class="title" href="<?php the_permalink() ?>">
          <h1><?php the_title(); ?></h1>
        </a>
        <?php the_content(); ?>
      </section>
      <?php endif; ?>
      <?php if (is_singular()) : ?>
      <footer class="post-footing footing">
        <section class="post-details">
          <div class="post-details-permalink post-detail">
            <?php the_date(); ?> by <?php the_author(); ?>
          </div>
          <?php if ($posttags) { ?>
          <ul class="post-details-tags">
            <?php foreach($posttags as $tag) { ?>  
              <li class="tag-container"><a href="<?php echo get_tag_link($tag) ?>" class="tum-tag"><?php echo $tag->name ?></a></li>
            <?php } ?>
					</ul>
          <?php } ?>
          
        </section>
      </footer>
      <div class="post-comments">
        <?php comments_template(); ?>
      </div>
      <?php endif;?>
    </article>
    <?php
      endwhile;
    } else {
    ?>
    <article class="post">
      <section class="post-body">
        <h2>Content not found</h2>
        <p>The URL you requested could not be found.</p>
        <p>Go back to the <a href="/">Home Page</a>, or try to find what you're looking for:</p>
        <?php get_search_form(); ?>
      </section>
    </article>
    <?php 
    }
    ?>

    <nav id="pagination" class="pagination">
      <?php the_posts_pagination( array('mid_size' => 2) ); ?> 
    </nav>
  </section>

  
</main>

<?php get_footer(); ?>