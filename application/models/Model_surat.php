<?php

class Model_surat extends CI_Model
{

    // public function tampil_data(){
    // 	return $this->db->get('tb_barang');
    // }

    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('tb_surat');
        $this->db->join('tb_user', 'tb_user.id = tb_surat.id_kurir');
        $query = $this->db->get();
        return $query;
    }

    public function tampil_user()
    {
        $this->db->select('id');
        $this->db->select('name');
        $this->db->from('tb_user');
        $this->db->where('role_id', 2);
        // $this->db->join('tb_user', 'tb_user.id = tb_surat.id_kurir');
        $query = $this->db->get();
        return $query;
    }



    public function tambah_surat($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function edit_surat($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_surat($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update('tb_surat', $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    public function find($id_surat)
    {
        $result = $this->db->where('id_surat', $id_surat)
            ->limit(1)
            ->get('tb_surat');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }


    public function detail_surat($id_surat)
    {
        $result = $this->db->where('id_surat', $id_surat)->get('tb_surat');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_surat_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_surat');
        $this->db->join('tb_user', 'tb_user.id = tb_surat.id_kurir');
        $this->db->like('no_awb', $keyword);
        $this->db->or_like('consignee', $keyword);
        $this->db->or_like('tgl', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('name', $keyword);
        $this->db->or_like('status', $keyword);
        return $this->db->get()->result();
    }

    public function detail_surat_admin($id_surat)
    {
        $result = $this->db->where('id_surat', $id_surat)->get('tb_surat');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
