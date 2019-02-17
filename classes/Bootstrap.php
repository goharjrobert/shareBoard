<?php
/**
 * Created by PhpStorm.
 * user: GRobert
 * Date: 2/6/2019
 * Time: 12:10 PM
 */

class Bootstrap{
    private $controller;
    private $action;
    private $request;

    public function __construct($request)
    {
        $this->request = $request;

        if($this->request['controller'] == ""){
            $this->controller = 'home';

        }else{
            $this->controller = $this->request['controller'];
        }

        if($this->request['action'] == ""){
            $this->action = 'index';
        }else{
            $this->action = $this->request['action'];
        }

        //echo $this->controller;
    }

    public function createController(){
        //Check for the class
        if(class_exists($this->controller)){
            //Contains object of type controller
            $parents = class_parents($this->controller);

            //Check extended
            if(in_array("Controller", $parents)){
                //echo $this->controller. ' '. $this->action;
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->request, $this->action);
                } else{
                    //Method does not exist
                    echo "Method does not exist";
                    return null;
                }
            } else {
                //Base controller not found
                echo "Base controller not found";
                return null;
            }
        } else{
            //Method does not exist
            echo "Controller class doesn't exist";
            return null;
        }
    }

}