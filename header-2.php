<!DOCTYPE html>
<html lang="ja">
<?php if (is_front_page()): ?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
<?php else: ?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<?php endif; ?>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if (is_404()) : ?>
  <title>ページが見つかりませんでした | <?php bloginfo('name'); ?></title>
  <?php else: ?>
	<title><?php bloginfo('name'); ?></title>
  <?php endif; ?>
	<meta name="apple-mobile-web-app-title" content="デジタルマーケティング,ウェブシステム開発の株式会社ワンエイティ">
	<meta name="application-name" content="デジタルマーケティング,ウェブシステム開発の株式会社ワンエイティ">
	<meta name="theme-color" content="#ffffff">
	<!-- favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" href="/favicon.svg" sizes="any" type="image/svg+xml">
  <link rel="manifest" href="/manifest.json" />
	<meta name="apple-mobile-web-app-title" content="デジタルマーケティング,ウェブシステム開発の株式会社ワンエイティ">
	<meta name="application-name" content="デジタルマーケティング,ウェブシステム開発の株式会社ワンエイティ">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
	<!-- css -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Codystar:wght@300;400&family=IBM+Plex+Sans+JP:wght@300;400;500;600;700&family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css" />
	<!-- js -->
	<noscript>
	Javascriptの設定を有効にしてください。お使いのブラウザはJavaScriptをサポートしていないか、JavaScriptの設定が無効になっています。このサイトでは、JavaScriptを使用しています。すべての機能をご利用希望の方は、JavaScriptを有効にしてください。
	</noscript>
	<?php wp_head(); ?>
	<!-- Digital ONE -->
<img style='width:1px; height:1px; position: fixed; top:0; left:0;' src='#' class='js-replace-no-image'>
<script>
    var img = document.querySelector('img.js-replace-no-image');
    var src = '//__pl_12895_cname__/ac?c_id=17e62166fc8586dfa4d1bc0e1742c08b';
    var screenWidth = window.screen.width;
    var screenHeight = window.screen.height;
    var currentUrl = window.location.href;
    currentUrl = currentUrl.replace('&', '_pl_form_8123_');
    var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
	var domain = isSafari ? 'dms.o-eighty.jp' : 'dms-cp.com';
	src = src.replace('__pl_12895_cname__', domain);
    src = src + '&width=' + screenWidth + '&height=' + screenHeight + '&current_url=' + currentUrl;
    img.setAttribute('src', src);
</script>
<script src='https://dms-cp.com/public/js/iadtracker.js?code=17e62166fc8586dfa4d1bc0e1742c08b' id='iadtracker_script'></script>

<img style='width:1px; height:1px; position: fixed; top:0; left:0;' src='#' class='js-replace-no-image'>
<script>
var img = document.querySelector('img.js-replace-no-image');
var src = '//__pl_12895_cname__/ac?c_id=17e62166fc8586dfa4d1bc0e1742c08b';
var screenWidth = window.screen.width;
var screenHeight = window.screen.height;
var currentUrl = window.location.href;
currentUrl = currentUrl.replace('&', '_pl_form_8123_');
var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);
var domain = iOS && isSafari ? 'dms.o-eighty.jp' : 'dms-cp.com';
src = src.replace('__pl_12895_cname__', domain);
src = src + '&width=' + screenWidth + '&height=' + screenHeight + '&current_url=' + currentUrl;
img.setAttribute('src', src);

// load script files
var fullDomain = 'https://' + domain;

var iadtracker_script = document.createElement('script');
iadtracker_script.id = 'iadtracker_script';
iadtracker_script.src = fullDomain +'/public/js/iadtracker.js?code=17e62166fc8586dfa4d1bc0e1742c08b';

var external_client_tracker_script = document.createElement('script');
external_client_tracker_script.id = 'external_client_tracker_script';
external_client_tracker_script.src = fullDomain +'/public/js/external-client-tracker.js?code=17e62166fc8586dfa4d1bc0e1742c08b';

var fdbads_script = document.createElement('script');
fdbads_script.id = 'fdbads_script';
fdbads_script.src = fullDomain +'/public/js/fdbads.js?code=17e62166fc8586dfa4d1bc0e1742c08b';

