<?php
// WordPressの環境をロード
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

// ユーザーがログインしているか確認
if ( !is_user_logged_in() ) {
    wp_send_json_error('Unauthorized', 401);
}

if (isset($_POST['avatar_cropped'])) {
  // Base64データを取得
  $data = $_POST['avatar_cropped'];

  // Base64エンコードされたデータから「data:image/png;base64,」を削除
  list($type, $data) = explode(';', $data);
  list(, $data)      = explode(',', $data);
  $data = base64_decode($data);

  // 今日の日付
  $today = date("YmdHis-");

  // 保存先のパスを設定
  $upload_dir = wp_upload_dir(); // WordPressのアップロードディレクトリを取得
  $file_name = $today.uniqid() . '.jpg'; // 一意のファイル名を生成
  $file_path = $upload_dir['path'] . '/' . $file_name;

  // 画像をファイルとして保存
  if (file_put_contents($file_path, $data)) {
      // アバターのURLを取得
      $avatar_url = $upload_dir['url'] . '/' . $file_name;

      // ユーザーメタデータにアバターのURLを保存（必要に応じて変更）
      $current_user = wp_get_current_user();
      update_user_meta( $current_user->ID, 'simple_local_avatar', array( 'full' => $avatar_url ) );

      // 成功時のレスポンス
      wp_send_json_success(array('url' => $avatar_url));

  } else {
      // エラー時のレスポンス
      wp_send_json_error('画像の保存に失敗しました。');
  }
} else {
  wp_send_json_error('画像データが見つかりません。');
}
?>
