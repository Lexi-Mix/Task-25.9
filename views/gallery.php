<div class="container">
    <div class="row align-items-center">
        <?php
            foreach ($result as $row):?>
            <div class="col-xl-4">
                <div class="card">
                    <img src="<?= '../' . $row['link_file']?>" class="card-img-top" alt="<?= $row['link_file']?>">
                        <div class="card-body">
                            <p class="card-title">Post id:<?= $row['p_id']?></p>
                            <p class="card-text">User id:<?= $row['user_id']?></p>
                            Comments:
                            <?php 
                            if (isset($_SESSION['user']['auth'])) {
                              $comments = new Connect();
                              $comments = $comments->getComments($row['p_id']);
                              if($comments){
                                foreach ($comments as $comment){
                                ?>
                                <p><?= $comment['c_id'] . ' - ' . $comment['title']?></p>
                                <?php
                            }}};
                            ?>
                        </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>