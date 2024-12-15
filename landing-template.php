<?php
/**
* Template Name: Landing Template
*
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<!-- page title, displayed in your browser bar -->
<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- add feeds, pingback and stuff-->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_head(); ?>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Playfair+Display:400,700" rel="stylesheet">

<style>
.landing-wrap {
    margin: 0 auto;
    max-width: 1170px;
    padding: 20px;
}
.landing-header {
    position: relative;
    top: 0;
    height: 92px;
    width: 100%;
    z-index: 9999;
}
.landing-header .wrap {
    padding: 23px 0px 0px;
    height: 89px;
    max-width: 1170px;
}
.landing-title-area {
    float: left;
    padding: 0px 0px;
    width: 128px;
}
.landing-site-title {
    margin-bottom: 0;
}
.landing-site-title a {
    background: url(http://www.parcurology.com/wp-content/uploads/2017/03/landing-logo.png) no-repeat scroll 0 0;
    display: block;
    height: 70px;
    width: 128px;
    text-indent: -9999px;
    outline: none;
	margin-top: -7px;
}
.landing-site-description {
    display: none;
    height: 0;
    margin-bottom: 0;
    text-indent: -9999px;
}
.landing-header .landing-info {
    float: right;
    text-align: right;
    width: 400px;
	margin-top: 14px;
}
.landing-tel-icon {
    background: url(http://www.parcurology.com/wp-content/uploads/2017/03/landing-tel-icon.png) no-repeat -1px 13px;
    font-size: 16px;
    color: #000000;
    font-family: 'Open Sans', sans-serif;
	font-weight:600;
    letter-spacing: 0.5px;
    padding-left: 35px;
    padding-top: 15px;
	padding-bottom: 15px;
    vertical-align: top;
    margin-right: 13px;
    line-height: 1.625;
}
.landing-tel-icon:hover{
	color:#11c62f;
}
.landing-button{
	font-family: 'Open Sans', sans-serif;
    background: #11c62f;
    padding: 12px 28px;
    color: #fff;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 1px;
    font-weight: 600;
	line-height: 1.625;
	border-radius: 5px;
}
.landing-button:hover{
	background:#3b3b3b;
}
.landing-info .landing-button{
	margin-left:25px;
}
.landing-hero-banner {
    background-position: center center;
    background-size: cover;
	border-bottom:6px solid #11c62f;
}
.landing-hero-banner img {
    display: block;
    width: 100%;
}
.caption-wrap {
	max-width: 1170px;
    position: relative;
    margin: 0 auto;
	padding:0px 20px;
}
.caption-wrap .caption {
    background: none;
    opacity: 1;
    left: auto;
    right: 65px;
    bottom: 0%;
    position: absolute;
    color: white;
    margin: 0;
    display: block;
    width: 100%;
    line-height: 1.4em;
    top: -345px;
}
.caption-wrap .caption h1 {
    font-family: 'Open Sans', sans-serif;
    font-size: 35px;
    color: #464c50;
    text-transform: uppercase;
    font-weight: 600;
    line-height: 62px;
    float: right;
}
.caption-wrap .caption h1 .green {
    font-family: 'Playfair Display', serif;
    font-size: 84px;
    color: #11c62f;
    text-transform:none;
    margin-bottom: 0px;
    font-weight: 400;
}
.caption-wrap h2 {
   color: #fff;
   text-align: center;
   display: inline-block;
   margin: 0 auto;
   padding: 8px 0px 6px 0px;
}
.landing-content-area{
	width:71%;
	display:inline-block;
}
.right-sidebar{
    width: 26%;
    margin-left: 2%;
    display: inline-block;
    vertical-align: top;
    margin-top: 0;
}
.landing-content-area h2 a, .landing-content-area h2{
	font-family: 'Playfair Display', serif;
    font-size: 32px;
    color: #475649;
    text-transform: uppercase;
    font-weight: 400;
	line-height:35px;
	margin-bottom:25px;
	margin-top:35px;
}
.landing-content-area h2 span{
	font-family: 'Playfair Display', serif;
	color: #11c62f;
}
.landing-content-area p{
	font-family: 'Open Sans', sans-serif;
    font-size: 18px;
    color: #475649;
    font-weight: 400;
	line-height:36px;
}
.landing-content-area li{
	font-family: 'Open Sans', sans-serif;
	color:#11c62f;
	line-height:35px;
	list-style-type:circle;
	font-size: 21px;
    margin-left: 35px;
}
.landing-content-area li span{
	font-family: 'Open Sans', sans-serif;
	color:#475649;
	font-size:16px;
	margin-left: -18px;
}
.landing-content-area .main-link{
	color:#11c62f;
}
.landing-content-area .alignleft:not(.td-post-image-left){
	margin-right:30px;
}
.landing-footer{
	background: #2c2c2c;
	text-align: center;
    line-height: 36px;
	font-family: 'Open Sans', sans-serif;
	font-size:16px;
	letter-spacing: 0.5px;
	margin-top: 20px;
}
.landing-footer .landing-add{
	color:#fff;
}

.landing-footer .landing-copyright p{
	color:#787878;
}
.landing-footer .landing-tel-icon{
	color:#fff;
}
.landing-footer .landing-tel-icon:hover{
	color:#11c62f;
}
.landing-footer .landing-tel-icon:hover{
	text-decoration:none!important;
}
.landing-footer .format-pipe{
	margin-left:10px;
	margin-right:15px;
}
.landing-sidenav{
	background:#efeee8;
	border:1px solid #deddd9;
	padding:5px 20px;
	border-radius:5px;
	margin-top: 42px;
}
.landing-sidenav li{
	list-style-type:none;
}
.landing-sidenav li:hover{
	background:#dbd9ce;
	border-radius:5px;
}
.landing-sidenav li:before{
    content: url(http://www.parcurology.com/wp-content/uploads/2017/03/landing-arrow-right.png);
    margin-right: 10px;
    line-height: 38px;
	padding-left: 15px;
}
.landing-sidenav li a{
	font-family: 'Open Sans', sans-serif;
	color:#29322a;
	font-size:16px;
}
.landing-sideform{
    background: #11c62f;
    padding: 20px;
    margin-top: 30px;
    border-radius: 5px;
}
.landing-sideform h3.iphorm-title{
	font-family: 'Playfair Display', serif;
	color:#fff;
	font-size:23px;
	text-transform: uppercase;
    font-weight: 400;
	margin-bottom: 10px;
}
.landing-sideform .iphorm-element-wrap-text.iphorm-labels-inside > .iphorm-element-spacer > label,
.landing-sideform .iphorm-element-wrap-textarea.iphorm-labels-inside > .iphorm-element-spacer > label,
.landing-sideform  .iphorm-element-wrap-password.iphorm-labels-inside > .iphorm-element-spacer > label,
.landing-sideform  .iphorm-element-wrap-captcha.iphorm-labels-inside > .iphorm-element-spacer > label{
	color:#475649!important;
	font-family: 'Open Sans', sans-serif;
}
.landing-sideform input[type="password"],
.landing-sideform .iphorm-elements .iphorm-element-wrap-text input,
.landing-sideform .iphorm-elements .iphorm-element-wrap-captcha input,
.landing-sideform .iphorm-elements .iphorm-element-wrap-password input,
.landing-sideform .iphorm-elements .iphorm-element-wrap select,
.landing-sideform .iphorm-elements .iphorm-element-wrap textarea{
	background:#fff;
	border: none;
}
.landing-sideform .iphorm-submit-wrap button.iphorm-submit-element{
	width:100%;
	background:#3b3b3b!important;
	font-family: 'Open Sans', sans-serif;
	font-weight:400;
}
.landing-sideform .iphorm-submit-wrap button.iphorm-submit-element:hover{
	opacity:1;
	transition:none;
}
.landing-sideform .iphorm-submit-input-wrap iphorm-submit-input-wrap-9{
	margin-top:-5px;
}
.landing-sideform input[type="password"],
.landing-sideform .iphorm-elements .iphorm-element-wrap-text input,
.landing-sideform .iphorm-elements .iphorm-element-wrap-captcha input,
.landing-sideform .iphorm-elements .iphorm-element-wrap-password input,
.landing-sideform .iphorm-elements .iphorm-element-wrap select,
.landing-sideform .iphorm-elements .iphorm-element-wrap textarea{
	color: #565050 !important;
}

.landing-sideform .iphorm-success-message {
    padding: 10px;
    line-height: 20px;
    margin: 10px 0;
    color: #ff0000;
}

/*
Media Queries
---------------------------------------------------------------------------------------------------- */

