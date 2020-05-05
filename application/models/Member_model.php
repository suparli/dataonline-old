<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model

{
    public function selectMember(){
        $query = $this->db->get('user_rule');
        return $query->result_array();
    }

    public function getData(){
        $query = $this->db->select("*")->from('user')->order_by('id_user','ASC')->get();
        return $query->result_array();
    }

    public function saveData($data)
    {

        $query = $this->db->insert("data_device", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id)
    {

        $query = $this->db->where("id_user", $id)
                ->get("user");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("user", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function delete($id)
    {

        $query = $this->db->delete('user', array('id_user' => $id));

        if($query){
            return true;
        }else{
            return false;
        }

    }









}


