<?php
/*
Template Name: artBC
*/
?>
<ul class="bcrumb art s5">
    <li><a href="/">SerpentVenom</a>
        <ul> 
            <li><a href="/art">The Art Studio</a> 
<?php if($post->post_parent){ ?>
				<ul>
					<li><?php echo $post->post_title; ?></li>
				</ul>
<?php } ?>
            </li>
        </ul>
    </li>
</ul>
