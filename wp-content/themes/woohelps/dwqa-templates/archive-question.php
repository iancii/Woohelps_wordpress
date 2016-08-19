<?php
/**
 * The template for displaying question archive pages
 *
 * @package DW Question & Answer
 * @since DW Question & Answer 1.4.2
 */
?>



<div class="dwqa-questions-archive">
	<?php do_action( 'dwqa_before_questions_archive' ) ?>
		<div class="dwqa-questions-list">
		<?php do_action( 'dwqa_before_question_stickies' ); ?>
		<?php if ( dwqa_has_question_stickies() && 'all' == dwqa_current_filter() ) : ?>
			<?php while( dwqa_has_question_stickies() ) : dwqa_the_sticky() ?>
				<?php dwqa_load_template( 'content', 'question' ) ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php do_action( 'dwqa_after_question_stickies' ); ?>

		<?php do_action( 'dwqa_before_questions_list' ) ?>
		<?php if ( dwqa_has_question() ) : ?>
			<?php while ( dwqa_has_question() ) : dwqa_the_question(); ?>
				<?php if ( get_post_status() == 'publish' || ( get_post_status() == 'private' && dwqa_current_user_can( 'edit_question', get_the_ID() ) ) ) : ?>
					<?php dwqa_load_template( 'content', 'question' ) ?>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php dwqa_load_template( 'content', 'none' ) ?>
		<?php endif; ?>
		<?php do_action( 'dwqa_after_questions_list' ) ?>
		</div>
		<div class="dwqa-questions-footer">
			<?php dwqa_question_paginate_link() ?>
			<?php if ( dwqa_current_user_can( 'post_question' ) ) : ?>
				<div class="dwqa-ask-question">
					<?php
					 if( is_user_logged_in() ){
					?>
						<a href="<?php echo dwqa_get_ask_link(); ?>"><?php _e( 'Ask Question', 'dwqa' ); ?></a>
					<?php
						} else {
					?>
						 <a href=<?php get_option( 'siteurl' ) ?>"/register/"><?php _e( 'Ask Question', 'dwqa' ); ?></a>
					<?php
					 }
					?>
				</div>
			<?php endif; ?>
		</div>

	<?php do_action( 'dwqa_after_questions_archive' ); ?>
</div>
