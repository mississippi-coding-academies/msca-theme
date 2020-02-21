<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Nav -->
    <div class="nav-rules">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-sm-2 d-none d-md-block">
                    <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpeg" alt="Logo"></a>
                </div>
                <div class="col-sm-2 col-5 d-md-none">
                    <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/mobilelogo.png" alt="Logo"></a>
                </div>
                <div class="col-sm-6 d-none d-lg-block d-md-block">
                    <div class="nav-menu">
                        <ul>
                            <li>
                                <div class="dropdown">
                                    <a href="#" onclick="dropDown(); changeIcon()" class="dropbtn" >The Academies <i id="caretChange" class="fa fa-caret-down"></i></a>
                                </div>
                            </li>
                            <li><a href="/students">Students</a></li>
                            <li><a href="/news">News</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-4">
                    <div class="nav-btn">
                        <a class="hide-hire-btn" href="/hire">Hire a Grad</a>
                        <a href="/apply-now">Apply Now</a>
                    </div>
                </div>
                <div class="col-sm-2 col-3">
                    <div class="dropdown">
                        <a href="#" onclick="dropDown(); changeIcon()" class="mobile-menu-btn dropbtn">MENU</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="dropdown-content" id="myDropdown">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="/about-us">About Us</a> </li>
                            <li><a href="/alumni">Alumni</a></li>
                            <li><a href="/principles-values">Our Values</a></li>
                            <li><a href="/board-of-directors-officers">Board of Directories</a></li>
                            <li><a href="/employer-evaluations">Employer Evaluations</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>