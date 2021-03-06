<?php
	class Posts extends CI_Controller{
		public function index() {
		

			$data['title'] = 'Latest Posts';

			$data['posts'] = $this->post_model->get_posts();
			/*print_r($data['posts']);
*/
			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');

		}

		public function view($slug = NULL) {
		
			$data['post'] = $this->post_model->get_posts($slug);
			/*print_r($data['posts']);*/

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');

		}
	}
