<?php
/**
 * Created by PhpStorm.
 * user: Gohar_2
 * Date: 2/6/2019
 * Time: 8:43 PM
 */

class ShareModel extends Model
{
    public function Index(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($post['delete'])){
            //echo $post['userID'];
            //echo $post['postID'];
            $this->query('DELETE FROM shares WHERE user_id = :user_id AND share_id = :share_id');
            $this->bind(':user_id', $post['user_id']);
            $this->bind(':share_id', $post['share_id']);
            $this->executeQuery();
        }
        $this->query('SELECT * FROM shares ORDER BY create_date DESC');
        $rows = $this->resultSet();
        $userPosts = array();
        //print_r($rows);
        foreach($rows as $row){
            $userID = $row['user_id'];
            $postID = $row['share_id'];
            $this->query('SELECT user_name FROM users WHERE user_id = :user_id');
            $this->bind(':user_id', $userID);
            $userNameQueryResult = $this->single();
            $userName = $userNameQueryResult['user_name'];

            $userPosts[$postID] = $userName;
        }

        //Set session posts to keep track of who wrote which post
        $_SESSION['posts'] = $userPosts;
        return $rows;
    }

    public function add(){
        // Sanitize the $_POST array
        //$post = $_POST;
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($post['submit'])){
            //print_r($post);
            // Insert into mysql table
            $this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':link', $post['link']);
            $this->bind(':user_id', (int)$_SESSION['user_data']['user_id']);
            $this->executeQuery();

            //verify
            if($this->lastInsertID()){
                header('Location: '.ROOT_URL.'share');
            }
        }


        return;
    }

    public function edit(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($post['edit'])){
            //echo $post['userID'].$post['postID'];
            $this->query('SELECT * FROM shares WHERE share_id = :share_id AND user_id = :user_id');
            $this->bind(':user_id', $post['user_id']);
            $this->bind(':share_id', $post['share_id']);
            $rows = $this->resultSet();
            //echo $rows[0]['body'];
            return $rows;
        }
        else if(isset($post['update'])){
            $this->query('UPDATE shares SET title = :title, body = :body, link = :link, edit_date = :edit_date WHERE share_id = :share_id AND user_id = :user_id');
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':link', $post['link']);
            $this->bind(':share_id', (int)$_SESSION['editing_post_num']);
            $this->bind(':user_id', (int)$_SESSION['user_data']['user_id']);
            $this->bind(':edit_date', date('Y-m-d G:i:s'));
            $this->executeQuery();
            unset($_SESSION['editing_post_num']);
            $message = $post['title'].' has been updated';
            Messages::setMessage($message, 'success');
            header('Location: '.ROOT_URL.'share');
        }
        else{
            header('Location: '.ROOT_URL.'share');
        }

        return;
    }
}