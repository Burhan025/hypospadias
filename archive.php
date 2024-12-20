<?php
/*  ----------------------------------------------------------------------------
    the archive(s) template
 */

get_header();


//set the template id, used to get the template specific settings
$template_id = 'archive';

//prepare the loop variables
global $loop_module_id, $loop_sidebar_position, $part_cur_auth_obj;
$loop_module_id = td_util::get_option('tds_' . $template_id . '_page_layout', 1); //module 1 is default
$loop_sidebar_position = td_util::get_option('tds_' . $template_id . '_sidebar_pos'); //sidebar right is default (empty)


//read the current author object - used by here in title and by /parts/author-header.php
$part_cur_auth_obj = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));


//prepare the archives page title
if (is_day()) {
    $td_archive_title = __td('Daily Archives:'). ' ' . get_the_date();
} elseif (is_month()) {
    $td_archive_title = __td('Monthly Archives:') . ' ' . get_the_date('F Y');
} elseif (is_year()) {
    $td_archive_title = __td('Yearly Archives:') . ' ' . get_the_date('Y');
} else {
    $td_archive_title = __td('Archives');
}
?>

<div class="td-title-wrap"><div class="td-container"><div class="td-pb-row">
<div class="td-pb-span8 column_container td-no-pagination td-pb-padding-side"><h1 itemprop="name" class="entry-title td-page-title"><span><?php echo $td_archive_title ?></span></h1></div>
<div id="cta_container" class="td-pb-span4 column_container"><?php dynamic_sidebar('CTA Form'); ?></div>
</div></div></div>

<div class="td-grid-wrap crumbs">
<div class="td-container">
<div class="td-pb-row">
<div class="td-pb-span8 column_container td-pb-padding-side">
<?php echo td_page_generator::get_archive_breadcrumbs(); // get the breadcrumbs - /includes/wp_booster/td_page_generator.php ?>
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
                        <div class="td-pb-span8 td-main-content">
                            <div class="td-ss-main-content">
                            
                                <?php locate_template('loop.php', true);?>

                                <?php echo td_page_generator::get_pagination(); // get the pagination - /includes/wp_booster/td_page_generator.php ?>
                            </div>
                        </div>

                        <div class="td-pb-span4 td-main-sidebar">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    <?php
                    break;

                case 'sidebar_left':
                    ?>
                    <div class="td-pb-span4 td-main-sidebar">
                        <div class="td-ss-main-sidebar">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                    <div class="td-pb-span8 td-main-content">
                        <div class="td-ss-main-content">
                            <div class="td-page-header td-pb-padding-side">
                                <?php echo td_page_generator::get_archive_breadcrumbs(); // get the breadcrumbs - /includes/wp_booster/td_page_generator.php ?>

                                <h1 itemprop="name" class="entry-title td-page-title">
                                    <span><?php echo $td_archive_title; ?></span>
                                </h1>
                            </div>

                            <?php locate_template('loop.php', true);?>

                            <?php echo td_page_generator::get_pagination(); // get the pagination - /includes/wp_booster/td_page_generator.php ?>
                        </div>
                    </div>
                    <?php
                    break;

                case 'no_sidebar':
                    ?>
                    <div class="td-pb-span12 td-main-content">
                        <div class="td-ss-main-content">
                            <div class="td-page-header td-pb-padding-side">
                                <?php echo td_page_generator::get_archive_breadcrumbs(); // get the breadcrumbs - /includes/wp_booster/td_page_generator.php ?>

                                <h1 itemprop="name" class="entry-title td-page-title">
                                    <span><?php echo $td_archive_title; ?></span>
                                </h1>
                            </div>
                            <?php locate_template('loop.php', true);?>

                            <?php echo td_page_generator::get_pagination(); // get the pagination - /includes/wp_booster/td_page_generator.php ?>
                        </div>
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