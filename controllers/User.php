<?php
/**
 * Created by PhpStorm.
 * user: GRobert
 * Date: 2/6/2019
 * Time: 1:08 PM
 */

class User extends Controller
{
    protected function Index(){
        $viewModel = new UserModel();
        $this->returnView($viewModel->Index(), true);
    }

    protected function Login(){
        if(!isset($_SESSION['is_logged_in'])) {
            $viewModel = new UserModel();
            $this->returnView($viewModel->login(), true);
        }else{
            header('Location: '.ROOT_URL);
        }
    }

    protected function Register(){
        if(!isset($_SESSION['is_logged_in'])) {
            $viewModel = new UserModel();
            $this->returnView($viewModel->register(), true);
        }else{
            header('Location: '.ROOT_URL);
        }
    }

    protected function Logout(){
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();
        $message = 'Logged Out';
        Messages::setMessage($message, 'error');
        header('Location: '. ROOT_URL);
    }
}