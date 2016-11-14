<?php get_header();?>
<div class="clear"></div>
<div id="main" >
<div class="container">
	<div class="posts">
		<?php if(have_posts()):
		while(have_posts()):
			the_post();
		?>
		<div class="post single">
			<div class="post-header single">
				<h3><?php the_title(); ?></h3>
			</div>
			<div class="post-content single">
				<p class="read"><?php the_content(); ?></p>
			</div>
			<div class="post-meta">
			<p><?php echo get_the_date(); ?> [ カテゴリ : <?php echo the_category(',') ?> ]</p></div>
		</div>
			<?php get_sidebar(); ?>
			<?php comments_template();?>

			<div class="navigation single">
				<div class="prev"><?php previous_post_link(); ?></div>
				<div class="next"><?php next_post_link(); ?></div>
				<div class="clear"></div>
			</div>
		<?php
		endwhile;
		else:
			?>
		<p>記事はありません。</p>
	<?php endif; ?>
</div><!-- posts -->
</div>
</div><!-- main -->

<?php get_footer(); ?>