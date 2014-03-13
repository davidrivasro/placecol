<?php global $famoustheme; ?>
<div class="sidebar <?php if($famoustheme->get_option('enable_sidebar_position') == 'left') { ?>sidebar_sl<?php } else { ?>sidebar_sr<?php }?>">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Blog') ) : ?>
<p class="widget_area_text">Sidebar Blog widget area.<br /> You can add widgets here from<br /> <span>Admin->Appearance->Widgets</span></p>
<?php endif; ?>
</div>