<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" onclick="location.href='<?php echo base_url();?>'"> Hasta Takip Sistemi </a>
    </div>
    <?php if(isset($auth) && $auth === FALSE): ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#" onclick="location.href='<?php echo base_url()."login";?>'"><span class="glyphicon glyphicon-log-in"></span> <?php echo $nav_pro_login; ?> </a></li>
    </ul>
    <?php else: ?>
    <ul class="nav navbar-nav navbar-right">
      <li><p class="navbar-text"><?php echo $name." ".$surname; ?></p></li>
      <li><a href="#" onclick="location.href='<?php echo base_url()."dashboard";?>'"><?php echo $nav_pro_dashboard; ?></a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $nav_pro; ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#"><?php echo $nav_pro_inbox; ?></a></li>
          <li><a href="#"><?php echo $nav_pro_settings; ?></a></li>
          <li><a href="#"><?php echo $nav_pro_logout; ?></a></li>
        </ul>
      </li>
      <li><a href="#" onclick="location.href='<?php echo base_url()."login/logout/";?>'"> <?php echo $nav_pro_logout; ?> <span class="glyphicon glyphicon-log-out"></span></a></li>
    </ul>
    <?php endif; ?>
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $nav_lang; ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li>
            <a href="#" onclick="location.href='<?php echo base_url()."navbar/lang/english/".$page_controller."/";?>'"><?php echo $nav_lang_en; ?></a>
          </li>
          <li>
            <a href="#" onclick="location.href='<?php echo base_url()."navbar/lang/turkish/".$page_controller."/";?>'"><?php echo $nav_lang_tr; ?></a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
