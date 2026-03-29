<?php

//アイキャッチを有効にする
add_theme_support('post-thumbnails');
set_post_thumbnail_size();
add_image_size( 'post-thumbnail', 640, 480, true );

// <style>img:is([sizes="auto"])...</style>の出力を削除
remove_action( 'wp_head', 'wp_print_auto_sizes_contain_css_fix', 1 );

if (function_exists('register_sidebar')) {
 register_sidebar(array(
 'name' => 'サイドバー',
 'id' => 'sidebar'
 ));
}

// カスタムメニューを有効
register_nav_menu('menu', 'メニュー');

//画像をPタグで囲まない
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');


//テンプレート・ディレクトリへのパス:ショートコード
add_shortcode('tp', 'shortcode_tp');
function shortcode_tp() {
    return get_template_directory_uri();
}

//サイトURL:ショートコード
add_shortcode('url', 'shortcode_url');
function shortcode_url() {
    return get_bloginfo('url');
}

//サイトURL:ショートコード
add_shortcode('option', 'shortcode_option');
function shortcode_option($atts) {
  extract( shortcode_atts( array(
          'name' => ''
          ), $atts ));
  $ob = nl2br(get_option($name));
  return $ob;
}

 // 同梱のJQueryを読み込ませない
function register_jquery() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), NULL, false); //Google CDNのJQueryの登録
    wp_enqueue_script('jquery'); //登録したJQueryをフックさせる
}
add_action('wp_enqueue_scripts', 'register_jquery'); //実際のフック


// オートフォーマット関連の無効化
add_action('init', function() {
	remove_filter('the_title', 'wptexturize');
	remove_filter('the_content', 'wptexturize');
	remove_filter('the_excerpt', 'wptexturize');
	remove_filter('the_title', 'wpautop');
	remove_filter('the_content', 'wpautop');
	remove_filter('the_excerpt', 'wpautop');
	remove_filter('the_editor_content', 'wp_richedit_pre');
});

// オートフォーマット関連の無効化 TinyMCE
add_filter('tiny_mce_before_init', function($init) {
	$init['wpautop'] = false;
	$init['apply_source_formatting'] = true;
	return $init;
});


// phpファイルの読み込みショートコード
function include_custom_php($params = array()) {
    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));
    ob_start();
    include(get_theme_root() . '/' . get_template() . "/$file.php");
    return ob_get_clean();
}
add_shortcode('include_php', 'include_custom_php');

//タクソノミーの順序
function terms($a, $b){
  if ( intval($a->term_order) == intval($b->term_order)) {
      return 0;
  }
  return (intval($a->term_order) < intval($b->term_order)) ? -1 : 1;
}
function terms_sort($terms, $object_ids, $taxonomies, $args){
  if(!is_admin()){
    usort($terms , "terms");
  }
  return $terms;
}
add_filter('wp_get_object_terms','terms_sort',99,4);

//カテゴリーの順序
function categories($a, $b){
  if ( intval($a->order) == intval($b->order)) {
      return 0;
  }
  return (intval($a->order) < intval($b->order)) ? -1 : 1;
}
function categories_sort($categories, $object_ids, $args){
  if(!is_admin()){
    usort($categories , "categories");
  }
  return $categories;
}
add_filter('get_categories','categories_sort',99,4);

function theYearList($taxsonomy, $format = 'html'){
    $year_list = wp_get_archives(array(
        'type' => 'yearly',
        'format' => $format,
        'post_type' => $taxsonomy,
        'show_post_count' => false,
        'echo' => 0
    ));

    // 生成コードに対してstr_replaceで年をつける
    if($format == 'html'){
        $year_list = str_replace("</a>", "年</a>", $year_list);
    }

    echo $year_list;
}


