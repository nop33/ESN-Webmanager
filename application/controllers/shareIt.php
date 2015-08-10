<?php
class ShareIt extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->config->load('shareIt');
        $fb_config = array(
            'appId'  => $this->config->item('appId'),
            'secret' => $this->config->item('secret')
        );

        $this->load->library('facebook', $fb_config);
    }

    public function index() {
        $user = $this->facebook->getUser();
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => site_url().'shareIt/shareLogout/'));
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl();
        }
        $data['title'] = "Share it!";
        $data['js'] = array('jquery.validate.min');
        $this->template->load('default', 'shareIt', $data);
    }

    public function shareLogout() {
        $this->facebook->destroySession();
        redirect('shareIt');
    }

    function postAtFacebook() {
        $shareitOptions = array(
            'esn-auth-page'              => $this->config->item('esn-auth-page'),
            'erasmus-thessaloniki-group' => $this->config->item('erasmus-thessaloniki-group'),
            'esn-auth-group'              => $this->config->item('esn-auth-group'),
            'esn-uom-page'                  => $this->config->item('esn-uom-page'),
            'esn-ateith-page'              => $this->config->item('esn-ateith-page')
        );

        $user = $this->facebook->getUser();

        if($_POST && !empty($_POST['shareit'])) {
            $locations = $this->input->post('shareit');
            $userMessage = $this->input->post('message');
            if($this->input->post('link')) {
                $link = $_POST["link"];
            }
            foreach($locations as $location) {
                $post_urls[] = $shareitOptions["$location"];
            }
            if(isset($link)) {
                $msg_body = array(
                    'message' => $userMessage,
                    'link' => $link
                    );
            }
            else {
                $msg_body = array(
                    'message' => $userMessage,
                );
            }
            // if the user is logged in
            if ($user) {
                $postResult = false;
                // for every group/page
                foreach($post_urls as $url) {
                    try {
                        // post the message
                        $postResult = $this->facebook->api("/$url/feed", 'post', $msg_body );
                    } catch (FacebookApiException $e) {
                        echo $e->getMessage();
                    }
                }
                return ($postResult) ? true : false ;
            }
            else{
                // if the user is not logged in, redirect to the login URL
                $loginUrl = $this->facebook->getLoginUrl(
                    array(
                        'redirect_uri' => $this->config->item('redirect_uri'),
                        'scope' => $this->config->item('scope')
                    )
                );
                header('Location: ' . $this->facebook->getLoginUrl());
            }
        }
        return false;
    }

    function postAtTwitter() {
        $tweet = $this->input->post('tweet');
        $tweeter_result = false;
        if(strlen($tweet) > 0) {
               $tweeter_result = $this->share_twitter($tweet);
        }
        return ($tweeter_result) ? true : false ;
    }

    public function sharePost() {
        if($this->session->userdata('logged_in') != true) { //if the user is not logged in
            redirect('login');
        }

        $fb_result = $this->postAtFacebook();

        $tw_result = $this->postAtTwitter();

        $fb_result = ($fb_result) ? true : 0;
        $tw_result = ($tw_result) ? true : 0;

        redirect('shareIt?fb='.$fb_result.'&tw='.$tw_result);
    }

    function share_twitter($tweet) {
        $this->load->library('twitter/codebird');
        $this->codebird->setConsumerKey($this->config->item('twitter_consumer'),$this->config->item('twitter_consumer_secret'));
        $this->codebird->setToken($this->config->item('twitter_token'),$this->config->item('twitter_token_secret'));
        $params = array(
          'status' => $tweet
        );
        return $this->codebird->statuses_update($params);
    }
}
