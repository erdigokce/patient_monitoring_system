<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * User Model Page
 */
class User extends HTS_Model implements IUserModel {

  function __construct() {
    parent::__construct('hts_syscore.hts_users');
  }

  public function getUser($selector) {
    if (isset($selector)) {
      if(is_int($selector)){
        return $this->findByPrimaryKey($selector);
      }
      elseif (is_string($selector)) {
        if (!(strpos($selector, "@") === FALSE)) { // Is this string an email?
          $query = $this->db->get_where($this->getTable(), array('USER_EMAIL' => $selector));
        } else { // Or username?
          $query = $this->db->get_where($this->getTable(), array('USERNAME' => $selector));
        }
        $row = $query->row();
        if(isset($row)){
          return $row;
        } else {
          return NULL;
        }
      }
    }
  }

  public function insertUser($username, $password, $user_category, $user_email) {
    // $HtsUserDAO['ID'] = NULL;
    $HtsUserDAO['USERNAME'] = $username;
    $HtsUserDAO['PASSWORD'] = md5($password);
    $HtsUserDAO['USER_CATEGORY'] = $user_category;
    $HtsUserDAO['USER_EMAIL'] = $user_email;
    $this->insertData($HtsUserDAO);
  }

  public function updateUser($id, $data) {
    if (is_array($data)) {
      $HtsUserDAO['USERNAME'] = $data['username'];
      $HtsUserDAO['PASSWORD'] = md5($data['password']);
      $HtsUserDAO['USER_CATEGORY'] = $data['user_category'];
      $HtsUserDAO['USER_EMAIL'] = $data['user_email'];
      return $this->updateData($id, $HtsUserDAO);
    }
  }

  public function deleteUser($id) {
    return $this->deleteData($id);
  }

}
