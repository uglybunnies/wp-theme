<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package SV-html5
 * @since SV-html5 0.1
 */

$pageTag = $post->post_name;
	if(is_single())
		$pageView="svsb";
	elseif(is_page() && $post->post_parent == '520')
		$pageView = "desProject";
	elseif(is_page() && $post->post_parent == '516')
		$pageView = "artProject";
	elseif(is_page() && $post->post_parent == '682')
		$pageView = "article";
	elseif(is_page() && $post->post_parent == '511')
		$pageView = "info";
	elseif(is_page())
		$pageView = $post->post_name;
	else
		$pageView = "svsb";

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script type="text/javascript">
	WebFontConfig = {
		google: { families: [ 'Arimo:400,700,400italic,700italic:latin', 'Prata::latin' ] }
	};
	(function() {
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		  '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})();
</script>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	// Add the blog name.
	bloginfo( 'name' );

	wp_title( '|', true, 'left' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'sv-html5' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta property="og:title" content=" <?php wp_title('',true,''); ?>">
<meta property="og:site_name" content="SerpentVenom">
<meta property="og:image" content="http://serpentvenom.com/assets/sv_logo.png">
<meta property="og:url" content="<?php the_permalink() ?>">
<meta property="fb:app_id" content="174338309260940">
<meta property="fb:admins" content="1121527952">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="/css/ieStyles.css">
    <![endif]-->
    <!--[if lt IE 8]>
    <link rel="stylesheet" href="/css/ie7Styles.css">
    <![endif]-->
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11112554-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body <?php body_class($pageView); ?>>
<div id="fb-root" data-send="true" data-width="450" data-show-faces="true"></div>
<script>
 window.fbAsyncInit = function() {
  FB.init({appId: '174338309260940', status: true, cookie: true, xfbml: true, channelUrl: 'http://serpentvenom.com/channel.html'});

};
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=174338309260940";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
	<header class="mast layout">
		<hgroup <?php if($pageTag != 'home'){ ?>class="col narrow layout"<?php } ?>>
        <h1 class="layout"><a href="/" class="ir logo">SerpentVenom</a></h1>
		<?php if ($pageTag == "home") : ?>
        <h2 class="s6">cynicism is the lens of reality</h2>
		<?php endif; ?>
    </hgroup><nav <?php if ($pageTag != 'home') {?> class="col wide layout" <?php } ?>>
        <ul class="navBar layout s5">
<?php wp_nav_menu(array('container' => false, 'depth' => 2, 'items_wrap' => '%3$s', 'theme_location' => 'GlobalNav')); ?>
		</ul>
    </nav>
</header>

<?php
if ($pageTag != 'home'){
	if ( is_tree('520') ) {
		include('designBC.php');
	} elseif ( is_tree('516') ) {
		include('artBC.php');
	} elseif ( is_tree('682') ) {
		include('articleBC.php');
	} elseif ( is_tree('511')){
		include('svBC.php');
	} else {
		include('bytesBC.php');
	}
 
}

?>
<!-- main section -->
<section class="main layout">
