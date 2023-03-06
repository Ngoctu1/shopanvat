<?php
    // Lấy danh mục sản phẩm
    $sqlCategory = "SELECT * FROM category ORDER BY cat_id";
    $resultCategory = mysqli_query($conn, $sqlCategory);
    //Lấy dữ liệu từ form gửi lên.
    if(isset($_POST['sbm'])) {
        if(empty($_POST['prd_name'])) {
            $errors['prd_name'] = "Bạn chưa nhập tên sản phẩm";
        }else{
            $prd_name = $_POST['prd_name'];
        }

        $prd_price =  $_POST['prd_price'];
       
        $cat_id =  $_POST['cat_id'];
        
        $prd_details =  $_POST['prd_details'];
        if(!isset($_POST['prd_featured'])) {
            $prd_featured = 0;
        }else{
            $prd_featured = 1;
        }
        if(!isset($_POST['prd_sale'])) {
                    $prd_sale = 0;
                }else{
                    $prd_sale = 1;
                }
        if(isset($_FILES['prd_image'])) {
            if($_FILES['prd_image']['error'] > 0) {
                echo "File bị lỗi";
                die;
            }else{
                $tmp_name = $_FILES['prd_image']['tmp_name'];
                $prd_image = $_FILES['prd_image']['name'];
                $target_file = 'images/'.$prd_image;
                move_uploaded_file($tmp_name, $target_file);
            }
        }
        //Lưu data vào cơ sở dữ liệu (lưu vào bảng sản phẩm)
        $sqlProduct = "INSERT INTO 
                        product(cat_id,prd_name,prd_image,prd_price,prd_details,prd_featured,prd_sale)
                                VALUES
                               ($cat_id,'$prd_name','$prd_image',$prd_price,'$prd_details',$prd_featured,$prd_sale)";
        
        if(mysqli_query($conn, $sqlProduct)) {
            header("location:index.php?page=product");
        }else{
            echo "<script>alert('Thêm sản phẩm không thành công!');</script>";
        }
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active">Thêm sản phẩm</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm sản phẩm</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input name="prd_name" class="form-control" placeholder="">
                                    <span style="color:red"><?php if(isset($errors['prd_name'])) echo $errors['prd_name']; ?></span>
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input name="prd_price" type="number" min="0" class="form-control">
                                </div>
                              
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cat_id" class="form-control">
                                        <?php if(mysqli_num_rows($resultCategory)){ 
                                                while($cate = mysqli_fetch_assoc($resultCategory)) {    
                                        ?>
                                            <option value=<?php echo $cate['cat_id']; ?>><?php echo $cate['cat_name']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=1>Nổi bật
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sản phẩm Sale</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_sale" type="checkbox" value=1>Sale
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea name="prd_details" class="form-control" rows="3"></textarea>
                                    </div>

                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    
                                    <input name="prd_image" type="file" onchange="preview();">
                                    <br>
                                    <div>
                                        <img id="prd_image" src="images/mau.jpg" width="160px" height="212px">
                                    </div>
                                </div>
                                
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
    
</div>	<!--/.main-->	

<script>
    function preview() {
        prd_image.src=URL.createObjectURL(event.target.files[0]);
    }
</script>