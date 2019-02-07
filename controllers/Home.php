<?php
/**
 * Created by PhpStorm.
 * user: GRobert
 * Date: 2/6/2019
 * Time: 12:47 PM
 */

class Home extends Controller
{
    protected function Index(){
        $viewModel = new HomeModel();
        $this->ReturnView($viewModel->Index(), true);
    }
}