document.head.appendChild(iadtracker_script);
document.head.appendChild(external_client_tracker_script);
</script>
</head>
<body <?php body_class('community-page'); ?>>
<header class="community-header">
  <div class="community-header-logo">
    <a href="<?php echo esc_url(home_url('/oe_community')); ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="52" height="15.135" viewBox="0 0 52 15.135">
        <g class="logo-body" transform="translate(-2447.703 -159.448)">
          <rect class="path-text" width="1.171" height="1.171" transform="translate(2478.861 173.347)" fill="#333"/>
          <path class="path-mark" d="M1403.766,358.476c-1.983.654-2.308,1.74-2.687,1.423s.128-1.29-.836-2.709c0,0-2.557,5.66-2.648,5.938,1.484-.236,1.449-.279,1.752-.12.482.252-.136,1.981.534,3.355l3.884-7.887Z" transform="translate(1085.685 -196.041)" fill="#f02680"/>
          <path class="path-mark" d="M1278.584,314.076a3.846,3.846,0,1,0-5.239,1.468,3.835,3.835,0,0,0,5.239-1.468" transform="translate(1207.505 -148.909)" fill="#f02680"/>
          <path class="path-mark" d="M1464.673,389.429a1.973,1.973,0,0,1,1.116-.591,6.228,6.228,0,0,0-7.773-4.047l-.166.054h0a6.21,6.21,0,0,0-3.939,7.719c.017.057.036.112.055.168a6.231,6.231,0,0,0,11.783.01,1.981,1.981,0,0,1-1.076-3.312" transform="translate(1031.602 -222.411)" fill="#f02680"/>
          <path class="path-mark" d="M1803.33,508.527a1.988,1.988,0,0,0-1.692-.517c.006.016.011.033.016.05a6.172,6.172,0,0,1-.057,3.853,1.983,1.983,0,0,0,1.733-3.386" transform="translate(695.754 -341.583)" fill="#f02680"/>
          <rect class="path-text" width="7.545" height="0.716" transform="translate(2468.518 168.923)" fill="#333"/>
          <path class="path-text" d="M977.74,463.475a3.771,3.771,0,0,1-3.771-3.762V457.19a3.771,3.771,0,0,1,7.542,0v1.348h-.7v-1.348a3.067,3.067,0,0,0-6.133,0v2.523a3.067,3.067,0,0,0,3.067,3.06h4.4v.7h-4.4Z" transform="translate(1494.558 -288.928)" fill="#333"/>
          <path class="path-text" d="M682.428,463.414h-.7l0-6.223a3.064,3.064,0,0,0-3.068-3.061,3.068,3.068,0,0,0-3.068,3.061v6.224h-.7v-6.224a3.773,3.773,0,0,1,6.439-2.661,3.733,3.733,0,0,1,1.1,2.661l0,6.223Z" transform="translate(1783.223 -288.928)" fill="#333"/>
          <path class="path-text" d="M383.593,605.582h-.7l0,1.019a3.064,3.064,0,0,1-3.068,3.061,3.068,3.068,0,0,1-3.068-3.061v-1.02h-.7v1.02a3.773,3.773,0,0,0,6.439,2.661,3.734,3.734,0,0,0,1.1-2.661l0-1.019Z" transform="translate(2071.651 -435.782)" fill="#333"/>
          <path class="path-text" d="M383.593,459.251h-.7l0-2.06a3.064,3.064,0,0,0-3.068-3.061,3.068,3.068,0,0,0-3.068,3.061v2.061h-.7v-2.061a3.773,3.773,0,0,1,6.439-2.66,3.734,3.734,0,0,1,1.1,2.661l0,2.06Z" transform="translate(2071.651 -288.928)" fill="#333"/>
        </g>
      </svg>
      <span class="logo-text">さぁ、働こう。</span>
    </a>
  </div>
  <div class="community-header-right">
    <div class="community-header-login-area">
      <?php if( is_user_logged_in() ) :
        $user_id = get_current_user_id();
      ?>
      <div class="post-link">
        <a href="<?php echo esc_url(admin_url()); ?>/edit.php?post_type=oe_community" class="btn">投稿</a>
      </div>
      <div class="login-user">
      <a href="<?php echo esc_url(home_url('/staff')); ?>/profile"><?php echo get_avatar( $user_id, 80 ); ?></a>
      </div>
      <?php else: ?>
      <div class="login-text"><?php echo sprintf( __( '<a href="%s">ログイン</a>' ), wp_login_url( get_current_page_url() ) ); ?></div>
      <?php endif; ?>
    </div>
    <div class="community-header-btn">
      <button type="button" class="menu-toggle-btn">
        <span class="dot dot-1"></span>
        <span class="dot dot-2"></span>
        <span class="dot dot-3"></span>
      </button>
    </div>
  </div>
