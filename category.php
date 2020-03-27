<?php get_header()?>

<!-- Page Title
  ================================================== -->
<div id="page-title">

    <div class="row">

        <div class="ten columns centered text-center">
            <h1>Category<span>.</span></h1>
        </div>

    </div>

</div> <!-- Page Title End-->

<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">

            <?php if (have_posts()) {
	while (have_posts()) {the_post();?>
                    <article class="post">

                        <div class="entry-header cf">

                            <h1><a href="<?php the_permalink()?>"><?php the_title()?></a></h1>
                            <p class="post-meta">
                                <time class="date" datetime="<?php the_time('Y-m-d')?>"><?php the_time('M d, Y')?></time>
                                /
                                <span class="categories">
                                    <?php the_tags("", " / ")?>
                                </span>
                            </p>

                        </div>

                        <div class="post-thumb">
                            <a href="<?php the_permalink()?>" title=""><?php the_post_thumbnail('post-thumb')?></a>
                        </div>

                        <div class="post-content">
                            <?php the_excerpt()?>
                        </div>

                    </article> <!-- post end -->
            <?php } // end while ?>
                <?php the_posts_pagination()?>
           <?php } // end if ?>

        </div> <!-- Primary End-->

        <div id="secondary" class="four columns end">

            <aside id="sidebar">

                <?php get_sidebar()?>

            </aside>

        </div> <!-- Secondary End-->

    </div>

</div> <!-- Content End-->

<?php get_footer()?>