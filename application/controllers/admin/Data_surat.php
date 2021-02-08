<?php

class Data_surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_surat');

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login, Silahkan Login Terlebih dahulu!!!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
            redirect('auth/login');
        }
    }


    public function index()
    {
        $data['title'] = "Surat Masuk";
        $data['surat'] = $this->Model_surat->tampil_data()->result();
        $data['user'] = $this->Model_surat->tampil_user()->result();
        $this->load->view('templatesadmin/header', $data);
        $this->load->view('templatesadmin/sidebar');
        $this->load->view('admin/Data_surat', $data);
        $this->load->view('templatesadmin/footer');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['surat'] = $this->Model_surat->get_surat_keyword($keyword);
        $this->load->view('templatesadmin/header');
        $this->load->view('templatesadmin/sidebar');
        $this->load->view('admin/Data_surat', $data);
        $this->load->view('templatesadmin/footer');
    }

    public function printPdf()
    {

        $data['surat'] = $this->Model_surat->tampil_data()->result();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-muklis.pdf";
        $this->pdf->load_view('admin/laporan_pdf', $data);
    }

    public function tambah_aksi()
    {
        $no_awb       = $this->input->post('no_awb');
        $consignee     = $this->input->post('consignee');
        $tgl    = $this->input->post('tgl');
        $alamat      = $this->input->post('alamat');
        $id_kurir  = $this->input->post('id_kurir');
        $status   = $this->input->post('status');
        // $date = (strtotime("+8 hours"));
        $date = (strtotime("+3 minute"));
        $tgl_deadline = date("Y-m-d h:i:s ", $date);

        $data = array(
            'no_awb'       => $no_awb,
            'consignee'     => $consignee,
            'tgl'    => date("Y-m-d h:i:s"),
            'tgl_deadline'    => $tgl_deadline,
            'alamat'      => $alamat,
            'status'   => "On Progress",
            'id_kurir'      => $id_kurir
        );

        $this->Model_surat->tambah_surat($data, 'tb_surat');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah surat Success!!</div>');
        redirect('admin/Data_surat/index', $data);
    }


    public function detail_surat($id_surat)
    {
        $data['title'] = 'Detail Surat';
        $where = array('id_surat' => $id_surat);
        $data['surat'] = $this->Model_surat->detail_surat_admin($id_surat);
        $data['user'] = $this->Model_surat->tampil_user()->result();
        $this->load->view('templatesadmin/header', $data);
        $this->load->view('templatesadmin/sidebar');
        $this->load->view('admin/Detail_surat', $data);
        $this->load->view('templatesadmin/footer');
    }


    public function edit_surat($id_surat)
    {
        $data['title'] = "Edit Surat";
        $data['user'] = $this->Model_surat->tampil_user()->result();
        $where = array('id_surat' => $id_surat);
        $data['surat'] = $this->Model_surat->edit_surat($where, 'tb_surat')->result();

        $this->load->view('templatesadmin/header', $data);
        $this->load->view('templatesadmin/sidebar');
        $this->load->view('admin/Edit_surat', $data);
        $this->load->view('templatesadmin/footer');
    }

    public function update()
    {
        $id_surat     = $this->input->post('id_surat');
        $no_awb       = $this->input->post('no_awb');
        $consignee     = $this->input->post('consignee');
        $tgl    = $this->input->post('tgl');
        $alamat      = $this->input->post('alamat');
        $id_kurir   = $this->input->post('id_kurir');
        $status   = $this->input->post('status');


        $data = array(
            // 'id_surat' => $id_surat,
            'no_awb'       => $no_awb,
            'consignee'     => $consignee,
            'tgl'    => $tgl,
            'alamat'      => $alamat,
            'id_kurir'  =>  $id_kurir,
            'status'   => $status
        );
        // var_dump($data);
        // die();

        $where = array(
            'id_surat' => $id_surat
        );

        if ($this->Model_surat->update_surat($where, $data, 'tb_surat')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update surat Success!!</div>');
            redirect('admin/Data_surat/index');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update surat Success!!</div>');
            redirect('admin/Data_surat/index');
        }
    }


    public function hapus_surat($id_surat)
    {
        $where = array('id_surat' => $id_surat);
        $this->Model_surat->hapus_data($where, 'tb_surat');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete surat Success!!</div>');
        redirect('admin/Data_surat/index');
    }
}
