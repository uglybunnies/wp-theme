<?php

/*
Template Name: articleInfo
 * Description: to disply the articles and site info pages
*/


get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<aside class="col narrow pad sidebar">
	<h1 class="brand entry-title"><?php the_title(); ?></h1>
	<p class="subtitle"><?php echo get_post_meta($post->ID, 'subtitle', true); ?></p>
<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-width="216" data-show-faces="true"></div><br>
<a href="https://twitter.com/share" class="twitter-share-button" data-via="serpentvenom">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script><br>
<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="small"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</div>
</aside><section class="content col wide layout pad">


					<?php get_template_part( 'content', 'info' ); ?>

					<?php comments_template( '', true ); ?>

</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>