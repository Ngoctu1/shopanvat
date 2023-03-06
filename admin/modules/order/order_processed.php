<?php



$sqlOrder = "SELECT * FROM orders WHERE status=1 ORDER BY order_id ASC";
$query = mysqli_query($conn, $sqlOrder);

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Quản lý đơn hàng</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý đơn hàng</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page=order" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Đơn chưa xử lý
        </a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Tổng tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($query) > 0) {
                                while ($order = mysqli_fetch_assoc($query)) {
                            ?>
                                    <tr>
                                        <td style=""><?php echo $order['order_id']; ?></td>
                                        <td style=""><?php echo $order['user_name']; ?></td>
                                        <td style=""><?php echo $order['user_email']; ?></td>
                                        <td style=""><?php echo $order['user_phone']; ?></td>
                                        <td style=""><?php echo $order['user_address']; ?></td>
                                        <td style=""><?php echo $order['amount']; ?>đ</td>
                                        <td class="form-group">
                                            <a href="index.php?page=order_detail&order_id=<?php echo $order['order_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                            <a href="modules/order/proccess.php?action=update_back&order_id=<?php echo $order['order_id']; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>