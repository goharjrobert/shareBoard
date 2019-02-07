<?php
/**
 * Created by PhpStorm.
 * User: Gohar_2
 * Date: 2/6/2019
 * Time: 9:11 PM
 */

?>
<script>switchClass("shares");</script>
<div class="card eachShare text-left">
    <div class="card-header">
        <h5>New Share</h5>
    </div>
    <div class="card-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea type="text" class="form-control" id="body" placeholder="Body" name="body"></textarea>
            </div>
            <div class="form-group">
                <label>Attach a link</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="example: www.google.com">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a class="btn btn-danger" href="<?php echo ROOT_URL; ?>share">Cancel</a>
        </form>
    </div>
</div>
