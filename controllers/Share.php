<?php
/**
 * Created by PhpStorm.
 * user: GRobert
 * Date: 2/6/2019
 * Time: 1:08 PM
 */

class Share extends Controller
{
    protected function Index(){
        if(isset($_SESSION['is_logged_in'])) {
            $viewModel = new ShareModel();
            $this->returnView($viewModel->Index(),true);
        }else{
            $message = 'You must be logged in to view posts';
            Messages::setMessage($message, 'error');
            header('Location: '.ROOT_URL.'user/login');
        }



    }
    protected function Add(){
        if(isset($_SESSION['is_logged_in'])) {
            $viewModel = new ShareModel();
            $this->returnView($viewModel->add(), true);
        }else{
            $message = 'You must be logged in to view posts';
            Messages::setMessage($message, 'error');
            header('Location: '.ROOT_URL.'user/login');
        }
    }

    protected function Edit(){
        if(isset($_SESSION['is_logged_in'])){
            $viewModel = new ShareModel();
            $this->returnView($viewModel->edit(), true);
        }else{
            $message = 'You must be logged in to edit posts';
            Messages::setMessage($message, 'error');
            header('Location: '.ROOT_URL.'user/login');
        }
    }
}