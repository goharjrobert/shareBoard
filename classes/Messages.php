<?php
/**
 * Created by PhpStorm.
 * User: Gohar_2
 * Date: 2/7/2019
 * Time: 6:20 PM
 */

class Messages
{
    public static function setMessage($text, $type){

        if($type == 'error'){
            $_SESSION['error'] = $text;
        }
        else{
            //echo 'Success';
            $_SESSION['success'] = $text;
        }
    }

    public static function display(){

        if(isset($_SESSION['error'])){
            echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
            unset($_SESSION['error']);
        }

        elseif(isset($_SESSION['success'])){
            echo'<div class="alert alert-success">'. $_SESSION['success'].'</div>';
            unset($_SESSION['success']);

        }
    }
}