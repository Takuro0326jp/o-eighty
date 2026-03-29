<?php get_header(); ?>

<section class="page-contents">
  <div class="page-heading">
    <div class="container">
      <div class="page-heading__container">
        <h1 class="heading-1">
          <span class="en">Download</span>
          <span class="ja">資料ダウンロード</span>
        </h1>
      </div>
    </div>
  </div>
  <section class="contents-section section pt-0">
    <div class="container">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <article class="download-detail">
        <div class="download-detail__thumbnail">
          <?php if ( has_post_thumbnail() ) : the_post_thumbnail('full'); else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/no_image_default.jpg" alt="">
          <?php endif; ?>
        </div>
        <div class="download-detail__content">
          <h1 class="post-title"><?php the_title(); ?></h1>
          <div class="post-contents cf">
            <?php the_content(); ?>
          </div>
          <?php if( get_field('download_url') ): ?>
          <div class="btn-area">
            <a href="<?php the_field('download_url'); ?>" target="_blank" class="btn-primary download-btn">ダウンロード</a>
          </div>
          <?php endif; ?>
        </div>
      </article><!-- .post-detail -->
      <div class="page-back">
        <a href="<?php echo esc_url(home_url('/download')); ?>" class="btn back-btn"><span class="btn-arrow">一覧に戻る</span></a>
      </div>
      <?php endwhile; else: ?>
      <p>記事が存在しません。</p>
      <?php endif; ?>
    </div>
  </section>
</section>
<?php get_footer(); ?>
