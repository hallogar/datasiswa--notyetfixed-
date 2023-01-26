    <?php
        defined('BASEPATH') OR exit('No direct script access allowed');

        class Siswa extends CI_Controller {

            public function __construct()
            {
                parent::__construct();
                $this->load->library('form_validation');
                $this->load->model('Model_siswa');
                $this->load->model('Model_jurusan');
                if(!$this->session->userdata('username')) {
                    redirect('auth');
                }
            }

            public function index()
            {
                $data['title'] = 'Siswa';
                if( $this->input->post('Submit') ) {
                    $data['keyword'] = $this->input->post('keyword');
                } else {
                    $data['keyword'] = null;
                }

                    $data['siswa'] = $this->Model_siswa->getAllSiswa($data['keyword']);

                $this->load->view('templates/header.php', $data);
                $this->load->view('siswa/index.php', $data);
                $this->load->view('templates/footer.php');
            }

            public function tambah()
            {
                $data['jurusan'] = $this->Model_jurusan->getAllJurusan(); 
                $this->form_validation->set_rules('nis', 'Nis', 'trim|required|numeric');
                $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
                $this->form_validation->set_rules('angkatan', 'Angkatan', 'trim|required|numeric');
                $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('hp', 'Hp', 'trim|required|numeric');
                $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


                if($this->form_validation->run() == false ) {
                $data['title'] = 'Tambah Siswa';

                $this->load->view('templates/header.php', $data);
                $this->load->view('siswa/tambah.php', $data);
                $this->load->view('templates/footer.php');
            } else {
                $this->Model_siswa->Tambahsiswa();
                redirect('siswa');
                }

            }

            public function ubah($id)
            {
                $data['siswa'] = $this->Model_siswa->getSiswaById($id);
                $data['jurusan'] = $this->Model_jurusan->getAllJurusan($id);
                $this->form_validation->set_rules('nis', 'Nis', 'trim|required|numeric');
                $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
                $this->form_validation->set_rules('angkatan', 'Angkatan', 'trim|required|numeric');
                $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('hp', 'Hp', 'trim|required|numeric');
                $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


                if($this->form_validation->run() == false ) {
                        $data['title'] = 'Ubah Siswa';

                $this->load->view('templates/header.php', $data);
                $this->load->view('jurusan/ubah.php', $data);
                $this->load->view('templates/footer.php');                        
                } else {
                    $this->Model_jurusan->Ubahsiswa();
                    $old_image = $data['siswa']['foto'];
                    unlink(FCPATH . 'assets/foto/' . $sold_image);
                    $this->session->set_flashdata('flash', 'Diubahkan');
                    redirect('siswa');
                }

            }

            public function detail($id)
            {
                $data['siswa'] = $this->Model_siswa->getSiswaById($id);
            
                $data['title'] = 'Detail Siswa';
                $this->load->view('templates/header.php', $data);
                $this->load->view('jurusan/detail.php', $data);
                $this->load->view('templates/footer.php');

            }

            public function hapus($id)
            {
                $data['siswa'] = $this->Model_siswa->getSiswaById($id);
                $old_image = $data['siswa']['foto'];
                    unlink(FCPATH . 'assets/foto/' . $sold_image);
                    $this->Mode_siswa->hapusSiswa($id);
                    $this->session->set_flashdata('flash', 'Dihapus');
                    redirect('siswa');
            }
}