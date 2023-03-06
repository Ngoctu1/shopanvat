<?php
    $orderId = $_GET['order_id'];
    $sqlOrder = "SELECT * FROM orders WHERE order_id = $orderId ";
    $queryOrder = mysqli_query($conn, $sqlOrder);
    $users = mysqli_fetch_assoc($queryOrder);
    // lấy thông tin sản phẩm

    $sqlDetail = "SELECT * FROM orderdetail O INNER JOIN product P WHERE P.prd_id = O.prd_id AND order_id = $orderId";
    $queryDetail =  mysqli_query($conn, $sqlDetail);

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Quản lý đơn hàng</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý đơn hàng</h1>
		</div>
	</div><!--/.row-->
	<div class="row">
        <div class="col-12">
            <ul>
                <li>Tên khách hàng: <?php echo $users['user_name']; ?></li>
                <li>Địa chỉ: <?php echo $users['user_address']; ?></li>
                <li>Email: <?php echo $users['user_email']; ?></li>
                <li>Điện thoại: <?php echo $users['user_phone']; ?></li>
            </ul>
        </div>
		<div class="col-md-12">
				<div class="panel panel-default">
						<div class="panel-body">
							<table  data-toolbar="#toolbar"data-toggle="table">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-sortable="true">ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
								<tbody>
                                    <?php 
                                        while($detail = mysqli_fetch_assoc($queryDetail)) {
                                    ?>
                                        <tr>
                                            <td style=""><?php echo $detail['id']; ?></td>
                                            <td style=""><?php echo $detail['prd_name']; ?></td>
                                            <td style="text-align: center"><img width= 190px height="180px" src="images/<?php echo $detail['prd_image']; ?>" /></td>
                                            <td style=""><?php echo number_format($detail['price'],0,',','.'); ?> vnd</td>
                                            <td><?php echo $detail['qty']; ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    
								</tbody>
							</table>
						</div>
					</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>	
