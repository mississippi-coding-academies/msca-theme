<?php
    // page.php
    get_header();
?>
<!-- Page Header -->
<?php while(have_posts()) : the_post(); ?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="about-bottom">
        <div class="container">
            <div class="about-sub-header">
                <div class="row">
                    <div class="col-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php get_footer(); ?>