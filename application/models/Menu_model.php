<?php

/**
 * 
 */
class Menu_model extends CI_model

{

    public function getAllMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    // bagian dari fungsi button hapus
    public function editDataMenu()
    {
        $data = [

            "menu" => $this->input->post('menu', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    // bagian dari fungsi button hapus
    public function  hapusDataUser($id)
    {
        $this->db->delete('user_menu', ['id', $id]);
    }
}
