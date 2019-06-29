<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
	}

	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['Email' => $this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('usermenu')->result_array();



		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('usermenu', ['NameMenu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			New Menu Added!
			</div>');
			redirect('menu');
		}
	}

	public function submenu()
	{
		$data['title'] = 'Sub Menu Management';
		$data['user'] = $this->db->get_where('user', ['Email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model', 'menu');
		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('usermenu')->result_array();

		$this->form_validation->set_rules('Title', 'Title', 'required');
		$this->form_validation->set_rules('KodeMenu', 'Menu', 'required');
		$this->form_validation->set_rules('Url', 'Url', 'required');
		$this->form_validation->set_rules('Icon', 'Icon', 'required');
		// $this->form_validation->set_rules('','','');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'Title' => $this->input->post('Title'),
				'KodeMenu' => $this->input->post('KodeMenu'),
				'Url' => $this->input->post('Url'),
				'Icon' => $this->input->post('Icon'),
				'IsActive' => $this->input->post('IsActive')
			];
			$this->db->insert('usersubmenu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			New Sub Menu Added!
			</div>');
			redirect('menu/submenu');
		}
	}
	public function hapusSubmenu()
	{ }
}
