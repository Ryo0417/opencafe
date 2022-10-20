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
  <div class="p-sub-news">
    <div class="p-sub-news__inner l-inner">
      <div class="p-sub-news__wrapper">
        <div class="p-sub-news__content">
          <div class="p-sub-news__items">
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <article class="p-sub-news__item p-sub-news__item--first">
                  <a href="<?php the_permalink(); ?>" class="p-sub-news__link">
                    <figure class="p-sub-news__img">
                      <?php
                      if (has_post_thumbnail()) {
                        // アイキャッチ画像が設定されてれば大サイズで表示
                        the_post_thumbnail('large');
                      }
                      ?>
                    </figure>
                    <p class="p-sub-news__label">
                      <span>
                        <?php $category = get_the_category();
                        echo $category[0]->cat_name; ?>
                      </span>
                    </p>
                    <h3 class="p-sub-news__title">
                      <?php the_title(); ?>
                    </h3>
                    <time class="p-sub-news__date" datetime="<?php the_time('c'); ?>">
                      <?php the_time('Y/n/j'); ?>
                    </time>
                  </a>
                </article>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
          <div class="c-wp-pagenavi">
            <?php wp_pagenavi(); ?>
          </div>
        </div>
        <?php get_template_part('template-parts/sidebar') ?>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/common-access'); ?>
</main>

<?php get_footer(); ?>