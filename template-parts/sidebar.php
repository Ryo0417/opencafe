<div class="p-sidebar l-sidebar">
  <aside class="p-sidebar__article">
    <h2 class="p-sidebar__head">最近の記事</h2>
    <div class="p-sidebar__latest-posts">
      <?php
      $args = array('posts_per_page' => 5,);
      $postslists = get_posts($args);
      foreach ($postslists as $postlist) :
        setup_postdata($postlist); ?>
        <a href="<?php the_permalink(); ?>" class="p-sidebar__single">
          <figure class="p-sidebar__img">
            <?php
            $alt = get_the_title();
            echo get_thumb_img('full', $alt); //functions.phpで設定した関数
            ?>
          </figure>
          <div class="p-sidebar__body">
            <h3><?php echo mb_substr($post->post_title, 0, 30) . '...'; ?></h3>
            <time><?php echo get_the_date('Y/n/j'); ?></time>
          </div>
        </a>
      <?php
      endforeach;
      wp_reset_postdata();
      ?>
    </div>
  </aside>
  <aside class="p-sidebar__article">
    <h2 class="p-sidebar__head">カテゴリ</h2>
    <ul class="p-sidebar__lists">
      <?php
      $categories = get_categories();
      foreach ($categories as $category) {
        echo '<li class="p-sidebar__list"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
      }
      ?>
    </ul>
  </aside>
</div>