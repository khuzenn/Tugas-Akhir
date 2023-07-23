<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabkot_Input extends CI_Controller
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

            $this->data['link_active'] = 'kabkot-group-input';

            //buat permission
            if (!$this->tank_auth->permit($this->data['link_active'])) {
                redirect('Home');
            }

            $this->load->model("Showmenu_model");
            $this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

            $OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

            $this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

            $this->load->model("Menu_model");
            $this->load->model("Kabkot_input_model");
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('detail', 'Detail','required');
		$this->form_validation->set_rules('kota', 'Kota','required');
		$this->form_validation->set_rules('alamat', 'Alamat','required');
		$this->form_validation->set_rules('telpon', 'Telpon','required');
		$this->form_validation->set_rules('email', 'Email','required'); 


        if ($this->form_validation->run() == TRUE) {

            if (!empty($_FILES['logo']['name'])) {
                $config['upload_path'] = './assets/logo';
                $config['allowed_types'] = 'jpg|jpeg|png|JPEG';
                $config['max_size'] = 50000;

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $upload_logo = [];
                if ($this->upload->do_upload('logo')) {
                    $fileDataLogo = $this->upload->data();

                    $info_logo = pathinfo($fileDataLogo['file_name']);
                    $file_name_logo = $info_logo['filename'];

                    $upload_logo = [
                        'nama_file' => $fileDataLogo['file_name']
                        
                    ];
                }
            }

            $data = array(
                'id_kabkot' => $this->data['id'],
                'nama' => $this->input->POST('nama'),
                'logo' => (empty($upload_logo)) ? : $upload_logo['nama_file'],
                'detail' => $this->input->POST('detail'),
				'kota' => $this->input->POST('kota'),
				'alamat' => $this->input->POST('alamat'),
				'telpon' => $this->input->POST('telpon'),
				'email' => $this->input->POST('email')
            );
            
            $result = $this->Kabkot_input_model->addKabkot($data); 

            if ($result) {
                $this->session->set_flashdata('msg','Anda Berhasil Menambahkan Kabkot/AP Group');

                redirect('kabkot-group-input');
            }
        } else{
            $this->data['nama'] = $this->input->POST('nama');
            $this->data['logo'] = $this->input->POST('logo');
            $this->data['detail'] = $this->input->POST('detail');
			$this->data['kota'] = $this->input->POST('kota');
			$this->data['alamat'] = $this->input->POST('alamat'); 
			$this->data['telpon'] = $this->input->POST('telpon');
			$this->data['email'] = $this->input->POST('email');

            $this->data['title'] = 'Kabkot /AP Group Management';

            $this->data['breadcrumbs'] = [];

        $this->data['breadcrumbs'][] = [
            'active' => FALSE,
            'text' => 'Kabkot /AP Group Management',
            'class' => 'breadcrumb-item pe-3 text-gray-400',
            'href' => site_url('kabkot-group-input')
        ];

        // $data['kabkot'] = $this->Kabkot_list_model->get_data('tb_kabkot')->result();
        $this->data['kabkot'] = $this->Kabkot_input_model->getAllKabkot();

        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['action'] = site_url('kabkot-group-input');

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('kabkot_input/form', $this->data);
        $this->load->view('component/footer', $this->data);
        }
    }
}
