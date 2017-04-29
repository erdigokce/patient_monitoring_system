<div class="row">
  <div class="col-lg-2">
    <div class="container-fluid">
      <?php if ($user_category === "DOCTOR") :?>
      <div id="menu_left" class="list-group">
        <?php echo anchor('#', $menu_left_item_1, 'class="list-group-item" data-nav="board"'); ?>
        <?php echo anchor('#', $menu_left_item_2, 'class="list-group-item" data-nav="device_informations"'); ?>
        <?php echo anchor('#', $menu_left_item_3, 'class="list-group-item" data-nav="patient_informations"'); ?>
        <?php echo anchor('#', $menu_left_item_4, 'class="list-group-item" data-nav="patient_logs"'); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="col-lg-10">
    <div id="content" class="container">

    </div>
  </div>
</div>

<?php if ($user_category === "TEST") : ?>
<div class="alert alert-warning">
  <p class="text-center"><?php echo "(".$username." - ".$name." ".$surname." / ".$user_category.") ".$dashboard_unauthorized_user; ?></p>
</div>
<?php endif; ?>
