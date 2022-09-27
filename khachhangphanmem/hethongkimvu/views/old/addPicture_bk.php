
<?php
    require_once '../module/picture.module.php';
    require_once '../module/product.module.php';
    require_once '../module/employer.module.php';
    require_once '../module/category.module.php';
    $category = new Category();
    $picture = new Picture();
    $product = new Product();
    $employer = new Employer();
 
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
                <div class="boxButton">
                    <button type="button" class="btn btn-primary btn-updatePicture" data-toggle="modal" data-target="#modalAddPicture" style="position: relative;z-index: 1;">
                        Thêm bản vẽ
                    </button>
                   
                    <div class="msvbBox">
                        <div class="radios-group formRadioType">
                            <div class="form-check-group ">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fillterByType" type="radio" name="radioType" id="type2D" value="2D">
                                    <label class="form-check-label" for="inlineRadio1" style="padding-left:0px;">2D</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fillterByType" type="radio" name="radioType" id="type3D" value="3D">
                                    <label class="form-check-label" for="inlineRadio2" style="padding-left:0px;">3D</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fillterByType" type="radio" name="radioType" id="typeCNC" value="CNC">
                                    <label class="form-check-label" for="inlineRadio3" style="padding-left:0px;">CNC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fillterByType" type="radio" name="radioType" id="typeAll" value="all" checked>
                                    <label class="form-check-label" for="inlineRadio1" style="padding-left:0px;">Tất cả</label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control formSearch" placeholder="nhập MSBV" id="searchByMSVB">
                        <select class="form-select form-control formSelectSearch" aria-label="Default select example" id="selectSearch">
                        <option >-- Tìm kiếm --</option>
                        <option value="1">Tìm kiếm theo MSBV</option>
                        <option value="2">Tìm kiếm theo số loại bản vẽ</option>
                        </select>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title t-center">Danh sách bản vẽ</h4>
                            </div>
                            <div class="card-body ">
                              
                                <table class="table table-hover t-center">
                                    <thead>
                                        <tr class="t-center">
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên Khách Hàng</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Tên bản vẽ</th>
                                            <th scope="col">Loại bản vẽ</th>
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
                                                <td><?php echo $key+1 ?></td>
                                                <td data-value="<?php echo $aPicture["idEmployer"] ?>" data-cnnumber="<?php echo $aPicture["cnNumber"] ?>" data-dvhnumber="<?php echo $aPicture["dvhNumber"] ?>"><?php echo $aPicture["nameEmployer"] ?></td>
                                                <td data-value="<?php echo $aPicture["idProduct"] ?>"><?php echo $aPicture["nameProduct"] ?></td>
                                                <td><?php echo $aPicture["pictureName"] ?></td>
                                                <td>Bản vẽ <?php echo $aPicture["typePicture"] ?></td>
                                                <td data-value="<?php echo $aPicture["verPicture"] ?>">Version <?php echo $aPicture["verPicture"] ?></td>
                                                <td data-value="<?php echo $aPicture["msPicture"] ?>"><?php echo $aPicture["msPicture"] ?></td>
                                                <td>
                                                    <button class="btn btn-danger btnDeletePicture" id="<?php echo $aPicture["idPicture"]?>">Xóa</button>
                                                    <button class="btn btn-dark btnUpdatePicture" id="<?php echo $aPicture["idPicture"] ?>">sửa</button>
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
<script>
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>

</html>