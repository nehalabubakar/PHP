<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
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
        $this->load->model('Database_queries');

        if ($this->session->userdata('email') == '') {
            redirect(base_url() . 'User_login');
        }
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('common/sidebar');
        $this->load->view('common/top-navigation');
        $this->load->view('dashboard');
        $this->load->view('common/footer');
    }

    public function dashboard_2()
    {
        $this->load->view('common/header');
        $this->load->view('common/sidebar');
        $this->load->view('common/top-navigation');
        $this->load->view('dashboard-2');
        $this->load->view('common/footer');
    }

    public function dashboard_3()
    {
        $this->load->view('common/header');
        $this->load->view('common/sidebar');
        $this->load->view('common/top-navigation');
        $this->load->view('dashboard-3');
        $this->load->view('common/footer');
    }
}
