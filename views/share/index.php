<?php
/**
 * Created by PhpStorm.
 * User: Gohar_2
 * Date: 2/6/2019
 * Time: 9:10 PM
 */

?>

<script>switchClass("shares");</script>
<?php if(isset($_SESSION['is_logged_in'])): ?>
<div class="container-fluid text-left">
    <a class="btn btn-success btn-share" href="<?php echo ROOT_URL; ?>share/add"><i class="fas fa-plus"></i> Add a Post</a>
</div>
<?php endif; ?>
<div role="main" class="mainWindow">
    <br>
    <?php foreach($viewModel as $item) :?>
        <br>
        <div class="container-fluid">
            <div class="card eachShare text-left border-light mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 ><?php echo $item['title'] ?></h5>
                            <small>Created by: <?php echo $_SESSION['posts'][$item['id']].'<br>'.$item['create_date']; ?>
                            </small>
                        </div>
                        <?php if($_SESSION['user_data']['id'] == $item['user_id']): ?>
                        <div class="col">
                            <div class="text-right">
                                <form class="col" method="post" action="<?php echo ROOT_URL ?>share/edit">
                                    <input type="hidden" name="userID" value="<?php echo $item['user_id']; ?>">
                                    <input type="hidden" name="postID" value="<?php echo $item['id']; ?>">
                                    <button type="submit" name="edit" class="btn btn-secondary edit" title="Edit this post"><i class="fas fa-edit edit"></i> Edit</button>
                                </form>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card-body">
                    <p><?php echo $item['body']; ?></p>
                    <div class="row">
                        <div class="col">
                            <b><a title="View Link" class="btn btn-primary" href="<?php echo $item['link']; ?>" target="_blank" id="share"><i class="fas fa-paperclip"></i> Link</a></b>
                        </div>
                        <?php if($_SESSION['user_data']['id'] == $item['user_id']): ?>
                            <div class="col ">
                                <div class="text-right">
                                    <form method="post"  action="<?php $_SERVER['PHP_SELF']; ?>">
                                        <input type="hidden" name="userID" value="<?php echo $item['user_id']; ?>">
                                        <input type="hidden" name="postID" value="<?php echo $item['id']; ?>">
                                        <button title="Delete this post" type="submit" name="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                    </form>
                                </div>

                            </div>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>