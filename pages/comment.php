<?php 
    require "parts/header.php";
    require "parts/navbar.php";
?>

<div class="mt-3">
    <h4>Comments</h4>
            <?php
                // load the comments from database
                $sql = "SELECT FROM comments WHERE status = 'publish' ORDER BY id DESC";
                $query = $database->prepare($sql);
                $query->execute();
                $comments = $query->fetchAll();

                foreach ($comments as $comment) :
            ?>
            <div class="card mt-2 <?php echo ( $comment["user_id"] === $_SESSION['user']['id'] ? "bg-info" : '' ); ?>">
                <div class="card-body">
                    <p class="card-text"><?= $comment['comments']; ?></p>
                    <p class="card-text"><small class="text-muted">Commented By <?= $comment['name']; ?></small></p>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if ( isUserLoggedIn() ) : ?>
            <form
                action="/comment/add"
                method="POST"    
                >
                <div class="mt-3">
                    <label for="comment" class="form-label">Enter your comment below:</label>
                    <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                </div>
                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id']; ?>" />
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
            <?php endif; ?>
        </div>

        <div class="text-center mt-3">
            <a href="/" class="btn btn-link btn-sm"
            ><i class="bi bi-arrow-left"></i> Back</a
            >
        </div>