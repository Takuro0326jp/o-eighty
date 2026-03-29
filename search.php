<?php get_header(); ?>

<div class="container news-container">
  <section id="news-archive" class="inner cf">
    <h2 class="page-title"><?php echo single_cat_title(); ?>一覧</h2>
    <div class="main-contents">
      <?php if ( have_posts() ) : ?>
        <ul class="news-list">
        <?php while ( have_posts() ) : the_post(); ?>
        <li>
          <div class="txt">
            <div class="meta">
              <time class="date"><?php the_time( get_option( 'date_format' ) ); ?></time>
              <div class="category">
                <?php
                  $taxonomy = 'category';
                  $terms = get_the_terms( $post->ID, $taxonomy );
                  if ($terms && ! is_wp_error($terms)):
                  foreach($terms as $term):
                ?>
                <a href="<?php echo home_url('/category/'); ?><?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
          </div>
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
    <aside class="sidebar">
      <?php get_sidebar(); ?>
    </aside>
  </section>
</div><!-- #contents -->
<section class="section-signup">
  <div class="container">
    <div class="inner">
      <p>簡単３ステップで出資できる！</p>
      <div class="btn-area">
        <a href="https://mypage.yamatozaitaku.com/SignUp" target="_blank" class="btn btn-primary"><span class="btn-icon"><span class="fc-red">無料会員登録</span>はこちら</span></a>
      </div>
    </div>
  </div>
</section>
<section class="section section-contact">
  <div class="container">
    <div class="inner">
      <div class="heading-en">CONTACT</div>
      <h2 class="heading-2">お問い合わせはこちら</h2>
      <div class="tel">
        <a href="tel:0120581056">0120-581-056</a>
      </div>
      <div class="time">営業時間  10時〜18時（水曜定休）</div>
      <div class="btn-area">
        <a href="https://yamatozaitaku.co.jp/contact/" target="_blank" class="btn btn-primary"><span class="btn-icon">メールでのお問い合わせ</span></a>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
