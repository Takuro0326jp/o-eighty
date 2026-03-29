<?php get_header(); ?>
<section class="download-archive">
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
  <?php
  $args = array(
    'post_type' => 'download',
    'posts_per_page' => -1,
    'tax_query' => array(
      array(
        'taxonomy' => 'download_category',
        'field' => 'slug',
        'terms' => 'dx'
      )
    )
  );
  $the_query = new WP_Query($args); ?>
  <section class="contents-section">
    <div class="container">
      <h2 class="download-archive-title">DXに役立つ資料を<br>無料でダウンロードすることができます。</h2>
      <?php if($the_query->have_posts()): ?>
      <ul class="download-list">
      <?php while($the_query->have_posts()): $the_query->the_post(); ?>
        <li class="list-item">
          <a href="<?php the_permalink(); ?>">
            <span class="item-thumbnail">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('post-thumbnail'); ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/no_image_default.jpg" alt="">
              <?php endif; ?>
            </span>
            <span class="item-contents">
              <span class="post-title"><?php the_title(); ?></span>
              <?php if( get_field('download_description') ): ?>
              <span class="post-description">
              <?php nl2br(the_field('download_description')); ?>
              </span>
              <?php endif; ?>
            </span>
          </a>
        </li>
      <?php endwhile; // 繰り返し処理終了 ?>
      </ul>
      <?php else: ?>
      <p>資料は現在準備中です。</p>
      <?php endif; ?>
    </div>
  </section>
  <?php wp_reset_postdata(); ?>
  <?php
  $args = array(
    'post_type' => 'download',
    'posts_per_page' => -1,
    'tax_query' => array(
      array(
        'taxonomy' => 'download_category',
        'field' => 'slug',
        'terms' => 'basic'
      )
    )
  );
  $the_query = new WP_Query($args); ?>
  <section class="contents-section">
    <div class="container">
      <h2 class="download-archive-title">ワンエイティの基本資料</h2>
      <?php if($the_query->have_posts()): ?>
      <ul class="download-list">
      <?php while($the_query->have_posts()): $the_query->the_post(); ?>
        <li class="list-item">
          <a href="<?php the_permalink(); ?>">
            <span class="item-thumbnail">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('post-thumbnail'); ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/no_image_default.jpg" alt="">
              <?php endif; ?>
            </span>
            <span class="item-contents">
              <span class="post-title"><?php the_title(); ?></span>
              <?php if( get_field('download_description') ): ?>
              <span class="post-description">
              <?php nl2br(the_field('download_description')); ?>
              </span>
              <?php endif; ?>
            </span>
          </a>
        </li>
      <?php endwhile; // 繰り返し処理終了 ?>
      </ul>
      <?php else: ?>
      <p>資料は現在準備中です。</p>
      <?php endif; ?>
    </div>
  </section>
  <?php wp_reset_postdata(); ?>
</section>
<?php get_footer(); ?>