// style.css
function twpp_enqueue_styles() {
  wp_enqueue_style( 'main-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'twpp_enqueue_styles' );

// style.css version
function default_style_version( $styles ) {
 $version = filemtime( get_template_directory() . '/style.css' );
 $styles->default_version = $version;
}
add_action( 'wp_default_styles', 'default_style_version' );

// 概要（抜粋）の文字数
function my_excerpt_length() {
    return 140;
}
add_filter('excerpt_mblength', 'my_excerpt_length');

// 概要（抜粋）の省略文字
function my_excerpt_more($more) {
	return '';
}
add_filter('excerpt_more', 'my_excerpt_more');

// 文字数加工抜粋関数
function custom_the_excerpt($number = 50) {
  $content = get_the_content();
  $content = wp_strip_all_tags( $content );
  echo mb_substr($content, 0, $number);
  if(mb_strlen($content) > $number) echo ' ...';
}

// ループ回数
function loopNumber(){
  global $wp_query;
return $wp_query->current_post+1;
}
// ループの最初
function isFirst() {
global $wp_query;
  return ($wp_query->current_post === 0);
}
// ループの最期
function isLast() {
  global $wp_query;
  return ($wp_query->current_post+1 === $wp_query->post_count);
}

// アーカイブの投稿数をaタグの中に入れる
function wp_list_categories_archives( $output ) {
$output = str_replace(" ", " ", $output);
$output = preg_replace('/<\/a> \(([0-9]*)\)/', ' (${1})</a>', $output);
return $output;
}
add_filter( 'wp_list_categories', 'wp_list_categories_archives', 10, 2 );
add_filter( 'get_archives_link', 'wp_list_categories_archives', 10, 2 );

// カスタム投稿別表示数
function custom_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() )
      return;
    if ( $query->is_post_type_archive(array('download')) ) {
      $query->set( 'posts_per_page', '-1' );
    }
    if ( $query->is_post_type_archive(array('works')) ) {
      $query->set( 'posts_per_page', '18' );
    }
    if ( $query->is_post_type_archive(array('oe_community')) ) {
      $query->set( 'posts_per_page', '12' );
    }
    if ( $query->is_tax('project') ) {
      $query->set( 'posts_per_page', '18' );
    }
    if ( $query->is_tax(array('team','community_tag')) ) {
      $query->set( 'posts_per_page', '12' );
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );


// 親ページのスラッグ取得
function is_parent_slug() {
  global $post;
  if ($post->post_parent) {
    $post_data = get_post($post->post_parent);
    return $post_data->post_name;
  }
}
remove_filter('template_redirect', 'redirect_canonical');

// 管理画面以外でツールバーを非表示にする
add_filter('show_admin_bar', 'disable_admin_bar_on_front_end');

function disable_admin_bar_on_front_end($show) {
  // 管理画面ではない場合はツールバーを非表示にする
  if (!is_admin()) {
      return false; // ツールバーを非表示
  }
  return $show; // 管理画面の場合は元の設定を維持
}

// 現在のURLを取得
function get_current_page_url() {
  $url  = is_ssl() ? 'https://' : 'http://';
  $url .= $_SERVER['HTTP_HOST'];
  $url .= $_SERVER['REQUEST_URI'];
  return $url;
}

// ショートコードでログアウトボタンを作成
function custom_logout_button() {
  return '<a href="' . wp_logout_url(home_url('/oe_community')) . '">ログアウト</a>';
}
add_shortcode('logout_button', 'custom_logout_button');

// カスタムログアウトURLを作成
function custom_logout_redirect() {
  // 指定したURLにリダイレクト
  wp_redirect(home_url('/oe_community'));
  exit();
}
add_action('wp_logout', 'custom_logout_redirect');

// 人気記事
// ビュー数をカウントする関数
function set_post_views($post_id) {
  $count_key = 'post_views_count';
  $count = get_post_meta($post_id, $count_key, true);

  if ($count == '') {
      $count = 0;
      delete_post_meta($post_id, $count_key);
      add_post_meta($post_id, $count_key, '0');
  } else {
      $count++;
      update_post_meta($post_id, $count_key, $count);
  }
}

// 投稿が読み込まれた際にカウントを増やす
function track_post_views($post_id) {
  if (!session_id()) {
    session_start();
  }

  // セッションにこの投稿のIDが保存されているかチェック
  if (isset($_SESSION['viewed_posts']) && in_array($post_id, $_SESSION['viewed_posts'])) {
    return;  // すでにカウントされている場合は何もしない
  }

  if (!is_single()) return;  // 単一記事ページでない場合はスキップ
  if (empty($post_id)) $post_id = get_the_ID();  // 投稿IDを取得

  if ('oe_community' === get_post_type($post_id)) {
    set_post_views($post_id);  // ビュー数をセット

    // タクソノミーのスラッグを指定
    $taxonomy = 'community_tag';
    $terms = get_the_terms($post_id, $taxonomy);

    if ($terms && !is_wp_error($terms)) {
      foreach ($terms as $term) {
        increment_taxonomy_view_count($term->term_id);
      }
    }
  }

  // 投稿IDをセッションに追加
  $_SESSION['viewed_posts'][] = $post_id;
}
add_action('wp_head', 'track_post_views');

// ビュー数を取得する関数
function get_post_views($post_id) {
  $count_key = 'post_views_count';
  $count = get_post_meta($post_id, $count_key, true);

  if ($count == '') {
      delete_post_meta($post_id, $count_key);
      add_post_meta($post_id, $count_key, '0');
      return "0 Views";
  }

  return $count . ' Views';
}

// ビュー数のカラムを投稿一覧に追加
function add_views_column($columns) {
  $columns['post_views'] = 'ビュー数';
  return $columns;
}
add_filter('manage_oe_community_posts_columns', 'add_views_column'); // カスタム投稿タイプ 'oe_community' の場合

// カラムに表示するビュー数を出力
function display_views_column($column, $post_id) {
  if ($column === 'post_views') {
      $views = get_post_meta($post_id, 'post_views_count', true);
      echo $views ? $views : '0';
  }
}
add_action('manage_oe_community_posts_custom_column', 'display_views_column', 10, 2); // カスタム投稿タイプ 'oe_community' の場合

// タクソノミーの表示回数をカウントする関数
function increment_taxonomy_view_count($term_id) {
  $count_key = 'post_views_count';
  $count = get_term_meta($term_id, $count_key, true);

  if ($count == '') {
    $count = 0;
    delete_term_meta($term_id, $count_key);
    add_term_meta($term_id, $count_key, '0');
  } else {
    $count++;
    update_term_meta($term_id, $count_key, $count);
  }

}

// タクソノミーの一覧にカスタム列を追加
function add_taxonomy_view_count_column($columns) {
  $columns['post_views'] = 'ビュー数'; // 列のヘッダー名を指定
  return $columns;
}
add_filter('manage_edit-community_tag_columns', 'add_taxonomy_view_count_column');

// 表示回数のデータを表示
function show_taxonomy_view_count_column($content, $column_name, $term_id) {
  if ($column_name === 'post_views') {
      $view_count = get_term_meta($term_id, 'post_views_count', true);
      $content = $view_count ? esc_html($view_count) : '0'; // 表示回数を表示
  }
  return $content;
}
add_filter('manage_community_tag_custom_column', 'show_taxonomy_view_count_column', 10, 3);


// カスタムリライトルール
function custom_taxonomy_rewrite_rule() {
  // ページ送りに対応させるリライトルール
  add_rewrite_rule(
    '^oe_community/team/([^/]+)/page/([0-9]{1,})/?$', // ページ番号付き
    'index.php?team=$matches[1]&paged=$matches[2]',  // `paged` クエリ変数をセット
    'top'
  );

  // 通常のリライトルール
  add_rewrite_rule(
    '^oe_community/team/([^/]+)/?', // ページ送りなし
    'index.php?team=$matches[1]', 
    'top'
  );

  // ページ送りに対応させるリライトルール
  add_rewrite_rule(
    '^oe_community/tag/([^/]+)/page/([0-9]{1,})/?$', // ページ番号付き
    'index.php?community_tag=$matches[1]&paged=$matches[2]',  // `paged` クエリ変数をセット
    'top'
  );

  // 通常のリライトルール
  add_rewrite_rule(
    '^oe_community/tag/([^/]+)/?', // ページ送りなし
    'index.php?community_tag=$matches[1]', 
    'top'
  );
}
add_action('init', 'custom_taxonomy_rewrite_rule');


// getの値を追加
function add_query_vars_filter( $vars ){
  $vars[] = "keyword";
  $vars[] = "author_id";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );


// アーカイブページにクエリを追加
function add_archive_custom_query( $query ) {
  if ( !is_admin() && $query->is_main_query() && is_post_type_archive('oe_community') ) {

    // GETの引数を取得
    $get_s = isset($_GET['keyword']) ? sanitize_text_field($_GET['keyword']) : '';
    
    // 全文検索
    if(!empty($get_s)) {
      $query->set('s', $get_s);
    }

    // authorパラメータの取得
    $get_author = isset($_GET['author_id']) ? absint($_GET['author_id']) : 0;
    if($get_author > 0) {
      $query->set('author', $get_author);
    }

    // meta_query を追加
    $meta_query = array(
      'relation' => 'AND'
    );

    // 例: 特定のメタキーでフィルタリング
    if (!empty($_GET['meta_value'])) {
        $meta_value = sanitize_text_field($_GET['meta_value']);
        $meta_query[] = array(
            'key' => 'your_meta_key',
            'value' => $meta_value,
            'compare' => '='
        );
    }

    // meta_query が空でない場合に設定
    if (count($meta_query) > 1) { // 'relation'のために1つ以上の条件が必要
      $query->set('meta_query', $meta_query);
    }
  }
}
add_action( 'pre_get_posts', 'add_archive_custom_query' );

// 投稿が公開された時に全ユーザーにメールを送信
// function notify_users_on_new_post($new_status, $old_status, $post) {
//   // 投稿タイプが「oe_community」でない場合は何もしない
//   if ($post->post_type != 'oe_community') {
//       return;
//   }

//   // 投稿が公開された時のみ実行
//   if ($old_status != 'publish' && $new_status == 'publish') {
//       // 全ユーザーを取得
//       $users = get_users(
//         array(
//           'role__in' => array('subscriber', 'editor', 'administrator', 'author', 'contributor'),
//           'meta_query' => array(array(
//             'key' => 'reject_mail',
//             'value' => '1',
//             'compare' => '!='
//           )),
//         )
//       );

//       // メールのタイトルと本文を準備
//       $subject = '新しい投稿のお知らせ: ' . $post->post_title;
//       $message = '新しい投稿が公開されました: ' . get_permalink($post->ID);

//       // メールのヘッダー（送信元アドレスなど）
//       $headers = array('Content-Type: text/plain; charset=UTF-8');
//       $from_email = 'noreply@o-eighty.jp';
//       $headers[] = 'From: ' . get_bloginfo('name') . ' <' . $from_email . '>';

//       // 各ユーザーにメールを送信
//       foreach ($users as $user) {
//           wp_mail($user->user_email, $subject, $message, $headers);
//       }
//   }
// }
// add_action('transition_post_status', 'notify_users_on_new_post', 10, 3);


// // カスタム投稿タイプのコメントに対してのみ通知を送信
// function notify_users_on_custom_post_comment($comment_id, $comment_object) {
//   // コメントが承認された場合のみ通知
//   if ($comment_object->comment_approved != 1) {
//       return;
//   }

//   // コメントが付けられた投稿のIDを取得
//   $post_id = $comment_object->comment_post_ID;
  
//   // 投稿タイプを取得
//   $post_type = get_post_type($post_id);

//   // 特定のカスタム投稿タイプ oe_community の場合のみ通知
//   if ($post_type === 'oe_community') {
//       // 全ユーザーを取得（管理者やサブスクライバー等）
//       $users = get_users(
//         array(
//           'role__in' => array('subscriber', 'editor', 'administrator', 'author', 'contributor'),
//           'meta_query' => array(array(
//             'key' => 'reject_mail',
//             'value' => '1',
//             'compare' => '!='
//           )),
//         )
//       );

//       // メールのタイトルと本文を準備
//       $subject = '新しいコメントが投稿されました: ' . get_the_title($post_id);
//       $message = '新しいコメントが以下の投稿に追加されました: ' . get_permalink($post_id) . "\n\n";
//       $message .= 'コメント内容: ' . $comment_object->comment_content;

//       // メールのヘッダー（送信元アドレスなど）
//       $headers = array('Content-Type: text/plain; charset=UTF-8');
//       $from_email = 'noreply@o-eighty.jp';
//       $headers[] = 'From: ' . get_bloginfo('name') . ' <' . $from_email . '>';

//       // 各ユーザーにメールを送信
//       foreach ($users as $user) {
//         wp_mail($user->user_email, $subject, $message, $headers);
//       }
//   }
// }
// add_action('wp_insert_comment', 'notify_users_on_custom_post_comment', 10, 2);


// 新しいカスタム投稿が公開されたときにSlackに通知を送信
function notify_slack_on_custom_post_status_change($new_status, $old_status, $post) {
  // 投稿タイプが 'oe_community' で、公開状態に変わった場合にのみ通知を送信
  if ($post->post_type !== 'oe_community' || $new_status !== 'publish' || $old_status === 'publish' || $_SERVER['HTTP_HOST'] !== 'o-eighty.jp') {
      return;
  }

  // Webhook URL（Slackから取得したものに置き換え）
  $webhook_url = 'https://hooks.slack.com/services/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';

  // 投稿のタイトルとURLを取得
  $post_title = get_the_title($post->ID);
  $post_url = get_permalink($post->ID);
  $post_excerpt = wp_trim_words($post->post_content, 100, '...');

  // メッセージを構築
  $message = array(
      'text' => "新しい投稿: <$post_url|$post_title>\n抜粋: $post_excerpt"
  );

  // JSON形式にエンコード
  $payload = json_encode($message);

  // cURLでSlackに通知を送信
  $ch = curl_init($webhook_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
  $response = curl_exec($ch);
  curl_close($ch);
}
add_action('transition_post_status', 'notify_slack_on_custom_post_status_change', 10, 3);

//コメント投稿時にSlackに通知を送信
function notify_slack_on_comment_post($comment_id, $comment_approved, $commentdata) {
  // ドメインが 'o-eighty.jp' でない場合は処理を終了
  if ($_SERVER['HTTP_HOST'] !== 'o-eighty.jp') {
    return;
  }

  // コメントが承認された場合のみ通知を送信
  if ($comment_approved != 1) {
      return;
  }

  $post_id = $commentdata['comment_post_ID'];

  // 投稿タイプが 'oe_community' でない場合は終了
  if (get_post_type($post_id) !== 'oe_community') {
    return;
  }

  // Webhook URL（Slackから取得したものに置き換え）
  $webhook_url = 'https://hooks.slack.com/services/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';

  // コメントデータを取得
  $comment_author = $commentdata['comment_author'];
  $comment_content = $commentdata['comment_content'];

  // コメント内容を最大100文字に制限し、末尾に「...」を追加
  $comment_content = mb_strlen($comment_content) > 100 ? mb_substr($comment_content, 0, 100) . '...' : $comment_content;
  
  $post_id = $commentdata['comment_post_ID'];
  $post_title = get_the_title($post_id);
  $post_url = get_permalink($post_id);

  // メッセージを構築
  $message = array(
      'text' => "新しいコメントが投稿されました:\n" .
                "投稿: <$post_url|$post_title>\n" .
                "コメント者: $comment_author\n" .
                "コメント内容: $comment_content"
  );

  // JSON形式にエンコード
  $payload = json_encode($message);

  // cURLでSlackに通知を送信
  $ch = curl_init($webhook_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
  $response = curl_exec($ch);
  curl_close($ch);
}
add_action('wp_insert_comment', 'notify_slack_on_comment_post', 10, 3);

// 新しい投稿の公開時に通知をスケジュール
function schedule_notify_users_on_new_post($new_status, $old_status, $post) {
  // 投稿タイプが「oe_community」以外なら何もしない
  if ($post->post_type != 'oe_community') {
      return;
  }

  // 投稿が公開された時のみ実行
  if ($old_status != 'publish' && $new_status == 'publish') {
      // 投稿が公開されたら、通知イベントをスケジュール
      wp_schedule_single_event(time() + 60, 'send_new_post_notifications', array($post->ID, 0)); // 開始インデックスを0に設定
  }
}
add_action('transition_post_status', 'schedule_notify_users_on_new_post', 10, 3);

// 分割メール送信
function send_new_post_notifications($post_id, $offset) {
  // 各バッチで処理するユーザー数を定義
  $batch_size = 10;

  // 投稿情報を取得
  $post = get_post($post_id);

  // メールのタイトルと本文を準備
  $subject = '新しい投稿のお知らせ: ' . get_the_title($post_id);
  $message = '新しい投稿が公開されました: ' . get_permalink($post_id);
  
  // メールのヘッダー（送信元アドレスなど）
  $headers = array('Content-Type: text/plain; charset=UTF-8');
  $from_email = 'noreply@o-eighty.jp';
  $headers[] = 'From: ' . get_bloginfo('name') . ' <' . $from_email . '>';

  // ユーザーを取得
  $users = get_users(array(
      'role__in' => array('subscriber', 'editor', 'administrator', 'author', 'contributor'),
      'meta_query' => array(
          array(
              'key' => 'reject_mail',
              'value' => '1',
              'compare' => '!='
          ),
      ),
      'number' => $batch_size,
      'offset' => $offset,
  ));

  // ユーザーごとにメールを送信
  foreach ($users as $user) {
      wp_mail($user->user_email, $subject, $message, $headers);
  }

  // 次のバッチが存在する場合、次のイベントをスケジュール
  if (count($users) === $batch_size) {
      wp_schedule_single_event(time() + 60, 'send_new_post_notifications', array($post_id, $offset + $batch_size));
  }
}
add_action('send_new_post_notifications', 'send_new_post_notifications', 10, 2);

// カスタム投稿タイプのコメントに対してのみ通知をスケジュール
function schedule_notify_users_on_custom_post_comment($comment_id, $comment_object) {
  // コメントが承認された場合のみ通知
  if ($comment_object->comment_approved != 1) {
      return;
  }

  // コメントが付けられた投稿のIDを取得
  $post_id = $comment_object->comment_post_ID;
  $post_type = get_post_type($post_id);

  // 特定のカスタム投稿タイプ oe_community の場合のみ通知
  if ($post_type === 'oe_community') {
      // 通知イベントをスケジュール
      wp_schedule_single_event(time() + 60, 'send_custom_post_comment_notifications', array($comment_id, $post_id, 0)); // 開始インデックスを0に設定
  }
}
add_action('wp_insert_comment', 'schedule_notify_users_on_custom_post_comment', 10, 2);

// 分割メール送信
function send_custom_post_comment_notifications($comment_id, $post_id, $offset) {
  // 各バッチで処理するユーザー数を定義
  $batch_size = 10;

  // コメントと投稿情報を取得
  $comment_object = get_comment($comment_id);

  // メールのタイトルと本文を準備
  $subject = '新しいコメントが投稿されました: ' . get_the_title($post_id);
  $message = '新しいコメントが以下の投稿に追加されました: ' . get_permalink($post_id) . "\n\n";
  $message .= 'コメント内容: ' . $comment_object->comment_content;

  // メールのヘッダー（送信元アドレスなど）
  $headers = array('Content-Type: text/plain; charset=UTF-8');
  $from_email = 'noreply@o-eighty.jp';
  $headers[] = 'From: ' . get_bloginfo('name') . ' <' . $from_email . '>';

  // ユーザーを取得
  $users = get_users(array(
      'role__in' => array('subscriber', 'editor', 'administrator', 'author', 'contributor'),
      'meta_query' => array(
          array(
              'key' => 'reject_mail',
              'value' => '1',
              'compare' => '!='
          ),
      ),
      'number' => $batch_size,
      'offset' => $offset,
  ));

  // 各ユーザーにメールを送信
  foreach ($users as $user) {
      wp_mail($user->user_email, $subject, $message, $headers);
  }

  // 次のバッチが存在する場合、次のイベントをスケジュール
  if (count($users) === $batch_size) {
      wp_schedule_single_event(time() + 60, 'send_custom_post_comment_notifications', array($comment_id, $post_id, $offset + $batch_size));
  }
}
add_action('send_custom_post_comment_notifications', 'send_custom_post_comment_notifications', 10, 3);

// コメント
function my_custom_logged_in_as( $logged_in_as, $commenter, $user_identity ) {
  // ログインしているユーザーのIDを取得
  $user_id = get_current_user_id();
  
  // アバター画像を取得
  $avatar = get_avatar( $user_id, 80 ); // 80pxサイズのアバターを取得
  
  // カスタマイズしたログイン中のメッセージにアバターを追加
  $logged_in_as = sprintf(
      '<p class="logged-in-as">%s %s</p>',
      $avatar,
      sprintf(
          __( '<a href="%1$s">%2$s</a>' ),
          admin_url( 'profile.php' ),
          $user_identity,
          wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) )
      )
  );

  return $logged_in_as;
}
add_filter( 'comment_form_logged_in', 'my_custom_logged_in_as', 10, 3 );

function my_custom_comment_format($comment, $args, $depth) {
  $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
  $author = get_userdata($comment->user_id);
  ?>
  <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
  <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
    <div class="comment-meta">
      <div class="comment-author vcard">
        <?php echo get_avatar( $comment, 80 ); ?>
      </div>
    </div>
    <div class="comment-main">
      <div class="comment-metadata">
        <div class="user-name"><?php echo $author->nickname; ?></div>
        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
            <?php printf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ); ?>
        </a>
      </div>
      <div class="comment-content" id="comment-content-<?php comment_ID(); ?>"><?php echo nl2br( get_comment_text() ); ?></div>
      <?php
      // 編集リンクを表示
      if (current_user_can('edit_comment', $comment->comment_ID) && intval($comment->user_id) === get_current_user_id()) { ?>
      <div class="comment-actions">
        <a href="#" class="edit-comment-button" data-comment-id="<?php echo $comment->comment_ID; ?>">編集</a>
        <a href="#" class="delete-comment-button" data-comment-id="<?php echo $comment->comment_ID; ?>">削除</a>
      </div>
      <?php } ?>
    </div>
  </article>
  <?php
}

