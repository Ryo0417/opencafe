<?php

/**
 * Functions
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
// カスタム投稿にアイキャッチ画像を使用
register_post_type(
	'menu',
		array(
		// 'supports'に'thumbnail'を追記
		'supports' => array('title','editor','thumbnail') 
		)
	);

function my_setup()
{
	add_theme_support('post-thumbnails'); /* アイキャッチ */
	add_theme_support('automatic-feed-links'); /* RSSフィード */
	add_theme_support('title-tag'); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action('after_setup_theme', 'my_setup');

// アイキャッチのaltに記事タイトル自動挿入
function get_thumb_img($size = 'full', $alt = null) {
  $thumb_id = get_post_thumbnail_id();
  $thumb_img = wp_get_attachment_image_src($thumb_id, $size);
  $thumb_src = $thumb_img[0];
  $alt = ($alt) ? $alt : get_the_title(); 
  return '<img src="'.$thumb_src.'" alt="'.$alt.'">';
}


/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{
	//WordPress 本体の jQuery を登録解除
	wp_deregister_script('jquery');
	// swiper
	wp_enqueue_style(
		'swiper',
		'//unpkg.com/swiper@8/swiper-bundle.min.css',
		array(),
		'1.0.1',
		'all'
	);
	wp_enqueue_script(
		'swiper',
		'//unpkg.com/swiper@8/swiper-bundle.min.js'
	);


	wp_enqueue_style('mycss', get_template_directory_uri() . '/css/style.css', array(), '1.0.1', 'all');

	wp_enqueue_script(
		'jquery',
		'//code.jquery.com/jquery-3.6.1.min.js'
	);

	wp_enqueue_script('myjs', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.1', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');



/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
function my_menu_init()
{
	register_nav_menus(
		array(
			'global'  => 'ヘッダーメニュー',
			'utility' => 'ユーティリティメニュー',
			'drawer'  => 'ドロワーメニュー',
		)
	);
}
add_action('init', 'my_menu_init');

// 投稿のアーカイブページを作成する
function post_has_archive($args, $post_type)
{
	if ('post' == $post_type) {
		$args['rewrite'] = true; // リライトを有効にする
		$args['has_archive'] = 'news'; // 任意のスラッグ名
	}
	return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

function new_excerpt_mblength($length)
{
	return 50; //抜粋する文字数を50文字に設定
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');

//アイキャッチ画像をシンプルにする
add_filter('post_thumbnail_html', 'custom_attribute');
function custom_attribute($html)
{
	$html = preg_replace('/class=".*\w+"\s/', '', $html);    // class を削除する
	$html = preg_replace('/(width|height)="\d*"\s/', '', $html);    // width height を削除する
	return $html;
}

remove_filter('the_title', 'wpautop');  // タイトル蘭
remove_filter('the_content', 'wpautop');  // 本文欄
remove_filter('comment_text', 'wpautop');  // コメント欄
remove_filter('the_excerpt', 'wpautop');  // 抜粋欄

// コンテンツごとにアーカイブの表示件数を変更する
function change_posts_per_page($query) {
	if ( is_admin() || ! $query->is_main_query() )
		return;

		/* アーカイブページの時に表示件数を10件にセット */
	if ( $query->is_archive() ) {
		$query->set( 'posts_per_page', '10' );
	}
		/* ポストアーカイブ(menuの時に表示件数を24件にセット */
	if ( $query->is_post_type_archive('menu') ) {
		$query->set( 'posts_per_page', '24' );
	}
		/* ポストアーカイブ(shopの時に表示件数を全件にセット */
	if ( $query->is_post_type_archive('shop') ) {
		$query->set( 'posts_per_page', '-1' );
		$query->set( 'order', 'ASC');
	}
		/* ポストアーカイブ(giftの時に表示件数を全件にセット */
	if ( $query->is_post_type_archive('gift') ) {
		$query->set( 'posts_per_page', '-1' );
		$query->set( 'order', 'ASC');
	}
		/* タクソノミーgenreページの時に表示件数を6件にセット */
	if ( $query->is_tax('genre') ) {
		$query->set( 'posts_per_page', '6' );
	}
	// if ( $query->is_tax('blog_genre') ) {
	// 	$query->set( 'posts_per_page', '9' );
	// }
	// 	/* 検索ページの時に表示件数を20件にセット */
	// if ( $query->is_search() ) {
	// 	$query->set( 'posts_per_page', '20' );
	// }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );