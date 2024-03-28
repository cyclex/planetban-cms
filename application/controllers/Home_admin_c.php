<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home_admin_c extends CI_Controller
    {

        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         *        http://example.com/index.php/welcome
         *    - or -
         *        http://example.com/index.php/welcome/index
         *    - or -
         * Since this controller is set as the default controller in
         * config/routes.php, it's displayed at http://example.com/
         *
         * So any other public methods not prefixed with an underscore will
         * map to /index.php/welcome/<method_name>
         * @see https://codeigniter.com/user_guide/general/urls.html
         */

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            if (!$this->session->userdata('ISLOGIN')) {
                redirect('admin');
            }
        }

        public function index()
        {
            $isSuperAdmin = $this->common->check_super_admin(strtolower($this->session->userdata('LEVEL')));
            $data = array(
                'page'   => 'main/dashboard',
                'menu'   => 'Dashboard',
                'access' => $_SESSION['ACCESS'],
                'notif'  => $this->session->flashdata('notif'),
                'isSuperAdmin' => $isSuperAdmin
            );
            $this->parser->parse('ngobrol', $data);
        }

    }
