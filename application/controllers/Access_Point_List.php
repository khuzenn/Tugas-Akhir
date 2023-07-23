<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access_Point_List extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
 
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

            $this->data['link_active'] = 'access-point-list';

            //buat permission
            if (!$this->tank_auth->permit($this->data['link_active'])) {
                redirect('Home');
            }

            $this->load->model("Showmenu_model");
            $this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

            $OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

            $this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

            $this->load->model("Menu_model");
            $this->load->model("Access_point_list_model");
        } 
    }

    public function deleted($id)
	{
		$result = $this->Access_point_list_model->deleteAccessPoint(decrypt_url($id));

		if ($result) {
			$this->session->set_flashdata('msg', 'Anda berhasil menghapus data Access Point');

			redirect('access-point-list'); 
		}
	}

    public function sunting($id)
	{
		$this->data['title'] = "Sunting Access Point";

		$this->data['breadcrumbs'] = [];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Access Point',
			'class' => 'breadcrumb-item pe-3 text-white',
			'href' => ''
		];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Access Point List',
			'class' => 'breadcrumb-item pe-3 text-white',
			'href' => ''
		];

		$this->data['breadcrumbs'][] = [
			'active' => TRUE,
			'text' => 'Sunting Access Point',
			'class' => 'breadcrumb-item pe-3 text-gray-400',
			'href' => site_url('access-point-list')
		];

		$this->form_validation->set_rules('ap_name','AP_Name','required');
        $this->form_validation->set_rules('ap_name_url','AP_Name_Url','required');
        $this->form_validation->set_rules('ap_group','AP_Group','required');
        $this->form_validation->set_rules('alamat', 'Alamat','required');
		$this->form_validation->set_rules('kota', 'Kota','required');
		$this->form_validation->set_rules('latitude', 'Latitude','required');
		$this->form_validation->set_rules('longitude', 'Longitude','required');
        $this->form_validation->set_rules('mac_address', 'Mac_Address','required');
        $this->form_validation->set_rules('ip_address', 'Ip_Adress','required');

		if ($this->form_validation->run() == TRUE) {

			$data = [
                'ap_name' => $this->input->POST('ap_name'),
                'ap_name_url' => $this->input->POST('ap_name_url'),
                'ap_group' => $this->input->POST('ap_group'),
                'alamat' => $this->input->POST('alamat'),
                'kota' => $this->input->POST('kota'),
                'latitude' => $this->input->POST('latitude'),
                'longitude' => $this->input->POST('longitude'),
                'mac_address' => $this->input->POST('mac_address'),
                'ip_address' => $this->input->POST('ip_address'),
			];

			$access = $this->Access_point_list_model->getAccessPoint($id);

			$condition['id'] = $id;

			$this->Access_point_list_model->suntingAccessPoint($data, $condition);

			redirect('access-point-list');
		} else {
            $this->data['ap_name'] = $this->input->post('ap_name');
            $this->data['ap_name_url'] = $this->input->post('ap_name_url');
            $this->data['ap_group'] = $this->input->post('ap_group');
            $this->data['alamat'] = $this->input->post('alamat');
            $this->data['kota'] = $this->input->post('kota');
            $this->data['latitude'] = $this->input->post('latitude');
            $this->data['longitude'] = $this->input->post('longitude');
            $this->data['mac_address'] = $this->input->post('mac_address');
            $this->data['ip_address'] = $this->input->post('ip_address');

			$access = $this->Access_point_list_model->getAccessPoint($id);

            $this->data['data_ap_name'] = $access->ap_name;
            $this->data['data_ap_name_url'] = $access->ap_name_url;
            $this->data['data_ap_group'] = $access->ap_group;
            $this->data['data_alamat'] = $access->alamat;
            $this->data['data_kota'] = $access->kota;
            $this->data['data_latitude'] = $access->latitude;
            $this->data['data_longitude'] = $access->longitude;
            $this->data['data_mac_address'] = $access->mac_address;
            $this->data['data_ip_address'] = $access->ip_address;
            

			$this->data['action'] = site_url('Access_Point_List/sunting/' . $id);
			$this->data['url'] = site_url('access-point-list');

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->load->view('component/header', $this->data);
			$this->load->view('component/sidebar', $this->data);
			$this->load->view('access_point_list/sunting', $this->data);
			$this->load->view('component/footer');
		}
	}

    public function index()
    {
        $this->data['title'] = 'Access Point List Management';

        $this->data['breadcrumbs'] = [];

        $this->data['breadcrumbs'][] = [
            'active' => FALSE,
            'text' => 'Access Point List Management',
            'class' => 'breadcrumb-item pe-3 text-gray-400',
            'href' => site_url('access-point-list')
        ];

        // $data['kabkot'] = $this->Kabkot_list_model->get_data('tb_kabkot')->result();
        $this->data['access_point'] = $this->Access_point_list_model->getAllAccessPoint();

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('access_point_list/view', $this->data);
        $this->load->view('component/footer', $this->data);
    }
}
