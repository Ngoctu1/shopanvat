<?php

$sqlComment = "SELECT * FROM comment ";
$resultAll = mysqli_query($conn, $sqlComment);


if(isset($_GET['users_id'])) {
    $users_id = $_GET['users_id'];
    $sqlUser = "SELECT users_id FROM users WHERE users_id = $users_id";
    $resultUser = mysqli_query($conn, $sqlUser);
   // if(mysqli_num_rows($resultUser)) {
    //    $user = mysqli_fetch_assoc($resultUser);
   // }
    if(isset($_POST['sbm'])) {
        
            
        $comment_users = $_POST['comment'];
        $sqlComment = "INSERT INTO comment( users_id, cmt, time ) VALUES ($users_id,'$comment_users',NOW())";

    
    if(mysqli_query($conn, $sqlComment)) {
        header("location:index.php?page=test&&users_id=2" );
    }else{
        echo "<script>alert('Sửa sản phẩm không thành công!');</script>";
    }}

}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
                    
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Binh luan</h1>
        </div>
    </div>
    <!--/.row-->
    <?php
    
     $users_id = $_GET['users_id'];
     $sqlUser = "SELECT * FROM users WHERE users_id = $users_id";
     $resultUser = mysqli_query($conn, $sqlUser);
     $users = mysqli_fetch_assoc($resultUser);
    
    $sqlCommentUser = "SELECT comment.users_id, comment.time, comment.Cmt, users.users_name FROM comment INNER JOIN users ON comment.users_id=users.users_id ";
    $queryComment = mysqli_query($conn, $sqlCommentUser);
    $nmrow = mysqli_num_rows($queryComment);

    ?>
    <div id="comments-list" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php 
                if( mysqli_num_rows($queryComment) > 0) {
                    while($comment = mysqli_fetch_assoc($queryComment)) {
            ?>
                <div class="comment-item">
                    <ul>
                        <li><b><?php echo $users['users_name']?></b><p> <?php echo $comment['time']; ?></p>
                        <div style="width: 550px ;"> 
                            <p style="background-color:white"><?php echo $comment['Cmt']; ?></p>
                            <p><?php ?></p>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                             <label>Binh luan</label>
                                <textarea name="comment" required class="form-control"
                                    rows="3"><?php ?> </textarea>

                            <button type="submit" name="sbm" class="btn btn-primary">Dang</button>
                            
                            </div>
                            
</form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

    </div>
    <!--/.main-->
    