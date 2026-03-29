<?php
/*
Template Name: プロフィール設定専用テンプレート
*/

// ユーザーがログインしているか確認
if ( !is_user_logged_in() ) {
  $url = wp_login_url();
  $login_url = wp_login_url( get_permalink() );
  wp_redirect( $login_url );
  exit;
}

// ログイン中のユーザー情報を取得
$current_user = wp_get_current_user();

function handle_profile_image_upload($user_id) {
  // セキュリティチェック
  if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'update-user_' . $user_id)) {
    return;
  }

  // プロフィール画像の処理
  if (!empty($_FILES['profile_image']['name'])) {

    // 一時的に upload_dir を変更
    add_filter('upload_dir', 'custom_profile_image_upload_dir');

    // アップロード実行
    $file = $_FILES['profile_image'];
    $upload = wp_handle_upload($file, array('test_form' => false));

    // フィルター解除
    remove_filter('upload_dir', 'custom_profile_image_upload_dir');

    // アップロード成功時
    if (isset($upload['url']) && !isset($upload['error'])) {
      // 添付ファイル情報を作成
      $attachment = array(
        'post_mime_type' => $upload['type'],
        'post_title'     => sanitize_file_name($file['name']),
        'post_content'   => '',
        'post_status'    => 'inherit'
      );

      // 添付ファイルを登録
      $attachment_id = wp_insert_attachment($attachment, $upload['file']);

      // 必要ならメタデータ生成（画像サイズなど）
      require_once ABSPATH . 'wp-admin/includes/image.php';
      $attach_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
      wp_update_attachment_metadata($attachment_id, $attach_data);

      // ユーザーメタに保存
      update_user_meta($user_id, 'profile_image', $attachment_id);
    } else {
      echo '<p class="error">画像のアップロードに失敗しました: ' . esc_html($upload['error']) . '</p>';
    }
  }
}

// フィルター関数: アップロード先を profile_images に変更
function custom_profile_image_upload_dir($upload) {
  $subdir = '/profile_images';
  $upload['subdir'] = $subdir;
  $upload['path']   = $upload['basedir'] . $subdir;
  $upload['url']    = $upload['baseurl'] . $subdir;
  return $upload;
}


// フォーム送信時の処理
if (isset($_POST['submit'])) {
  // セキュリティチェック
  check_admin_referer( 'update-user_' . $current_user->ID );

  handle_profile_image_upload($current_user->ID);

  // ニックネームの更新
  if ( !empty( $_POST['nickname'] ) ) {
      wp_update_user( array(
          'ID'       => $current_user->ID,
          'nickname' => sanitize_text_field( $_POST['nickname'] )
      ));
  }

  // 自己紹介の更新
  if ( !empty( $_POST['description'] ) ) {
      update_user_meta( $current_user->ID, 'description', sanitize_textarea_field( $_POST['description'] ) );
  }

  // 電話番号の更新
  if (!empty($_POST['tel'])) {
    update_user_meta($current_user->ID, 'tel', sanitize_text_field($_POST['tel']));
  }

  // 所属部署の選択を保存
  if (isset($_POST['team'])) {
    // ここでは 'user_category' をカスタムフィールド名として保存
    update_user_meta($current_user->ID, 'team', sanitize_text_field($_POST['team']));
  }

  // リダイレクトを追加してリロード対策を行う
  wp_redirect( add_query_arg( 'profile_updated', 'true', get_permalink() ) );
  exit; // 必ず exit() でリダイレクトを完了させる
}
// 現在のニックネームと自己紹介を取得
$nickname = $current_user->nickname;
$description = get_user_meta( $current_user->ID, 'description', true );
$tel = get_user_meta($current_user->ID, 'tel', true);

$current_team = get_user_meta($current_user->ID, 'team', true);
$teams = get_terms(array(
    'taxonomy' => 'team',
    'hide_empty' => false,
));

