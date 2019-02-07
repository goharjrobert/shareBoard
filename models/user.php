<?php
/**
 * Created by PhpStorm.
 * user: Gohar_2
 * Date: 2/6/2019
 * Time: 8:43 PM
 */

class UserModel extends Model
{
    public function Index(){
        return;
    }

    public function login(){
        return;
    }

    public function register(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = md5($post['password']);
        $passwordConfirm = md5($post['password-confirmation']);

        if($password === $passwordConfirm) {
            if (isset($post['submit'])) {
                print_r($post);
                // Insert into mysql table
                $this->query('INSERT INTO users (user_name, email, password) VALUES(:user_name, :email, :password)');
                $this->bind(':user_name', $post['name']);
                $this->bind(':email', $post['email']);
                $this->bind(':password', $password);
                $this->executeQuery();
                //verify
                if ($this->lastInsertID()) {
                    header('Location: ' . ROOT_URL . 'user/login');
                }
                else{
                    echo "didn't work";
                }
            }
        }
        else{
            return;
        }
        return;
    }
}