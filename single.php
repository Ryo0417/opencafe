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
  <div class="l-single p-single">
    <div class="p-single__inner l-inner">
      <div class="p-single__wrapper">
        <figure class="p-single__img">
          <?php
          if (has_post_thumbnail()) {
            // アイキャッチ画像が設定されてれば大サイズで表示
            the_post_thumbnail('large');
          }
          ?>
        </figure>
        <div class="p-single__body">
          <h2 class="p-single__title">
            <?php the_title(); ?>
          </h2>
          <div class="p-single__meta">
            <time class="p-single__date" datetime="<?php the_time('c'); ?>">
              <?php the_time('Y/n/j'); ?>
            </time>
            <p class="p-single__label">
              <span>
                <?php $category = get_the_category();
                echo $category[0]->cat_name; ?>
              </span>
            </p>
          </div>
        </div>
        <article class="p-single__post">
          <?php the_content(); ?>
          <div class="p-single__pagination">
            <?php if (get_previous_post()) : ?>
              <div class="p-single__pager-prev">
                <?php previous_post_link('%link', '< 前の記事'); ?>
              </div>
            <?php endif; ?>
            <div class="p-single-pager__lists">
              <a href="<?php echo esc_url(home_url('/news')); ?>">記事一覧</a>
            </div>

            <?php if (get_next_post()) : ?>
              <div class="p-single__pager-next">
                <?php next_post_link('%link', '次の記事 >'); ?>
              </div>
            <?php endif; ?>
          </div>
        </article>
      </div>
    </div>
  </div>

  <!-- 関連記事 -->
  <div class="p-sub-news">
    <div class="p-sub-news__inner l-inner">
      <h2 class="p-sub-news__head p-sub-news__head--related">関連記事</h2>
      <div class="p-sub-news__wrapper">
        <div class="p-sub-news__content">
          <div class="p-sub-news__items p-sub-news__items--related">
            <?php
            $categ = get_the_category($post->ID);
            $catID = array();
            foreach ($categ as $cat) {
              array_push($catID, $cat->cat_ID);
            }
            $args = array(
              'post__not_in' => array($post->ID),
              'category__in' => $catID,
              'posts_per_page' => 6,
              'orderby' => 'rand'
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) : ?>
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <article class="p-sub-news__item p-sub-news__item--related">
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
            <?php endif;
            wp_reset_postdata();
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/common-access'); ?>
</main>
<?php get_footer(); ?>