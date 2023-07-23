<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabkot_List extends CI_Controller
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

            $this->data['link_active'] = 'kabkot-group-list';

            //buat permission
            if (!$this->tank_auth->permit($this->data['link_active'])) {
                redirect('Home');
            }

            $this->load->model("Showmenu_model");
            $this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

            $OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

            $this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

            $this->load->model("Menu_model");
            $this->load->model("Kabkot_list_model");
        }
    }

    public function detail($id_kabkot) 
    {
        $this->data['title'] = "Kab / Kot";

        $this->data['breadcrumbs'] = [];

        $this->data['breadcrumbs'][] = [
            'active' => FALSE,
            'text' => 'Access Point',
            'class' => 'breadcrumb-item pe-3 text-white',
            'href' => 'kabkot-group-list'
        ];

        $this->data['breadcrumbs'][] = [
            'active' => TRUE,
            'text' => 'Detail',
            'class' => 'breadcrumb-item pe-3 text-gray-400',
            'href' => ''
        ];

        $this->data['url'] = site_url('kabkot-group-list'); 

        $detail_kabkot = $this->Kabkot_list_model->getDetailKabkot(decrypt_url($id_kabkot));

        $this->data['nama'] = $detail_kabkot->nama;
        $this->data['logo'] = $detail_kabkot->logo;
        $this->data['detail'] = $detail_kabkot->detail;
        $this->data['kota'] = $detail_kabkot->kota;
        $this->data['alamat'] = $detail_kabkot->alamat;
        $this->data['telpon'] = $detail_kabkot->telpon;
        $this->data['email'] = $detail_kabkot->email;

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('kabkot_list/detail', $this->data);
        $this->load->view('component/footer');
    }

    public function deleted($id_kabkot)
	{
		$result = $this->Kabkot_list_model->deleteKabkot(decrypt_url($id_kabkot));

		if ($result) {
			$this->session->set_flashdata('msg', 'Anda berhasil menghapus data kab/kot');

			redirect('kabkot-group-list'); 
		}
	}

    public function sunting($id_kabkot)
	{
		$this->data['title'] = "Sunting Kabkot/AP Group";

		$this->data['breadcrumbs'] = [];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Kabkot/AP Group',
			'class' => 'breadcrumb-item pe-3 text-white',
			'href' => ''
		];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Kabkot/AP Group List',
			'class' => 'breadcrumb-item pe-3 text-white',
			'href' => ''
		];

		$this->data['breadcrumbs'][] = [
			'active' => TRUE,
			'text' => 'Sunting Kabkot/AP Group',
			'class' => 'breadcrumb-item pe-3 text-gray-400',
			'href' => site_url('kabkot-group-list')
		];

		$this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('detail', 'Detail','required');
		$this->form_validation->set_rules('kota', 'Kota','required');
		$this->form_validation->set_rules('alamat', 'Alamat','required');
		$this->form_validation->set_rules('telpon', 'Telpon','required');
		$this->form_validation->set_rules('email', 'Email','required'); 

		if ($this->form_validation->run() == TRUE) {

			$data = [
                'nama' => $this->input->POST('nama'),
                'detail' => $this->input->POST('detail'),
				'kota' => $this->input->POST('kota'),
				'alamat' => $this->input->POST('alamat'),
				'telpon' => $this->input->POST('telpon'),
                'logo' => (empty($upload_logo)) ? : $upload_logo['nama_file'],
				'email' => $this->input->POST('email')
			];

			$kabkot = $this->Kabkot_list_model->getKabkot($id_kabkot);

			$config['upload_path'] = './assets/logo';
            $config['allowed_types'] = 'jpg|jpeg|png|JPEG';
            $config['max_size'] = 50000;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('logo')) {
				if ($kabkot->logo != "no_image.png") {
					if (file_exists('./assets/logo/' . $kabkot->logo)) {
						unlink('./assets/logo/' . $kabkot->logo);
					}
				}
				$logo = $this->upload->data();
				$image = $logo["file_name"];
			} else {
				$image = $kabkot->logo;
			}

			$custom = [
                'nama' => $this->input->post('nama'),
				'detail' => $this->input->post('detail'),
				'kota' => $this->input->post('kota'),
				'alamat' => $this->input->post('alamat'),
				'telpon' => $this->input->post('telpon'),
				'email' => $this->input->post('email'),
				'logo' => $image
			];

			$condition['id_kabkot'] = $id_kabkot;

			$this->Kabkot_list_model->suntingKabkot($data, $condition);
            $this->Kabkot_list_model->suntingKabkot($custom, $condition);

			redirect('kabkot-group-list');
		} else {
            $this->data['nama'] = $this->input->post('nama');
            $this->data['detail'] = $this->input->post('detail');
            $this->data['logo'] = $this->input->post('logo');
            $this->data['kota'] = $this->input->post('kota');
            $this->data['alamat'] = $this->input->post('alamat');
            $this->data['telpon'] = $this->input->post('telpon');
            $this->data['email'] = $this->input->post('email');

			$kabkot = $this->Kabkot_list_model->getKabkot($id_kabkot);

            $this->data['data_nama'] = $kabkot->nama;
            $this->data['data_detail'] = $kabkot->detail;
            $this->data['data_kota'] = $kabkot->kota;
            $this->data['data_alamat'] = $kabkot->alamat;
            $this->data['data_telpon'] = $kabkot->telpon;
            $this->data['data_email'] = $kabkot->email;
            $this->data['data_logo'] = $kabkot->logo;
            

			$this->data['action'] = site_url('Kabkot_List/sunting/' . $id_kabkot);
			$this->data['url'] = site_url('kabkot-group-list');

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->load->view('component/header', $this->data);
			$this->load->view('component/sidebar', $this->data);
			$this->load->view('kabkot_list/sunting', $this->data);
			$this->load->view('component/footer');
		}
	}

    public function index()
    {
        $this->data['title'] = 'Kabkot /AP Group Management';

        $this->data['breadcrumbs'] = [];

        $this->data['breadcrumbs'][] = [
            'active' => FALSE,
            'text' => 'Kabkot /AP Group Management',
            'class' => 'breadcrumb-item pe-3 text-gray-400',
            'href' => site_url('kabkot-group-list')
        ];

        // $data['kabkot'] = $this->Kabkot_list_model->get_data('tb_kabkot')->result();
        $this->data['kabkot'] = $this->Kabkot_list_model->getAllKabkot();

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('kabkot_list/view', $this->data);
        $this->load->view('component/footer', $this->data);
    }
}