// コメント削除のAjax処理
function my_delete_comment_ajax() {
  // nonceのチェック
  check_ajax_referer('my_delete_comment_nonce', 'security');

  // コメントIDを取得
  $comment_id = intval($_POST['comment_id']);

  // 権限チェック：ユーザーがコメントを削除できるかどうか
  if (current_user_can('edit_comment', $comment_id)) {
      // コメントを削除
      wp_delete_comment($comment_id, true);

      // 成功したことを返す
      wp_send_json_success();
  } else {
      // 権限がない場合は失敗を返す
      wp_send_json_error('削除する権限がありません。');
  }

  // Ajax終了
  wp_die();
}
add_action('wp_ajax_delete_comment', 'my_delete_comment_ajax');

// Nonceをフロントエンドに渡す
function my_enqueue_scripts() {
  // スクリプトのキューに登録
  wp_enqueue_script('my-ajax-script', get_template_directory_uri() . '/assets/js/community.js', array('jquery'), null, true);

  // `ajaxurl`と2つのnonceをJavaScript側に渡す
  wp_localize_script('my-ajax-script', 'my_ajax_object', array(
    'ajaxurl' => admin_url('admin-ajax.php'),
    'delete_nonce' => wp_create_nonce('my_delete_comment_nonce'),
    'edit_nonce'   => wp_create_nonce('my_edit_comment_nonce'),
    'profile_image_nonce'   => wp_create_nonce('my_profile_image_nonce'),
  ));
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

// コメント編集のAjax処理
function my_edit_comment_ajax() {
  check_ajax_referer('my_edit_comment_nonce', 'security');

  $comment_id = intval($_POST['comment_id']);
  $comment_content = wp_filter_post_kses($_POST['comment_content']);

  if (current_user_can('edit_comment', $comment_id)) {
      // コメントを更新
      wp_update_comment(array(
          'comment_ID' => $comment_id,
          'comment_content' => $comment_content
      ));

      wp_send_json_success();
  } else {
      wp_send_json_error('編集する権限がありません。');
  }
  wp_die();
}
add_action('wp_ajax_edit_comment', 'my_edit_comment_ajax');

// Ajaxで画像を取得
function get_image_url_by_id() {
  // 画像IDを取得
  $image_id = isset($_POST['image_id']) ? intval($_POST['image_id']) : 0;

  // IDが無効なら終了
  if (!$image_id) {
      wp_send_json_error('画像IDが無効です');
  }

  // 画像URLを取得
  $image_url = wp_get_attachment_url($image_id);

  if ($image_url) {
      wp_send_json_success($image_url);
  } else {
      wp_send_json_error('画像が見つかりません');
  }
}

// Ajaxアクションのフック（ログイン時）
add_action('wp_ajax_get_image_url', 'get_image_url_by_id');

// Ajaxアクションのフック（未ログイン時）
add_action('wp_ajax_nopriv_get_image_url', 'get_image_url_by_id');

// avatar upload
function add_avatar_upload_script_footer(){
  if ( is_page('profile') ) {
    wp_enqueue_script(
      'cropper-script',  // スクリプトのハンドル名
      'https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js', // スクリプトのパス
      array(), // 依存関係 (必要に応じて設定)
      null,    // バージョン (必要に応じて設定)
      true     // フッターに読み込み (true でフッターに挿入)
  );
  $theme_url = get_template_directory_uri();
?>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const avatarInput = document.getElementById('avatar');
    const avatarPreview = document.getElementById('avatar-preview');
    const cropContainer = document.getElementById('crop-container');
    let cropper;

    // アバター画像が選択されたらプレビュー表示
    avatarInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                avatarPreview.src = e.target.result;
                cropContainer.style.display = 'block';

                // Cropper.jsを初期化
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(avatarPreview, {
                    aspectRatio: 1, // 正方形のアスペクト比
                    viewMode: 1,
                });
            };
            reader.readAsDataURL(file);
        }
    });

    var uploadUrl = '<?php echo esc_js($theme_url); ?>'+'/avatar-upload.php';
    // 切り抜きボタンが押されたら
    document.getElementById('crop-avatar').addEventListener('click', function() {

      if (cropper) {
        const canvas = cropper.getCroppedCanvas({
            width: 400,  // 切り抜き後の幅
            height: 400, // 切り抜き後の高さ
        });
        
        // Base64形式の画像データを取得
        const croppedImageDataURL = canvas.toDataURL('image/jpeg');

        // サーバーに送信するためのデータを作成
        const formData = new FormData();
        formData.append('avatar_cropped', croppedImageDataURL);

        // サーバーにトリミングした画像を送信
        fetch(uploadUrl, {
          method: 'POST',
          body: formData,
        }).then((response) => {
          //console.log(response);
          return response.json();

        }).then((data) => {
          // console.log(data);
          var result = window.confirm('画像を保存しました。リロードしてページを更新しますか？');
    
          if( result ) {
            window.location.reload();
          }
          else {
            cropContainer.style.display = 'none';
          }
        }).catch((error) => {
            console.error('エラー:', error);
        });
      }
    });
});
</script>
<?php }
}
add_action('wp_footer', 'add_avatar_upload_script_footer');

