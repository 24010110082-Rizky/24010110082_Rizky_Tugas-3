<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdiModel extends CI_Model
{
    protected $table = 'prodi';
    protected $pk    = 'prodi_id';

    public function getAll()
    {
        $this->db->select('prodi.*, fakultas.fakultas_name');
        $this->db->from('prodi');
        $this->db->join('fakultas', 'fakultas.fakultas_id = prodi.fakultas_id', 'left');
        return $this->db->get()->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, [$this->pk => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where($this->pk, $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where($this->pk, $id);
        return $this->db->delete($this->table);
    }
}