	</main>
	<!-- Main End -->
	<!-- Footer Start -->
	<footer class="site-footer">
		<div class="container">
			<div class="footer-main">
        <div class="footer-main__top">
          <div class="footer-logo">
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
              <span class="txt">株式会社ワンエイティ</span>
            </a>
          </div>
        </div>
        <div class="footer-main__nav">
          <nav class="footer-navigation">
            <div class="footer-navigation-group">
              <h4>
                <a href="<?php echo esc_url(home_url('/')); ?>">Top</a>
              </h4>
              <ul>
                <li>
                  <a href="<?php echo esc_url(home_url('/')); ?>about_us/more/">Philosophy</a>
                </li>
                <li>
                  <a href="<?php echo esc_url(home_url('/')); ?>news/">News</a>
                </li>
                <li>
                  <a href="<?php echo esc_url(home_url('/')); ?>category/column/">Column</a>
                </li>
                <li>
                  <a href="https://digital-eyes.jp/form/one-eighty/contact1" target="_blank">Contact</a>
                </li>
              </ul>
            </div>
            <div class="footer-navigation-group">
              <h4>
                <a href="<?php echo esc_url(home_url('/')); ?>solution/">Solution</a>
              </h4>
              <ul>
                <li>
                  <a href="<?php echo esc_url(home_url('/')); ?>solution/digitaleyes/">Digitaleyes</a>
                </li>
                <li>
                  <a href="<?php echo esc_url(home_url('/')); ?>solution/flipt/">Flipt</a>
                </li>
                <li>
                <a href="<?php echo esc_url(home_url('/')); ?>solution/digipay/">デジペイ</a>
                </li>
                <li>
                <a href="<?php echo esc_url(home_url('/')); ?>solution/map-boya/">Map-Boya</a>
                </li>
                <li>
                <a href="<?php echo esc_url(home_url('/')); ?>solution/reserveone/">Reserve ONE</a>
                </li>
              </ul>
            </div>
            <div class="footer-navigation-group">
              <h4>
                <a href="<?php echo esc_url(home_url('/')); ?>works/">Works</a>
              </h4>
              <?php
              $works_args = array(
                'post_type' => 'works',
                'post_status' => 'publish',
                'posts_per_page' => 8
              );
              $works_query = new WP_Query($works_args); if($works_query->have_posts()):
              ?>
              <ul>
              <?php while ($works_query->have_posts()): $works_query->the_post(); ?>
              <li>
                <a href="<?php the_permalink(); ?>">
                <?php echo get_the_title(); ?>
                </a>
              </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
              </ul>
              <?php endif; ?>
            </div>
            <div class="footer-navigation-group">
              <h4>
                <a href="<?php echo esc_url(home_url('/')); ?>sustainability/">Sustainability</a>
              </h4>
              <ul>
                <li>
                <a href="<?php echo esc_url(home_url('/')); ?>sustainability/">持続可能な取組</a>
                </li>
                <li>
                  <a href="<?php echo esc_url(home_url('/')); ?>sustainability/human_rights/">人権の尊重</a>
                </li>
                <li>
                  <a href="<?php echo esc_url(home_url('/')); ?>sustainability/workspace/">職場の環境</a>
                </li>
                <li>
                  <a href="<?php echo esc_url(home_url('/')); ?>sustainability/governance/">ガバナンス</a>
                </li>
                <li>
                  <a href="<?php echo esc_url(home_url('/')); ?>dx/">DXへの取組</a>
                </li>
              </ul>
            </div>
            <div class="footer-navigation-group">
              <h4>
                <a href="<?php echo esc_url(home_url('/')); ?>download/">Download</a>
              </h4>
              <?php
              $download_args = array(
                'post_type' => 'download',
                'post_status' => 'publish',
                'posts_per_page' => 8
              );
              $download_query = new WP_Query($download_args); if($download_query->have_posts()):
              ?>
              <ul>
              <?php while ($download_query->have_posts()): $download_query->the_post(); ?>
              <li>
                <a href="<?php the_permalink(); ?>">
                <?php echo get_the_title(); ?>
                </a>
              </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
              </ul>
              <?php endif; ?>
            </div>

            <div class="footer-navigation-group last-group">
              <h4>
                <a href="<?php if(!is_page('about_us')) echo esc_url(home_url('/about_us/')); ?>#overview">拠点</a>
              </h4>
              <ul>
                <li>
                  <a href="<?php if(!is_page('about_us')) echo esc_url(home_url('/about_us/')); ?>#overview">Consulting Front Base（青山）</a>
                </li>
                <li>
                  <a href="<?php if(!is_page('about_us')) echo esc_url(home_url('/about_us/')); ?>#overview">OE Studio（世田谷）</a>
                </li>
                <li>
                  <a href="<?php if(!is_page('about_us')) echo esc_url(home_url('/about_us/')); ?>#overview">OE Osaka（大阪）</a>
                </li>
                <li>
                  <a href="<?php if(!is_page('about_us')) echo esc_url(home_url('/about_us/')); ?>#overview">OE Naha（沖縄）</a>
                </li>
                <li>
                  <a href="<?php if(!is_page('about_us')) echo esc_url(home_url('/about_us/')); ?>#overview">OE Korea（韓国）</a>
                </li>
                <li>
                  <a href="<?php if(!is_page('about_us')) echo esc_url(home_url('/about_us/')); ?>#overview">OE Vietnum（ベトナム）</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <div class="footer-main__bottom">
          <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>privacy-policy/" class="ja">プライバシーポリシー</a></li>
            <li><a href="<?php echo esc_url(home_url('/')); ?>handling-personal-data/" class="ja">個人情報の取り扱いについて</a></li>
            <li><a href="<?php echo esc_url(home_url('/')); ?>security-policy/" class="ja">情報セキュリティ基本方針</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>/maintenance-service-usage-terms-and-conditions/" class="ja">保守サービス利用約款</a></li>
			<li><a href="https://o-eighty.com/digitaleyes_security/" class="ja" target="_blank" rel="noopener noreferrer">セキュリティポリシー</a></li>
			<li><a href="https://o-eighty.jp/legalnotice/">特定商取引法に基づく表記</a></li>
          </ul>
          <p class="copyright">&copy;2017 - OneEighty,inc. All Rights Reserved.</p>
        </div>
      </div>
		</div>
	</footer>
	<!-- Footer End -->

</div><!-- .wrapper -->
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/ofi.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js?v=1.0.4"></script>
<?php if (is_front_page()): ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/top.js?v=1.0.5"></script>
<?php endif; ?>
</body>
</html>
