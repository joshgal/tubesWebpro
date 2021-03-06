<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_krowd_home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('krowd_model');
    }

	public function index()
	{
		$data['project'] = $this->krowd_model->get_all_projects_brief();
		$this->load->view('main_menu',$data);
	}

	public function about()
	{
		$this->load->view('about');
	}
	public function privacy()
	{
		$this->load->view('privacy');
	}
	public function faq()
	{
		$this->load->view('faq');
	}
	public function term()
	{
		$this->load->view('term');
	}
	public function detil_project($id)
	{
		$data['project'] = $this->krowd_model->get_specified_project_info($id);
		$data['collab'] = $this->krowd_model->get_project_collaborators($id);
		$this->load->view('detil_project', $data);
	}

	public function admin()
	{
		$data['project'] = $this->krowd_model->get_all_ChProjects_brief();
		$data['nproject'] = $this->krowd_model->get_all_notChProjects_brief();
		$data['cproject'] = $this->krowd_model->get_all_closeProjects_brief();
		$this->load->view('admin_menu', $data);
	}

	public function update_stat($id)
	{
		$this->krowd_model->update_project_admin_check($id);
		redirect('c_krowd_home/admin');
	}

	public function close_stat($id)
	{
		$this->krowd_model->close_project_admin_check($id);
		redirect('c_krowd_home/admin');
	}
	public function restore_stat($id)
	{
		$this->krowd_model->restore_project_admin_check($id);
		redirect('c_krowd_home/admin');
	}
	public function add_queue($iduser, $idproject)
	{
		$this->krowd_model->adding_collaborator_to_queue($iduser, $idproject);
		redirect('c_krowd_home/index');
	}

	
}
