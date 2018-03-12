<?php
/*
Template Name: svBC
*/
?>
<ul class="bcrumb s5">
    <li><a href="/">SerpentVenom</a>
		<?php if($post->post_parent){ ?>
			<ul>
				<li><?php echo $post->post_title; ?></li>
			</ul>
		<?php } ?>

    </li>
</ul>