function add_wp_ulike_custom_scripts_for_community() {
  // 現在の投稿タイプを取得
  if (!is_singular('oe_community')) {
      return; // カスタム投稿タイプ 'oe_community' 以外ではスクリプトを読み込まない
  }
  ?>
  <script>
      document.addEventListener('DOMContentLoaded', function () {
          // WP ULikeカウンター要素のリストを取得
          const counters = document.querySelectorAll('.wp_ulike_counter');

          counters.forEach(function (counter) {
              counter.addEventListener('click', function () {
                  // カウンターの親要素にある「いいね」ボタンを探してクリック
                  const likeButton = counter.closest('.wp_ulike_general_class').querySelector('.wp_ulike_btn');
                  if (likeButton) {
                      likeButton.click();
                  }
              });
          });
      });
  </script>
  <?php
}
add_action('wp_footer', 'add_wp_ulike_custom_scripts_for_community');

// 特定のページにBasic認証を設定する
// function my_custom_basic_auth_for_specific_page() {
//   // ページIDまたはスラッグで判定
//   if ( is_page('staff') || is_parent_slug() === 'staff' || is_page('oe_community_ranking') || is_post_type_archive(array('oe_community')) || is_tax(array('team','community_tag')) ) {

//       // Basic 認証
//       if (!isset($_SERVER['PHP_AUTH_USER'])) {
//           header('WWW-Authenticate: Basic realm="Protected Area"');
//           header('HTTP/1.0 401 Unauthorized');
//           echo '認証が必要です。';
//           exit;
//       } else {
//         // ユーザー名とパスワードを設定
//         $valid_username = 'OneEighty'; // ユーザー名
//         $hashed_password = '$2y$10$QnJOjPI0jlal9vGyMm2f/OkHwFSaelmQKchc8U2Mxt5ELvxGBnDaS'; // パスワード

