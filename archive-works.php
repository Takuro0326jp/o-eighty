<?php get_header(); ?>
<section class="project-archive">
  <div class="page-heading">
    <div class="container">
      <div class="page-heading__container">
        <h1 class="heading-1">
          <span class="en">Works</span>
          <span class="ja">ワークス</span>
        </h1>
      </div>
    </div>
  </div>
  <section class="contents-section section pt-0">
    <div class="container">
      <h2 class="heading-2"><span class="en">Works</span><span class="ja">デジタルに関するさまざまな取組</span></h2>
      <p class="archive-mes p-md">ウェブサイト制作から、予約システム等、複雑なウェブシステム、ロゴ開発、商品企画、<br class="hidden-xs hidden-sm">人事戦略、経営理念策定などなど、デジタルからスタートし、経営の深いところまでご協力させていただいております。<br>ご紹介できるプロジェクトを掲載していきます。</p>
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
      <div class="pager">
        <?php if(function_exists('wp_pagenavi')):
         wp_pagenavi();    //wp_pagenavi()の呼び出し
       endif; ?>
      </div><!-- .pager -->
    </div>
  </section>
</section>
<?php get_footer(); ?>
