<?php
	if(!isset($_SESSION["company_member"])){
		session_start();
	}
	require_once '../module/pictureFreeProduct.module.php';
    require_once '../module/employer.module.php';
    require_once '../module/dvh.module.php';
    $employer = new Employer();
    $dvhNumber = new DvhNumber();
	$product = new Product();
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
			<?php return; ?>
            </div>
            
            <div class="content">
            
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddPictureFree" style="position: relative;z-index: 1;">
                        Thêm SP
                    </button>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                                <div class="card-header">
                                    <h4 class="card-title t-center" style="display : inline-block;">Danh sách SP</h4>
                            </div>
                            <div class="card-body ">
                              
                                <table  id="datatable" class="table table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Khách hàng</th>
                                            <th scope="col">Đơn hàng</th>
                                            <th scope="col">Tên SP</th>
                                            <th scope="col">GIA</th>
                                            <th scope="col">SL</th>
                                            <th scope="col">DVT</th>
                                            <th scope="col">VAT</th>
                                            <th scope="col">Tên bản vẽ</th>
                                            <th scope="col">Loại bản vẽ</th>
                                            <th scope="col">Phôi</th>
                                            <th scope="col">MSBV</th>
                                            <th scope="col">Version</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyPictureFree">
									
                                        <?php 
                                            $allPictureFrees = $product->getAllProducts();
                                            foreach ($allPictureFrees as $key => $value) { ?>
                                        <tr  class="load_data_employer_io">    <td><?php echo $value["nameEmployer"] ?></td>
                                                <td><?php echo $value["serinumber"] ?></td>
                                                <td><?php echo $value["nameProduct"] ?></td>
												<td><?php echo $value["priceProduct"] ?></td>
                                                <td><?php echo $value["nicknamePicrureFree"] ?></td>
												<td><?php echo $value["dvtProduct"] ?></td>
												<td><?php echo $value["vatProduct"] ?></td>
										
                                                <td><a href="../uploadPicture/<?php echo $value["namePicrureFree"] ?>"  target=blank><?php echo $value["namePicrureFree"] ?></a></td>
                                                <td><?php echo $value["typePictureFree"] ?></td>
                                                <td><?php echo $value["corePictureFree"] ?></td>
                                                <td><?php echo $value["msPicrureFree"] ?></td>
                                                <td> version <?php echo $value["verPictureFree"] ?></td>
                                                <td>
												    <button data-toggle="modal" data-target="#modalAddPictureFree" class="btn btn-primary btnUpdatePictureFree" data-id_update_employer="<?php echo $value["idProduct"] ?>">Sửa</button>
                                                    <button id="btnUpdate" class="btn btn-warning btnDeletePictureFree" data-id_delete_employer="<?php echo $value["idProduct"]?>">Xóa</button>
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

            <?php require '../module/require/modalAddPictureFreeProduct.php'; ?>
            <?php require '../module/require/require_footer.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
 
    <?php require '../module/require/require_link_footer.php'?>
    <script src="../js/ajax/innit.js"></script>
    <script src="../js/ajax/pictureFreeProduct.ajax.js"></script>
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