<?php
/*
Template Name: 人気記事専用テンプレート
*/
?>
<?php get_header('2'); if( is_user_logged_in() ): ?>
<div class="community-container">
  <div class="breadcrumbs">
    <div class="breadcrumbs-list">
    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="<?php bloginfo('name'); ?>へ移動する" href="<?php echo get_bloginfo("url"); ?>/oe_community" class="home"><span property="name">トップ</span></a><meta property="position" content="1"></span><span property="itemListElement" typeof="ListItem"><span property="name" class="post post-page current-item"><?php echo get_the_title(); ?></span><meta property="url" content="<?php echo get_the_permalink(); ?>"><meta property="position" content="2"></span></div>
  </div>
  <div class="community-archive-search">
    <form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/oe_community/')); ?>">
      <input type="text" value="<?php echo get_search_query(); ?>" name="keyword" id="keyword" placeholder="キーワード" />
      <button type="submit" id="searchsubmit">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_search.svg" alt="Icon search" width="18" height="18">
      </button>
    </form>
  </div>
  <h1 class="community-archive-title"><?php echo get_the_title(); ?></h1>
  <?php
    // カウント
    $num = 0;
    // カスタムクエリを作成
    $args = array(
        'posts_per_page' => 10,  // 表示する人気記事の数
        'meta_key' => 'post_views_count',  // カスタムフィールドのキー
        'orderby' => 'meta_value_num',  // カスタムフィールドの数値でソート
        'order' => 'DESC',  // 降順でソート（人気順）
        'post_type' => 'oe_community',  // カスタム投稿タイプを指定
        'post_status' => 'publish'  // 公開済みの投稿のみ
    );
    $popular_posts_query = new WP_Query($args);
    if ($popular_posts_query->have_posts()) : ?>
    <ul class="community-archive-list">
      <?php while ($popular_posts_query->have_posts()): $popular_posts_query->the_post(); ?>
      <li class="list-item">
        <?php 
        $author = get_userdata($post->post_author);
        $num++;
        echo '<span class="rankink-label">'.$num.'</span>';
        ?>
        <div class="item-thumbnail">
          <a href="<?php the_permalink(); ?>">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('full'); ?>
          <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/thumbnail_default.jpg" alt="no image">
          <?php endif; ?>
          </a>
        </div>
        <div class="item-contents">
          <div class="item-content">
            <div class="post-date"><?php echo get_the_date( 'Y年n月j日' ); ?></div>
            <div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
            <?php $taxonomy = 'team';
            $terms = get_the_terms( $post->ID, $taxonomy );
        
            $taxonomy_tags = 'community_tag';
            $tags = get_the_terms( $post->ID, $taxonomy_tags );
    
            if ($terms && ! is_wp_error($terms) || $tags && ! is_wp_error($tags)): ?>
            <div class="tag-group">
              <?php
              if ($terms && ! is_wp_error($terms)):
                foreach($terms as $term):
              ?>
              <a href="<?php echo esc_url(home_url('/oe_community')); ?>/team/<?php echo $term->slug; ?>" class="tag-item"><?php echo $term->name; ?></a>
              <?php endforeach; endif; ?>
              <?php
              if ($tags && ! is_wp_error($tags)):
                foreach($tags as $tag):
              ?>
              <a href="<?php echo esc_url(home_url('/oe_community')); ?>/tag/<?php echo $tag->slug; ?>" class="tag-item"><?php echo $tag->name; ?></a>
              <?php endforeach; endif; ?>
            </div>
            <?php endif; 
            ?>
          </div>
          <div class="item-author">
            <div class="thumbnail">
              <?php echo get_avatar( $author->ID, 80 ); ?>
            </div>
            <div class="text">
              <?php if($author->nickname){ ?>
              <div class="user-name"><?php echo $author->nickname; ?></div>
              <?php }
              if($author->description){ ?>
              <div class="user-description"><?php echo $author->description; ?></div>
              <?php } ?>
            </div>
          </div>
        </div>
      </li>
    <?php endwhile; // 繰り返し処理終了 ?>
    </ul>
    <?php else: ?>
    <p>記事が見つかりませんでした。</p>
    <?php endif; ?>
  <?php wp_reset_postdata(); ?>
</div>
<?php endif; get_footer('2'); ?>
