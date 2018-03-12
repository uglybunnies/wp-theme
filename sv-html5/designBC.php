<?php
/*
Template Name: designBC
*/
?>
<ul class="bcrumb s5">
    <li><a href="/">SerpentVenom</a>
        <ul> 

			<li><a href="/design">The Design Studio</a>
		<?php if($post->post_parent){ ?>
				<ul>
					<li><?php echo $post->post_title; ?></li>
				</ul>
		<?php } ?>
			</li>

        </ul>
    </li>
</ul>
