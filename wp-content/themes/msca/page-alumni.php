<?php
    // page.php
    get_header();
?>
<!-- Page Header -->
    <?php while(have_posts()) : the_post(); ?>	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	  <script>
	  $(document).ready(function(){
		  
		  	 var clear = function(){
				 $.ajax({
					  type: 'POST',
					  url: "<?php echo admin_url('admin-ajax.php'); ?>",
					  dataType: "html", // add data type
					  data: { action : 'get_alumni'},
					  success: function( response ) {

						  $.posts = response;
						  $('#showresults').empty();
						  $.each (JSON.parse(response), function( index, post){
							  console.log(post)
								$('#showresults').append(
									'<div class="col-3"><div class="alumni-box"><div class="alumni-photo">' + 
									post.post_thumb + '</div><div class="row">' +
									'<div class="col-9">' +
										'<p>' + post.post_title + '<br>' + post.post_location + 
									'</p></div>' + 
									'<div class="col-3"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a><a 									href="#"><i class="fa fa-github" aria-hidden="true"></i></a></div></div></div></div>'
								)
							});
					  }
			})};
		
		clear();
		
		$('#jackson').change(
			function(){
				if ($(this).is(':checked') && !$('#starkville').is(':checked')) {
					  $.ajax({
						  type: 'POST',
						  url: "<?php echo admin_url('admin-ajax.php'); ?>?" + jQuery.param({ location: "Jackson" }),
						  dataType: "html", // add data type
						  data: { action : 'get_alumni'},
						  success: function( response ) {

							  $.posts = response;
							  $('#showresults').empty();
							  $.each (JSON.parse(response), function( index, post){
								  $('#showresults').append(
									  '<div class="col-3"><div class="alumni-box"><div class="alumni-photo">' + 
									  post.post_thumb + '</div><div class="row">' +
									  '<div class="col-9">' +
									  '<p>' + post.post_title + '<br>' + post.post_location + 
									  '</p></div>' + 
									  '<div class="col-3"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a><a 									  href="#"><i class="fa fa-github" aria-hidden="true"></i></a></div></div></div></div>'
								  )
							  });
						  }
						});
				} 
				else {
					clear();
				}
		 });
		  	

		  
		$('#starkville').change(
			function(){
				if ($(this).is(':checked') && !$('#jackson').is(':checked')) {
					  $.ajax({
						  type: 'POST',
						  url: "<?php echo admin_url('admin-ajax.php'); ?>?" + jQuery.param({ location: "Starkville" }),
						  dataType: "html", // add data type
						  data: { action : 'get_alumni'},
						  success: function( response ) {

							  $.posts = response;
							  $('#showresults').empty();
							  $.each (JSON.parse(response), function( index, post){
								  $('#showresults').append(
									  '<div class="col-3"><div class="alumni-box"><div class="alumni-photo">' + 
									  post.post_thumb + '</div><div class="row">' +
									  '<div class="col-9">' +
									  '<p>' + post.post_title + '<br>' + post.post_location + 
									  '</p></div>' + 
									  '<div class="col-3"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a><a 										href="#"><i class="fa fa-github" aria-hidden="true"></i></a></div></div></div></div>'
								  )
							  });
						  }
						});
				}else {
					clear()
				}
			});
	  });
	  </script>
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
                        <input type="checkbox" name="Jackson" id="jackson" value="Jackson" style="margin-right: 5px;">Jackson
                        <input type="checkbox" name="Starkville" id="starkville" value="Starkville" style="margin-right: 5px;">Starkville
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="alumni-bg">
        <div class="container">
            <div class="row" id="showresults">
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
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php echo get_the_post_thumbnail( $post->ID, 'standard-vertical' ); ?>
                        <?php else :  ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/default_student.jpg" alt="Placeholder Student Photo">
                        <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                <p><?php the_title(); ?><br> <?php echo ucfirst(get_field('location'));?></p>
                            </div>
                            <div class="col-3">
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-github" aria-hidden="true"></i></a>
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