<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to _s_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package inka
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>


<div class="post_container comment">
	
	
	<?php if ( have_comments() ) : ?>

		<div class="title"> <h4>
			<?php
				printf( _nx( 'One Comment', '%1$s Comments ', get_comments_number(), 'torque' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h4></div>


		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'torque' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'torque' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'torque' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>
		
		<ul>
	
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use _s_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define _s_comment() and that will be used instead.
				 * See _s_comment() in inc/template-tags.php for more.
				 */
			 $args = array('style' => '',
                        'callback'          => 'torque_comment',
                        'type'              => 'all',
                        'avatar_size'       => 62,
                        'reverse_top_level' => null
                         );
					wp_list_comments( $args );
			?>

		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'torque' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'torque' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'torque' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'torque' ); ?></p>
	<?php endif; ?>
</div>

<div class="post_container last">
<hr class="gap_35"> <!-- DIVIDER -->

 <?php  $auxchar="'";   if(!isset($aria_req)) $aria_req='';
								   
   $comment_args = array( 'title_reply'  => '<div class="title"><h4>Leave a Comment</h4></div>',
        'title_reply_to'=>'<div class="comments-title">Leave a Comment to %s </div>',
       'label_submit' => __('SEND THE MESSAGE','torque'),
       'logged_in_as' => '',
       'comment_notes_before' => '',
       'id_form' => 'commentform',
       'id_submit' => 'chemistry_submit',

    'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<input id="name" type="text" placeholder="Your name here..." name="author" class="form-control" ' . $aria_req . '  value="' . $commenter['comment_author'] . '"   onfocus="if(this.value==' . $auxchar . $commenter['comment_author'] . $auxchar . ') this.value=' . $auxchar . $auxchar . ';" onblur="if(this.value==' . $auxchar . $auxchar . ') this.value=' . $auxchar . $commenter['comment_author'] . $auxchar . ';" />',				
    'email'  => '<input id="email" type="text" placeholder="Your email here..."  name="email" class="form-control" ' . $aria_req . ' onfocus="if(this.value==' . $auxchar . $commenter['comment_author_email'] . $auxchar . ') this.value=' . $auxchar . $auxchar . ';" onblur="if(this.value==' . $auxchar . $auxchar . ') this.value=' . $auxchar . $commenter['comment_author_email'] . $auxchar . ';" />', 	
 	'url'    => '<input id="subject" name="url"  placeholder="Subject here..." type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />',											
	)),
    'comment_field' => '<textarea name="comment" id="comments" cols="30" rows="10"  class="form-control" aria-required="true" ></textarea>',
    'comment_notes_after' => '',
);
		?>

<?php comment_form($comment_args); ?>

</div><!-- #comments -->



