<?php
    // index.php
    get_header();
?>
<!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>News</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="about-bottom">
        <div class="container">
            <div class="about-sub-header">
                <div class="row">
                    <div class="col-12">
<?php while(have_posts()) : the_post(); ?>
                        <article class="news-item">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php echo get_the_post_thumbnail( $post->ID, 'standard-horizontal' ); ?>
                        <?php else :  ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/default_news.jpg" alt="Mississippi Coding Academies">
                        <?php endif; ?>
                            <h2 class="h3"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                            <?php the_excerpt(); ?>
                        </article>
<?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>