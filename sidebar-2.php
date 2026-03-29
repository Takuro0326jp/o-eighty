<div class="left-panel">
  <div class="community-sidebar">
    <div class="community-sidebar-logo">
      <a href="<?php echo esc_url(home_url('/oe_community')); ?>">
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
        <span class="logo-text">さぁ、働こう。</span>
      </a>
    </div>
    <div class="community-sidebar-search">
      <form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/oe_community/')); ?>">
        <input type="text" value="<?php echo get_search_query(); ?>" name="keyword" id="keyword" placeholder="キーワード" />
        <button type="submit" id="searchsubmit">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_search.svg" alt="Icon search" width="18" height="18">
        </button>
      </form>
    </div>
    <nav class="community-sidebar-nav">
      <ul class="nav-list">
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/oe_community')); ?>" class="nav-link">
            <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_bell.svg" alt="Icon bell" width="28" height="28"></i>
            <span class="text">新着記事</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/oe_community_ranking')); ?>" class="nav-link">
            <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_flag.svg" alt="Icon flag" width="28" height="28"></i>
            <span class="text">人気記事</span>
          </a>
        </li>
        <li class="nav-ac">
          <button type="button" class="nav-ac-btn active">
            <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_team.svg" alt="Icon team" width="28" height="28"></i>
            <span class="text">各チーム</span>
          </button>
          <?php
          if(is_tax('team')) {
            $page_slug = $term;
          }
          $terms = get_terms(
            array(
            'taxonomy' => 'team',
            'hide_empty' => 0,
            'orderby' => 'id')
          );
          if($terms): ?>
          <ul class="nav-ac-content nav-child-list">
            <?php foreach($terms as $term): ?>
              <li class="nav-child-item">
                <a href="<?php echo esc_url(home_url('/oe_community')).'/team/'.$term->slug; ?>" class="nav-child-link<?php if(is_tax('team') && $term->slug === $page_slug) echo ' current'; ?>"><?php echo $term->name; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </li>
        <li class="nav-item">
          <a href="https://oe-creative.notion.site/OE-c90adc68e1c649f7ab70d7f81d0e2158?pvs=4" class="nav-link" target="_blank">
            <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_draw.svg" alt="Icon draw" width="28" height="28"></i>
            <span class="text">制作物ギャラリー</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://oe.edbase.jp" class="nav-link" target="_blank">
            <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_monitor.svg" alt="Icon monitor" width="28" height="28"></i>
            <span class="text">OEトレーニング</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo esc_url(home_url('/staff')); ?>" class="nav-link">
            <i class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_staff.svg" alt="Icon staff" width="28" height="28"></i>
            <span class="text">スタッフ</span>
          </a>
        </li>
      </ul>
      <ul class="tool-list">
        <li>
          <a href="https://drive.google.com/file/d/1J7C61Z4fKBbbVyFkwezR11-FvY_jjx7G/view" target="_blank">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_slack.png" alt="slack" width="60" height="60">
          </a>
        </li>
        <li>
          <a href="https://drive.google.com/file/d/1icsoKlIdHKbZ1dMZ9XfdmOXH9mvN3KTq/view" target="_blank">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_backlog.png" alt="backlog" width="60" height="60">
          </a>
        </li>
        <li>
          <a href="https://drive.google.com/file/d/1LQMYpSD-mDZtdVIqhBfnECg_XD5jlEPT/view" target="_blank">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_jobcan.png" alt="jobcan" width="60" height="60">
          </a>
        </li>
        <li>
          <a href="https://drive.google.com/file/d/1HE684aTg9qr_e88yYSsjso5bZnBsVkPp/view" target="_blank">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community/icon_borad.png" alt="borad" width="60" height="60">
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>