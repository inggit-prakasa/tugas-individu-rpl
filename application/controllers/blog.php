<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('blog_m' , 'm');
	}

	public function index()
	{
		$data['blogs'] = $this->m->getblog();
		$this->load->view('layout/header');
		$this->load->view('blog/index', $data);
		$this->load->view('layout/footer');
	}

	public function add()
	{
		$this->load->view('layout/header');
		$this->load->view('blog/add');
		$this->load->view('layout/footer');
	}

	public function submit()
	{
		$result = $this->m->submit();
		if($result) {
			$this->session->set_flashdata('success_msg', 'Penambahan Blog selesai');
		} else {
			$this->session->set_flashdata('error_msg', 'Penambahan Blog Gagal');
		}
		redirect(base_url('blog/index'));
	}

	public function edit($id)
	{
		$data['blog'] = $this->m->getBlogById($id);
		$this->load->view('layout/header');
		$this->load->view('blog/edit',$data);
		$this->load->view('layout/footer');
	}

	public function update()
	{
		$result = $this->m->update();
		if($result) {
			$this->session->set_flashdata('success_msg', 'Update Blog selesai');
		} else {
			$this->session->set_flashdata('error_msg', 'Update Blog Gagal');
		}
		redirect(base_url('blog/index'));
	}

	public function delete($id)
	{
		$result = $this->m->delete($id);
		if($result) {
			$this->session->set_flashdata('success_msg', 'Hapus Blog selesai');
		} else {
			$this->session->set_flashdata('error_msg', 'Hapus Blog Gagal');
		}
		redirect(base_url('blog/index'));
	}

}