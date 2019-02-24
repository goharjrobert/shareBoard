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
            $share_id = $post['share_id'];
            $user_id = $post['user_id'];
            $post_info = $this->getPostInfo($share_id, $user_id);
            return $post_info;
        }

        elseif(isset($post['addComment'])){
            //echo $post['newComment'];
            $share_id = $post['share_id'];
            $user_id = $post['user_id'];
            $this->query('INSERT INTO comments (user_id, share_id, message) VALUES(:user_id, :share_id, :message)');
            $this->bind(':user_id', $_SESSION['user_data']['user_id']);
            $this->bind(':share_id', $share_id);
            $this->bind('message', $post['newComment']);
            $this->executeQuery();

            //verify
            if($this->lastInsertID()) {
                Messages::setMessage('Comment Inserted', 'success');
                $post_info = $this->getPostInfo($share_id, $user_id);
                return $post_info;
            }


        }
    return;

    }

    private function getPostInfo($share_id, $user_id){
        $post_info = array();
        $this->query('SELECT * FROM shares WHERE share_id = :share_id AND user_id = :user_id');
        $this->bind('share_id', $share_id);
        $this->bind('user_id', $user_id);
        $share = $this->resultSet();

        array_push($post_info, $share);

        $this->query('SELECT user_name FROM users WHERE user_id = :user_id');
        $this->bind(':user_id', $share[0]['user_id']);
        $user_name = $this->resultSet();

        array_push($post_info, $user_name);

        $this->query('SELECT comment_id, share_id, comments.user_id, user_name, comment_time, message FROM comments 
                                INNER JOIN users on comments.user_id = users.user_id 
                                WHERE share_id = :share_id ORDER BY comment_time DESC');
        $this->bind(':share_id', $share_id);

        $comments = $this->resultSet();

        array_push($post_info, $comments);

        return $post_info;
    }
}