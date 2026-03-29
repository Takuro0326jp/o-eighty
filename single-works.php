<?php get_header(); ?>
<section class="news-detail page-contents section pt-0">
  <div class="container">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="post-detail">
      <div class="post-detail__container">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="post-thumbnail border">
            <?php the_post_thumbnail('full'); ?>
          </div>
        <?php endif; ?>
        <div class="post-contents cf">
          <?php the_content(); ?>
        </div>
      </div>
    </article><!-- .post-detail -->
    <div class="text-end more-link">
      <a href="<?php echo esc_url(home_url('/')); ?>works/" class="btn-more">
        <span class="btn-container">
          <span class="btn-text">一覧に戻る</span>
          <span class="btn-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 110 110">
              <circle cx="55" cy="55" r="50" />
            </svg>
          </span>
        </span>
      </a>
    </div>
    <?php endwhile; else: ?>
    <p>記事が存在しません。</p>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
