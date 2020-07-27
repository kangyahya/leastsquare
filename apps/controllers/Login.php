<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        if($this->admin->logged_id()){
            redirect('dashboard');
        }
    }
    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    public function index()
    {
                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = sha1($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->admin->check_login('tbl_users','tbl_group_users','tbl_users.id_group = tbl_group_users.id_group', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->id_users,
                            'user_name' => $apps->username,
                            'user_pass' => $apps->password,
                            'user_nickname' => $apps->nickname,
                            'user_role' => $apps->group_name,
                            'user_avatar' => $apps->img,
                            'logged' => 1
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);
                        $this->session->set_flashdata('success','Login Berhasil');
                        $data = [
                            'last_login' => date('Y-m-d H:i:s'),
                            'ip_address' => $this->getUserIpAddr()
                        ];
                        $this->admin->update('tbl_users',['id_users'=>$session_data['user_id']],$data);
                        redirect('dashboard/','refresh');

                    }
                }else{
                    $this->session->set_flashdata('error','User not found!');
                    $this->load->view('login_page');
                }
            }else{
                $this->load->view('login_page');
            }

        }

    
    
}
?>