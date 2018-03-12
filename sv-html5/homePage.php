<?php
/*
Template Name: homePage
*/


get_header(); ?>
    <section class="content col wide layout">
        <section class="col wide blog pad">
           <h2 class="brand">SerpentVenom Snake Bytes</h2> 
           <ul>
	   		<?php $my_query = new WP_Query('showposts=2'); while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate[] = $post->ID; ?>
	   					<li class="post" id="post-<?php the_ID(); ?>">
	   						<h3 class="brand"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

	   						<div class="entry">
	   						<?php global $more; $more = 0; ?>
	   							<?php the_content('more &#187;'); ?>
	   						</div>
	   						<p class="dateline"><?php the_time('F jS, Y') ?> by <?php the_author() ?></p>

	   						<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?><?php edit_post_link('Edit', ' | ', ''); ?></p>
	   					</li>

	   		<?php endwhile; ?>
	   				</ul>
        </section><aside class="col narrow bArchive pad">
            <section class="links room">
                <ul>
					<li class="links">
						<h2 class="brand">More Snake Bytes</h2>
						<ul>
		<?php $my_query = new WP_Query('showposts=6'); while ($my_query->have_posts()) : $my_query->the_post(); if($post->ID == $do_not_duplicate[0] || $post->ID == $do_not_duplicate[1]) continue; update_post_caches($posts);  ?>
							<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
						</ul>
						<p class="readMore ralign"><a href="/snake-bytes">Read More Bytes &#187;</a></p>
					</li>
					<li class="links">
						<h2 class="brand">Articles</h2>
						<ul>
							<li><a href="/articles/serpentvenom-lightbox/">SerpentVenom Lightbox</a></li>
							<li><a href="/articles/css-trouble-shooting-tips/">CSS Trouble Shooting Tips</a></li>
							<li><a href="/articles/bogus-right-margins/">Bogus Right Margins</a></li>
							<li><a href="/articles/stop-designing-for-free/">Stop Designing for Free</a></li>
						</ul>
						<p class="readMore ralign"><a href="/articles">Read More Articles &#187;</a></p>
					</li>
				</ul>
			</section>
		</aside>
	</section><aside class="fixed narrow pad sidebar">
        <p class="room">This is SerpentVenom, the website of <a href="/home/resume">Michael Wong</a>. Michael is a Conceptual Information Artist who works as a Web Design Professional in the San Francisco Bay Area. This site features his <a href="/snake-bytes">blog</a>, <a href="/design">design portfolio</a>, <a href="/art">art portfolio</a> and <a href="/articles">other writings</a> on web design and development.</p>
        <h2 class="brand">Departments</h2>
        <ul class="inlineList room s5">
            <li><a href="/design">Design Studio</a></li>
            <li><a href="/art">Art Studio</a></li>
            <li><a href="/articles">Articles</a></li>
            <li><a href="/home/about">About</a></li>
            <li><a href="/home/links">Links</a></li>

            <li><a href="/home/contact">Contact</a></li>
        </ul>
        <h2 class="brand">Inspirations</h2>
        <ul class="inlineList room s5">
            <li><a href="http://zeldman.com">Zeldman</a></li>
            <li><a href="http://stuffandnonsense.co.uk/">Stuff &amp; Nonsense</a></li>
            <li><a href="http://jasonsantamaria.com/">Jason Santa Maria</a></li>
            <li><a href="http://24ways.org/">24 Ways</a></li>
            <li><a href="http://alistapart.com">A List Apart</a></li>
            <li><a href="http://webdesignerwall.com/">Web Designer Wall</a></li>
        </ul>
        <h2 class="brand">Elsewhere on the Web</h2>
        <ul class="inlineList room s5">

            <li>
                <ul>
                    <li id="linkedIn" class="icons"><a href="http://www.linkedin.com/in/serpentvenom">LinkedIn</a></li>
                    <li id="facebook" class="icons"><a href="http://www.facebook.com/people/Michael-Wong/1121527952">Facebook</a></li>
                </ul>

            </li>
            <li>

                <ul>
                    <li id="twitter" class="icons"><a href="http://twitter.com/serpentvenom">Twitter</a></li>
                    <li id="delicious" class="icons"><a href="http://delicious.com/webheadmdw">Delicious</a></li>
                </ul>

            </li>
            <li>
                <ul>

                    <li id="flickr" class="icons"><a href="http://www.flickr.com/photos/serpentvenom/">Flickr</a></li>
                    <li id="deviantArt" class="icons"><a href="http://webheadmdw.deviantart.com/">deviantArt</a></li>
                </ul>
            </li>
        </ul>
		<?php get_search_form(); ?>
    </aside>
<?php get_footer(); ?>