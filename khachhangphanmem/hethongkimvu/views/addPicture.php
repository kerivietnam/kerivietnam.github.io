<?php
	if(!isset($_SESSION["company_member"])){
		session_start();
	}
    require_once '../module/picture.module.php';
    require_once '../module/pictureFree.module.php';
    require_once '../module/product.module.php';
    require_once '../module/employer.module.php';
    require_once '../module/category.module.php';
    require_once '../module/dvh.module.php';
    $category = new Category();
    $picture = new Picture();
    $pictureFree = new pictureFree();
    $product = new Product();
    $employer = new Employer();
    $dvhNumber = new DvhNumber();
 
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<?php include '../module/require/require_head.php' ?>

<body class=" sidebar-mini ">
    <div class="wrapper ">
        <?php require '../module/require/require_sidebar.php';?>
        <a href="../module/require/require_sidebar.php"></a>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
         <?php include '../module/require/require_navbar.php' ?>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            
            <div class="content">
            
                    <button type="button" class="btn btn-primary btn-updatePicture" data-toggle="modal" data-target="#modalAddPicture" style="position: relative;z-index: 1;">
                        Thêm sản phẩm và bản vẽ vào DO 
                    </button>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                                <div class="card-header">
                                    <h4 class="card-title t-center" style="display : inline-block;">Danh sách sản phẩm (và bản vẽ) trong DO</h4>
                            </div>
                            <div class="card-body ">
                              
                                <table  id="datatable" class="table table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr class="t-center">
                                            <th scope="col">Tên Khách Hàng</th>
                                            <th scope="col">Số DO</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Tên bản vẽ</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">VAT</th>
                                            <th scope="col">Loại</th>
                                            <th scope="col">Version</th>
                                            <th scope="col">MSBV</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyAddPicture">
                                        <?php 
                                            $allPictures = $picture->getAllPictures();
                                            
                                            foreach ($allPictures as $key => $aPicture) { ?>
                                        <tr class="t-center">
                                            
                                                <td data-value="<?php echo $aPicture["idEmployer"] ?>" data-dvhnumber="<?php echo $aPicture["dvhNumber"] ?>"><?php echo $aPicture["nameEmployer"] ?></td>
                                                <td><?php echo $aPicture["serinumber"] ?></td>
                                                <td data-value="<?php echo $aPicture["idProduct"] ?>"><?php echo $aPicture["nameProduct"] ?></td>
                                                <td data-value= "<?php echo $aPicture["idPictureFree"]?>"><a href="../uploadPicture/<?php echo $aPicture["namePicrureFree"] ?>"  target=blank><?php echo $aPicture["namePicrureFree"] ?></a></td>
                                                <td><?php echo $aPicture["quantityPicture"] ?></td>
                                                <td><?php echo $aPicture["pricePicture"] ?></td>
                                                <td><?php echo $aPicture["vatPicture"] ?></td>
                                                <td>Bản vẽ <?php echo $aPicture["typePictureFree"] ?></td>
                                                <td data-value="<?php echo $aPicture["verPictureFree"] ?>">Version <?php echo $aPicture["verPictureFree"] ?></td>
                                                <td data-value="<?php echo $aPicture["msPicrureFree"] ?>"><?php echo $aPicture["msPicrureFree"] ?></td>
                                                <td>
                                                    <button class="btn btn-danger btnDeletePicture" id="<?php echo $aPicture["idPicture"]?>">Xóa</button>
                                                    <button data-toggle="modal" data-target="#modalAddPicture" class="btn btn-dark btnUpdatePicture" id="<?php echo $aPicture["idPicture"] ?>">sửa</button>
                                                </td>
                                         </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require '../module/require/modalAddPicture.php'; ?>
            <?php require '../module/require/require_footer.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
 
    <?php require '../module/require/require_link_footer.php'?>
    <script src="../js/ajax/innit.js"></script>
    <script src="../js/ajax/addPicture.ajax.js"></script>
    <?php require '../module/require/datatable.php';?>
<script>
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>

</html>