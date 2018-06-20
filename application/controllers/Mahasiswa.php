<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_mahasiswa');
        $this->load->helper('url_helper');
        $this->load->library('pagination');
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Data Mahasiswa';

        $config['base_url'] = base_url()."index.php/mahasiswa/index";
        $config['total_rows'] = $this->db->query("SELECT * FROM mahasiswa;")->num_rows();
        $config['per_page'] = 10;
        $config['num_links'] = 2;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'page-link');
        // Styling
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'>(current)</span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tag_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";

        $config['first_link'] = '< Pertama ';
        $config['last_link'] = 'Terakhir > ';
        $config['next_link'] = '> ';
        $config['prev_link'] = '< ';
        $this->pagination->initialize($config);

        $data['mahasiswa'] = $this->m_mahasiswa->getAll($config);

        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/data_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function add_data() {
        $data['title'] = 'Insert Data';

        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/form_add');
        $this->load->view('templates/footer');
    }

    public function insert() {

        if ($this->input->post('submit')) {
            $data = array(
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat')
            );            

            $this->m_mahasiswa->Insert('mahasiswa', $data);            
            redirect("mahasiswa/", 'refresh');
        }
    }

    public function edit_data($noinduk) {
        $siswa = $this->m_mahasiswa->GetWhere('mahasiswa', array('no_induk' => $noinduk));
        $data = array(
            'no_induk' => $siswa[0]['no_induk'],
            'nama' => $siswa[0]['nama'],
            'alamat' => $siswa[0]['alamat'],
        );

        $this->load->view('mahasiswa/form_edit', $data);
    }

    public function update_data() {
        $update = $this->input->post();

        $data = array(
            'nama' => $update['nama'],
            'alamat' => $update['alamat']
        );
        $where = array('no_induk' => $update['ni']);
        $res = $this->m_mahasiswa->Update('mahasiswa', $data, $where);
        if ($res > 0) {
            redirect('mahasiswa/index', 'refresh');
        }
    }

    public function delete_data($noinduk) {
        $noinduk = array('no_induk' => $noinduk);

        $this->m_mahasiswa->Delete('mahasiswa', $noinduk);

        redirect(base_url()."mahasiswa/", 'refresh');
    }
}