//         // ユーザー名の確認
//         if ($_SERVER['PHP_AUTH_USER'] !== $valid_username) {
//           header('WWW-Authenticate: Basic realm="Protected Area"');
//           header('HTTP/1.0 401 Unauthorized');
//           echo '認証情報が正しくありません。';
//           exit;
//         }
        
//         // パスワードの確認 (password_verify を使用)
//         if (!password_verify($_SERVER['PHP_AUTH_PW'], $hashed_password)) {
//           header('WWW-Authenticate: Basic realm="Protected Area"');
//           header('HTTP/1.0 401 Unauthorized');
//           echo 'パスワードが正しくありません。';
//           exit;
//         }
//       }
//   }
// }
// add_action('template_redirect', 'my_custom_basic_auth_for_specific_page');

// 未ログインユーザーだった場合は、トップページへリダイレクト。
// function restrict_attachment_page_access() {
//     if ( is_attachment() && ! is_user_logged_in() ) {
//         wp_redirect( home_url() );
//         exit;
//     }
// }
// add_action( 'template_redirect', 'restrict_attachment_page_access' );

function custom_upload_dir_for_community( $upload ) {
    if ( isset($_REQUEST['post_id']) ) {
        $post_id = (int) $_REQUEST['post_id'];
        if ( get_post_type( $post_id ) === 'oe_community' ) {
            $upload['subdir'] = '/oe_community';
            $upload['path'] = $upload['basedir'] . $upload['subdir'];
            $upload['url'] = $upload['baseurl'] . $upload['subdir'];
        }
    }
    return $upload;
}
add_filter( 'upload_dir', 'custom_upload_dir_for_community' );

