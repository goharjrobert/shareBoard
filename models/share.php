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
        $this->query('SELECT * FROM shares ORDER BY create_date DESC');
        $rows = $this->resultSet();
        //print_r($rows);
        return $rows;
    }

    public function add(){
        // Sanitize the $_POST array
        //$post = $_POST;
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($post['submit'])){
            print_r($post);
            // Insert into mysql table
            $this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':link', $post['link']);
            $this->bind(':user_id', 1);
            $this->executeQuery();

            //verify
            if($this->lastInsertID()){
                header('Location: '.ROOT_URL.'share');
            }
        }
        return;
    }
}