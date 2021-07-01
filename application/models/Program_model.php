<?php

/**
 * 
 */
class Program_model extends CI_model
{
    public function getAllProgram()
    {
        return $this->db->get('user_program')->result_array();
    }


    public function getProgramById($id)
    {
        return $this->db->get_where('user_program', ['id' => $id])->row_array();
    }


    public function editDataProgram()
    {
        $data = [

            "judul" => $this->input->post('judul', true),
            "mulai" => $this->input->post('mulai', true),
            "deadline" => $this->input->post('deadline', true),
            "status" => $this->input->post('status', true)

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_program', $data);
    }

    // skript hapus
    public function hapusDataProgram($id)
    {
        $this->db->delete('user_program', ['id', $id]);
    }


    public function cariDataProgram()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('judul', $keyword);
        $this->db->or_like('mulai', $keyword);
        $this->db->or_like('deadline', $keyword);
        $this->db->or_like('status', $keyword);
        return $this->db->get('user_program')->result_array();
    }
}
