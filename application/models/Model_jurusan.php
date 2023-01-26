<?php
class Model_jurusan extends CI_Model
{
    public function getAllJurusan()
    {
        return $query = $this->db->get('jurusan')->result_array();
    }

    public function Tambahjurusan()
    {
        $data = [
            "jurusan" => $this->input->post('jurusan', true)
        ];

        $this->db->insert('jurusan', $data);
    }

    public function Ubahjurusan()
    {      
        $data = [
            "jurusan" => $this->input->post('jurusan', true)
        ];

        $this->db->where('Id', $this->input->post('Id'));
        $this->db->update('jurusan', $data);
    }

    public function hapusJurusan($id)
    {      
        $this->db->where('Id', $id);
        $this->db->delete('jurusan');
    }
    
    public function getJurusanById($id)
    {
        return $this->db->get_where('jurusan', ['Id' => $id])->row_array();
    }

    public function Carijurusan()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('jurusan', $keyword);
        return $this->db->get('jurusan')->result_array();
    }
}

?>