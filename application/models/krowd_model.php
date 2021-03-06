<?php
 
class krowd_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_notChProjects_brief()
    {
    	$this->db->select('project.id_project, project.judul_project, user.username, project.short_desc, DATEDIFF(project.end_date,CURDATE()) AS "days_left", project.admin_check');
    	$this->db->from('project');
    	$this->db->join('user','project.id_user = user.id_user');
        $this->db->where('project.admin_check = "NotChecked"');
    	$query = $this->db->get();
    	return $query->result_array();
    }

    function get_all_ChProjects_brief()
    {
        $this->db->select('project.id_project, project.judul_project, user.username, project.short_desc, DATEDIFF(project.end_date,CURDATE()) AS "days_left", project.admin_check');
        $this->db->from('project');
        $this->db->join('user','project.id_user = user.id_user');
        $this->db->where('project.admin_check = "Accepted"');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_projects_brief()
    {
        $this->db->select('project.id_project, project.judul_project, user.username, project.kategori, project.short_desc, DATEDIFF(project.end_date,CURDATE()) AS "days_left", COUNT(queue.id_user) as "joined_user", project.max_user, project.popularity, project.admin_check, project.upload_image');
        $this->db->from('project');
        $this->db->join('user','project.id_user = user.id_user');
        $this->db->join('queue', 'queue.id_project = project.id_project');
        $this->db->group_by('project.id_project');
        $this->db->where('project.admin_check = "Accepted"');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_specified_project_info($id)
    {
        $this->db->select('project.judul_project, user.username, project.kategori, project.short_desc, DATEDIFF(project.end_date,CURDATE()) AS "days_left", COUNT(queue.id_user) as "joined_user", project.max_user, project.deskripsi, project.lokasi, project.bidang_keahlian');
        $this->db->from('project');
        $this->db->join('user','project.id_user = user.id_user');
        $this->db->join('queue','queue.id_project = project.id_project');
        $this->db->where('project.id_project =', $id);
        $this->db->where('queue.status = 1');
        $query = $this->db->get();
        return $query->result_array();   
    }

    function get_project_collaborators($id)
    {
        $this->db->select('user.id_user, user.username, user.kota');
        $this->db->from('user');
        $this->db->join('queue','queue.id_user=user.id_user');
        $this->db->join('project','project.id_project = queue.id_project');
        $this->db->where('project.id_project =', $id);
        $query = $this->db->get();
        return $query->result_array(); 
    }
    function get_collaborator_projects($id)
    {
        $this->db->select('count(queue.id_user)as "colpro"');
        $this->db->from('queue');
        $this->db->where('queue.id_user =', $id);
        $query = $this->db->get();
        return $query->result_array(); 
          
    }
    function get_initiated_projects($id)
    {
        $this->db->select('count(project.id_project)as"inpro"');
        $this->db->from('project');
        $this->db->join('user', 'user.id_user = project.id_user');
        $this->db->where('user.id_user =', $id);
        $query = $this->db->get();
        return $query->result_array(); 
          
    }
    function update_project_admin_check($id)
    {
        $data = array(
            'admin_check' => "Accepted"
            );
        $this->db->set($data);
        $this->db->where('id_project', $id);
        $this->db->update('project');   
    }
}