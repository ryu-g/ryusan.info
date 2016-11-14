<?php get_header();?>
<div id="main">
<div class="container">
	<div class="posts">
		<?php if(have_posts()):
		while(have_posts()):
			the_post();
		?>
		<div class="post">
			<div class="post-header">
				<div class="post-image">
					<?php if(has_post_thumbnail()): ?>
						<a href="<?php echo the_permalink();?>"><?php the_post_thumbnail(array(300,120)); ?></a>
					<?php else:?>
						<a href="<?php echo the_permalink();?>"><img src="https://placehold.jp/300x120.png"></a>
					<?php endif; ?>
				</div>
				<h3><a href="<?php echo the_permalink();?>"><?php the_title(); ?></a></h3>
			</div>
			<div class="post-content">
				<p class="read"><?php the_excerpt(); ?></p>
			</div>
			<div class="post-meta"><?php echo get_the_date(); ?>[<?php echo the_category(',') ?>]</div>
		</div>

		<?php
		endwhile;
		else:
			?>
		<p>記事はありません。</p>
		<?php endif; ?>
</div>

<div class="container navigation">
	<div class="clear"></div>
	<div class="prev"><?php previous_posts_link(); ?></div>
	<div class="next"><?php next_posts_link(); ?></div>
</div>
	</div><!-- posts -->
</div><!-- main -->

<?php get_footer(); ?>