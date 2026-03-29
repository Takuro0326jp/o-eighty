<?php
/*
Template Name: スタッフ専用テンプレート
*/
?>
<?php get_header('2'); if( is_user_logged_in() ): ?>
<div class="community-container">
  <div class="breadcrumbs">
  <div class="breadcrumbs-list">
  <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="<?php bloginfo('name'); ?>へ移動する" href="<?php echo get_bloginfo("url"); ?>/oe_community" class="home"><span property="name">トップ</span></a><meta property="position" content="1"></span><span property="itemListElement" typeof="ListItem"><span property="name" class="post post-page current-item">スタッフ</span><meta property="url" content="<?php echo get_the_permalink(); ?>"><meta property="position" content="2"></span></div>
  </div>
  <?php
  $users = get_users(array(
      'orderby'      => 'ID',
      'order'        => 'ASC',
      'meta_query' => array(array(
        'key' => 'staff_hidden',
        'value' => '1',
        'compare' => '!='
      )),
  ));
  ?>
  <ul class="user-list">
    <?php foreach ($users as $user):
      $user_id = $user->ID; 
      $profileImage = get_field('profile_image', 'user_'. $user_id);
      ?>
      <li class="user-profile">
        <div class="user-data">
          <div class="user-avatar">
            <?php if( !empty( $profileImage ) ) {
              echo '<a href="#" data-profile-id="'.$profileImage['id'].'" data-profile-name="'.$user->nickname.'" class="profile-modal-open">';
            } ?>
            <?php echo get_avatar($user_id, 200); ?>
            <?php if( !empty( $profileImage ) ) {
              echo '<span class="view-text">VIEW<br>PROFILE</span></a>';
            }?>
          </div>
          <?php
          $team_id = get_field('team', 'user_'. $user_id);
          $term = get_term($team_id , 'team');
          if($term && ! is_wp_error($term)) {
            echo '<div class="author-team"><span>'.$term->name.'</span></div>';
          } ?>
          <h4 class="author-name">
          <?php
          if ( intval($user_id) === get_current_user_id() ) {
            echo '<a href="'.get_bloginfo("url").'/staff/profile" class="profile-link">';
          } else if( !empty( $profileImage ) ) {
            echo '<a href="#" data-profile-id="'.$profileImage['id'].'" data-profile-name="'.$user->nickname.'" class="profile-modal-open">';
          }
          echo $user->nickname;
          if ( $user_id === get_current_user_id() ) {
            echo '<i aria-hidden="true" class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20.001" viewBox="0 0 20 20.001">
                  <path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29a1.014,1.014,0,0,0-1.42,0L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z" transform="translate(-2 -2)" fill="#434343"/></svg></i>';
            echo '</a>';
          } else if( !empty( $profileImage ) ) {
            echo '</a>';
          }
          ?>
          </h4>
          <p class="author-description"><?php echo $user->description; ?></p>
          <?php
          $tel = get_field('tel', 'user_'. $user_id);
          if($tel) {
            echo '<div class="author-tel"><a href="tel:'.$tel.'"><i aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.384,17.752a2.108,2.108,0,0,1-.522,3.359,7.543,7.543,0,0,1-5.476.642C10.5,20.523,3.477,13.5,2.247,8.614a7.543,7.543,0,0,1,.642-5.476,2.108,2.108,0,0,1,3.359-.522L8.333,4.7a2.094,2.094,0,0,1,.445,2.328A3.877,3.877,0,0,1,8,8.2c-2.384,2.384,5.417,10.185,7.8,7.8a3.877,3.877,0,0,1,1.173-.781,2.092,2.092,0,0,1,2.328.445Z"/></svg></i>'.$tel.'</a></div>';
          }
          ?>
        </div>
        <div class="more-article">
          <a href="<?php echo get_bloginfo("url") . '/oe_community/?author_id=' . $user_id ?>" class="btn">投稿一覧へ</a>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>

<div class="modal profile-image-modal" role="dialog" id="profile-image-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2><span id="profile-name-container"></span>のプロフィール</h2>
        <a class="modal-close profile-modal-close" href="#">
          <i aria-hidden="true"></i>
        </a>
      </div>
      <div class="modal-body">
        <div id="profile-image-container">aaa</div>
      </div>
    </div>
  </div>
</div>
<?php endif; get_footer('2'); ?>
