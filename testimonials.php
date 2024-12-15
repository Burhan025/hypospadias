<?php
/*  ----------------------------------------------------------------------------
    Template Name: Testimonials
 */


get_header();


//set the template id, used to get the template specific settings
$template_id = 'page';


$loop_sidebar_position = td_util::get_option('tds_' . $template_id . '_sidebar_pos'); //sidebar right is default (empty)

//get theme panel variable for page comments side wide
$td_enable_or_disable_page_comments = td_util::get_option('tds_disable_comments_pages');


//read the custom single post settings - this setting overids all of them
$td_page = get_post_meta($post->ID, 'td_page', true);
if (!empty($td_page['td_sidebar_position'])) {
    $loop_sidebar_position = $td_page['td_sidebar_position'];
}


/**
 * detect the page builder
 */
$td_use_page_builder = false;
if (method_exists('WPBMap', 'getShortCodes')) {
    $td_page_builder_short_codes = array_keys(WPBMap::getShortCodes());
    if (td_util::strpos_array($post->post_content, $td_page_builder_short_codes) === true) {
        $td_use_page_builder = true;
    }
}

$testis = get_post_meta($post->ID, 'wpl_testis', true);
$count = count($testis);

?>

<div class="td-title-wrap"><div class="td-container"><div class="td-pb-row">
<div class="td-pb-span8 column_container td-no-pagination td-pb-padding-side"><h1 itemprop="name" class="entry-title td-page-title"><span><?php the_title() ?></span></h1></div>
<div id="cta_container" class="td-pb-span4 column_container"><?php dynamic_sidebar('CTA Form'); ?></div>
</div></div></div>
<div class="td-grid-wrap crumbs">
<div class="td-container">
<div class="td-pb-row">
<div class="td-pb-span8 column_container td-pb-padding-side">
<?php echo td_page_generator::get_page_breadcrumbs(get_the_title()); ?>
</div>
<div id="crumb_container" class="td-pb-span4 column_container">
</div>
</div>
</div>
</div>

    <div class="td-container">
        <div class="td-container-border">
            <div class="td-pb-row">
                <?php
                switch ($loop_sidebar_position) {
                    default:
                        ?>
                            <div class="td-pb-span8 td-main-content" role="main" itemscope="itemscope" itemprop="mainContentOfPage" itemtype="<?php echo td_global::$http_or_https?>://schema.org/LocalBusiness">
                                <div class="td-ss-main-content">
                                <meta itemprop="name" content="<?php bloginfo('name'); ?>">
                                <meta itemprop="url" content="<?php echo home_url(); ?>">
                                <span itemprop="aggregateRating" itemscope="" itemtype="<?php echo td_global::$http_or_https?>://schema.org/AggregateRating">
                                <meta itemprop="ratingValue" content="5.0">
                                <meta itemprop="worstRating" content="1">
                                <meta itemprop="bestRating" content="5">
                                <meta itemprop="reviewCount" content="<?php echo $count; ?>">
                                </span>
                                    <?php
                                    if (have_posts()) {
                                        while ( have_posts() ) : the_post();
                                            ?>
                                            <div class="td-pb-padding-side td-page-content">
                                            
                                            <link type="text/css" rel="stylesheet" href="//www.demandforce.com/widget/css/widget.css" />
                                            <script type="text/javascript">
											d3cp_bid = '103000983';// Account ID in Business Portal
											</script>
											<script src="//local.demandforce.com/b/parcurology/reviews.widget" type="text/javascript"></script>
                                            
                                            <!-- <script type="text/javascript"> var method = window.addEventListener ? "addEventListener" : "attachEvent"; var event = window.addEventListener ? "message" : "onmessage"; window[method](event, function(e) { if("review_iframe_height" in e.data) { document.getElementById("myFrame").height = e.data.review_iframe_height + "px"; } }, false); </script> <iframe width="100%" frameborder="0" scrolling="no" id="myFrame" src="https://my.reputationloop.com/my-review/index/uid/7a571d8f82c306206348ad2291c89650"></iframe> -->
                                            
                                            <div class="clearfix"></div>
                                            <?php 
                                                if( $testis ) : ?><div id="testis"><?php foreach( $testis as $item ) : $review_ratings = $item['wpl_testis_rating']; $review_rating_cleans = number_format($review_ratings, 1, '.', ''); $review_image = $item['wpl_testis_image']; ?><div <?php if ($review_image) { ?>class="review review_image"<?php } else { ?>class="review"<?php } ?> itemscope="" itemtype="<?php echo td_global::$http_or_https?>://schema.org/Review"><meta itemprop="itemReviewed" content="<?php bloginfo('name'); ?>">
                                                <div class="rating_wrapper">
                <div class="rating" itemprop="reviewRating" itemscope="" itemtype="<?php echo td_global::$http_or_https?>://schema.org/Rating">
                    <meta itemprop="worstRating" content="1">
                    <meta itemprop="bestRating" content="5">
                    <meta itemprop="ratingValue" content="<?php echo $review_rating_cleans; ?>"></span>
                    <?php
                   			$args = array(
							   'rating' => $review_rating_cleans,
							   'type' => 'rating',
							   'number' => 1,
							);
							wp_star_ratings( $args );
					?>
                </div>
            </div>
            <?php if ($review_image) { ?><img alt="PARC Urology Review" src="<?php echo $review_image; ?>"><?php } ?>
             <div class="review_description">
            <p><?php echo $item['wpl_testis_quote']; ?></p>
            <meta itemprop="reviewBody" content="<?php echo $item['wpl_testis_quote']; ?>">
            </div>

            <div class="review_details">
            	<div class="review_author">
                <span>-</span> <span itemprop="author"><?php echo $item['wpl_testis_quote_cite']; ?></span>
                </div>
                <div class="meta-info">
                <span class="review_date" itemprop="datePublished"><?php echo $item['wpl_testis_date']; ?></span>
                
                <?php
				$review_source = $item['wpl_testis_source']; $review_source_url = $item['wpl_testis_source_url'];
				if ($review_source && $review_source_url) { ?>
                	<span class="review_source">| Source: <a href="<?php echo $review_source_url; ?>" target="_blank" itemprop="provider" rel="nofollow"><?php echo $review_source; ?></a></span>
				<?php } elseif ($review_source && !$review_source_url) { ?>
                	<span class="review_source">| Source: <?php echo $review_source; ?></span>
                    <meta itemprop="provider" content="<?php bloginfo('name'); ?>">
                <?php } ?>
               </div>
            </div>
            
                                               </div><?php endforeach; ?></div><?php endif;
												echo get_social_sharing_bottom_page($post->ID);
                                        endwhile;//end loop

                                    }
                                    ?>
                                    </div>
                                    
                                    <?php
                                    if($td_enable_or_disable_page_comments == 'show_comments') {
                                        comments_template('', true);
                                    }?>
                                </div>
                            </div>
                            <div class="td-pb-span4 td-main-sidebar" role="complementary" itemscope="itemscope" itemtype="<?php echo td_global::$http_or_https?>://schema.org/WPSideBar">
                                <div class="td-ss-main-sidebar">
                                    <?php get_sidebar(); ?>
                                </div>
                            </div>
                        <?php
                        break;

                    case 'sidebar_left':
                        ?>
                        <div class="td-pb-span4 td-main-sidebar" role="complementary" itemscope="itemscope" itemtype="<?php echo td_global::$http_or_https?>://schema.org/WPSideBar">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                        <div class="td-pb-span8 td-main-content" role="main" itemscope="itemscope" itemprop="mainContentOfPage" itemtype="<?php echo td_global::$http_or_https?>://schema.org/LocalBusiness">
                            <div class="td-ss-main-content">
                                <?php

                                if (have_posts()) {
                                    while ( have_posts() ) : the_post();
                                        ?>
                                        
                                        <div class="td-pb-padding-side td-page-content">
                                        <?php
                                        if( $testis ) : ?><div id="testis"><?php foreach( $testis as $item ) : ?><blockquote><span class="rating"><?php echo $item['wpl_testis_rating']; ?></span><p><?php echo $item['wpl_testis_quote']; ?></p><cite>- <?php echo $item['wpl_testis_quote_cite']; ?></cite></blockquote><?php endforeach; ?></div><?php endif;
                                    endwhile; //end loop
                                }
                                ?>
                                </div>
                                <?php
                                if($td_enable_or_disable_page_comments == 'show_comments') {
                                    comments_template('', true);
                                }?>
                            </div>
                        </div>
                        <?php
                        break;

                    case 'no_sidebar':
                        ?>
                        <div class="td-pb-span12 td-main-content" role="main" itemscope="itemscope" itemprop="mainContentOfPage" itemtype="<?php echo td_global::$http_or_https?>://schema.org/LocalBusiness">

                            <?php
                            if (have_posts()) {
                                while ( have_posts() ) : the_post();
                                    ?>
                                    
                                    <div class="td-pb-padding-side td-page-content">
                                    <?php
                                    if( $testis ) : ?><div id="testis"><?php foreach( $testis as $item ) : ?><blockquote><span class="rating"><?php echo $item['wpl_testis_rating']; ?></span><p><?php echo $item['wpl_testis_quote']; ?></p><cite>- <?php echo $item['wpl_testis_quote_cite']; ?></cite></blockquote><?php endforeach; ?></div><?php endif;
                                endwhile; //end loop
                            }
                            ?>
                            </div>
                            <?php
                            if($td_enable_or_disable_page_comments == 'show_comments') {
                                comments_template('', true);
                            }?>
                        </div>
                        <?php
                        break;
                }
                ?>
            </div> <!-- /.td-pb-row -->
        </div>
    </div> <!-- /.td-container -->

    <?php




get_footer();