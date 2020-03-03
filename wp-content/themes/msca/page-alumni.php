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
    <?php endwhile; ?>
    <div class="alumni-sub-header">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <form action="#">
                        <label for="location">Filter Location</label>
                        <input type="checkbox" name="Jackson" id="" value="Jackson">Jackson
                        <input type="checkbox" name="Starkville" id="" value="Starkville">Starkville
                    </form>
                </div>
                <div class="col-6">
                    <form action="#">
                        <label for="sort">Sort Students By</label>
                        <select name="sort-options">
                            <option value="location">Location</option>
                            <option value="year">Year</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="alumni-bg">
        <div class="container">
            <div class="row">
            <?php

global $post;
$args = [
    'numberposts' => -1,
    'post_type' => 'student',
    'meta_query' => [
        [
            'key' => 'active',
            'value' => '1',
            'compare' => '='
        ],
        [
            'key' => 'alumni',
            'value' => '1',
            'compare' => '='
        ]
    ]
];

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
<!-- OPEN STUDENT -->
                <div class="col-3">
                    <div class="alumni-box">
                        <div class="alumni-photo">
                            <img src="https://via.placeholder.com/230x180" alt="placeholder image">
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <p><?php the_title(); ?><br> <?php echo ucfirst(get_field('location'));?></p>
                            </div>
                            <div class="col-4">
                                <a href="#">X</a>
                                <a href="#">X</a>
                            </div>
                        </div>
                    </div>
                </div>
<!-- CLOSE STUDENT -->
<?php 
            endforeach; 
            wp_reset_postdata();
        ?>
            </div>
        </div>
    </div>
    <div class="footer-message">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <p>If you’re a problem solver with ambition—we have a place for you.</p>
                </div>
                <div class="col-5">
                    <a href="/apply-now/">Apply to the Academy</a>
                </div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>