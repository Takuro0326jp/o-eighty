<?php get_header(); ?>
<section class="project-archive">
  <div class="page-heading">
    <div class="container">
      <div class="page-heading__container">
        <h1 class="heading-1">
          <span class="ja-large"><?php echo single_cat_title(); ?></span>
        </h1>
      </div>
    </div>
  </div>
  <section class="contents-section">
    <div class="container">
      <p class="archive-mes">ウェブサイト構築やウェブプロモーションだけでなく、事業自体のDX支援などデジタルに関することは<br class="hidden-xs hidden-sm">幅広く取り組んでいます。事業の企画段階から深く関わり、事業の成功を支援します。</p>
      <?php if ( have_posts() ) : ?>
      <ul class="project-list">
      <?php while ( have_posts() ) : the_post(); ?>
        <li class="list-item">
          <div class="item-thumbnail">
            <?php if(!empty($post->post_content)) { ?>
            <a href="<?php the_permalink(); ?>">
            <?php } ?>
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('post-thumbnail'); ?>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/no_image_default.jpg" alt="">
            <?php endif; ?>
            <?php if(!empty($post->post_content)) { ?>
            </a>
            <?php } ?>
          </div>
          <div class="item-contents">
            <?php if(!empty($post->post_content)) { ?>
            <a href="<?php the_permalink(); ?>">
            <?php } ?>
            <span class="post-title"><?php the_title(); ?></span>
            <?php if( get_field('project_description') ): ?>
            <span class="post-description">
            <?php echo nl2br(get_field('project_description')); ?>
            </span>
            <?php endif; ?>
            <?php if(!empty($post->post_content)) { ?>
            </a>
            <?php } ?>
          </div>
          </a>
        </li>
      <?php endwhile; // 繰り返し処理終了 ?>
      </ul>
      <?php else: ?>
      <p>ワークスは現在準備中です。</p>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div>
  </section>
</section>
<?php get_footer(); ?>
