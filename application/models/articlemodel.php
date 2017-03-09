<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleModel extends CI_Model {

     public function getArticles()
     {
        return $this->db->get('tb_articles');
     }

     public function getArticleByID($id = -1)
     {
     	$result = $this->db->query('SELECT * FROM tb_articles WHERE id_article = '.$id);
	    return $result;
     }

     public function insert($post = null) {
         if ($post != null) {
            $title = $post['title'];
            $description = $post['description'];
            $file_name = $post['file_name'];

            $data = array(
                'title' => $title ,
                'description' => $description,
                'image_name' => $file_name
            );

            if ($this->db->insert('tb_articles', $data)) {
                return true;
            } 
         } else {
             return false;
         }
     }
}