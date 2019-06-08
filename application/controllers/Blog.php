<?php
class Blog extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('posts');
    }

    function index($start = 0)//index page
    {
        $data['posts'] = $this->posts->get_posts(5, $start);

        
        
        $this->load->view('header');
        $this->load->view('view_all_post', $data);
       $this->load->view('footer');
    }

    function search($query = '')//index page
    {

        $query = $query != '' ? $query : $this->input->get('query', TRUE);

        $data['posts'] = $this->posts->search_posts($query);

        
        $this->load->view('header');
        $this->load->view('v_search', $data);
        $this->load->view('footer');
    }

    function post($post_id)//single post page
    {
        $data['post'] = $this->posts->get_post($post_id);
        $this->load->view('header');
        $this->load->view('view_single_post', $data);
        $this->load->view('footer');
    }

    function new_post()//Creating new post page
    {
        if (!$this->check_permissions())
        {
            redirect(base_url() . 'index.php/users/login');
        }
        if ($this->input->post()) {
            
            $data = array('post_title' => $this->input->post('post_title'), 'post' => $this->input->post('post'), 'user_id' => $this->session->userdata("user_id"), 'active' => 1,);
            $this->posts->insert_post($data);
            redirect(base_url() . 'index.php/blog/');
        } else {

            $this->load->view('header');
            $this->load->view('create_post');
            $this->load->view('footer');
        }
    }

    function check_permissions($postId = false)//checking current user's permission
    {
        $user_data = $this->session->userdata();//current user
        if (empty($user_data)) {
            return false;
        }
        if ($user_data['user_type'] == 'admin') {
            return true;
        }
        if($postId){
            $postData = $this->posts->get_post($postId);
            if ($user_data['user_id'] == $postData['user_id']) {
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }

    function editpost($post_id)//Edit post page
    {
        if (!$this->check_permissions($post_id))
        {
            redirect(base_url() . 'index.php/users/login');
        }
        $data['success'] = 0;

        if ($this->input->post()) {
            $data = array('post_title' => $this->input->post('post_title'), 'post' => $this->input->post('post'), 'active' => 1);
            $this->posts->update_post($post_id, $data);
            $data['success'] = 1;
        }
        $data['post'] = $this->posts->get_post($post_id);

        $this->load->view('header');
        $this->load->view('update_post', $data);
        $this->load->view('footer');
    }

    function deletepost($post_id)//delete post page
    {
        if (!$this->check_permissions($post_id))
        {
            redirect(base_url() . 'index.php/users/login');
        }
        $this->posts->delete_post($post_id);
        redirect(base_url() . 'index.php/blog/');
    }
}

?>
