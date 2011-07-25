<? get_header(); ?>

<!-- the hairy beast -->

<? if (is_front_page()) { ?>
    <!-- CUSTOM FRONT PAGE CONTENT -->
<? } ?>

<div id="body">
    <div class="column" id="left-column">
        <? dynamic_sidebar('navigation-sidebar'); ?>
    </div>

    <div class="column" id="content-column">
	<img class="faerie" src="/wp-content/themes/yumeiro/images/faerie.png" />
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
            <? while (have_posts()) { the_post(); } ?>
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
            <? if ($is_list) { ?></li><? } else { ?></div><? } ?>
        <? } // end have posts ?>
        <? if ($is_list) { ?></ul><? } ?>
    </div>

</div><!-- END BODY -->

<? get_footer(); ?>
