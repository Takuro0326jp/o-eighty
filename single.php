<?php get_header(); ?>

<section class="news-detail page-contents section pt-0">
  <div class="container">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="post-detail">
      <div class="post-detail__container">
        <div class="post-data">
          <time class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></time>
          <div class="post-category">
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
            <a href="<?php echo esc_url(home_url('/category/')); ?><?php echo $term->slug; ?>" class="category-icon" style="
              <?php if ($font_color) echo 'color:'.$font_color.';';
              if ($background_color) echo 'background-color:'.$background_color.';';
              ?>
            "
            ><?php echo $term->name; ?></a>
            <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div><!-- .post-data -->
        <h1 class="post-title"><?php the_title(); ?></h1>
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="post-thumbnail">
            <?php the_post_thumbnail('full'); ?>
          </div>
        <?php endif; ?>
        <div class="post-contents cf">
          <?php the_content(); ?>
        </div>
        <?php
        $author_flg = false;
        if ($terms && ! is_wp_error($terms)) {
          foreach($terms as $term) {
            if($term->slug === 'column') {
              $author_flg = true;
            }
          }
        }
        if($author_flg):
        ?>
        <div class="post-author">
          <h3 class="post-author-title">この記事の執筆者</h3>
          <div class="post-author-contents">
            <div class="post-author-header">
              <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="52" height="15.135" viewBox="0 0 52 15.135">
                    <g class="logo-body" transform="translate(-2447.703 -159.448)">
                      <rect class="path-text" width="1.171" height="1.171" transform="translate(2478.861 173.347)" fill="#333"/>
                      <path class="path-mark" d="M1403.766,358.476c-1.983.654-2.308,1.74-2.687,1.423s.128-1.29-.836-2.709c0,0-2.557,5.66-2.648,5.938,1.484-.236,1.449-.279,1.752-.12.482.252-.136,1.981.534,3.355l3.884-7.887Z" transform="translate(1085.685 -196.041)" fill="#f02680"/>
                      <path class="path-mark" d="M1278.584,314.076a3.846,3.846,0,1,0-5.239,1.468,3.835,3.835,0,0,0,5.239-1.468" transform="translate(1207.505 -148.909)" fill="#f02680"/>
                      <path class="path-mark" d="M1464.673,389.429a1.973,1.973,0,0,1,1.116-.591,6.228,6.228,0,0,0-7.773-4.047l-.166.054h0a6.21,6.21,0,0,0-3.939,7.719c.017.057.036.112.055.168a6.231,6.231,0,0,0,11.783.01,1.981,1.981,0,0,1-1.076-3.312" transform="translate(1031.602 -222.411)" fill="#f02680"/>
                      <path class="path-mark" d="M1803.33,508.527a1.988,1.988,0,0,0-1.692-.517c.006.016.011.033.016.05a6.172,6.172,0,0,1-.057,3.853,1.983,1.983,0,0,0,1.733-3.386" transform="translate(695.754 -341.583)" fill="#f02680"/>
                      <rect class="path-text" width="7.545" height="0.716" transform="translate(2468.518 168.923)" fill="#333"/>
                      <path class="path-text" d="M977.74,463.475a3.771,3.771,0,0,1-3.771-3.762V457.19a3.771,3.771,0,0,1,7.542,0v1.348h-.7v-1.348a3.067,3.067,0,0,0-6.133,0v2.523a3.067,3.067,0,0,0,3.067,3.06h4.4v.7h-4.4Z" transform="translate(1494.558 -288.928)" fill="#333"/>
                      <path class="path-text" d="M682.428,463.414h-.7l0-6.223a3.064,3.064,0,0,0-3.068-3.061,3.068,3.068,0,0,0-3.068,3.061v6.224h-.7v-6.224a3.773,3.773,0,0,1,6.439-2.661,3.733,3.733,0,0,1,1.1,2.661l0,6.223Z" transform="translate(1783.223 -288.928)" fill="#333"/>
                      <path class="path-text" d="M383.593,605.582h-.7l0,1.019a3.064,3.064,0,0,1-3.068,3.061,3.068,3.068,0,0,1-3.068-3.061v-1.02h-.7v1.02a3.773,3.773,0,0,0,6.439,2.661,3.734,3.734,0,0,0,1.1-2.661l0-1.019Z" transform="translate(2071.651 -435.782)" fill="#333"/>
                      <path class="path-text" d="M383.593,459.251h-.7l0-2.06a3.064,3.064,0,0,0-3.068-3.061,3.068,3.068,0,0,0-3.068,3.061v2.061h-.7v-2.061a3.773,3.773,0,0,1,6.439-2.66,3.734,3.734,0,0,1,1.1,2.661l0,2.06Z" transform="translate(2071.651 -288.928)" fill="#333"/>
                    </g>
                  </svg>
                </a>
              </div>
              <div class="name">デジタライズ｜システム開発・データ活用チーム</div>
            </div>
            <div class="post-author-main">
              <p>株式会社ワンエイティは、日本のビジネスをデジタルで支えるソリューションカンパニーです。<br>設立以来、「すべての夢をデジタルでサポートする。」を掲げ、データ統合やマーケティング支援、業務効率化など、多彩なソリューションを提供し続けています。<br>ホテル・不動産・小売など幅広い業界で、データを軸にした集客や顧客管理、業務改善の仕組みづくりを支援。特にMEO対策やLINE連携、会員管理システムの提供など、現場で成果を生み出すサービスを展開しています。<br>現在は、デジタルマーケティングや業務自動化に加え、企業が保有するデータの利活用にも注力。データハブの構築や、AIを活用した顧客分析・マーケティング最適化を進めることで、日本企業のDX推進と成長を強力にサポートしています。</p>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </article><!-- .post-detail -->
    <div class="text-end more-link">
      <a href="<?php echo esc_url(home_url('/')); ?>news/" class="btn-more">
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
