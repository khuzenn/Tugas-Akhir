<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Account_manager extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$this->data['user_id'] = $this->tank_auth->get_user_id();
			$this->data['username'] = $this->tank_auth->get_username();
			$this->data['email'] = $this->tank_auth->get_email();

			$profile = $this->tank_auth->get_user_profile($this->data['user_id']);

			$this->data['profile_name'] = $profile['name'];
			$this->data['profile_foto'] = $profile['foto'];

			foreach ($this->tank_auth->get_roles($this->data['user_id']) as $val) {
				$this->data['role_id'] = $val['role_id'];
				$this->data['role'] = $val['role'];
				$this->data['full_name_role'] = $val['full'];
			}

			$this->data['link_active'] = 'account-manager';

			//buat permission
			if (!$this->tank_auth->permit($this->data['link_active'])) {
				redirect('Home');
			}

			$this->load->model("Showmenu_model");
			$this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

			$OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

			$this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

			$this->load->model('Account_manager_model');
		}
	}

	public function index()
	{
		$this->data['title'] = "Account Manager";

		$this->data['breadcrumbs'] = [];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Data Master',
			'class' => 'breadcrumb-item pe-3 text-white',
			'href' => ''
		];

		$this->data['breadcrumbs'][] = [
			'active' => TRUE,
			'text' => 'Account Manager',
			'class' => 'breadcrumb-item pe-3 text-gray-400',
			'href' => site_url('account-manager')
		];

		$this->data['listAm'] = $this->Account_manager_model->getAllAm();

		$this->load->view('component/header', $this->data);
		$this->load->view('component/sidebar', $this->data);
		$this->load->view('account_manager/views', $this->data);
		$this->load->view('component/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_am', 'Nama Account Manager', 'required|trim');

		if ($this->form_validation->run() == TRUE) {

			$data = array(
				'nama_am' => $this->input->post('nama_am'),
                'created_by' => $this->data['user_id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
			);

			$this->Account_manager_model->addAm($data);

			redirect('account-manager');
		} else {
			$this->data['nama_am'] = $this->input->post('nama_am');

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('account-manager/tambah');
			$this->data['url'] = site_url('account-manager');
			$this->data['title'] = "Account Manager";
	
			$this->data['breadcrumbs'] = [];
	
			$this->data['breadcrumbs'][] = [
				'active' => FALSE,
				'text' => 'Data Master',
				'class' => 'breadcrumb-item pe-3 text-white',
				'href' => ''
			];
	
			$this->data['breadcrumbs'][] = [
				'active' => TRUE,
				'text' => 'Account Manager',
				'class' => 'breadcrumb-item pe-3 text-gray-400',
				'href' => site_url('account-manager')
			];

			$this->load->view('component/header', $this->data);
			$this->load->view('component/sidebar', $this->data);
			$this->load->view('account_manager/form', $this->data);
			$this->load->view('component/footer');
		}
	}

	public function update($id_am)
	{
		$this->form_validation->set_rules('nama_am', 'Nama Accoun Manager', 'required|trim');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nama_am' => $this->input->post('nama_am'),
                'created_by' => $this->data['user_id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
			);

			$this->Account_manager_model->updateAm($data, decrypt_url($id_am));

			redirect('account-manager');
		} else {
			$this->data['nama_am'] = $this->input->post('nama_am');

			$data_am = $this->Account_manager_model->getAm(decrypt_url($id_am));

			$this->data['nama_am'] = $data_am->nama_am;

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('account-manager/sunting/' . $id_am);
			$this->data['url'] = site_url('account-manager');
			$this->data['title'] = "Account Manager";
	
			$this->data['breadcrumbs'] = [];
	
			$this->data['breadcrumbs'][] = [
				'active' => FALSE,
				'text' => 'Data Master',
				'class' => 'breadcrumb-item pe-3 text-white',
				'href' => ''
			];
	
			$this->data['breadcrumbs'][] = [
				'active' => TRUE,
				'text' => 'Account Manager',
				'class' => 'breadcrumb-item pe-3 text-gray-400',
				'href' => site_url('account-manager')
			];

			$this->load->view('component/header', $this->data);
			$this->load->view('component/sidebar', $this->data);
			$this->load->view('account_manager/form', $this->data);
			$this->load->view('component/footer');
		}
	}

	public function delete($id)
	{
		$condition['id_menu'] = $id;

		$this->Menu_model->deleteMenu($condition);

		redirect('Menu');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
