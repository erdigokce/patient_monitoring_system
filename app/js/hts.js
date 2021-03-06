$(document).ready(function() {

  //Enabling all tooltips in the document
  $('[data-toggle="tooltip"]').tooltip();

  // Navigation bussiness
  $("#menu_left > a").click(function(e) {
    e.preventDefault();
    $("#menu_left > a").removeClass("active");
    loadPage('dashboard/'+$(this).data('nav'));
    $(this).addClass("active");
  });

  //Loading event gif
  $body = $('body');
  $(document).on({
    ajaxStart: function() {
      $body.addClass("loading");
    },
    ajaxStop: function() {
      $body.removeClass("loading");
    }
  });

  // Window resize event
  $(window).bind('resize', function() {
    arrangeFooterPosition();
  });

  /* Initial efforts */
  arrangeFooterPosition();

});

/*******************************************************************************
******************************** AJAX Functions ********************************
*******************************************************************************/

function loadPage(path) {
  $("#content").load(path);
}

function loadPublicPage(path) {
  if(location.href.search("/home") == -1) {  // If current location is not home
    document.cookie = "redirectTo="+path+"; path=/";
    location.href = base_url + "home"; // Then locate home section
  }
  $("#public_content").load(path);
}

function paginate(controller, method, page_no) {
  loadPage(controller + "/" + method + "/" + page_no + "/");
}

/*******************************************************************************
************************** General Purpose Functions ***************************
*******************************************************************************/

function redirectAsSessionExpire() {
  window.location = base_url + "login/index/session_expire";
}

function arrangeFooterPosition() {
  if($(window).width() >= 1200) {
    if(!$("footer").hasClass("navbar-fixed-bottom")) {
      $("footer").addClass("navbar-fixed-bottom");
    }
  } else {
    $("footer").removeClass("navbar-fixed-bottom");
  }
}

/*******************************************************************************
****************************** Application Utils *******************************
*******************************************************************************/

function isNullOrEmptyArray(array) {
  if (
    typeof array != "undefined"
    && array != null
    && array.length != null
    && array.length > 0
  ) { return false; }
  else { return true; }
}

function getCookieValuesAsArray() {
  var cookies = document.cookie.split(";");
  var cookiesKeyValue = [];
  if(cookies[0] !== "" && !isNullOrEmptyArray(cookies)) {
    for (var i = 0; i < cookies.length; i++) {
      cookiesKeyValue[i] = cookies[i].split("=");
    }
  }
  return cookiesKeyValue;
}

/*******************************************************************************
*************************** Datagrid button actions ****************************
*******************************************************************************/

function btnEditClick(id) {
  // $("tr#" + id + " > td > button[name^='btnEdit']").addClass("disabled");
  $("tr#" + id + " > td > button[name^='btnEdit']").addClass("disabled");
  $("tr#" + id + " > td > button[name^='btnOk']").removeClass("disabled");
  $("tr#" + id + " > td > button[name^='btnCancel']").removeClass("disabled");
}

function btnCancelClick(id) {
  if (id != "temp") {
    $("tr#" + id + " > td > button[name^='btnEdit']").removeClass("disabled");
  } else {
    $("tr#" + id + " > td > button[name^='btnAdd']").removeClass("disabled");
    $("tr#" + id + " > td > button[name^='btnDelete']").addClass("disabled");
  }
  $("tr#" + id + " > td > button[name^='btnOk']").addClass("disabled");
  $("tr#" + id + " > td > button[name^='btnCancel']").addClass("disabled");
}

function btnAddClick(id) {
  $("tr#" + id + " > td > button[name^='btnAdd']").addClass("disabled");
  $("tr#" + id + " > td > button[name^='btnOk']").removeClass("disabled");
  $("tr#" + id + " > td > button[name^='btnCancel']").removeClass("disabled");
}
