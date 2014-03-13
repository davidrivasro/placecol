<?php

	
    $custom_colors = '';

    if($this->display('title_color')) {
        $custom_colors .= ".logo h1 a{ color: #" . $this->get_option('title_color') ."; }\n";
    }
    if($this->display('title_span_color')) {
        $custom_colors .= ".logo h1 a span{ color: #" . $this->get_option('description_color') ."; }\n";
    }
    if($this->display('html_bg_color')) {
        $custom_colors .= "html{ background-color:#" . $this->get_option('html_bg_color') .";}\n";
    }
    if($this->display('html_bg_image')) {
        $custom_colors .= "html{ background-image:url(" . $this->get_option('html_bg_image') .");}\n";
    }
    if($this->display('html_bg_image_repeat')) {
        $custom_colors .= "html{ background-repeat:" . $this->get_option('html_bg_image_repeat') .";}\n";
    }
    if($this->display('html_bg_image_repeat_position')) {
        $custom_colors .= "html{ background-position:" . $this->get_option('html_bg_image_repeat_position') .";}\n";
    }
    if($this->display('body_bg_image')) {
        $custom_colors .= "body{ background-image:url(" . $this->get_option('body_bg_image') ."); }\n";
    }
    if($this->display('body_bg_image_repeat')) {
        $custom_colors .= "body{ background-repeat:" . $this->get_option('body_bg_image_repeat') ."; }\n";
    }
    if($this->display('body_bg_image_repeat_position')) {
        $custom_colors .= "body{ background-position:" . $this->get_option('body_bg_image_repeat_position') ."; }\n";
    }
	
	if($this->display('links_colors')) {
        $custom_colors .= "a { color: #" . $this->get_option('links_colors') ."; }\n";
		$custom_colors .= "h1 span, h2 span, h3 span, h4 span, h1 strong, h2 strong, h3 strong, h4 strong{ color: #" . $this->get_option('links_colors') ."; }\n";
		$custom_colors .= "ul#main_menu li a.selected, ul#main_menu li a:hover, ul#main_menu ul li a, ul#main_menu ul li ul li a, .footer_menu ul li.selected a, .footer_menu ul li a:hover, .footer_text, .footer_menu ul li a,  ul#main_menu li.current-menu-item a{ color: #" . $this->get_option('links_colors') ."; }\n";
		$custom_colors .= "@media screen and (max-width: 960px) {ul.filter_portfolio li.selected a, ul.filter_portfolio li a:hover{ background-color:#" . $this->get_option('links_colors') .";}}\n";
		$custom_colors .= "@media screen and (max-width: 960px) {ul.filter_portfolio li a{ color:#" . $this->get_option('links_colors') .";}}\n";	
		$custom_colors .= ".post_date, .post_date_nothumb, .service_pricespecial, input#searchsubmit, ul.filter_portfolio li.selected a, ul.filter_portfolio li a:hover, input.form_submit, a.icon_link_img, a.read_more{ background-color: #" . $this->get_option('links_colors') ."; }\n";
		$custom_colors .= ".footer_text a:hover { border-bottom: 1px dotted #" . $this->get_option('links_colors') ."; }\n";
    }
	if($this->display('lists_bullet')) {	
		$custom_colors .= "a.more, .left13 ul li, .entry ul li, .sidebar ul li { background:#" . $this->get_option('lists_bullet') ." no-repeat left;}\n";
    }
	if($this->display('dropdown_color')) {	
		$custom_colors .= "ul#main_menu ul, ul#main_menu ul li ul { background:#" . $this->get_option('dropdown_color') .";}\n";
    }
	if($this->display('slidercaption_bgcolor')) {	
		$custom_colors .= ".flex-caption { background-color:#" . $this->get_option('slidercaption_bgcolor') .";}\n";
    }
	
    if($this->display('mobile_menu_bg_color')) {
        $custom_colors .= "@media screen and (max-width: 960px) {.show_menu, .hide_menu, ul#main_menu, ul#main_menu{ background-color:#" . $this->get_option('mobile_menu_bg_color') .";}}\n";
    }
	
?>