function custom_upload_dir_for_scf_profile_image( $upload ) {
    if ( is_admin() ) {
        $referer = $_SERVER['HTTP_REFERER'] ?? '';

        // 以下のいずれかが含まれていれば profile_images に保存
        if (
            strpos($referer, 'user-edit.php') !== false ||
            strpos($referer, 'user-new.php') !== false ||
            strpos($referer, 'profile.php') !== false
        ) {
            $upload['subdir'] = '/profile_images';
            $upload['path']   = $upload['basedir'] . $upload['subdir'];
            $upload['url']    = $upload['baseurl'] . $upload['subdir'];
        }
    }

    return $upload;
}
add_filter( 'upload_dir', 'custom_upload_dir_for_scf_profile_image' );

// メディアライブラリに「フォルダ」列を追加
function add_media_folder_column( $columns ) {
    $columns['upload_folder'] = 'フォルダ';
    return $columns;
}
add_filter( 'manage_upload_columns', 'add_media_folder_column' );

// 各行にフォルダ名を表示
function show_media_folder_column( $column_name, $post_id ) {
    if ( $column_name === 'upload_folder' ) {
        $file_path = get_attached_file( $post_id );
        if ( $file_path ) {
            $upload_dir = wp_upload_dir();
            $relative_path = str_replace( trailingslashit( $upload_dir['basedir'] ), '', $file_path );
            $parts = explode( '/', $relative_path );
            if ( count( $parts ) > 1 ) {
                // 第一階層のフォルダ名
                if($parts[0] === 'oe_community') {
                  echo 'コミュニティ';
                } elseif($parts[0] === 'profile_images') {
                  echo 'プロフィール画像';
                } else {
                  echo esc_html( $parts[0] );
                }
            } else {
                echo '-';
            }
        }
    }
}
add_action( 'manage_media_custom_column', 'show_media_folder_column', 10, 2 );

