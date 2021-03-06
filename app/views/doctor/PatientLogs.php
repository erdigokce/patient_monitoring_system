<?php $isStreamExists = !isNullOrEmpty(get($patient_selected)) && get($patient_selected) === TRUE && !isNullOrEmpty($resultStreams); ?>
<div class="row">
  <div class="col-md-3">
    <span> Hasta : </span>
  </div>
  <div class="col-md-6">
    <select class="form-control" name="patient">
        <option value=""><?php echo get($patient_logs_select_patient); ?></option>
      <?php foreach ($resultPatients as $row): ?>
        <option value="<?php echo get($row->ID); ?>" data-patient-username="<?php echo get($row->PATIENT_USERNAME); ?>" <?php if (get($row->ID) == get($patient_id)) echo 'selected="selected"'; ?>>
          <?php echo get($row->PATIENT_NAME)." ".get($row->PATIENT_SURNAME); ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<?php if ($isStreamExists): ?>
<br>
<div class="row">
  <div class="col-md-3">
    <span> Yayın : </span>
  </div>
  <div class="col-md-6">
    <select class="form-control" name="stream">
        <option value="invalid"><?php echo get($patient_logs_select_stream); ?></option>
      <?php foreach ($resultStreams as $row): ?>
          <option value="<?php echo get($row->ID); ?>" data-patient-id="<?php echo get($row->PATIENT_ID);?>" data-stream-name="<?php echo get($row->STREAM_NAME);?>"
            data-stream-share-key="<?php echo isSetAndNotEmpty($row->SHARE_KEY) ? $row->SHARE_KEY : "undefined";?>" data-stream-number="<?php echo get($row->FILE_NUMBER);?>" <?php if (get($row->ID) == get($stream_id)) echo 'selected="selected"'; ?>>
            <?php echo get($row->STREAM_NAME); ?>
          </option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<?php endif; ?>
<br>

<div class="default_content alert alert-info" style="display:<?php if(get($displayStatus) == "block") echo "none"; else echo "block"; ?>">
  <i> <?php echo $patient_logs_select_stream_to_display; ?> </i>
</div>

<div id="plotly_application" style="display:<?php echo $displayStatus;?>">
  <ul id="plotly_nav" class="nav nav-tabs">
    <li class="active" data-target="#plotly_container"><a href="#"><?php echo get($patient_logs_last_activity)." / ".get($patient_logs_live); ?></a></li>
    <li data-target="#archive_container"><a href="#"><?php echo get($patient_logs_history); ?></a></li>
  </ul>
  <?php if ($isStreamExists): ?>
  <div id="plotly_container" class="container">
    <div>
      <?php
      if (get($streamShareKey) != "undefined") { // is a private stream
        $ahref = "https://plot.ly/~".get($patientUsername)."/".get($streamNumber)."/?share_key=".get($streamShareKey);
        $imgsrc = "https://plot.ly/~".get($patientUsername)."/".get($streamNumber).".png?share_key=".get($streamShareKey);
        $plotlyScript = '<script data-plotly="'.get($patientUsername).":".get($streamNumber).'" sharekey-plotly="'.get($streamShareKey).'" src="https://plot.ly/embed.js" async></script>';
      } else {  // is a public stream
        $ahref = "https://plot.ly/~".get($patientUsername)."/".get($streamNumber)."/";
        $imgsrc = "https://plot.ly/~".get($patientUsername)."/".get($streamNumber).".png";
        $plotlyScript = '<script data-plotly="'.get($patientUsername).":".get($streamNumber).'" src="https://plot.ly/embed.js" async></script>';
      }
      ?>
      <a href="<?php echo $ahref ?>" target="_blank" title="<?php echo get($streamName); ?>" style="display: block; text-align: center;">
        <img src="<?php echo $imgsrc; ?>" alt="<?php echo get($streamName) ?>"style="max-width: 100%;width: 400px;"  width="400" onerror="this.onerror=null;this.src='https://plot.ly/404.png';" />
      </a>
      <?php echo $plotlyScript; ?>
    </div>
  </div>
  <div id="archive_container" class="container" style="display:none">
    <!-- draw graph from stored json data -->
  </div>
  <?php endif; ?>
</div>

<script src="<?php echo base_url()."app/js/hts_patient_logs.js"?>" charset="utf-8"></script>
