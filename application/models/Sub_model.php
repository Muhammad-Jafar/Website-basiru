<?php

/**
 * 
 */
class Sub_model extends CI_model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
        FROM  `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";

        return $this->db->query($query)->result_array();
    }


    public function getAllSub()
    {
        return $this->db->get('user_sub_menu')->result_array();
    }


    public function getSubById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }


    public function editDataMenu()
    {
        $data = [

            "title" => $this->input->post('title', true),
            "menu_id" => $this->input->post('menu_id', true),
            "url" => $this->input->post('url', true),
            "icon" => $this->input->post('icon', true),
            "is_active" => $this->input->post('is_active', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }

    // skript hapus
    public function hapusDataSubMenu($id)
    {
        $this->db->delete('user_sub_menu', ['id', $id]);
    }
}
