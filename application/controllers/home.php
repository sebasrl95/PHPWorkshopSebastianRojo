<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$articles = $this->articlemodel->getArticles();

        $data = array('title' => 'All Articles',
                     'base_url' => base_url(),
                     'articles' => $articles->result());
        
        $this->load->view('head', array('title' => 'All Articles')); 
		$this->load->view('home', $data);
        $this->load->view('footer');  
	}
}