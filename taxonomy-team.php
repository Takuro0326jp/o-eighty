<?php get_header('2'); if( is_user_logged_in() ): ?>
<div class="community-container">
  <div class="breadcrumbs">
    <div class="breadcrumbs-list">
    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="<?php bloginfo('name'); ?>へ移動する" href="<?php echo get_bloginfo("url"); ?>/oe_community" class="home"><span property="name">トップ</span></a><meta property="position" content="1"></span><span property="itemListElement" typeof="ListItem"><span property="name" class="post post-page current-item">チーム：<?php echo single_term_title( '', false ); ?></span><meta property="url" content="<?php echo get_the_permalink(); ?>"><meta property="position" content="2"></span></div>
  </div>
  <div class="community-archive-search">
    <form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/oe_community/')); ?>">
      <input type="text" value="<?php echo get_search_query(); ?>" name="keyword" id="keyword" placeholder="キーワード" />
      <button type="submit" id="searchsubmit">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_search.svg" alt="Icon search" width="18" height="18">
      </button>
    </form>
  </div>
  <?php
    $args = array(
      'taxonomy'   => 'community_tag',
      'orderby'    => 'meta_value_num',
      'meta_key'   => 'post_views_count',
      'order'      => 'DESC',
      'number'     => 10,
      'hide_empty' => true, // 投稿があるタームのみ取得
    );
    $terms = get_terms($args);
    if (!empty($terms) && !is_wp_error($terms)) {
      echo '<div class="community-popular-tags"><h3>#人気のタグ</h3>';
      echo '<ul class="terms-list">';
      foreach ($terms as $term) {
        echo '<li><a href="' . esc_url(home_url('/oe_community/tag/').$term->slug) . '">' . esc_html($term->name) .'</a></li>';
      }
      echo '</ul>';
      echo '</div>';
    }
  ?>
  <h1 class="community-archive-title"><?php echo single_term_title( '', false ); ?>の記事一覧</h1>
  <?php if ( have_posts() ) : ?>
    <ul class="community-archive-list">
    <?php while ( have_posts() ) : the_post(); ?>
      <li class="list-item">
        <?php 
        $author = get_userdata($post->post_author);
        
        $days = 3;
        $today = date_i18n('U');
        $entry_day = get_the_time('U');
        $keika = date('U',($today - $entry_day)) / 86400;
        if ( $days > $keika ):
          echo '<span class="new-label">NEW</span>';
        endif;  
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
              <?php endforeach; endif;  ?>
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
    <p>記事はありません。</p>
    <?php endif; ?>
  <?php wp_reset_query(); ?>
  <div class="pager">
    <?php if(function_exists('wp_pagenavi')):
      wp_pagenavi();    //wp_pagenavi()の呼び出し
    endif; ?>
  </div><!-- .pager -->
</div>
<?php endif; get_footer('2'); ?>
