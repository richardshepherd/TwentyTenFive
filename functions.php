<?php

add_shortcode('wp_caption', 'twentyten_img_caption_shortcode');
add_shortcode('caption', 'twentyten_img_caption_shortcode');


/**
 * The TwentyTen Five Caption shortcode.
 * added by Richard Shepherd to include HTML5 goodness
 *
 * The supported attributes for the shortcode are 'id', 'align', 'width', and
 * 'caption'.
 *
 * @since TwentyTen Five 1.0
 */
function twentyten_img_caption_shortcode($attr, $content = null) {

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	return '<figure ' . $id . 'class="' . esc_attr($align) . '" style="width: ' . (10 + (int) $width) . 'px">'
	. do_shortcode( $content ) . '<figcaption>' . $caption . '</figcaption></figure>';

}

/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since TwentyTen Five 1.0
 */
function twentyten_posted_on() {
		printf( __( 'Posted on %2$s by %3$s', 'twentyten' ),
			'meta-prep meta-prep-author',
			sprintf( '<a href="%1$s" rel="bookmark"><time datetime="%2$s" pubdate>%3$s</time></a>',
			get_permalink(),
			get_the_date('c'),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
}