@media only screen and (max-width: 1200px){
	.caption-wrap .caption{
		top:-330px;
	}
	.caption-wrap .caption h1 {
    font-size: 32px;
	}
	.caption-wrap .caption h1 .green {
    font-size: 78px;
	}
}

@media only screen and (max-width: 1100px){
	.caption-wrap .caption{
		top:-305px;
	}
	.caption-wrap .caption h1 {
    font-size: 29px;
	}
	.caption-wrap .caption h1 .green {
    font-size: 73px;
	}
}

@media only screen and (max-width: 1000px){
	.caption-wrap .caption{
		top:-290px;
	}
	.caption-wrap .caption h1 {
    font-size: 27px;
	}
	.caption-wrap .caption h1 .green {
    font-size: 68px;
	}
}

@media only screen and (max-width: 960px){
	.landing-hero-banner .landing-hero-content h1{
	font-size:30px;
	}
	.landing-hero-banner .landing-hero-content .green{
		font-size:70px;
	}
	.landing-content-area{
		width:100%;
	}
	.right-sidebar {
    width: 300px;
	display: block;
    margin: 0 auto;
	}
}

@media only screen and (max-width: 900px){
	.caption-wrap .caption{
		top:-255px;
	}
	.caption-wrap .caption h1 {
    font-size: 23px;
	line-height: 45px;
	}
	.caption-wrap .caption h1 .green {
    font-size: 60px;
	}
}

