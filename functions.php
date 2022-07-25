<?php
//スタイルの配列をjson形式にエンコードして渡す
function tiny_style_formats( $settings ) {

    $style_formats = [
		  array(
            'title' => 'マーカー(ブルー)',
            'inline' => 'span',
            'classes' => 'marker-line-blue',
            'wrapper' => 'true',
      ),
		  array(
            'title' => 'マーカー(レッド)',
            'inline' => 'span',
            'classes' => 'marker-line-red',
            'wrapper' => 'true',
      ),
		  array(
            'title' => 'マーカー(イエロー)',
            'inline' => 'span',
            'classes' => 'marker-line-yellow',
            'wrapper' => 'true',
      ),
		  array(
            'title' => 'マーカー(グリーン)',
            'inline' => 'span',
            'classes' => 'marker-line-green',
            'wrapper' => 'true',
      ),
	];

    $settings[ 'style_formats '] = json_encode( $style_formats );
    return $settings;
    }
add_filter( 'tiny_mce_before_init', 'tiny_style_formats' );

//クラシックエディタに反映
function original_styles_button( $buttons ){
    array_splice( $buttons, 1, 0, 'styleselect' );
    return $buttons;
}
add_filter('mce_buttons', 'original_styles_button' );

//cssの読み込み
function add_files() {
	wp_enqueue_style( 'user', get_template_directory_uri() . '/style-user.css', "", '2022' );
}
add_action( 'wp_enqueue_scripts', 'add_files' );

//エディタにデザイン反映
add_editor_style('style-user.css');