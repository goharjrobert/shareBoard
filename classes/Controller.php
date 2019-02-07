<?php
/**
 * Created by PhpStorm.
 * user: GRobert
 * Date: 2/6/2019
 * Time: 12:39 PM
 */

abstract class Controller
{
    protected  $request;
    protected $action;

    public function __construct($request, $action)
    {
        $this->request = $request;
        $this->action = $action;
    }

    public function executeAction(){
        //return 'Home';
        return $this->{$this->action}();
    }

    protected function returnView($viewModel, $fullView){
        //echo get_class($this).'/'.$this->action;

        $view = 'views/'.get_class($this).'/'.$this->action.'.php';

        if($fullView){
            require('views/main.php');
        } else{
            require($view);
        }
    }
}