@media only screen and (max-width: 820px){
	.landing-hero-banner .landing-hero-content .green{
		font-size:60px;
	}
}

@media only screen and (max-width: 800px){
	.caption-wrap .caption{
		top:-218px;
	}
	.caption-wrap .caption h1 {
    font-size: 18px;
	line-height: 36px;
	}
	.caption-wrap .caption h1 .green {
    font-size: 42px;
	}
}

@media only screen and (max-width: 700px){
	.landing-hero-banner .landing-hero-content h1{
	font-size:27px;
	}
	.landing-hero-banner .landing-hero-content .green{
		font-size:50px;
	}
}

@media only screen and (max-width: 650px){
	.caption-wrap .caption{
		top:-175px;
	}
	.caption-wrap .caption h1 {
    font-size: 16px;
	line-height: 28px;
	}
	.caption-wrap .caption h1 .green {
    font-size: 32px;
	}
}

@media only screen and (max-width: 600px){
	.landing-hero-banner .landing-hero-content h1{
	font-size:25px;
	margin-right:0px;
	}
	.landing-hero-banner .landing-hero-content .green{
		font-size:46px;
	}
}

@media only screen and (max-width: 570px) {
	.landing-header{
		height:155px;
	}
	.landing-title-area{
		float:none;
		width: 100%;
   		text-align: center;
    	display: block;
	}
	.landing-site-title a{
		width:100%;
		background-position: center;
	}
	.landing-header .landing-info {
    width: 100%;
    float: none;
    text-align: center;
    display: block;
	margin-top: 20px;
	}
}

@media only screen and (max-width: 500px){
	.caption-wrap .caption{
		top:-140px;
	}
	.caption-wrap .caption h1 {
    font-size: 13px;
	line-height: 23px;
	}
	.caption-wrap .caption h1 .green {
    font-size: 26px;
	}
}

@media only screen and (max-width: 430px){
	.caption-wrap .caption h1 .green {
    font-size: 24px;
	}
}

