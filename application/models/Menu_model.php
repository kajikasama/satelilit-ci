<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Menu_model extends CI_Model
{
  public function getSubMenu()
  {
    $query = "SELECT usersubmenu.*, usermenu.NameMenu FROM  usersubmenu JOIN usermenu ON usersubmenu.KodeMenu = usermenu.KodeMenu";
    return $this->db->query($query)->result_array();
  }
}
