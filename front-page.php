<?php
/*
Template Name: トップページ専用テンプレート
*/
?>
<?php get_header(); ?>
<canvas id="hero-canvas"></canvas>
<section class="page-contents">
  <section class="mainvisual" id="mainvisual">
    <div class="mv-main">
      <div class="mv-container">
        <h1 class="mv-catch">
          <span class="blur-reveal" style="animation-delay: 0.1s;">Beyond the</span>
          <span class="blur-reveal fc-pink" style="animation-delay: 0.3s;">Blind Spot.</span>
        </h1>
        <div class="mv-copy">見えない課題の、その先へ。</div>
        <div class="mv-copy-en"><span>Transform Blind Spots into Breakthrough Insights.</span></div>
        <p class="mv-txt">膨大なデータの向こうにある「真の課題」を発見し、<br>成果に直結する戦略へと昇華させる。<br>あなたのビジネスの死角を、競合優位に変える実装型パートナー。</p>
      </div>
    </div>
    <div class="mv-control" id="mv-control">
      <div class="scroll-down">
        <a href="#concept">SCROLL TO ARCHITECTURE</a>
      </div>
      <div class="circle-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
    </div>
  </section>
  <section class="top-main-section">
    <section class="section top-concept" id="top-concept">
      <div class="container">
        <h2 class="fadein">THE CORE CONCEPT</h2>
        <div class="top-concept-main fadein">
          <div class="left fadein-parts fadein-left">
            <p class="copy">機械の知性と、<br>人間の戦略を<br class="hidden-xs hidden-sm"><span class="fc-pink">「実装」</span>へ。</p>
            <p class="large">優れたマーケティングは、直感だけに<br>頼らない。</p>
            <p>DIGITALEYESが歪みを検知し、<br class="hidden-sm hidden-xs hidden-md">One Eightyが現場で動く形に実装する。<br>利益を生むインフラとして、成果が出るまで並走します。</p>
          </div>
          <div class="right">
            <div class="box fadein-parts fadein-right" data-fadein-delay="100">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/concept_bg_icon01.svg" alt="DIGITALEYE" width="90" height="91">
              <h4>DIGITALEYES</h4>
              <p class="catch">データから打ち手を導く</p>
              <p>膨大なユーザー行動・LTV構造を解体し、動かすべき「真の変数」を特定。死角をゼロにする解析知能。</p>
            </div>
            <div class="box fadein-parts fadein-right" data-fadein-delay="200">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/concept_bg_icon02.svg" alt="One Eighty" width="111" height="80">
              <h4>One Eighty</h4>
              <p class="catch">戦略から実装まで、並走する</p>
              <p>設計された変数に基づき、ズレのない高純度な施策を実装。知見を資産化するコンサルティング。</p>
            </div>
          </div>
        </div>
        <div class="top-concept-implemention fadein">
          <h3>Four Layers of Implemention</h3>
          <p>実装を完成する、４階層のプロトコル。</p>
          <ol>
            <li class="fadein-parts fadein-bottom" data-fadein-delay="100">
              <div class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/implemention_icon01.svg" alt="STRATEGY" width="32" height="41">
              </div>
              <div class="num">01/STRATEGY</div>
              <h4>数理的設計</h4>
              <p>DIGITALEYESによる現状分析から、事業の勝ち筋を数式化</p>
            </li>
            <li class="fadein-parts fadein-bottom" data-fadein-delay="200">
              <div class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/implemention_icon02.svg" alt="SYSTEM" width="42" height="42">
              </div>
              <div class="num">02/SYSTEM</div>
              <h4>データ基盤</h4>
              <p>判断が仕組みから生まれる状態へ。DIGITALEYESを核にした基盤構築。</p>
            </li>
            <li class="fadein-parts fadein-bottom" data-fadein-delay="300">
              <div class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/implemention_icon03.svg" alt="EXECUTION" width="44" height="30">
              </div>
              <div class="num">03/EXECUTION</div>
              <h4>高純度実装</h4>
              <p>データの示唆とズレのない施策をマーケットへ。</p>
            </li>
            <li class="fadein-parts fadein-bottom" data-fadein-delay="400">
              <div class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/implemention_icon04.svg" alt="ASSET" width="44" height="45">
              </div>
              <div class="num">04/ASSET</div>
              <h4>資産化循環</h4>
              <p>成果を変数として還元し、再現性を更新し続ける。</p>
            </li>
          </ol>
          <p class="end-copy ta-center fadein fadein-bottom">We don't sell tactics. <br class="hidden-lg hidden-md">We implement <br class="hidden-sm hidden-xs"><span class="fc-pink">architecture.</span></p>
          <p class="ta-center fadein fadein-bottom">戦術は売らない。構造を導入する。</p>
          <div class="btn-area ta-center fadein fadein-bottom">
            <div class="btn-group">
              <a href="<?php echo esc_url(home_url('/')); ?>solution/" class="btn btn-large">ソリューションについて詳しく見る</a>
              <a href="<?php echo esc_url(home_url('/')); ?>jissou/" class="btn btn-text">私たちの「実装アプローチ」について→</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section top-solution" id="top-solution">
      <h2 class="fadein">
        <span class="ja">実装を支える、独自の知能</span>
        <span class="en">PROPRIETARY INTELLIGENCE</span>
      </h2>
      <div class="top-solution-block block-digitaleyes">
        <div class="block-inner fadein">
          <div class="logo fadein-parts fadein-top"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/digitaleyes_logo.svg" alt="DIGITALEYE" width="248" height="32" loading="lazy"></div>
          <p class="fadein-parts fadein-bottom">データを可視化し、事業が加速する。</p>
          <div class="btn-group fadein-parts fadein-bottom">
            <a href="<?php echo esc_url(home_url('/')); ?>solution/digitaleyes/" class="btn btn-primary" target="_blank">詳しく見る</a>
            <a href="https://digital-eyes.jp/form/one-eighty/digitaleyes_download" class="btn btn-border-primary" target="_blank">資料請求</a>
          </div>
          <div class="img fadein-parts fadein-bottom">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/digitaleyes_img.png" alt="DIGITALEYE画面例" width="620" height="414" loading="lazy">
          </div>
        </div>
      </div>
      <div class="top-solution-row">
        <div class="top-solution-block block-flipt">
          <div class="block-inner fadein">
            <div class="logo fadein-parts fadein-top"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/flipt_logo.png" alt="flipt" width="240" height="42" loading="lazy"></div>
            <p class="fadein-parts fadein-bottom">マーケティングがこれ一つで。<br>ホテル向けブッキングエンジン</p>
            <div class="btn-group fadein-parts fadein-bottom">
              <span class="btn btn-border-primary comming-soon">Coming Soon</span>
            </div>
            <div class="img fadein-parts fadein-bottom">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/flipt_img.png" alt="flipt画面例" width="324" height="268" loading="lazy">
            </div>
          </div>
        </div>
        <div class="top-solution-block block-digipay">
          <div class="block-inner fadein">
            <div class="logo fadein-parts fadein-top"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/digipay_logo.png" alt="デジペイ" width="176" height="69" loading="lazy"></div>
            <p class="fadein-parts fadein-bottom">多様化する決済手段にすぐ対応。</p>
            <div class="btn-group fadein-parts fadein-bottom">
              <a href="<?php echo esc_url(home_url('/')); ?>solution/digipay/" class="btn btn-primary" target="_blank">詳しく見る</a>
              <a href="https://digital-eyes.jp/form/one-eighty/digitaleyes?inquiry2=%E3%83%87%E3%82%B8%E3%83%9A%E3%82%A4" class="btn btn-border-primary" target="_blank">資料請求</a>
            </div>
          </div>
        </div>
        <div class="top-solution-block block-map-boya">
          <div class="block-inner fadein">
            <div class="logo fadein-parts fadein-top"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/map-boya_logo.png" alt="Map-boya" width="280" height="94" loading="lazy"></div>
            <p class="fadein-parts fadein-bottom">Googleマップ上の情報と<br class="hidden-lg hidden-md">口コミの一元管理。</p>
            <div class="btn-group fadein-parts fadein-bottom">
              <a href="<?php echo esc_url(home_url('/')); ?>solution/map-boya/" class="btn btn-primary" target="_blank">詳しく見る</a>
              <a href="https://digital-eyes.jp/form/one-eighty/map-boya" class="btn btn-border-primary" target="_blank">資料請求</a>
            </div>
            <div class="img fadein-parts fadein-bottom">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/map-boya_img.png" alt="Map-boya画面例" width="218" height="276" loading="lazy">
            </div>
          </div>
        </div>
        <div class="top-solution-block block-reserve-one fadein">
          <div class="block-inner">
            <a href="<?php echo esc_url(home_url('/')); ?>solution/reserveone/" target="_blank">
              <div class="logo fadein-parts fadein-bottom"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/reserve-one_logo.png" alt="Reserve one" width="383" height="40" loading="lazy"></div>
              <p class="fadein-parts fadein-top">予約は、<br>ゴールではなく<br>第一歩。</p>
              <div class="img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/reserve-one_img.jpg" alt="Reserve one" width="697" height="569" loading="lazy">
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="top-works section">
      <div class="container">
        <h2 class="fadein">
          <span class="ja">実装してきた、確かな実績</span>
          <span class="en">WORKS</span>
        </h2>
        <?php
        $posts = array(
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post_type' => 'works'
        );
        query_posts($posts);
        if ( have_posts() ) : ?>
        <div class="project-list-slider fadein fadein-bottom">
          <div class="project-list swiper-wrapper">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="list-item swiper-slide">
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
            </div>
            <?php endwhile; ?>
          </div>
          <div class="swiper-button-wrapper">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
        <?php else: ?>
        <p>ワークスは現在準備中です。</p>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </div>
    </section>
    <section class="top-news section">
      <div class="container">
        <h2 class="fadein">
          <span class="ja">お知らせ</span>
          <span class="en">News & Press Release</span>
        </h2>
        <div class="inner fadein fadein-bottom">
          <div class="top-news__header">
            <ul class="top-news__category-list news-category-list">
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
          </div>
          <div class="top-news__content">
            <?php
            $posts = array(
              'post_status' => 'publish',
              'posts_per_page' => 5,
              'post_type' => 'post'
              );
            query_posts($posts);
            if ( have_posts() ) : ?>
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
              <?php endwhile; ?>
            </ul>
            <?php endif; wp_reset_query(); ?>
          </div>
          <div class="more-link">
            <a href="<?php echo esc_url(home_url('/')); ?>news/" class="btn-more">
              <span class="btn-container">
                <span class="btn-text">もっと見る</span>
                <span class="btn-arrow">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 110 110">
                    <circle cx="55" cy="55" r="50" />
                  </svg>
                </span>
              </span>
            </a>
          </div>
        </div>
      </div>
    </section>
  </section>
</section>

<?php get_footer(); ?>
<!-- Footer End -->