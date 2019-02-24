<?php
/**
 * Created by PhpStorm.
 * User: Gohar_2
 * Date: 2/14/2019
 * Time: 7:04 PM
 */
$share = $viewModel[0][0];
$user_name = $viewModel[1][0];
$comments = $viewModel[2];
?>
<script>switchClass("shares");</script>
<div class="card eachShare">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3 class="card-title text-left"><?php echo $share['title']; ?></h3>
            </div>
            <div class="col">
                <div class="text-right">
                    <small class="text-right">Posted: <?php echo $share['create_date']; ?></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="text-left">
                    <small>Created by: <?php echo $user_name['user_name']; ?></small>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p class="text-left"><?php echo $share['body']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-left"><a href="<?php echo $share['link']; ?>"><?php echo $share['link']; ?></a></p>
            </div>
        </div>
    </div>

</div>
<br>

<div class="card card-body eachShare commentWindow">
    <?php if (sizeof($comments) > 0): ?>
        <?php for($i = 0; $i < sizeof($comments); $i++){ ?>
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <small><?php echo $comments[$i]['comment_time']; ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <strong><?php echo $comments[$i]['user_name']; ?></strong>
                </div>
                <div class="col-8">
                    <div class="text-left">
                        <?php echo $comments[$i]['message']; ?>
                    </div>

                </div>
            </div>
            <br>
            <hr>

    <?php } else: ?>
        <p class="text-left"><small>There are no comments on this post.</small></p>
    <?php endif; ?>
</div>

<div class="card-footer">
    <div class="row">
        <div class="col">
            <form class="form-inline" method="post" action="<?php echo $ROOT_URL; ?>/comment">
                <input type="hidden" name="share_id" value="<?php echo $share['share_id']; ?>">
                <input type="hidden" name="user_id" value="<?php echo $share['user_id']; ?>">

                <div class="col">
                    <label class="text-left">Add Comment</label>
                    <textarea class="form-control-lg commentText" name="newComment" required></textarea>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" name="addComment">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>



