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
        $viewModel = new UserModel();
        $this->returnView($viewModel->login(), true);
    }
}