
<?php if ($user_category === "DOCTOR") :?>

<div class="row">
  <div class="col-lg-2">
    <nav class="navbar navbar-default" style=" z-index:9;">
      <div class="container-fluid" style="height: 1px;padding-left: 0px;padding-right: 0px;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sideNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="menu_left" class="list-group">
          <a href="#" class="list-group-item" data-nav="board">
            <span class="glyphicon glyphicon-tasks text-info"></span> <?php echo $menu_left_item_1; ?>
          </a>
          <a href="#" class="list-group-item" data-nav="deviceInformations">
            <span class="glyphicon glyphicon-info-sign text-info"></span> <?php echo $menu_left_item_2; ?>
          </a>
          <a href="#" class="list-group-item" data-nav="patientInformations">
            <span class="glyphicon glyphicon-info-sign text-info"></span> <?php echo $menu_left_item_3; ?>
          </a>
          <a href="#" class="list-group-item" data-nav="patientLogSchedules">
            <span class="glyphicon glyphicon-calendar text-info"></span> <?php echo $menu_left_item_5; ?>
          </a>
          <a href="#" class="list-group-item" data-nav="streams">
            <span class="glyphicon glyphicon-bullhorn text-info"></span> <?php echo $menu_left_item_6; ?>
          </a>
          <a href="#" class="list-group-item" data-nav="patientLogs">
            <span class="glyphicon glyphicon-eye-open text-info"></span> <?php echo $menu_left_item_4; ?>
          </a>
        </div>
      </div>
    </nav>
  </div>
  <div class="col-lg-10">
    <div id="content" class="container-fluid">

    </div>
  </div>
</div>

<?php endif; ?>

<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <div class="alert alert-danger alert-dismissable fade in" style="display:none">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span id="alert_box_danger"></span>
    </div>
    <div class="alert alert-warning alert-dismissable fade in" style="display:none">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span id="alert_box_warning"></span>
    </div>
    <div class="alert alert-info alert-dismissable fade in" style="display:none">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span id="alert_box_info"></span>
    </div>
    <div class="alert alert-success alert-dismissable fade in" style="display:none">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span id="alert_box_success"></span>
    </div>
  </div>
  <div class="col-md-4"></div>
</div>

<?php if ($user_category === "TEST") : ?>
<div class="container alert alert-warning">
  <p class="text-center"><?php echo "(".$username." - ".$name." ".$surname." / ".$user_category.") ".$dashboard_unauthorized_user; ?></p>
</div>
<?php endif; ?>
<script src="app/js/hts_dashboard.js" charset="utf-8"></script>
