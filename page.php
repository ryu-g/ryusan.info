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
				<h3><a href="<?php echo the_permalink();?>"><?php the_title(); ?></a></h3>
			</div>
			<div class="post-content single">
				<p class="read"><?php the_content(); ?></p>
			</div>
		</div>
			<?php get_sidebar(); ?>
			<div class="navigation single">
				<div class="prev"><?php previous_post_link(); ?></div>
				<div class="next"><?php next_post_link(); ?></div>
			</div>
			<?php
			endwhile;
			else:
				?>
			<p>ページはありません。</p>
		<?php endif; ?>
		</div>
	</div><!-- posts -->
</div><!-- main -->

<?php get_footer(); ?>