<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider_Input extends CI_Controller
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

            $this->data['link_active'] = 'slider-input';

            //buat permission
            if (!$this->tank_auth->permit($this->data['link_active'])) {
                redirect('Home');
            }

            $this->load->model("Showmenu_model");
            $this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

            $OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

            $this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

            $this->load->model("Menu_model");
            $this->load->model("Slider_input_model");
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('judul','Judul','required'); 
        $this->form_validation->set_rules('nama', 'Nama','required');
		$this->form_validation->set_rules('ap_name_slider', 'AP Name Slider','required');
		$this->form_validation->set_rules('start_date', 'Start Date','required');
		$this->form_validation->set_rules('end_date', 'End Date','required'); 

        if ($this->form_validation->run() == TRUE) { 

            if (!empty($_FILES['photo']['name'])) {
                $config['upload_path'] = './assets/konten';
                $config['allowed_types'] = 'jpg|jpeg|png|JPEG';
                $config['max_size'] = 50000;

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $upload_photo = [];
                if ($this->upload->do_upload('photo')) {
                    $fileDataphoto = $this->upload->data();

                    $info_photo = pathinfo($fileDataphoto['file_name']);
                    $file_name_photo = $info_photo['filename'];

                    $upload_photo = [
                        'nama_file' => $fileDataphoto['file_name']
                        
                    ];
                }
            }

            $data = array(
                'id_slider' => $this->data['id'], 
                'judul' => $this->input->POST('judul'),
                'id_kabkot' => decrypt_url($this->input->post('nama')),
                'video' => $this->input->POST('video'),
				'ap_name_slider' => $this->input->POST('ap_name_slider'),
				'start_date' => $this->input->POST('start_date'),
				'end_date' => $this->input->POST('end_date'),
                'photo' => (empty($upload_photo)) ? : $upload_photo['nama_file'],
            );
            
            $result = $this->Slider_input_model->addSlider($data); 

            if ($result) {
                $this->session->set_flashdata('msg','Anda Berhasil Menambahkan Kabkot/AP Group');

                redirect('slider-input');
            }
        } else{
            $this->data['judul'] = $this->input->POST('judul');
            $this->data['selected_nama'] = $this->input->POST('nama');
            $this->data['video'] = $this->input->POST('video');
			$this->data['ap_name_slider'] = $this->input->POST('ap_name_slider');
			$this->data['start_date'] = $this->input->POST('start_date'); 
			$this->data['end_date'] = $this->input->POST('end_date');

            $this->data['title'] = 'Slider Input Management';

            $this->data['breadcrumbs'] = [];

        $this->data['breadcrumbs'][] = [
            'active' => FALSE,
            'text' => 'Slider Input Management',
            'class' => 'breadcrumb-item pe-3 text-gray-400',
            'href' => site_url('kabkot-group-input')
        ];

        // $data['kabkot'] = $this->Kabkot_list_model->get_data('tb_kabkot')->result();
        $this->data['list_kabkot'] = $this->Slider_input_model->getAllKabkot();

        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['action'] = site_url('slider-input');

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('slider_input/form', $this->data);
        $this->load->view('component/footer', $this->data);
        }
    }
}
