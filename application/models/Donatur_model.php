<?php

/**
 *
 */
class Donatur_model extends CI_model
{

    public function getAllDonatur()
    {
        return $this->db->get('user_donatur')->result_array();
    }


    public function getDonaturById($id)
    {
        return $this->db->get_where('user_donatur', ['id' => $id])->row_array();
    }

    public function get_sum()
    {
        $this->db->select_sum('nominal', 'nominal');
        $this->db->from('user_donatur');
        return $this->db->get('')->row();
    }


    public function editDataDonatur()
    {
        $data = [

            "nama" => $this->input->post('nama', true),
            "program" => $this->input->post('program', true),
            "no_telp" => $this->input->post('no_telp', true),
            "nominal" => $this->input->post('nominal', true),
            "bank" => $this->input->post('bank', true)

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_donatur', $data);
    }



    // skript hapus
    public function hapusDataDonatur($id)
    {
        $this->db->delete('user_donatur', ['id', $id]);
    }


    public function cariDataDonatur()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('program', $keyword);
        $this->db->or_like('no_telp', $keyword);
        $this->db->or_like('nominal', $keyword);
        $this->db->or_like('bank', $keyword);
        return $this->db->get('user_donatur')->result_array();
    }
}
