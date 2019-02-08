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
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = md5($post['password']);
        if (isset($post['submit'])) {
            //print_r($post);
            //Verify with Database
            $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $row = $this->single();
            if($row){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id"    => $row['id'],
                    "name"  => $row['user_name'],
                    "email" => $row['email']
                );
                $message = 'Logged in! Welcome '.$_SESSION['user_data']['name'];
                Messages::setMessage($message, 'success');
                header('Location: ' . ROOT_URL . 'share');
            }
            else{
                $message = 'Incorrect login credentials';
                Messages::setMessage($message, 'error');
            }
        }
        return;
    }

    public function register(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = md5($post['password']);
        $passwordConfirm = md5($post['password-confirmation']);
        if($post['name'] !== '' || $post['link'] !== '' || $post['email'] !== '' || $post['password'] !== '') {
            if ($password === $passwordConfirm) {
                if (isset($post['submit'])) {
                    //print_r($post);
                    // Insert into mysql table
                    $this->query('INSERT INTO users (user_name, email, password) VALUES(:user_name, :email, :password)');
                    $this->bind(':user_name', $post['name']);
                    $this->bind(':email', $post['email']);
                    $this->bind(':password', $password);
                    $this->executeQuery();
                    //verify
                    if ($this->lastInsertID()) {
                        $message = 'User Registered. Welcome' . $post['name'] . 'Log in now';
                        Messages::setMessage($message, 'success');
                        header('Location: ' . ROOT_URL . 'user/login');
                    } else {
                        $message = 'Something went wrong';
                        Messages::setMessage($message, 'error');
                    }
                }
            } else {
                $message = 'Passwords did not match';
                Messages::setMessage($message, 'error');
            }
        }else{
            $message = 'Missing fields';
            Messages::setMessage($message, 'error');
        }
        return;
    }
}