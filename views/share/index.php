<?php
/**
 * Created by PhpStorm.
 * User: Gohar_2
 * Date: 2/6/2019
 * Time: 9:10 PM
 */

?>

<script>switchClass("shares");</script>
<a class="btn btn-success btn-share" href="<?php echo ROOT_URL; ?>share/add">Add a Post</a>
<div role="main" class="mainWindow">

    <br>
    <?php foreach($viewModel as $item) :?>
        <br>
        <div class="container-fluid">
            <div class="card eachShare text-left border-light mb-3">
                <div class="card-header">
                    <h5 ><?php echo $item['title'] ?></h5>
                    <small>Created: <?php echo $item['create_date']; ?></small>
                </div>

                <div class="card-body">
                    <p><?php echo $item['body']; ?></p>
                    <b><a class="btn btn-primary" href="<?php echo $item['link']; ?>" target="_blank" id="share">Link</a></b>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>