// メディア編集画面にアップロードフォルダ情報を追加
function add_upload_folder_to_media_edit_screen( $form_fields, $post ) {
    $file_path = get_attached_file( $post->ID );
    if ( $file_path ) {
        $upload_dir = wp_upload_dir();
        $relative_path = str_replace( trailingslashit( $upload_dir['basedir'] ), '', $file_path );
        $parts = explode( '/', $relative_path );
        $folder = count( $parts ) > 1 ? $parts[0] : '-';

        if($parts[0] === 'oe_community') {
          $folder = 'コミュニティ';
        } elseif($parts[0] === 'profile_images') {
          $folder = 'プロフィール画像';
        }

        $form_fields['upload_folder'] = array(
            'label' => 'アップロードフォルダ',
            'input' => 'html',
            'html'  => '<div style="background-color: #f0f0f1;  border:1px solid #8c8f94; border-radius:4px; font-size:14px; padding:4px 8px; line-height:1.42857143; margin:0 0 8px;">' . esc_html( $folder ) . '</div>',
        );
    }
    return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'add_upload_folder_to_media_edit_screen', 10, 2 );

// 投稿者ページはリダイレクト
function disable_author_archive() {
  if ( $_GET['author'] || preg_match('#/author/.+#', $_SERVER['REQUEST_URI']) ) {
      wp_redirect(home_url('/404.php'));
      //または wp_redirect(home_url(''));
      die;
  }
}
add_action ('init', 'disable_author_archive');

// REST API 経由でのユーザー情報取得を禁止
function disable_rest_user_endpoints( $endpoints ) {
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
    }
    return $endpoints;
}
add_filter( 'rest_endpoints', 'disable_rest_user_endpoints' );

