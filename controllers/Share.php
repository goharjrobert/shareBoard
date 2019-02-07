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
        $viewModel = new ShareModel();
        $this->returnView($viewModel->Index(),true);
    }
    protected function add(){
        $viewModel = new ShareModel();
        $this->returnView($viewModel->add(),true);
    }
}