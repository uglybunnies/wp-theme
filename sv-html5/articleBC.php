<?php
/*
Template Name: articleBC
*/
?>
<ul class="bcrumb sv s5">
    <li><a href="/">SerpentVenom</a>
        <ul> 
			<li><a href="/articles">Articles</a>
<?php if($post->post_parent){ ?>
				<ul>
					<li><?php echo $post->post_title; ?></li>
				</ul>
<?php } ?>
            </li>
        </ul>
    </li>
</ul>
