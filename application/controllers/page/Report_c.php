<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Common');
        if (!$this->session->userdata('ISLOGIN')) {
            redirect('admin');
        }

    }

    public function campaign()
    {
        $isAdmin = $this->common->check_admin(strtolower($this->session->userdata('LEVEL')));
        $isSuperAdmin = $this->common->check_super_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => 'page/report/campaign',
            'menu'   => 'List Campaign',
            'notif'  => $this->session->flashdata('notif'),
            'isAdmin' => $isAdmin,
            'isSuperAdmin' => $isSuperAdmin
        );
        $this->parser->parse('ngobrol', $data);
    }

    public function detail($campaignID)
    {
        $isAdmin = $this->common->check_admin(strtolower($this->session->userdata('LEVEL')));
        $isSuperAdmin = $this->common->check_super_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => 'page/report/detail',
            'menu'   => 'Detail Campaign',
            'notif'  => $this->session->flashdata('notif'),
            'campaign_id' => $campaignID,
            'isAdmin' => $isAdmin,
            'isSuperAdmin' => $isSuperAdmin
        );
        $this->parser->parse('ngobrol', $data);
    }

    public function summary_aggregate()
    {
        $isSuperAdmin = $this->common->check_super_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => 'page/report/summary_aggregate',
            'menu'   => 'Report URL Tracker',
            'notif'  => $this->session->flashdata('notif'),
            'isSuperAdmin' => $isSuperAdmin
        );
        $this->parser->parse('ngobrol', $data);
    }

    public function detail_summary($kolID)
    {
        $isSuperAdmin = $this->common->check_super_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => 'page/report/detail_summary',
            'menu'   => 'Detail URL Tracker',
            'notif'  => $this->session->flashdata('notif'),
            'kol_id' => $kolID,
            'isSuperAdmin' => $isSuperAdmin
        );
        $this->parser->parse('ngobrol', $data);
    }

    public function user_account()
    {
        $isSuperAdmin = $this->common->check_super_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => 'page/report/users',
            'menu'   => 'User Accounts',
            'notif'  => $this->session->flashdata('notif'),
            'isSuperAdmin' => $isSuperAdmin
        );
        $this->parser->parse('ngobrol', $data);
    }

}
