<?php

function cek_login(){

  $ci = get_instance();

  if(!$ci->session->userdata('email'))
  {
    redirect('auth');
  }
  else
  {
    $role_id = $ci->session->userdata('role_id');
    $menu = $ci->uri->segment(1);

    $queryMenu = $ci->db->get_where('usermenu', ['NameMenu' => $menu])->row_array();
    $kodemenu = $queryMenu['KodeMenu'];

    $userAccess = $ci->db->get_where('useraccessmenu', 
    [
      'RoleId' => $role_id,
      'KodeMenu' => $kodemenu
    ]);

    if($userAccess->num_rows() < 1){
      redirect('auth/blocked');
    }
  }
}