get_header('2');
?>
<div class="community-container">
  <div class="breadcrumbs">
  <div class="breadcrumbs-list">
  <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="<?php bloginfo('name'); ?>へ移動する" href="<?php echo get_bloginfo("url"); ?>/oe_community/" class="home"><span property="name">トップ</span></a><meta property="position" content="1"></span><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="スタッフ" href="<?php echo get_bloginfo("url"); ?>/staff/"><span property="name">スタッフ</span></a><meta property="position" content="2"></span><span property="itemListElement" typeof="ListItem"><span property="name" class="post post-page current-item">プロフィール設定</span><meta property="url" content="<?php echo get_the_permalink(); ?>"><meta property="position" content="3"></span></div>
  </div>
  <div class="user-edit-form">
    <h1>プロフィール設定</h1>
    <form method="post" action="" enctype="multipart/form-data" class="form" role="form">
      <?php wp_nonce_field( 'update-user_' . $current_user->ID ); ?>
      <?php if(isset($_GET['profile_updated']) && $_GET['profile_updated'] == 'true') {
        echo '<p class="back-link"><a href="'.get_bloginfo("url").'/staff">スタッフ一覧ページへ戻る</a></p>';
        echo '<p class="alert-success">プロフィールが更新されました！</p>';
      } ?>
      <div class="form-block">
        <div class="form-right">
          <div class="form-group">
            <div class="form-label">アイコン（200×200）</div>
            <div class="form-field">
              <label for="avatar" class="form-upload-area form-upload-area__avatar">
                <?php echo get_avatar( $current_user->ID, 200 ); ?>
                <input type="file" name="avatar" id="avatar" class="file-upload-input" accept="image/*">
                <div class="form-upload-btn">アップロード</div>
              </label>
            </div>
          </div>
        </div>
        <div class="form-left">
          <p class="caution">＊印は必須項目です。</p>
          <div class="form-group">
            <div class="form-label">お名前<sup class="required">＊</sup></div>
            <div class="form-field">
              <input type="text" name="nickname" value="<?php echo esc_attr( $nickname ); ?>" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label">一言コメント</div>
            <div class="form-field">
              <textarea name="description" class="form-control" rows="2"><?php echo esc_textarea( $description ); ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label">電話番号</div>
            <div class="form-field">
              <input type="text" name="tel" value="<?php echo esc_attr( $tel ); ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label">所属部署</div>
            <div class="form-field">
              <select name="team" id="team" class="form-select">
                <option value="">選択してください</option>
                <?php foreach ($teams as $team) : ?>
                    <option value="<?php echo esc_attr($team->term_id); ?>" <?php selected($current_team, $team->term_id); ?>>
                      <?php echo esc_html($team->name); ?>
                    </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label">プロフィール画像</div>
            <div class="form-field">
              <label for="profile_image" class="form-upload-area form-upload-area__profile_image">
                <?php 

                // ACFで画像フィールドの値（画像ID）を取得
                $profile_image_id = get_field('profile_image', 'user_' . $current_user->ID);

                // 画像のURLを取得
                $profile_image_url = wp_get_attachment_image_url( $profile_image_id['id'], 'full' );

                if ($profile_image_url) {
                  echo '<img src="' . esc_url($profile_image_url) . '" width="440" alt="プロフィール画像">';
                } else {
                  echo '<div style="background:#eee; padding:1em" align="center">未設定</div>';
                }
                ?>
                <input type="file" name="profile_image" id="profile_image" class="file-upload-input" accept="image/*">
                <div class="form-upload-btn">アップロード</div>
              </label>
              <div id="file-name-display"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-submit">
        <a href="<?php echo get_bloginfo("url"); ?>/staff" class="btn btn-cancel">戻る</a>
        <input type="submit" name="submit" value="プロフィールを更新" class="btn btn-submit">
      </div>
    </form>
  </div>
</div>

<div style="display:none;" id="crop-container">
  <img id="avatar-preview" style="max-width:100%;"/>
  <br>
  <button type="button" id="crop-avatar">画像を切り抜く</button>
</div>
<?php get_footer('2'); ?>
