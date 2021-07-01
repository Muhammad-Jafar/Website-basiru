<?php

/**
 *
 */
class Donasi_model extends CI_model
{

    public function getAllDonasi()
    {
        return $this->db->get('user_donasi')->result_array();
    }


    public function getDonasiById($id)
    {
        return $this->db->get_where('user_donasi', ['id' => $id])->row_array();
    }


    public function editDataDonasi()
    {
        $data = [

            "program_id" => $this->input->post('program_id', true),
            "nama" => $this->input->post('nama', true),
            "jumlah" => $this->input->post('jumlah', true),
            "bank" => $this->input->post('bank', true),
            "tgl" => $this->input->post('tgl', true)

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_donasi', $data);
    }



    // skript hapus
    public function hapusDataDonasi($id)
    {
        $this->db->delete('user_donasi', ['id', $id]);
    }


    public function cariDataDonasi()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('program_id', $keyword);
        $this->db->or_like('jumlah', $keyword);
        $this->db->or_like('bank', $keyword);
        $this->db->or_like('tgl', $keyword);
        return $this->db->get('user_donasi')->result_array();
    }
}
