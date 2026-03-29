<?php
/*
Template Name: NEWS一覧専用テンプレート
*/
?>
<?php get_header(); ?>
<section class="news-archive">
  <div class="page-heading">
    <div class="container">
      <div class="page-heading__container">
        <h1 class="heading-1">
          <span class="en">News</span>
          <span class="ja">ニュース&amp;プレスリリース</span>
        </h1>
      </div>
    </div>
  </div>
  <section class="contents-section bg-white section">
    <div class="container">
      <ul class="news-category-list">
        <li class="list-item">
          <a href="<?php echo esc_url(home_url('/')); ?>news/" class="current">全て</a>
        </li>
        <?php
        $terms = get_terms('category');
        foreach ($terms as $term) {
          echo '<li class="list-item"><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
        }
        ?>
      </ul>
      <?php if ( have_posts() ) : ?>
        <ul class="news-list">
        <?php while ( have_posts() ) : the_post(); ?>
        <li class="list-item">
            <a href="<?php the_permalink(); ?>">
              <span class="item-data">
                <span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
                <span class="post-category">
                  <?php
                    $taxonomy = 'category';
                    $terms = get_the_terms( $post->ID, $taxonomy );
                    if ($terms && ! is_wp_error($terms)):
                    foreach($terms as $term):

                    $cat_link = get_category_link($term->term_id);
                    $cat_name = $term->name;
                    $cat_id = $term->term_id;
                    $cat_color = 'category_'.$cat_id;
                    $font_color = get_field('font_color',$cat_color);
                    $background_color = get_field('background_color',$cat_color);
                  ?>
                  <span class="category-icon"><?php echo $term->name; ?></span>
                  <?php break; endforeach; ?>
                  <?php endif; ?>
                </span>
              </span>
              <span class="post-title"><?php the_title(); ?></span>
              <span class="btn-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 110 110">
                  <circle cx="55" cy="55" r="50" />
                </svg>
              </span>
            </a>
          </li>
        <?php endwhile; // 繰り返し処理終了 ?>
        </ul>
        <?php else: ?>
        <p>ニュースはありません。</p>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
      <div class="pager">
        <?php if(function_exists('wp_pagenavi')):
         wp_pagenavi();    //wp_pagenavi()の呼び出し
       endif; ?>
      </div><!-- .pager -->
    </div>
  </section>
</section>
<?php get_footer(); ?>
