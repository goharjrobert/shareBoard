<?php
/**
 * Created by PhpStorm.
 * User: Gohar_2
 * Date: 2/14/2019
 * Time: 7:04 PM
 */

class CommentModel extends Model{
    public function Index()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //print_r($post);
        if(isset($post['comment'])) {
            $post_id = $post['postID'];
            $user_id = $post['userID'];
            $post_info = $this->getPostInfo($post_id, $user_id);


            return $post_info;
        }

        elseif(isset($post['addComment'])){
            //echo $post['newComment'];
            $post_id = $post['postID'];
            $user_id = $post['userID'];
            $this->query('INSERT INTO comments (user_id, post_id, message) VALUES(:user_id, :post_id, :message)');
            $this->bind('user_id', $user_id);
            $this->bind('post_id', $post_id);
            $this->bind('message', $post['newComment']);
            $this->executeQuery();

            //verify
            if($this->lastInsertID()) {
                Messages::setMessage('Comment Inserted', 'success');
                $post_info = $this->getPostInfo($post_id, $user_id);


                return $post_info;
            }


        }
    return;

    }

    private function getPostInfo($post_id, $user_id){
        $post_info = array();
        $this->query('SELECT * FROM shares WHERE id = :id AND user_id = :user_id');
        $this->bind('id', $post_id);
        $this->bind('user_id', $user_id);
        $share = $this->resultSet();

        array_push($post_info, $share);

        $this->query('SELECT comment_id, post_id, user_id, user_name, comment_time, message FROM comments 
                                INNER JOIN users on comments.user_id = users.id 
                                WHERE post_id = :post_id ORDER BY comment_time DESC');
        $this->bind('post_id', $post_id);

        $comments = $this->resultSet();
        //print_r($comments);
        array_push($post_info, $comments);

        return $post_info;
    }
}