</header>
<div class="community-toggle-menu">
  <div class="community-toggle-menu-container">
    <div class="community-toggle-menu-header">
      <div class="community-toggle-menu-logo">
        <a href="<?php echo esc_url(home_url('/oe_community')); ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="52" height="15.135" viewBox="0 0 52 15.135">
            <g class="logo-body" transform="translate(-2447.703 -159.448)">
              <rect class="path-text" width="1.171" height="1.171" transform="translate(2478.861 173.347)" fill="#333"/>
              <path class="path-mark" d="M1403.766,358.476c-1.983.654-2.308,1.74-2.687,1.423s.128-1.29-.836-2.709c0,0-2.557,5.66-2.648,5.938,1.484-.236,1.449-.279,1.752-.12.482.252-.136,1.981.534,3.355l3.884-7.887Z" transform="translate(1085.685 -196.041)" fill="#f02680"/>
              <path class="path-mark" d="M1278.584,314.076a3.846,3.846,0,1,0-5.239,1.468,3.835,3.835,0,0,0,5.239-1.468" transform="translate(1207.505 -148.909)" fill="#f02680"/>
              <path class="path-mark" d="M1464.673,389.429a1.973,1.973,0,0,1,1.116-.591,6.228,6.228,0,0,0-7.773-4.047l-.166.054h0a6.21,6.21,0,0,0-3.939,7.719c.017.057.036.112.055.168a6.231,6.231,0,0,0,11.783.01,1.981,1.981,0,0,1-1.076-3.312" transform="translate(1031.602 -222.411)" fill="#f02680"/>
              <path class="path-mark" d="M1803.33,508.527a1.988,1.988,0,0,0-1.692-.517c.006.016.011.033.016.05a6.172,6.172,0,0,1-.057,3.853,1.983,1.983,0,0,0,1.733-3.386" transform="translate(695.754 -341.583)" fill="#f02680"/>
              <rect class="path-text" width="7.545" height="0.716" transform="translate(2468.518 168.923)" fill="#333"/>
              <path class="path-text" d="M977.74,463.475a3.771,3.771,0,0,1-3.771-3.762V457.19a3.771,3.771,0,0,1,7.542,0v1.348h-.7v-1.348a3.067,3.067,0,0,0-6.133,0v2.523a3.067,3.067,0,0,0,3.067,3.06h4.4v.7h-4.4Z" transform="translate(1494.558 -288.928)" fill="#333"/>
              <path class="path-text" d="M682.428,463.414h-.7l0-6.223a3.064,3.064,0,0,0-3.068-3.061,3.068,3.068,0,0,0-3.068,3.061v6.224h-.7v-6.224a3.773,3.773,0,0,1,6.439-2.661,3.733,3.733,0,0,1,1.1,2.661l0,6.223Z" transform="translate(1783.223 -288.928)" fill="#333"/>
              <path class="path-text" d="M383.593,605.582h-.7l0,1.019a3.064,3.064,0,0,1-3.068,3.061,3.068,3.068,0,0,1-3.068-3.061v-1.02h-.7v1.02a3.773,3.773,0,0,0,6.439,2.661,3.734,3.734,0,0,0,1.1-2.661l0-1.019Z" transform="translate(2071.651 -435.782)" fill="#333"/>
              <path class="path-text" d="M383.593,459.251h-.7l0-2.06a3.064,3.064,0,0,0-3.068-3.061,3.068,3.068,0,0,0-3.068,3.061v2.061h-.7v-2.061a3.773,3.773,0,0,1,6.439-2.66,3.734,3.734,0,0,1,1.1,2.661l0,2.06Z" transform="translate(2071.651 -288.928)" fill="#333"/>
            </g>
          </svg>
          <span class="logo-text">さぁ、働こう。</span>
        </a>
      </div>
      <div class="community-toggle-menu-close">
        <button type="button" class="menu-close-btn"></button>
      </div>
    </div>
    <div class="community-toggle-menu-login-area">
      <?php if( is_user_logged_in() ) :
        $user_id = get_current_user_id();
      ?>
      <div class="login-user">
        <a href="<?php echo esc_url(home_url('/staff')); ?>/profile"><?php echo get_avatar( $user_id, 80 ); ?></a>
        <div class="user-name">ようこそ！ <br><a href="<?php echo esc_url(home_url('/staff')); ?>/profile"><?php echo get_user_meta($user_id, 'nickname', true); ?></a> さん</div>
      </div>
      <div class="logout">
      <?php echo do_shortcode('[logout_button]'); ?>
      </div>
      <?php else: ?>
      <div class="login-text">こちらより<?php echo sprintf( __( '<a href="%s">ログイン</a>' ), wp_login_url( get_current_page_url() ) ); ?>してください。</div>
      <?php endif; ?>
    </div>
    <nav class="community-toggle-menu-nav">
      <ul class="nav-list">
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/oe_community')); ?>" class="nav-link">
            <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_bell.svg" alt="Icon bell" width="28" height="28"></i>
            <span class="text">新着記事</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/oe_community_ranking')); ?>" class="nav-link">
            <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_flag.svg" alt="Icon flag" width="28" height="28"></i>
            <span class="text">人気記事</span>
          </a>
        </li>
        <li class="nav-ac">
          <button type="button" class="nav-ac-btn active">
            <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_team.svg" alt="Icon team" width="28" height="28"></i>
            <span class="text">各チーム</span>
          </button>
          <?php
          $terms = get_terms(
            array(
            'taxonomy' => 'team',
            'hide_empty' => 0,
            'orderby' => 'id')
          );
          if($terms): ?>
          <ul class="nav-ac-content nav-child-list">
            <?php foreach($terms as $term): ?>
              <li class="nav-child-item">
                <a href="<?php echo esc_url(home_url('/oe_community')).'/team/'.$term->slug; ?>" class="nav-child-link"><?php echo $term->name; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </li>
        <li class="nav-item">
          <a href="https://oe.edbase.jp" target="_blank" class="nav-link">
            <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_monitor.svg" alt="Icon monitor" width="28" height="28"></i>
            <span class="text">OEトレーニング</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/staff')); ?>" class="nav-link">
            <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_staff.svg" alt="Icon staff" width="28" height="28"></i>
            <span class="text">スタッフ</span>
          </a>
        </li>
      </ul>
      <ul class="tool-list">
        <li>
          <a href="https://drive.google.com/file/d/1J7C61Z4fKBbbVyFkwezR11-FvY_jjx7G/view" target="_blank">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_slack.png" alt="slack" width="60" height="60">
          </a>
        </li>
        <li>
          <a href="https://drive.google.com/file/d/1icsoKlIdHKbZ1dMZ9XfdmOXH9mvN3KTq/view" target="_blank">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_backlog.png" alt="backlog" width="60" height="60">
          </a>
        </li>
        <li>
          <a href="https://drive.google.com/file/d/1LQMYpSD-mDZtdVIqhBfnECg_XD5jlEPT/view" target="_blank">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_jobcan.png" alt="jobcan" width="60" height="60">
          </a>
        </li>
        <li>
          <a href="https://drive.google.com/file/d/1HE684aTg9qr_e88yYSsjso5bZnBsVkPp/view" target="_blank">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_borad.png" alt="borad" width="60" height="60">
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="content-panels">
<?php get_sidebar('2'); ?>
<div class="right-panel">
<div class="community-login-area">
  <?php if( is_user_logged_in() ) :
    $user_id = get_current_user_id();
  ?>
  <div class="login-user">
    <a href="<?php echo esc_url(home_url('/staff')); ?>/profile"><?php echo get_avatar( $user_id, 80 ); ?></a>
    <div class="user-name">ようこそ！ <br><a href="<?php echo esc_url(home_url('/staff')); ?>/profile"><?php echo get_user_meta($user_id, 'nickname', true); ?></a> さん</div>
  </div>
  <div class="login-control">
    <div class="logout">
      <?php echo do_shortcode('[logout_button]'); ?>
    </div>
    <div class="post-link">
      <a href="<?php echo esc_url(admin_url()); ?>edit.php?post_type=oe_community" class="btn" target="_blank">新規記事の投稿</a>
    </div>
  </div>
  <?php else: ?>
  <div class="login-text">こちらより<?php echo sprintf( __( '<a href="%s">ログイン</a>' ), wp_login_url( get_current_page_url() ) ); ?>してください。</div>
  <?php endif; ?>
</div>
<?php
if( !is_user_logged_in() ): ?>
<div class="community-container">
  <div class="rounded bg-white ta-center" style="padding:24px">このページを閲覧するには<?php echo sprintf( __( '<a href="%s" class="fc-primary fw-bold hover-text-underline">ログイン</a>' ), wp_login_url( get_current_page_url() ) ); ?>が必要です。</div>
<?php endif; ?>