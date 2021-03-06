$(document).ready(function() {

  var model = 'streams';
  var controller = 'dashboard';
  var method = 'streams';
  var ajaxRequestHandler = controller+"/processCRUD/"+model+"/";

  var selectedPatientId;

  /**
   * STREAMS
   */

  $("button[name*='btn']").click(function() {
    var name = $(this).attr("name");
    var id = $(this).parent().parent().attr("id");

    var st_patient = $("tr#" + id + " > .st_patient").data("stpatient");
    var st_name = $("tr#" + id + " > .st_name").data("stname");
    var st_token = $("tr#" + id + " > .st_token").data("sttoken");
    var st_sharekey = $("tr#" + id + " > .st_sharekey").data("stsharekey");
    var st_fi̇lenumber = $("tr#" + id + " > .st_fi̇lenumber").data("stfilenumber");

    // AJAX Setup
    $.ajaxSetup({
      url : ajaxRequestHandler,
      method : "POST",
      cache : false,
      dataType : "json"
    });

    switch (name) {
      case "btnEditStream":
        if (!$("tr#" + id + " > td > button[name='btnEditStream']").hasClass("disabled")) {
          $("tr#" + id + " > .st_patient > span.txtPatient").css("display", "none");
          $("tr#" + id + " > .st_patient > select[name='patient']").css("display", "block");
          $("tr#" + id + " > .st_name").html("<input class='form-control' type='text' name='st_name' value='" + st_name + "'>");
          $("tr#" + id + " > .st_token").html("<input class='form-control' type='text' name='st_token' value='" + st_token + "' required>");
          $("tr#" + id + " > .st_sharekey").html("<input class='form-control' type='text' name='st_sharekey' value='" + st_sharekey + "'>");
          $("tr#" + id + " > .st_fi̇lenumber").html("<input class='form-control' type='number' name='st_fi̇lenumber' value='" + st_fi̇lenumber + "'>");
          btnEditClick(id);
        }
        break;
      case "btnDeleteStream":
        if (!$("tr#" + id + " > td > button[name='btnDeleteStream']").hasClass("disabled")) {
          if (confirm("Kayıdı gerçekten silmek istiyor musunuz? (Bu işlem geri alınamaz!)")) {
            var dataToSendToServer = {
              ID: id,
              action : 'delete'
            };
            sendAjaxRequest(dataToSendToServer);
          }
        }
        break;
      case "btnOkStream":
        if (!$("tr#" + id + " > td > button[name='btnOkStream']").hasClass("disabled")) {
          if (confirm("Değişiklikleri onaylıyor musunuz?")) {
            var dataToSendToServer = {
              ID: id,
              PATIENT_ID: selectedPatientId,
              STREAM_NAME: $("input[name='st_name']").val(),
              TOKEN: $("input[name='st_token']").val(),
              SHARE_KEY: $("input[name='st_sharekey']").val(),
              FILE_NUMBER: $("input[name='st_fi̇lenumber']").val()
            };
            sendAjaxRequest(dataToSendToServer);
          }
        }
        break;
      case "btnCancelStream":
        if (!$("tr#" + id + " > td > button[name='btnCancelStream']").hasClass("disabled")) {
          $("tr#" + id + " > .st_patient > span.txtPatient").css("display", "block");
          $("tr#" + id + " > .st_patient > select[name='patient']").css("display", "none");
          $("tr#" + id + " > .st_name").html(st_name);
          $("tr#" + id + " > .st_token").html(st_token);
          $("tr#" + id + " > .st_sharekey").html(st_sharekey);
          $("tr#" + id + " > .st_fi̇lenumber").html(st_fi̇lenumber);
          btnCancelClick(id);
        }
        break;
      case "btnAddStream":
        if (!$("tr#" + id + " > td > button[name='btnAddPatient']").hasClass("disabled")) {
          $("tr#" + id + " > .st_patient > span.txtPatient").css("display", "none");
          $("tr#" + id + " > .st_patient > select[name='patient']").css("display", "block");
          $("tr#" + id + " > .st_name").html("<input class='form-control' type='text' name='st_name' value=''>");
          $("tr#" + id + " > .st_token").html("<input class='form-control' type='text' name='st_token' value='' required>");
          $("tr#" + id + " > .st_sharekey").html("<input class='form-control' type='text' name='st_sharekey' value=''>");
          $("tr#" + id + " > .st_fi̇lenumber").html("<input class='form-control' type='number' name='st_fi̇lenumber' value=''>");
          btnAddClick(id);
        }
        break;
    }

  });

  $("select[name='patient']").click(function() {
    selectedPatientId = $(this).val();
  });

  // Pagination
  $("ul.pagination > li > a").click(function() {
    if(!$(this).parent().hasClass("disabled")) {
      paginate(controller, method, $(this).data("pg"));
    }
  });

  // Stream search
  $("#formStreamInquire").submit(function(e) {
    e.preventDefault();
    var inquireStream = $("input[name='inquireStream']").val();
    if(inquireStream != '') {
      loadPage(controller + "/" + method + "/" + page_no + "/" + records_per_page + "/" + $.trim(inquireStream.replace(' ', '~')));
    } else {
      loadPage(controller + "/" + method + "/" + page_no + "/" + records_per_page + "/");
    }
  });

  function sendAjaxRequest(dataToSend) {
    var request = $.ajax({
      data : dataToSend
    });
    request.always(function(data) {
      $('#'+data[0]).html(data[1]);
      $('#'+data[0]).parent().css("display", "block");
      loadPage(controller + "/" + method + "/");
    });
  }
});
