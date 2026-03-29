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
<?php
/*
if (is_404()) : ?>
  <title>ページが見つかりませんでした | <?php bloginfo('name'); ?></title>
<?php else: ?>
  <title><?php bloginfo('name'); ?></title>
<?php endif;
*/
?>
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
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <?php if (is_front_page()): ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/works.css">
  <?php endif; ?>
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
<body <?php body_class('main-site'); ?>>
<!--[if gte IE 8]>
<p class="ta-center">古いブラウザで閲覧しています。ブラウザを最新の状態にしてご覧ください。</p>
<![endif]-->
<div class="wrapper" id="wrapper">
	<!-- start::Header -->
	<header class="site-header">
    <div class="container">
      <?php if (is_front_page()): ?>
      <h1 class="header-logo">
      <?php else: ?>
      <div class="header-logo">
      <?php endif; ?>
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="20.004" height="14.491" viewBox="0 0 20.004 14.491" aria-label="<?php bloginfo('name'); ?>">
            <path d="M62.731,98.135c-1.905.628-2.218,1.672-2.582,1.367s.123-1.24-.8-2.6c0,0-2.457,5.438-2.544,5.706,1.426-.227,1.392-.268,1.683-.115.463.242-.131,1.9.513,3.224l3.732-7.579Z" transform="translate(-52.578 -95.265)" fill="#fff"/>
            <path d="M20.571,85.7a3.7,3.7,0,1,0-5.034,1.411A3.685,3.685,0,0,0,20.571,85.7Z" transform="translate(-13.649 -80.204)" fill="#fff"/>
            <path d="M86.567,110.966a1.9,1.9,0,0,1,1.073-.568,5.985,5.985,0,0,0-7.47-3.889l-.159.052h0a5.967,5.967,0,0,0-3.785,7.417c.017.055.035.108.053.161a5.987,5.987,0,0,0,11.322.01,1.9,1.9,0,0,1-1.034-3.183Z" transform="translate(-69.857 -103.692)" fill="#fff"/>
            <path d="M196.58,148.973a1.911,1.911,0,0,0-1.626-.5c.006.016.011.031.016.048a5.93,5.93,0,0,1-.055,3.7,1.905,1.905,0,0,0,1.665-3.254Z" transform="translate(-177.171 -141.77)" fill="#fff"/>
          </svg>
        </a>
      <?php if (is_front_page()): ?>
      </h1>
      <?php else: ?>
      </div>
      <?php endif; ?>
      <nav class="site-navigation" id="site-navigation">
        <div class="site-navigation-inner">
          <ul class="site-navigation-list">
            <li class="nav-item">
              <a href="<?php echo esc_url(home_url('/')); ?>about_us/" class="nav-link">
              <span class="en">About</span>
              <span class="ja">会社概要</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo esc_url(home_url('/')); ?>about_us/more/" class="nav-link">
              <span class="en">Philosophy</span>
              <span class="ja">私たちの考え方</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo esc_url(home_url('/')); ?>solution/" class="nav-link">
                <span class="en">Solution</span>
                <span class="ja">ソリューション</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo esc_url(home_url('/')); ?>news/" class="nav-link">
                <span class="en">News</span>
                <span class="ja">ニュース</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo esc_url(home_url('/')); ?>sustainability/" class="nav-link">
                <span class="en">Sustainability</span>
                <span class="ja">持続可能性</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo esc_url(home_url('/')); ?>works/" class="nav-link">
                <span class="en">Works</span>
                <span class="ja">ワークス</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo esc_url(home_url('/')); ?>category/column/" class="nav-link">
                <span class="en">Column</span>
                <span class="ja">コラム</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo esc_url(home_url('/')); ?>recruit/" class="nav-link">
                <span class="en">Recruit</span>
                <span class="ja">採用情報</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo esc_url(home_url('/')); ?>download/" class="nav-link">
                <span class="en">Download</span>
                <span class="ja">資料ダウンロード</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://digital-eyes.jp/form/one-eighty/contact1" target="_blank" rel="noopener" class="nav-link">
                <span class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15.439" height="12.352" viewBox="0 0 15.439 12.352" aria-label="メールアイコン">
                    <path id="mail_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24" d="M81.544-787.648a1.487,1.487,0,0,1-1.09-.454,1.487,1.487,0,0,1-.454-1.09v-9.264a1.487,1.487,0,0,1,.454-1.09,1.487,1.487,0,0,1,1.09-.454H93.9a1.487,1.487,0,0,1,1.09.454,1.487,1.487,0,0,1,.454,1.09v9.264a1.487,1.487,0,0,1-.454,1.09,1.487,1.487,0,0,1-1.09.454Zm6.176-5.4-6.176-3.86v7.72H93.9v-7.72Zm0-1.544,6.176-3.86H81.544Zm-6.176-2.316v0Z" transform="translate(-80 800)"/>
                  </svg>
                </span>
                <span class="ja">お問い合わせ</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- end::Navigation -->
      <div class="navigation-toggle">
        <button type="button" id="navigation-toggle" class="navigation-toggle-button">
          <div></div>
          <div></div>
          <div></div>
        </button>
      </div>
    </div>
	</header>
	<!-- end::Header -->
  <nav class="toggle-navigation" id="toggle-navigation">
    <div class="toggle-navigation-inner">
      <ul class="toggle-navigation-list">
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link">
          <span class="en">Top</span>
          <span class="ja">トップ</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/')); ?>about_us/" class="nav-link">
          <span class="en">About</span>
          <span class="ja">会社概要</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/')); ?>about_us/more/" class="nav-link">
          <span class="en">Philosophy</span>
          <span class="ja">私たちの考え方</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/')); ?>solution/" class="nav-link">
            <span class="en">Solution</span>
            <span class="ja">ソリューション</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/')); ?>news/" class="nav-link">
            <span class="en">News</span>
            <span class="ja">ニュース</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/')); ?>sustainability/" class="nav-link">
            <span class="en">Sustainability</span>
            <span class="ja">持続可能性</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/')); ?>works/" class="nav-link">
            <span class="en">Works</span>
            <span class="ja">ワークス</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/')); ?>category/column/" class="nav-link">
            <span class="en">Column</span>
            <span class="ja">コラム</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/')); ?>recruit/" class="nav-link">
            <span class="en">Recruit</span>
            <span class="ja">採用情報</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/')); ?>download/" class="nav-link">
            <span class="en">Download</span>
            <span class="ja">資料ダウンロード</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://digital-eyes.jp/form/one-eighty/contact1" target="_blank" rel="noopener" class="nav-link">
            <span class="en">Contact</span>
            <span class="ja">お問い合わせ</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <?php
  $header_information_text = get_option('header_information_text');
  $header_information_link = get_option('header_information_link');

  if ($header_information_text) : ?>
  <div class="header-information">
    <p class="container">
    <?php echo nl2br($header_information_text); 
    if ($header_information_link) :
    ?>
      <a href="<?php echo esc_url($header_information_link); ?>">さらに詳しく</a>
    <?php endif; ?>
    </p>
  </div>
  <?php endif; ?>

	<!-- Main Start -->
	<main class="main<?php if(!is_front_page()) echo ' fadein';?>">
		<?php if(is_front_page()!=true && !is_page_template('page-service.php')): ?>
		<!-- ▼breadcrumb start -->
		<?php if(function_exists('bcn_display')) { ?>
		<div class="breadcrumbs">
			<div class="container">
				<div class="breadcrumbs-list"><?php bcn_display(); ?></div>
			</div>
		</div>
		<?php } ?>
		<!-- ▲breadcrumb　end -->
		<?php endif; ?>
		<?php if(is_page()): ?>

		<?php endif; ?>
