<?php
/**
 * Created by PhpStorm.
 * User: Gohar_2
 * Date: 2/7/2019
 * Time: 8:54 PM
 */
?>
    <script>switchClass("shares");</script>

<?php
$title = "";
$link = "";
$body = "";
$user_id = "";
$share_id = "";
foreach($viewModel as $item){
    $title = $item['title'];
    $link = $item['link'];
    $body = $item['body'];
    $user_id = $item['user_id'];
    $share_id = $item['share_id'];
}

$_SESSION['editing_post_num'] = $share_id;

?>

<div class="card eachShare text-left">
    <div class="card-header">
        <h5>Editing Share</h5>
    </div>
    <div class="card-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="" value="<?php echo $title; ?>">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea type="text" class="form-control" id="body" name="body"><?php echo $body; ?></textarea>
            </div>
            <div class="form-group">
                <label>Attach a link</label>
                <input type="text" class="form-control" id="link" name="link" value="<?php echo $link; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <a class="btn btn-danger" href="<?php echo ROOT_URL; ?>share">Cancel</a>
        </form>
    </div>
</div>
