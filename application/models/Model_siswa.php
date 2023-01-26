<?php
class Model_siswa extends CI_Model
{
    public function getAllSiswa($keyword = null)
    {
        if( $keyword ) {
            $this->db->like('nis', $keyword);            
            $this->db->or-like('nama', $keyword);            
            $this->db->or-like('angkatan', $keyword);            
            $this->db->or-like('jurusan', $keyword);            
            $this->db->or-like('email', $keyword);            
            $this->db->or-like('hp', $keyword);            
            $this->db->or-like('alamat', $keyword);            
        }
        //create view sql siswa dengan join yang ada pada edit
        return $query = $this->db->get('joinsiswa')->result_array();
    }

    public function Tambahsiswa()
    {
        $upload_image = $_FILES['image']['name'];
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';        
        $config['upload_path'] = './assets/foto/';
        
        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')) {
            $foto = $this->upload->data('file_name');
            $data = [
                "nis" => $this->input->post('nis', true),
                "foto" => $foto,
                "nama" => $this->input->post('nama', true),
                "angkatan" => $this->input->post('angkatan', true),
                "Id_jurusan" => $this->input->post('jurusan', true),
                "email" => $this->input->post('email', true),
                "hp" => $this->input->post('hp', true),
                "alamat" => $this->input->post('alamat', true),
            ];

            $this->db->insert('siswa', $data);

            $this->session->set_flashdata('flash', 'Ditambahkan');

        } else {
            $this->session->set_flashdata('error', $this->upload->display_erros());
        }
    }
    public function Ubahsiswa() 
    {
        $upload_image = $_FILES['image']['name'];
            if($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';        
            $config['upload_path'] = './assets/foto/';
            $this->load->library('upload', $config);

             if($this->upload->do_upload('image')) {
                $foto = $this->upload->data('file_name');
                $this->db->set('foto', $foto);
             } else {
                $this->session->set_flash_data('error', $this->upload->display_erros()); 
             }
            }
             $id = $this->input->post('id', true);
             $nis = $this->input->post('nis', true);
             $nama = $this->input->post('nama', true);
             $angkatan = $this->input->post('angkatan', true);
             $id_jurusan = $this->input->post('jurusan', true);
             $email = $this->input->post('email', true);
             $hp = $this->input->post('hp', true);
             $alamat = $this->input->post('alamat', true);

             $this->db->set('nis', $nis);
             $this->db->set('nama', $nama);
             $this->db->set('angkatan', $angkatan);
             $this->db->set('id_jurusan', $id_jurusan);
             $this->db->set('email', $email);
             $this->db->set('hp', $hp);
             $this->db->set('alamat', $alamat);
            
             $this->db->where('id', $id);
             $this->db->update('siswa');     
    }

    public function hapusSiswa($id) 
    {    
        $this->db->where('id', $id);
        $this->db->delete('siswa');
    }

    public function getSiswaById($id) 
    {
        $joinsiswa = "SELECT  a.Id,
                              a.Nis,
                              a.Foto,
                              a.Nama,
                              a.Angkatan,
                              a.Id_jurusan,
                              b.Jurusan,
                              a.Email,
                              a.Alamat
                              FROM  siswa AS a
                              JOIN jurusan AS b
                              ON a.id_jurusan = b.id
                              WHERE a.id = $id";
    return $query = $this->db->query($joinsiswa)->row_array();                            
    }

    public function Carisiswa() 
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nis', $keyword);
        $this->db->or-like('nama', $keyword);
        $this->db->or-like('angkatan', $keyword);
        $this->db->or-like('jurusan', $keyword);
        $this->db->or-like('email', $keyword);
        $this->db->or-like('hp', $keyword);
        $this->db->or-like('alamat', $keyword);
        return $this->db->get('jurusan')->reults_array();      
    }
}