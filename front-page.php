<?php get_header(); ?>
<main>
  <div class="p-mv l-mv js-mv">
    <!-- pc-nav -->
    <div class="p-mv__wrapper u-desktop">
      <nav class="p-mv__pc-nav p-pc-nav">
        <div class="p-mv__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo_dark.svg" alt="ヘッダーロゴ" />
          </a>
        </div>
        <ul class="p-pc-nav__items js-pc-nav-items">
          <li class="p-pc-nav__item js-pc-nav-item">
            <a href="<?php echo esc_url(home_url('/')); ?>">
              top<span>トップ</span>
            </a>
          </li>
          <li class="p-pc-nav__item">
            <a href="<?php echo esc_url(home_url('/concept')); ?>">
              concept<span>コンセプト</span>
            </a>
          </li>
          <li class="p-pc-nav__item">
            <a href="<?php echo esc_url(home_url('/menu')); ?>">
              menu<span>メニュー</span>
            </a>
          </li>
          <li class="p-pc-nav__item">
            <a href="<?php echo esc_url(home_url('/news')); ?>">news<span>お知らせ</span></a>
          </li>
          <li class="p-pc-nav__item">
            <a href="<?php echo esc_url(home_url('/shop')); ?>">shop<span>店舗情報</span>
            </a>
          </li>
          <li class="p-pc-nav__item">
            <a href="<?php echo esc_url(home_url('/gift')); ?>">gift<span>ギフト・贈り物</span>
            </a>
          </li>
          <li class="p-pc-nav__item p-pc-nav__item--white">
            <a href="<?php echo esc_url(home_url('/contact')); ?>">contact<span>お問い合わせ</span>
            </a>
          </li>
          <div class="p-pc-nav__icon-wrapper c-sns">
            <figure class="c-sns__twitter c-sns__twitter--pc">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icon_twitter-dark.svg" alt="">
            </figure>
            <figure class="c-sns__youtube c-sns__youtube--pc">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icon_youtube-dark.svg" alt="">
            </figure>
            <figure class="c-sns__instagram c-sns__instagram--pc">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icon_instagram-dark.svg" alt="">
            </figure>
          </div>
        </ul>
      </nav>
      <!-- スライダーのメインコンテナの div 要素（必須） -->
      <div class="p-mv__slider swiper js-slider">
        <!-- スライドを囲む div 要素（必須） -->

        <div class="swiper-wrapper">

          <!-- それぞれのスライドの div 要素（必須） -->
          <div class="swiper-slide">
            <picture class="bg-slide-image">
              <source srcset="<?php echo get_template_directory_uri(); ?>/images/img_mainvisual1_sp.jpg" media="(max-width: 767px)" />
              <source srcset="<?php echo get_template_directory_uri(); ?>/images/img_mainvisual1.jpg" media="(min-width: 768px)" />
              <img src="<?php echo get_template_directory_uri(); ?>/images/img_mainvisual1.jpg" alt=""><!-- それ以外で表示 -->
            </picture>
          </div>
          <div class="swiper-slide">
            <picture class="bg-slide-image">
              <source srcset="<?php echo get_template_directory_uri(); ?>/images/img_mainvisual2_sp.jpg" media="(max-width: 767px)" />
              <source srcset="<?php echo get_template_directory_uri(); ?>/images/img_mainvisual2.jpg" media="(min-width: 768px)" />
              <img src="<?php echo get_template_directory_uri(); ?>/images/img_mainvisual2.jpg" alt=""><!-- それ以外で表示 -->
            </picture>
          </div>
          <div class="swiper-slide">
            <picture class="bg-slide-image">
              <source srcset="<?php echo get_template_directory_uri(); ?>/images/img_mainvisual3_sp.jpg" media="(max-width: 767px)" />
              <source srcset="<?php echo get_template_directory_uri(); ?>/images/img_mainvisual3.jpg" media="(min-width: 768px)" />
              <img src="<?php echo get_template_directory_uri(); ?>/images/img_mainvisual3.jpg" alt=""><!-- それ以外で表示 -->
            </picture>
          </div>

        </div>
        <!-- ページネーションの div 要素（省略可能） -->
        <div class="swiper-pagination"></div>
        <h2 class="slide-content">パスタとコーヒーが<br class="u-mobile">とってもおいしい、 <br>ほっと落ち着くのんびり空間。</h2>
      </div>

      <!-- 最新記事表示 -->
      <?php
      $posts = get_posts(array(
        'posts_per_page' => 1,
        'meta_key'       => '_thumbnail_id'
      ));
      if ($posts) :
        foreach ($posts as $post) :
      ?>
          <article class="p-mv__article p-latest">
            <a href="<?php echo get_permalink($data[0]->ID); ?>">
              <div class="p-latest__wrapper">
                <div class="p-latest__tag-wrapper">
                  <div class="p-latest__tag">
                    <!-- 記事のカテゴリを取得 -->
                    <?php
                    $category = get_the_category();
                    echo $category[0]->cat_name;
                    ?>
                  </div>
                </div>
                <figure class="p-latest__img">
                  <?php
                  if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID);
                  }
                  ?>
                </figure>
                <div class="p-latest__body">
                  <!-- 記事の投稿日時を取得 -->
                  <time datetime="<?php the_time('c'); ?>"><?php the_time('Y.n.j'); ?></time>
                  <h2><?php echo esc_html($post->post_title); ?></h2>
                </div>
              </div>
              <!-- タイトル取得 -->
              <?php echo ($data[0]->post_title); ?>
            </a>
          </article>
      <?php
        endforeach;
      endif;
      ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>

  <!-- concept -->
  <div class="l-bg-concept">
    <section class="p-concept l-concept">
      <div class="p-concept__inner">
        <div class="p-concept__container">
          <div class="p-concept__body">
            <h2 class="p-concept__head c-section-head">
              concept<span>当店のこだわり</span>
            </h2>
            <h3 class="p-concept__title">最高のコーヒーと、<br>
              時の流れを味わうことができる<br>手作りカフェ</h3>
            <p class="p-concept__text">ダミー_国内外から賞賛を<br>受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。<br>ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。</p>
            <p class="p-concept__text">ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。</p>
            <div class="p-concept__btn">
              <a href="<?php echo esc_url(home_url('/concept')); ?>" class="p-concept__link c-btn">詳しくはこちら</a>
            </div>
          </div>
          <figure class="p-concept__img">
            <img src="<?php echo get_template_directory_uri(); ?>/images/img_concept.jpg" alt="">
          </figure>
        </div>


      </div>
    </section>
  </div>

  <!-- lunch -->
  <section class="p-lunch l-lunch">
    <div class="p-lunch__inner">
      <h2 class="p-lunch__head c-section-head">
        spesial lunch set<span>今月のスペシャルランチセット</span>
      </h2>
      <div class="p-lunch__wrapper">
        <ul class="p-lunch__items">
          <?php
          $args = array(
            'post_type' => 'special',
            'posts_per_page' => '-1'
          );
          ?>
          <?php $my_query = new WP_Query($args); ?>
          <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <li class="p-lunch__item p-lunch-item">
              <figure class="p-lunch-item__img">
                <?php if (get_field('lunch_img')) : ?>
                  <img src="<?php the_field('lunch_img'); ?>" />
                <?php endif; ?>
              </figure>
              <div class="p-lunch-item__body">
                <span class="p-lunch-item__label">
                  <?php echo get_field('lunch_label'); ?>
                </span>
                <h3 class="p-lunch-item__title">
                  <?php echo get_field('lunch_title'); ?>
                </h3>
              </div>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
        <div class="p-lunch__set p-set">
          <div class="p-set__content">
            <figure class="p-set__img">
              <img src="<?php echo get_template_directory_uri(); ?>/images/lunch-set.png" alt="">
            </figure>
            <div class="p-set__body">
              <h3 class="p-set__title">
                スペシャルランチセット<br>【選べる3品】
              </h3>
              <p class="p-set__price">1,280 yen</p>
              <span>(11:00 AM〜14:00 PMまで)</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- menu -->
  <section class="p-menu l-menu">
    <div class="p-menu__inner l-inner">
      <h2 class="p-menu__head c-section-head">
        grand menu<span>グランドメニュー</span>
      </h2>
      <div class="p-menu__container">
        <?php
        $tax_name = 'genre';
        $posttype_name = 'menu';
        $terms = get_terms($tax_name, $args = array(
          'exclude_tree' => array(7)
        ));
        foreach ($terms as $term) :

          $args = array(
            'post_type' => 'menu',
            'posts_per_page' => 4,
            'tax_query' => array(
              array(
                'taxonomy' => 'genre',
                'field'    => 'slug',
                'terms'    => $term->slug,
              )
            )
          );
          $the_query = new WP_Query($args); ?>
          <?php if ($term->slug !== 'drink') : ?>
            <!-- ターム名 start -->
            <h2 class="p-menu__genre"><?php echo $term->name ?></h2>
            <!-- ターム名 end -->
            <?php if ($the_query->have_posts()) : ?>
              <ul class="p-menu__items p-menu-items">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                  <!-- 記事表示 start -->
                  <li class="p-menu__item p-menu-item">
                    <!-- 配列の場合 -->
                    <?php $image = get_field('menu_img');
                    $imgAlt = get_post_meta(get_post($image)->ID, '_wp_attachment_image_alt', true);
                    if (!empty($image)) : ?>
                      <figure class="p-menu-item__img">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $imgAlt; ?>" />
                      </figure>
                    <?php endif; ?>
                    <h3><?php echo get_field('menu_title') ?></h3>
                    <span><?php echo get_field('menu_price') ?></span>
                  </li>
                  <!-- 記事表示 end -->
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
          <?php else : ?>
          <?php endif; ?>
        <?php endforeach;
        wp_reset_postdata(); ?>


        <?php
        $taxonomyName = 'genre';
        $posttype_name = 'menu';
        $terms = get_terms($tax_name, $args = array(
          'exclude_tree' => array(4, 5, 8),
          'parent' => 0
        )); ?>

        <?php
        //親を取得
        foreach ($terms as $term) { ?>
          <?php $terms = get_terms($taxonomyName, $args); ?>
          <h2 class="p-menu__genre"><?php echo $term->name ?></h2>
          <div class="p-menu__wrapper">
            <?php
            //親のIDを取得できた
            $parentId = $term->term_id;

            /*ここから親タームのIDがそれぞれ取得できるので、そこから子タームのリストを作る*/
            //さっきはparentが0だったが、こんかいはparentが親IDの場合の条件
            //
            $childargs = array(
              'parent' => $parentId,
              'hide_empty' => false //投稿がない場合も隠さずにだす
            );
            $childterms = get_terms($taxonomyName, $childargs); ?>
            <figure class="p-menu__drink-img">
              <?php echo wp_get_attachment_image(get_post_meta($post->ID, "drink_img", true), 'full'); ?>
            </figure>
            <div class="p-menu__content">
              <?php foreach ($childterms as $childterm) {
                $targetSlug = $childterm->slug; ?>
                <div class="p-menu__box">
                  <h3 class="p-menu__genre-child"><?php echo $childterm->name ?></h3>
                  <?php
                  //子ターム情報が取得できたので、ここからget_posts用に準備
                  $postargs = array(
                    'post_type' => 'menu',
                    'tax_query' => array(
                      array(
                        'taxonomy' => $taxonomyName,
                        'field' => 'slug', //フィールドをslugにしておくterm_idとかでも良いはず
                        'terms' => $targetSlug //上で準備してある$childterm->slug
                      )
                    )
                  );
                  //あとはいつも通り取得
                  $postslist = get_posts($postargs);

                  foreach ($postslist as $post) : setup_postdata($post); ?>
                    <div class="p-menu__body">
                      <h4><?php echo get_field('menu_title') ?></h4>
                      <span><?php echo get_field('menu_price') ?></span>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php wp_reset_postdata();
              } ?>
            </div>
          <?php } ?>
          </div>
          <div class="p-menu__btn">
            <a href="<?php echo esc_url(home_url('/menu')); ?>" class="p-menu__link c-btn">その他のメニュー</a>
          </div>
      </div>
    </div>
  </section>

  <!-- gallery -->
  <section class="p-gallery">
    <div class="p-gallery__inner l-inner">
      <h2 class="p-gallery__head c-section-head">
        gallery<span>ギャラリー</span>
      </h2>
      <div class="p-gallery__content">
        <figure class="p-gallery__img">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/src/images/img_gallery1.jpg" alt="">
          </a>
        </figure>
        <figure class="p-gallery__img">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/src/images/img_gallery2.jpg" alt="">
          </a>
        </figure>
        <figure class="p-gallery__img">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/src/images/img_gallery3.jpg" alt="">
          </a>
        </figure>
        <figure class="p-gallery__img">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/src/images/img_gallery4.jpg" alt="">
          </a>
        </figure>
      </div>
      <div class="p-gallery__btn">
        <a href="" class="c-btn">インスタグラムを見る</a>
      </div>
    </div>
  </section>

  <!-- news -->
  <section class="p-news">
    <div class="p-news__inner l-inner">
      <h2 class="c-section-head">
        news<span>お知らせ</span>
      </h2>
      <div class="p-news__content">
        <div class="p-news__items">
          <?php
          $posts = get_posts();
          $counter = 1;
          foreach ($posts as $post) : // ループの開始
            setup_postdata($post); // 記事データの取得
          ?>
            <?php if ($counter <= 1) : //1件目の記述 
            ?>
              <article class="p-news__item p-news__item--first">
                <a href="<?php the_permalink(); ?>" class="p-news__link">
                  <figure class="p-news__img p-news__img--first">
                    <?php
                    if (has_post_thumbnail()) {
                      // アイキャッチ画像が設定されてれば大サイズで表示
                      the_post_thumbnail('large');
                    }
                    ?>
                  </figure>
                  <p class="p-news__label p-news__label--first">
                    <span>
                      <?php $category = get_the_category();
                      echo $category[0]->cat_name; ?>
                    </span>
                  </p>
                  <h3 class="p-news__title p-news__title--first">
                    <?php the_title(); ?>
                  </h3>
                  <p class="p-news__text">
                    <?php the_excerpt(); ?>
                  </p>
                  <time class="p-news__date p-news__date--first" datetime="<?php the_time('c'); ?>">
                    <?php the_time('Y/n/j'); ?>
                  </time>
                </a>
              </article>
              <?php $counter++; ?>

              <?php if ($counter == 2) {
                echo ('<div class="p-news__other">');
              }
              ?>

            <?php else : //2件目以降の記述 
            ?>
              <article class="p-news__item">
                <a href="<?php the_permalink(); ?>" class="p-news__link">
                  <figure class="p-news__img">
                    <?php
                    if (has_post_thumbnail()) {
                      // アイキャッチ画像が設定されてれば大サイズで表示
                      the_post_thumbnail('large');
                    }
                    ?>
                  </figure>
                  <p class="p-news__label">
                    <span>
                      <?php $category = get_the_category();
                      echo $category[0]->cat_name; ?>
                    </span>
                  </p>
                  <h3 class="p-news__title">
                    <?php the_title(); ?>
                  </h3>
                  <time class="p-news__date" datetime="<?php the_time('c'); ?>">
                    <?php the_time('Y/n/j'); ?>
                  </time>
                </a>
              </article>
          <?php endif;

          endforeach; // ループの終了
          wp_reset_postdata();
          ?>
        </div>
      </div>
    </div>
    <div class="p-news__btn">
      <a href="<?php echo esc_url(home_url('/news')); ?>" class="c-btn">過去のお知らせ</a>
    </div>
    </div>
  </section>

  <?php get_template_part('template-parts/common-access'); ?>
</main>
<!-- 共通パーツ -->
<!-- <a href="" class="c-btn">詳しくはこちら</a>

  <h2 class="c-section-head">
    CONCEPT<span>当店のこだわり</span>
  </h2> -->
<?php get_footer();
