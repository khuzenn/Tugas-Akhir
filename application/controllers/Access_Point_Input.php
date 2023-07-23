<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access_Point_Input extends CI_Controller
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

            $this->data['link_active'] = 'access-point-input';

            //buat permission
            if (!$this->tank_auth->permit($this->data['link_active'])) {
                redirect('Home');
            }

            $this->load->model("Showmenu_model");
            $this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

            $OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

            $this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

            $this->load->model("Menu_model");
            $this->load->model("Access_point_input_model");
        }
    }

    public function index()
    {
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
            $data = array(
                'id' => $this->data['id'],
                'ap_name' => $this->input->POST('ap_name'),
                'ap_name_url' => $this->input->POST('ap_name_url'),
                'ap_group' => $this->input->POST('ap_group'),
                'alamat' => $this->input->POST('alamat'),
				'kota' => $this->input->POST('kota'),
                'latitude' => $this->input->POST('latitude'),
				'longitude' => $this->input->POST('longitude'),
                'mac_address' => $this->input->POST('mac_address'),
                'ip_address' => $this->input->POST('ip_address')
            );

            $result = $this->Access_point_input_model->addAccessPoint($data);

            if ($result) {
                $this->session->set_flashdata('msg','Anda Berhasil Menambahkan Kabkot/AP Group');

                redirect('access-point-input');
            }
        } else{
            $this->data['ap_name'] = $this->input->POST('ap_name');
            $this->data['ap_name_url'] = $this->input->POST('ap_name_url');
            $this->data['ap_group'] = $this->input->POST('ap_group');
            $this->data['alamat'] = $this->input->POST('alamat');
			$this->data['kota'] = $this->input->POST('kota');
            $this->data['latitude'] = $this->input->POST('latitude');
			$this->data['longitude'] = $this->input->POST('longitude');
            $this->data['mac_address'] = $this->input->POST('mac_address');
            $this->data['ip_address'] = $this->input->POST('ip_address');

            $this->data['title'] = 'Access Point Management';

            $this->data['breadcrumbs'] = [];

        $this->data['breadcrumbs'][] = [
            'active' => FALSE,
            'text' => 'Access Point Management',
            'class' => 'breadcrumb-item pe-3 text-gray-400',
            'href' => site_url('access-point-input')
        ];

        $this->data['list_kota'] = $this->Access_point_input_model->getAllKota();

        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['action'] = site_url('access-point-input');

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('access_point_input/form', $this->data);
        $this->load->view('component/footer', $this->data);
        }
    }

    public function get_kota()
	{
		$getKota = $this->Access_point_input_model->getAllKota(decrypt_url($this->input->post('id_kota')));

		$kota_arr = array();
		foreach ($getKota as $kota) {
			$id_kota = $kota->id_kota;
			$kota = $kota->kota;

			$kota_arr[] = array("id_kota" => encrypt_url($id_kota), "kota" => $kota);
		}

		echo json_encode($kota_arr);
	}

    public function detail($id) 
    {
        $this->data['title'] = "Access Point";

        $this->data['breadcrumbs'] = [];

        $this->data['breadcrumbs'][] = [
            'active' => FALSE,
            'text' => 'Access Point',
            'class' => 'breadcrumb-item pe-3 text-white',
            'href' => 'access-point-list'
        ];

        $this->data['breadcrumbs'][] = [
            'active' => TRUE,
            'text' => 'Detail',
            'class' => 'breadcrumb-item pe-3 text-gray-400',
            'href' => ''
        ];

        $this->data['url'] = site_url('access-point-list'); 

        $detail_access = $this->Access_point_input_model->getDetailAccessPoint(decrypt_url($id));

        $this->data['ap_name'] = $detail_access->ap_name;
        $this->data['ap_group'] = $detail_access->ap_group;
        $this->data['alamat'] = $detail_access->alamat;
        $this->data['kota'] = $detail_access->kota;
        $this->data['latitude'] = $detail_access->latitude;
        $this->data['longitude'] = $detail_access->longitude;
        $this->data['mac_address'] = $detail_access->mac_address;
        $this->data['ip_address'] = $detail_access->ip_address;

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('access_point_input/detail', $this->data);
        $this->load->view('component/footer');
    }

    public function form_import()
    {
        $this->data['title'] = "Access Point";

        $this->data['breadcrumbs'] = [];

        $this->data['breadcrumbs'][] = [
            'active' => FALSE,
            'text' => 'Access Point',
            'class' => 'breadcrumb-item pe-3 text-white',
            'href' => ''
        ];

        $this->data['breadcrumbs'][] = [
            'active' => TRUE,
            'text' => 'Import',
            'class' => 'breadcrumb-item pe-3 text-gray-400',
            'href' => site_url('kastemer')
        ];

        $this->data['url'] = site_url('access-point-list');

        $this->load->view('component/header', $this->data);
        $this->load->view('component/sidebar', $this->data);
        $this->load->view('access_point_list/import', $this->data);
        // $this->load->view('component/footer');
    }

    public function import()
    {
        $path = 'documents/AccessPoint/';
        $json = [];

        $this->upload_config($path);

        if (!$this->upload->do_upload('file')) {
            $json = [
                'error_message' => $this->showErrorMessage($this->upload->display_errors()),
            ];
        } else {
            $file_data = $this->upload->data();
            $file_name = $path . $file_data['file_name'];
            $arr_file = explode('.', $file_name);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($file_name);
            $sheet_data = $spreadsheet->getActiveSheet()->toArray();
            $list = [];

            foreach ($sheet_data as $key => $val) {
                if ($key != '0' && !is_null($val[0])) {
                    $list [] = [
                        'ap_name_url' => $val[0],
                        'ap_group' => $val[1],
                        'ap_name' => $val[2],
                        'alamat' => $val[3],
                        'kota' => $val[4],
                        'latitude' => $val[5],
                        'longitude' => $val[6],
                        'mac_address' => $val[7],
                        'ip_address' => $val[8]
                    ];
                }
            }

            if (file_exists($file_name))
                unlink($file_name);

            if (count($list) > 0) {
                $result = $this->Access_point_input_model->addBatchAccessPoint($list);
                if ($result) {
                    $json = [
                        'success_message' => $this->showSuccessMessage("Data yang Anda masukan telah berhasil disimpan."),
                    ];
                } else {
                    $json = [
                        'error_message' => $this->showErrorMessage("Data yang Anda masukan telah gagal disimpan.")
                    ];
                }
            } else {
                $json = [
                    'error_message' => $this->showErrorMessage("No new record is found."),
                ];
            }
        }

        echo json_encode($json);
    }

    public function upload_config($path)
    {
        if (!is_dir($path))
            mkdir($path, 0777, TRUE);

        $config['upload_path'] = './' . $path;
        $config['allowed_types'] = 'csv|CSV|xlsx|XLSX|xls|XLS';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 4096;

        $this->load->library('upload', $config);
    }

    private function showSuccessMessage(string $string)
    {
        return $string;
    }

    private function showErrorMessage(string $string)
    {
        return $string;
    }

    public function download()
    {
        $this->load->helper('download');

        force_download('assets/file/Template_Access_Point.xlsx', NULL);
    }

}