@media only screen and (max-width: 400px) {
	.landing-header {
    	height: 210px;
	}
	.landing-header .landing-info {
    	margin-top: 5px;
	}
	.landing-tel-icon{
		width: 100%;
    	text-align: center;
    	display: block;
		background-position: 30% 58%;
   		margin-bottom: 15px;
	}
	.landing-info .landing-button{
		text-align:center;
	}
	.landing-hero-banner .landing-hero-content .green{
		font-size:40px;
	}
	.landing-content-area h2 a, .landing-content-area h2{
		font-size:26px;
	}
	.right-sidebar {
    width: 280px;
	}
	.ex-fp{
		display:none;
	}
	.caption-wrap .caption{
		top:-130px;
		right:30px;
	}
	.caption-wrap .caption h1 {
    font-size: 12px;
	}
	.caption-wrap .caption h1 .green {
    font-size: 24px;
	}
}

@media only screen and (max-width: 350px) {
	.landing-tel-icon{
		background-position: 26% 58%;
	}
	.caption-wrap .caption{
		top:-120px;
		right:20px;
	}
}



</style>


</head>

<body>

<header class="landing-header" itemscope="" itemtype="http://schema.org/WPHeader">
<div class="landing-wrap">
<div class="landing-title-area">
<p class="landing-site-title" itemprop="headline"><a href="http://www.parcurology.com/">Parcurology</a></p>
<p class="landing-site-description" itemprop="description">Specializing in Hypospadias Surgery from infants to adults</p>
</div>
<div class="landing-info"><a class="landing-tel-icon" href="tel:214-618-4405" onclick="ga('send', 'event', { eventCategory: 'Click To Call', eventAction: 'Clicked Phone Number', eventLabel: 'Header'});">(214) 618-4405</a><a href="/contact-us/" class="landing-button">CONTACT US</a>
</div>
</div>
</header>

<div class="landing-hero-banner">
<img src="http://www.parcurology.com/wp-content/uploads/2017/03/landing-hero-image.jpg" alt="hero-banner" >
<div class="caption-wrap">
<div class="caption">
<h1>Specializing in<br> <span class="green">Hypospadias<br> Repair</span></h1>
</div>
</div>
</div> <!--Hero Section Closing-->
<div style="clear:both;"></div>
<div class="landing-main-content-area">
<div class="landing-wrap">
<div class="landing-content-area">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>
<?php endif; ?>

</div> <!--Content Closing-->

<div class="right-sidebar">

<div class="landing-sidenav">
<ul>
<li><a target="_blank" href="http://www.parcurology.com/conditions-we-treat/hypospadias-and-other-penile-problems/hypospadias-surgery/">About Hypospadias</a></li>
<li><a target="_blank" href="http://www.parcurology.com/about-us/">About Us</a></li>
<li><a target="_blank" href="http://www.parcurology.com/patient-type/out-of-town-patients/">Out of Town Patients</a></li>
</ul>
</div>

<div class="landing-sideform">
<?php if (function_exists('iphorm')) echo iphorm(9); ?>
</div>

</div> <!--Sidebar CLosing-->

</div> <!--Closing Wrap-->
</div> <!--Main Content wrapper-->

<footer class="landing-footer">
<div class="landing-wrap">
<div class="landing-add">
<p><a class="landing-tel-icon" href="tel:214-618-4405" onclick="ga('send', 'event', { eventCategory: 'Click To Call', eventAction: 'Clicked Phone Number', eventLabel: 'Header'});">(214) 618-4405</a><span class="format-pipe ex-fp">|</span>5680 Frisco Square Blvd, Ste. 2300, Frisco, TX 75034<span class="format-pipe">|</span>731 E. Southlake Blvd, Ste. 130, Southlake, TX 76092</p>
</div>

<div class="landing-copyright">
<p>Copyright &copy; <?php echo date("Y"); ?>  PARC Urology</p>
</div>
</div>
</footer> <!--Closing Footer-->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7X52C8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>

</html>