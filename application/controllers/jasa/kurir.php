<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{
    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['tb_kurir'] = $this->db->get_where('tb_kurir', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templatesjasa/header', $data);
        $this->load->view('templatesjasa/sidebar', $data);
        $this->load->view('jasa/Profile', $data);
        $this->load->view('templatesjasa/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['tb_kurir'] = $this->db->get_where('tb_kurir', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templatesjasa/header', $data);
        $this->load->view('templatesjasa/sidebar', $data);
        $this->load->view('jasa/Edit', $data);
        $this->load->view('templatesjasa/footer');
    }

    public function proses_edit()
    {
        $data['title'] = 'Edit Profile';
        // membuat rules utk name
        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');

        //membuat form_validation.
        if ($this->form_validation->run() == false) {
            $this->load->view('templatesjasa/header', $data);
            $this->load->view('templatesjasa/sidebar', $data);
            $this->load->view('jasa/Edit', $data);
            $this->load->view('templatesjasa/footer');
        } else {
            $username             = $this->input->post('username');
            $password             = $this->input->post('password');
            $nama             = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat           = $this->input->post('alamat');
            $no_telp          = $this->input->post('no_telp');
            $email            = $this->input->post('email');
            $agama            = $this->input->post('agama');
            $jkel               = $this->input->post('jkel');

            $data = [
                'nama' => $nama,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'no_telp' => $no_telp,
                'email' => $email,
                'agama' => $agama,
                'jkel' => $jkel
            ];

            $tb_user = [
                'username' => $username,
                'password' => $password
            ];

            $this->db->where('email', $email);
            $this->db->update('tb_kurir', $data);
            $this->db->where('email', $email);
            $this->db->update('tb_user', $tb_user);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been update!</div>');
            redirect('jasa/Tukang/profile');
        }
    }


    public function pesanan_t()
    {
        $data['title'] = 'Surat Masuk';
        $this->db->select('*');
        $this->db->from('tb_surat');
        $this->db->where('id_kurir', $this->session->userdata('id'));
        $data['tampil'] = $this->db->get()->result();


        // var_dump($data['tampil']["id_surat"]);
        // die();

        $this->load->view('templatesjasa/header', $data);
        $this->load->view('templatesjasa/sidebar', $data);
        $this->load->view('jasa/Pesanan_t', $data);
        $this->load->view('templatesjasa/footer');
    }

    public function update($id_surat)
    {
        $data['title'] = 'Update Surat Masuk';
        $data['tb_surat'] = $this->db->get_where('tb_surat', ['id_surat' =>
        $id_surat])->row_array();

        $this->load->view('templatesjasa/header', $data);
        $this->load->view('templatesjasa/sidebar', $data);
        $this->load->view('kurir/update', $data);
        $this->load->view('templatesjasa/footer');
    }

    public function _pr_upload_gambar($foto_lama = null)
    {
        if (!empty($_FILES['foto_penerima']['name'])) {
            $nmfile = md5($_FILES['foto_penerima']['name']);
            $config['upload_path']          = './uploads/foto_penerima';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['file_name']            = $nmfile;
            $config['overwrite']            = true;
            $config['max_size']             = 2024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_penerima')) {
                return $this->upload->data("file_name");
            }

            return "default.png";
        } else {
            return $foto_lama;
        }
    }

    public function upload_lokasi($foto_lokasi = null)
    {
        if (!empty($_FILES['foto_lokasi']['name'])) {
            $nmfile = md5($_FILES['foto_lokasi']['name']);
            $config['upload_path']          = './uploads/foto_lokasi';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['file_name']            = $nmfile;
            $config['overwrite']            = true;
            $config['max_size']             = 2024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_lokasi')) {
                return $this->upload->data("file_name");
            }

            return "default.png";
        } else {
            return $foto_lokasi;
        }
    }

    public function proses_update($id_surat)
    {
        $upload_image     = $_FILES['foto_penerima']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './uploads/foto_penerima';
            // $config['max_width']            = '240';
            // $config['max_height']           = '240';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_penerima')) {
                $new_image = $this->upload->data('file_name');
                $data = array(
                    'foto_penerima' => $new_image,
                );
                $this->db->where('id_surat', $id_surat);
                $this->db->update('tb_surat', $data);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $upload_image    = $_FILES['foto_lokasi']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './uploads/foto_lokasi';
            // $config['max_width']            = 240;
            // $config['max_height']           = 240;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_lokasi')) {
                $new_image = $this->upload->data('file_name');
                $data = array(
                    'foto_lokasi' => $new_image,
                );
                $this->db->where('id_surat', $id_surat);
                $this->db->update('tb_surat', $data);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $upload_image     = $_FILES['foto_gedung']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './uploads/foto_gedung';
            // $config['max_width']            = 240;
            // $config['max_height']           = 240;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_gedung')) {
                $new_image = $this->upload->data('file_name');
                $data = array(
                    'foto_gedung' => $new_image,
                );
                $this->db->where('id_surat', $id_surat);
                $this->db->update('tb_surat', $data);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $upload_image     = $_FILES['foto_shareloc']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './uploads/foto_shareloc';
            // $config['max_width']            = 240;
            // $config['max_height']           = 240;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_shareloc')) {
                $new_image = $this->upload->data('file_name');
                $data = array(
                    'foto_shareloc' => $new_image,
                );
                $this->db->where('id_surat', $id_surat);
                $this->db->update('tb_surat', $data);
            } else {
                echo $this->upload->display_errors();
            }
        }

        // $data = array(
        //     'foto_penerima' => $this->_pr_upload_gambar(),
        //     'foto_lokasi' => $this->upload_lokasi()
        // );
        // $this->db->where('id_surat', $id_surat);
        // $this->db->update('tb_surat', $data);
        redirect('jasa/kurir/Pesanan_t');
    }
}
