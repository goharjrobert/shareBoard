<?php
/**
 * Created by PhpStorm.
 * User: Gohar_2
 * Date: 2/14/2019
 * Time: 7:06 PM
 */

class Comment extends Controller
{
    protected function Index(){
        if(isset($_SESSION['is_logged_in'])) {
            $viewModel = new CommentModel();
            $this->returnView($viewModel->Index(),true);
        }else{
            $message = 'You must be logged in to view posts';
            Messages::setMessage($message, 'error');
            header('Location: '.ROOT_URL.'user/login');
        }



    }
}