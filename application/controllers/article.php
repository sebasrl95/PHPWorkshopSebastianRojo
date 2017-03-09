<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index()
	{
        redirect(base_url());
	}

    public function post($id = -1) {
        if ($id == -1)
            redirect(base_url());

        $article = $this->articlemodel->getArticleByID($id);
        $this->load->helper('bootstrap');
        $data = array('title' => 'Articulo',
                     'base_url' => base_url(),
                     'article' => $article->result());
        
        $this->load->view('head', $data);
        $this->load->view('singlearticle', $data);
        $this->load->view('footer');
    }

    public function newarticle() {
        $this->load->helper('bootstrap');
        $data = array('title' => 'New Article',
                     'base_url' => base_url());
        
        $this->load->view('head', $data);
        $this->load->view('newarticle', $data);
        $this->load->view('footer');
    }

    public function insert() {
        $post = $this->input->post();
        $this->load->model('file');
        $filename = $this->file->uploadImage('./assets/img/', 'No es posible subir la imagen.');
        $post['file_name'] = $filename;

        if ($this->articlemodel->insert($post)) {
            redirect(base_url());
        } 
    }

    public function update() {
        $post = $this->input->post();
        $id = $post['id_article'];
        $data = array('title' => $post['title'], 'description' => $post['description']);
        if ($this->articlemodel->update($id, $data)) {
            redirect(base_url());
        }
    }
}