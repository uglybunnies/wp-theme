<?php
/*
Template Name: bytesBC
*/
?>
<ul class="bcrumb sv s5">
    <li><a href="/">SerpentVenom</a>
		<ul>
			<li><a href="/snake-bytes">Snake Bytes</a>
			<?php if(is_single()){ ?>
				<ul>
					<li><?php echo $post->post_title; ?></li>
				</ul>	
			<?php } ?>
			</li>
		</ul>
	</li>

</ul>
