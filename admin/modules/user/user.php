<?php
$sqlUser = "SELECT * FROM users";
$resultAll = mysqli_query($conn, $sqlUser);
$totalRecords = mysqli_num_rows($resultAll);

$rowPerPage = 10;

//Tổng số trang = tổng số bản ghi chia làm tròn lên cho tổng số bản ghi trên 01 trang
$totalPage = ceil($totalRecords/$rowPerPage);
//Lấy số trang từ biến current_page trên url
if(isset($_GET['current_page'])) {
    $current_page = $_GET['current_page'];
}else{
    $current_page = 1;
}
//Kiểm tra số trang hợp lệ
if($current_page < 1) {
    $current_page = 1;
}

if($current_page > $totalPage) {
    $current_page = $totalPage;
}
//câu truy vấn lấy bản ghi đã phân trang
$start = ($current_page - 1) * $rowPerPage;
$sqlPagination = "SELECT * FROM product INNER JOIN category ON product.cat_id =  category.cat_id ORDER BY prd_id DESC LIMIT $start, $rowPerPage";
$resultPagination = mysqli_query($conn, $sqlPagination);
?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Danh sách thành viên</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thành viên</h1>
        </div>
    </div><!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page=add_user" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table 
                        data-toolbar="#toolbar"
                        data-toggle="table">

                        <thead>
                        <tr>
                            <th data-field="id" data-sortable="true">ID</th>
                            <th data-field="name"  data-sortable="true">Họ & Tên</th>
                            <th data-field="price" data-sortable="true">Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Hành động</th>
                            <th>Quyền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($resultAll) > 0) { 
                                while($users = mysqli_fetch_assoc($resultAll)) {
                            ?>
                            <tr>
                                <td style=""><?php echo $users['users_id']; ?></td>
                                <td style=""><?php echo $users['users_name'];?></td>
                                <td style=""><?php echo $users['user_mail'];?></td>
                                <td style=""><?php echo $users['user_phone'];?></td>
                                <td style=""><?php echo $users['user_address'];?></td>
                                
                                
                                <td><?php
                                if($users["user_level"] == 1){?>
                                    <span class="label label-danger">Admin</span>
                                <?php
                                }else{?>
                                    <span class="label label-success">Member</span>
                                <?php
                                }

                                ?>
                                </span></td>
                                <td class="form-group">
                                <a href="index.php?page=edit_user&users_id=<?php echo $users['users_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick="return confirmDel();" href="modules/user/del_user.php?user_id=<?php echo $users['users_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                            </tr> <?php 
                        }}?>
                            
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        <ul class="pagination">
                            <!-- Hiển thị nút bấm trở về trang trước -->
                            <?php if($current_page > 1) { ?> 
                                <li class="page-item"><a class="page-link" href="index.php?page=user&current_page=<?php echo $current_page-1; ?>">&laquo;</a></li>
                            <?php }else { ?>
                                <li class="page-item disabled"><a class="page-link">&laquo;</a></li>
                            <?php } ?> 
                            <!-- Hiển thị các nút phân trang -->
                            <?php for($i = 1; $i <= $totalPage; $i++) { 
                                    if($i >= $current_page - 2 && $i <= $current_page + 2) {
                            ?>

                                <?php if($i == $current_page) { ?>
                                    <li class="page-item active"><a class="page-link" href="index.php?page=user&current_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php }else{ ?>
                                    <li class="page-item"><a class="page-link" href="index.php?page=user&current_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php } ?>

                            <?php 
                                }
                            } 
                            ?>
                            <!-- Hiển thị nút chuyển trang kế tiếp -->
                            <?php if($current_page < $totalPage) {?>
                                <li class="page-item"><a class="page-link" href="index.php?page=user&current_page=<?php echo $current_page+1; ?>">&raquo;</a></li>
                            <?php } else { ?> 
                                <li class="page-item disabled"><a class="page-link">&raquo;</a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div><!--/.row-->	
</div>	<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>	