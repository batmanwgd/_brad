<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<div class="vlt-post-meta">

	<span><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>

	<?php if ( ethant_get_post_taxonomy( get_the_ID(), 'category' ) ) : ?>
		<span><?php echo ethant_get_post_taxonomy( get_the_ID(), 'category', ', ' ); ?></span>
	<?php endif; ?>

</div>
<!-- /.vlt-post-meta -->