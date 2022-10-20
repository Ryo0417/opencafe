<?php get_header(); ?>
<main>
  <div class="c-breadcrumb l-breadcrumb">
    <div class="c-breadcrumb__inner">
      <?php
      if (function_exists('bcn_display')) {
        bcn_display();
      }
      ?>
    </div>
  </div>

  <div class="p-sub-menu">
    <div class="p-sub-menu__inner l-inner">
      <div class="p-sub-menu__wrapper">
        <div class="p-sub-menu__tab c-tab">
          <ul class="c-tab__list js-tab-list">
            <?php
            $menu_terms = get_terms('genre', array(
              'hide_empty' => false,
              'parent' => 0,
            ));
            $counter = 0;
            foreach ($menu_terms as $menu_term) : ?>
              <li class="c-tab__menu js-tab">
                <?php if ($menu_term->slug == 'bread') { ?>
                  <a href="<?php echo esc_url(get_term_link($menu_term, 'genre')); ?>">
                    <?php echo preg_replace('/パン & スイーツ/', 'パン &<br> スイーツ', 'パン & スイーツ'); ?>
                  </a>
                <?php } else { ?>
                  <a href="<?php echo esc_url(get_term_link($menu_term, 'genre')); ?>">
                    <?php echo esc_html($menu_term->name); ?>
                  </a>
                <?php } ?>
              </li>
            <?php endforeach;
            wp_reset_postdata(); ?>
          </ul>
        </div>

        <?php
        $taxonomy_slug = 'genre'; // カスタムタクソノミーのスラッグを指定
        $post_type_slug = 'menu'; // 投稿タイプのスラッグを指定
        $terms = get_terms($taxonomy_slug, ['parent' => 0]); ?>

        <ul class="p-sub-menu__items p-sub-menu-items js-sub-menu-items">

          <?php if (have_posts()) : ?>
            <!-- <ul class="p-sub-menu__items p-sub-menu-items js-sub-menu-items"> -->
            <?php while (have_posts()) : the_post(); ?>

              <!-- 記事表示 start -->
              <li class="p-sub-menu__item p-sub-menu-item">
                <!-- 配列の場合 -->
                <?php $image = get_field('menu_img');
                $imgAlt = get_post_meta(get_post($image)->ID, '_wp_attachment_image_alt', true);
                if (!empty($image)) : ?>
                  <figure class="p-sub-menu-item__img">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $imgAlt; ?>" />
                  </figure>
                <?php endif; ?>
                <h3><?php echo get_field('menu_title') ?></h3>
                <span><?php echo get_field('menu_price') ?></span>
              </li>
              <!-- 記事表示 end -->
            <?php endwhile; ?>
            <!-- </ul> -->
          <?php endif; ?>
        </ul>
        <?php wp_reset_postdata();
        wp_reset_query(); ?>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/common-access'); ?>
</main>
<?php get_footer(); ?>