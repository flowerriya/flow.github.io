<?php

//自动给修改网站登陆页面logo
function customize_login_logo(){         
    echo '<style type="text/css">
        .login{position: relative;width: 100%;background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, #ff5f6d 0%, #ffb270 100%) repeat scroll 0 0;background: rgba(0, 0, 0, 0) linear-gradient(to right, #ff5f6d 0%, #ffb270 100%) repeat scroll 0 0;overflow: hidden;background-size: cover;background-position: center center;z-index: 1;}.login h1 a { background-image:url('.get_template_directory_uri() .'/assets/images/logo.png); width: 180px; max-height: 100px;margin: 20px auto 15px; background-size: contain;background-repeat: no-repeat;background-position: center center;}
		.login form{border-radius: 10px;}
        </style>';   
  
}  
add_action('login_head', 'customize_login_logo');   

add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return 'https://www.boxmoe.com';
}

// 后台Ctrl+Enter提交评论回复
add_action('admin_footer', '_admin_comment_ctrlenter');
function _admin_comment_ctrlenter() {
	echo '<script type="text/javascript">
        jQuery(document).ready(function($){
            $("textarea").keypress(function(e){
                if(e.ctrlKey&&e.which==13||e.which==10){
                    $("#replybtn").click();
                }
            });
        });
    </script>';
};

//编辑器TinyMCE增强
function enable_more_buttons($buttons)
{
	$buttons[] = 'hr';
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';
	$buttons[] = 'wp_page';
	$buttons[] = 'anchor';
	$buttons[] = 'backcolor';
	return $buttons;
}
add_filter("mce_buttons_3", "enable_more_buttons");


?>