// 未ログインユーザーは REST APIで oe_community の取得禁止
add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) {
        return $result;
    }

    $route = $_SERVER['REQUEST_URI'] ?? '';
    if ( preg_match( '#/wp-json/wp/v2/oe_community#', $route ) ) {
        if ( ! is_user_logged_in() ) {
            return new WP_Error( 'rest_forbidden', __( 'このコンテンツにはアクセスできません。' ), [ 'status' => 403 ] );
        }
    }

    return null;
});

// 管理画面にメニュー追加
add_action('admin_menu', function() {
    add_menu_page(
        'ヘッダーインフォ',     // ページタイトル
        'ヘッダーインフォ',     // メニュータイトル
        'manage_options',   // 権限
        'header-information', // スラッグ
        'render_header_information_page', // コールバック
        'dashicons-admin-comments',
        2
    );
});

function render_header_information_page() {
?>
    <div class="wrap">
        <h1>ヘッダーインフォ設定</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields( 'header_information_text_link_group' );
                do_settings_sections( 'header-information-text-link' );
                submit_button();
            ?>
        </form>
    </div>
<?php
}

add_action('admin_init', function() {

    // 登録する項目：テキスト
    register_setting( 'header_information_text_link_group', 'header_information_text' );

    // 登録する項目：リンク URL
    register_setting( 'header_information_text_link_group', 'header_information_link' );


    // セクションの追加
    add_settings_section(
        'header_information_text_link_section',
        'テキストとリンクを入力',
        function() {
            echo 'ここで設定した内容が画面上に表示されます。';
        },
        'header-information-text-link'
    );


    // テキスト入力フィールド
    add_settings_field(
        'header_information_text',
        'テキスト',
        function() {
            $value = get_option('header_information_text', '');
            echo '<textarea name="header_information_text" rows="5" class="large-text">' . esc_textarea($value) . '</textarea>';
        },
        'header-information-text-link',
        'header_information_text_link_section'
    );


    // URL入力フィールド
    add_settings_field(
        'header_information_link',
        'リンクURL',
        function() {
            $value = get_option('header_information_link', '');
            echo '<input type="text" name="header_information_link" value="' . esc_attr($value) . '" class="large-text" />';
        },
        'header-information-text-link',
        'header_information_text_link_section'
    );
});

// パラメータがあるURLを正規化
add_filter('aioseo_canonical_url', function ($canonical) {

  // 管理画面・REST・CLI は除外
  if (is_admin() || defined('REST_REQUEST')) {
    return $canonical;
  }

  // クエリパラメータが無ければそのまま
  if (empty($_SERVER['QUERY_STRING'])) {
    return $canonical;
  }

  // 現在のURL（パラメータなし）を canonical に
  $url = (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

  // ? 以降を除去
  $url = strtok($url, '?');

  return esc_url($url);
});


function redirect_project_single_page() {
    if (
        is_admin() ||
        defined('REST_REQUEST') ||
        wp_doing_ajax()
    ) {
        return;
    }

    // /project/slug/ の形式のみ対象
    if (preg_match('#^/project/([^/]+)/?$#', $_SERVER['REQUEST_URI'], $matches)) {

      $slug = $matches[1];

      $term = get_term_by('slug', $slug, 'project');
      if ($term && !is_wp_error($term)) {
          // taxonomy URL なのでリダイレクトしない
          return;
      }

      $post = get_page_by_path($slug, OBJECT, 'works');

      if ($post) {
          wp_safe_redirect(get_permalink($post), 301);
          exit;
      }
    }
    
    // /project_category/term_slug/ の形式か判定
    if (preg_match('#^/project_category/([^/]+)/?$#', $_SERVER['REQUEST_URI'], $matches)) {

        $term_slug = $matches[1];

        // project taxonomy にその term が実在するか確認
        $term = get_term_by('slug', $term_slug, 'project');

        if ($term && !is_wp_error($term)) {
            wp_safe_redirect(
                home_url('/project/' . $term_slug . '/'),
                301
            );
            exit;
        }
    }

    /**
     * ▼ 追加：カスタム投稿 works の single で
     *    本文が空なら 404 を返す
     */
    if (is_singular('works') && !is_preview()) {

        global $post;

        // 空白・改行・タグのみのケースも除外
        $content = trim(strip_tags($post->post_content));

        if ($content === '') {
            global $wp_query;

            $wp_query->set_404();
            status_header(404);
            nocache_headers();

            include get_query_template('404');
            exit;
        }
    }
}
add_action( 'template_redirect', 'redirect_project_single_page' );

// function oneeighty_enqueue_hero_css() {
//   if ( is_front_page() ) {
//     wp_enqueue_style(
//       'oneeighty-hero',
//       get_template_directory_uri() . '/assets/css/hero.css',
//       array(),
//       '1.0'
//     );
//   }
// }
// add_action('wp_enqueue_scripts', 'oneeighty_enqueue_hero_css');

// function oneeighty_enqueue_hero_js() {
//   if ( is_front_page() ) {
//     wp_enqueue_script(
//       'oneeighty-hero',
//       get_template_directory_uri() . '/assets/js/hero.js',
//       array(),
//       '1.0',
//       true
//     );
//   }
// }
// add_action('wp_enqueue_scripts', 'oneeighty_enqueue_hero_js');

// コミュニティサイトをnoindex
add_action('wp_head', function() {
    if (is_post_type_archive('oe_community')) {
        echo '<meta name="robots" content="noindex, follow">' . "\n";
    }
}, 1);


// 追加title
add_theme_support('title-tag');
