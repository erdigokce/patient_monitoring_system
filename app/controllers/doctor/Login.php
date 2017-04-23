<?php
/**
 * Login Controller Page
 */
class Login extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->database('syscore');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('syscore/user');
  }

  public function index() {
    $data['title'] = "Yetkilendirme ve Giriş Sistemi";
    $data['authorized'] = FALSE;

    $this->form_validation->set_rules('username', 'Kullanıcı Adı', 'required');
    $this->form_validation->set_rules('password', 'Şifre', 'required');
    if ($this->form_validation->run() === FALSE) {
      loadLogin($data);
    }
    else {
      $this->user->
      if () {
        loadDashboard($data);
      } else {
        loadLogin($data);
      }
    }

  }

  /** PRIVATE FUNCTIONS **/

  private function loadLogin(&$data) {
    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header", $data);
    $this->load->view("doctor/login"); // MAIN LOGIN VIEW
    $this->load->view("templates/footer");
    $this->load->view("templates/content_bottom");
  }

  private function loadDashboard(&$data) {
    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header", $data);
    $this->load->view('doctor/dashboard');
    $this->load->view("templates/footer");
    $this->load->view("templates/content_bottom");
  }
}

 ?>
