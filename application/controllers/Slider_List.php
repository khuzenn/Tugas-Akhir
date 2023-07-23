<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider_List extends CI_Controller
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

            $this->data['link_active'] = 'slider-list';

            //buat permission
            if (!$this->tank_auth->permit($this->data['link_active'])) {
                redirect('Home');
            }

            $this->load->model("Showmenu_model");
            $this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

            $OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

            $this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

            $this->load->model("Menu_model");
            $this->load->model("Slider_list_model");
        } 
    }

    public function detail($id_slider) 
    {
        $this->data['title'] = "Detail Slider";

        $this->data['breadcrumbs'] = [];

        $this->data['breadcrumbs'][] = [
            'active' => FALSE,
            'text' => 'Detail Slider',
            'class' => 'breadcrumb-item pe-3 text-white',
            'href' => 'slider-list'
        ];

        $this->data['breadcrumbs'][] = [
            'active' => TRUE,
            'text' => 'Detail',
            'class' => 'breadcrumb-item pe-3 text-gray-400',
            'href' => ''
        ];
 
        $this->data['url'] = site_url('slider-list'); 

        $detail_slider = $this->Slider_list_model->getDetailSlider(decrypt_url($id_slider));

        $this->data['judul'] = $detail_slider->judul;
        $this->data['nama'] = $detail_slider->nama;
        $this->data['video'] = $detail_slider->video;
        $this->data['photo'] = $detail_slider->photo;
        $this->data['ap_name_slider'] = $detail_slider->ap_name_slider;
        $this->data['start_date'] = $detail_slider->start_date;
        $this->data['end_date'] = $detail_slider->end_date;

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('slider_list/detail', $this->data);
        $this->load->view('component/footer');
    }

    public function deleted($id_slider)
	{
		$result = $this->Slider_list_model->deleteSlider(decrypt_url($id_slider));

		if ($result) {
			$this->session->set_flashdata('msg', 'Anda berhasil menghapus data Access Point');

			redirect('slider-list'); 
		}
	}

    public function sunting($id_slider)
	{
		$this->data['title'] = "Sunting Slider";

		$this->data['breadcrumbs'] = [];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Slider',
			'class' => 'breadcrumb-item pe-3 text-white',
			'href' => ''
		];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Slider List',
			'class' => 'breadcrumb-item pe-3 text-white',
			'href' => ''
		];

		$this->data['breadcrumbs'][] = [
			'active' => TRUE,
			'text' => 'Sunting Slider',
			'class' => 'breadcrumb-item pe-3 text-gray-400',
			'href' => site_url('slider-list')
		];

		$this->form_validation->set_rules('judul','Judul','required'); 
		$this->form_validation->set_rules('ap_name_slider', 'AP Name Slider','required');
		$this->form_validation->set_rules('start_date', 'Start Date','required');
		$this->form_validation->set_rules('end_date', 'End Date','required');

		if ($this->form_validation->run() == TRUE) {

			$data = [
                'judul' => $this->input->POST('judul'),
                'nama' => decrypt_url($this->input->post('nama')),
				'ap_name_slider' => $this->input->POST('ap_name_slider'),
				'start_date' => $this->input->POST('start_date'),
				'end_date' => $this->input->POST('end_date'),
                'video' => $this->input->POST('video'),
                'photo' => (empty($upload_photo)) ? : $upload_photo['nama_file']
			];

			$slider = $this->Slider_list_model->getSlider($id_slider);

			$config['upload_path'] = './assets/konten';
            $config['allowed_types'] = 'jpg|jpeg|png|JPEG';
            $config['max_size'] = 50000;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('photo')) {
				if ($slider->photo != "no_image.png") {
					if (file_exists('./assets/konten/' . $slider->photo)) {
						unlink('./assets/konten/' . $slider->photo);
					}
				}
				$photo = $this->upload->data();
				$image = $photo["file_name"];
			} else {
				$image = $slider->photo;
			}

			$custom = [
                'judul' => $this->input->post('judul'),
				'nama' => $this->input->post('nama'),
				'ap_name_slider' => $this->input->post('ap_name_slider'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'video' => $this->input->post('video'),
				'photo' => $image
			];

			$condition['id_slider'] = $id_slider;

			$this->Slider_list_model->suntingSlider($data, $condition);
            $this->Slider_list_model->suntingSlider($custom, $condition);

			redirect('slider-list');
		} else {
            $this->data['judul'] = $this->input->post('judul');
            $this->data['nama'] = $this->input->post('nama');
            $this->data['ap_name_slider'] = $this->input->post('ap_name_slider');
            $this->data['start_date'] = $this->input->post('start_date');
            $this->data['end_date'] = $this->input->post('end_date');
            $this->data['video'] = $this->input->post('video');
            $this->data['photo'] = $this->input->post('photo');

			$slider = $this->Slider_list_model->getSlider($id_slider);

            $this->data['data_judul'] = $slider->judul;
            $this->data['data_nama'] = $slider->nama;
            $this->data['data_ap_name_slider'] = $slider->ap_name_slider;
            $this->data['data_start_date'] = $slider->start_date;
            $this->data['data_end_date'] = $slider->end_date;
            $this->data['data_video'] = $slider->video;
            $this->data['data_photo'] = $slider->photo;
            

			$this->data['action'] = site_url('Slider_List/sunting/' . $id_slider);
			$this->data['url'] = site_url('slider-list');

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->load->view('component/header', $this->data);
			$this->load->view('component/sidebar', $this->data);
			$this->load->view('slider_list/sunting', $this->data);
			$this->load->view('component/footer');
		}
	}

    public function index()
    {
        $this->data['title'] = 'Slider List Management';

        $this->data['breadcrumbs'] = [];

        $this->data['breadcrumbs'][] = [
            'active' => FALSE,
            'text' => 'Slider List Management',
            'class' => 'breadcrumb-item pe-3 text-gray-400',
            'href' => site_url('slider-list')
        ];

        // $data['kabkot'] = $this->Kabkot_list_model->get_data('tb_kabkot')->result();
        $this->data['slider'] = $this->Slider_list_model->getAllSlider();

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('slider_list/view', $this->data);
        $this->load->view('component/footer', $this->data);
    }
}
