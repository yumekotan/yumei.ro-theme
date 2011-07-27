<? get_header(); ?>

<!-- the hairy beast -->

<? if (is_front_page()) { ?>
    <!-- CUSTOM FRONT PAGE CONTENT -->
<? } ?>

<div id="body">
    <div class="column" id="left-column">
        <ul class="widgets"><? dynamic_sidebar('navigation-sidebar'); ?></ul>
    </div>

    <div class="column" id="content-column">
	<img id="faerie" src="/wp-content/themes/yumeiro/images/faerie.png" />
        <? if ( !have_posts() ) { ?>
            <div class="post">
                <h1 class="post-title">Sorry...</h1>
                <hr size="1"/>
                <p>This page does not exist or has been deleted.</p>
            </div>
        <? } else { // if we have posts ?>
            <? if (!is_single() && !is_page()) { 
                    $is_list = True; 
                } else {
                    $is_list = False;
                }
            ?>
            <? if ($is_list) { ?><ul class="post-list"><? } ?>
            <? while (have_posts()) { the_post(); ?>
            <? if ($is_list) { ?>
            <li class="post">
            <? } else { ?>
            <div class="post">
            <? } ?>
                <h1 class="post-title">
                    <a href="<? the_permalink(); ?>"><? the_title(); ?></a>
                </h1>
                <p class="post-info">
                    By: 
                    <span class="author"><? the_author_link(); ?></span>
                     | Published: 
                    <span class="date"><?php the_time('F j, Y'); ?></span>
					 @ 
					<span class="date"><?php the_time('g:i a'); ?></span>
                </p>
                <? the_content("Read more &raquo;"); ?>
				<div class="post-end">
					<span class="post-end-links">
						<span class="permalink"><img id="permalink-image" src="/wp-content/themes/yumeiro/images/permalink.png" /> <a href="<? the_permalink(); ?>">Permalink</a></span>
						<? if ($is_list) { // just a comment link ?>
						<span class="comments-link">
							<img id="comments-image" src="/wp-content/themes/yumeiro/images/comments.png" /> <?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'yumeiro' ) . '</span>', _x( '1', 'comments number', 'yumeiro' ), _x( '%', 'comments number', 'yumeiro' ) ); ?>
						</span>
						<? } ?>
					</span>
					<span class="addthis_toolbox addthis_default_style">
						<span class="addthis_share_buttons">
							<a class="addthis_button_facebook"></a>
							<a class="addthis_button_twitter"></a>
							<a class="addthis_button_googlebuzz"></a>
							<a class="addthis_button_email"></a>
							<a class="addthis_button_print"></a>
							<a class="addthis_button_compact"></a>
						</span>
						<span class="addthis_facebook_button">
							<a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:height="20"></a>
						</span>
						<span class="addthis_google_plusone_button">
							<a class="addthis_button_google_plusone" g:plusone:size="small"></a>
						</span>
					</span>
				</div>
				<? if (!$is_list) { // enabling comments ?>
					<div id="comments"><? comments_template( '', true ); ?></div>
				<? } ?>
				
            <? if ($is_list) { ?></li><? } else { ?></div><? } ?>
        <? } // end have posts ?>
        <? } // end while has posts ?>
        <? if ($is_list) { ?></ul><? } ?>
    </div>

</div><!-- END BODY -->

<? get_footer(); ?>
