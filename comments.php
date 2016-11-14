<section class="comments">
	<?php
	if ( have_comments() ) :
	?>
	    <p><?php comments_number(); ?></p>
	    <ol class="commentlist">
	        <?php wp_list_comments('avatar_size=50'); ?>
	    </ol>
	<?php
	paginate_comments_links();
	endif;
		comment_form(my_comment_form_default_fields);

	?>
</section><!-- /.comments -->