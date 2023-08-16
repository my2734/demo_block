<?php 
class shortcodeInit{
    public function __construct()
    {
        add_shortcode('display_gallery', [$this,'display_gallery_func']);
    }


    function display_gallery_func(){
        include(PROJECT_MANAGEMENT_PATH.'shortcode/template/display_list_image.php');
    }
}
