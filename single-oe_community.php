<?php get_header('2'); if( is_user_logged_in() ): ?>
<div class="community-container">
  <div class="breadcrumbs">
    <div class="breadcrumbs-list">
    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="<?php bloginfo('name'); ?>へ移動する" href="<?php echo get_bloginfo("url"); ?>/oe_community" class="home"><span property="name">トップ</span></a><meta property="position" content="1"></span><span property="itemListElement" typeof="ListItem"><span property="name" class="post post-page current-item"><?php echo get_the_title(); ?></span><meta property="url" content="<?php echo get_the_permalink(); ?>"><meta property="position" content="2"></span></div>
  </div>
  <?php if (have_posts()): while (have_posts()): the_post();
  $author = get_userdata($post->post_author);
  ?>
  <article class="community-detail">
    <?php
    $mainImage = get_field('main_image');
    if( !empty( $mainImage ) ): ?>
    <div class="community-detail__thumbnail">
    <img src="<?php echo esc_url($mainImage['url']); ?>" alt="<?php echo esc_attr($mainImage['alt']); ?>" width="<?php echo $mainImage['width']; ?>" height="<?php echo $mainImage['height']; ?>">
    </div>
    <?php endif; ?>
    <div class="community-detail__content">
      <time class="post-date"><?php the_modified_date('Y年n月j日'); ?> 更新</time>
      <div class="post-data">
        <div class="post-tags">
        <?php $taxonomy = 'team';
        $terms = get_the_terms( $post->ID, $taxonomy );
    
        $taxonomy_tags = 'community_tag';
        $tags = get_the_terms( $post->ID, $taxonomy_tags );

        if ($terms && ! is_wp_error($terms) || $tags && ! is_wp_error($tags)): ?>
        <div class="tag-group">
          <?php
          if ($terms && ! is_wp_error($terms)):
            foreach($terms as $term):
          ?>
          <a href="<?php echo esc_url(home_url('/oe_community')); ?>/team/<?php echo $term->slug; ?>" class="tag-item"><?php echo $term->name; ?></a>
          <?php endforeach; endif;  ?>
          <?php
          if ($tags && ! is_wp_error($tags)):
            foreach($tags as $tag):
          ?>
          <a href="<?php echo esc_url(home_url('/oe_community')); ?>/tag/<?php echo $tag->slug; ?>" class="tag-item"><?php echo $tag->name; ?></a>
          <?php endforeach; endif;  ?>
        </div>
        <?php endif; 
        ?>
        </div>
      </div><!-- .post-data -->
      <h1 class="post-title"><?php the_title(); ?></h1>
      <div class="post-author">
        <div class="thumbnail">
          <?php echo get_avatar( $author->ID, 80 ); ?>
        </div>
        <div class="text">
          <?php if($author->nickname){ ?>
          <div class="user-name"><?php echo $author->nickname; ?></div>
          <?php }
          if($author->description){ ?>
          <div class="user-description"><?php echo $author->description; ?></div>
          <?php } ?>
        </div>
      </div>
      <div class="post-contents cf">
        <?php the_content(); ?>
      </div>
    </div>
    <div class="community-detail__comment">
      <?php
      if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
      ?>
    </div>
    <div class="page-back">
      <a href="<?php echo esc_url(home_url('/oe_community')); ?>" class="btn back-btn">一覧に戻る</a>
    </div>
  </article><!-- .post-detail -->
  <?php endwhile; else: ?>
  <p>記事が存在しません。</p>
  <?php endif; ?>
</div>
<?php endif; get_footer('2'); ?>
