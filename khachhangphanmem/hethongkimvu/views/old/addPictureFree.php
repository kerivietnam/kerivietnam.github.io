
<?php
    require_once '../module/pictureFree.module.php';
    $pictureFree = new pictureFree();
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
            
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddPictureFree" style="position: relative;z-index: 1;">
                        Thêm bản vẽ
                    </button>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                                <div class="card-header">
                                    <h4 class="card-title t-center" style="display : inline-block;">Danh sách bản vẽ</h4>
                            </div>
                            <div class="card-body ">
                              
                                <table  id="datatable" class="table table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tên bản vẽ</th>
                                            <th scope="col">Tên gọi</th>
                                            <th scope="col">Loại bản vẽ</th>
                                            <th scope="col">Phôi</th>
                                            <th scope="col">MSBV</th>
                                            <th scope="col">Version</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyPictureFree">
                                        <?php 
                                            $allPictureFrees = $pictureFree->getAllPictureFree();
                                            foreach ($allPictureFrees as $key => $value) { ?>
                                        <tr>
                                                <td><a href="../uploadPicture/<?php echo $value["namePicrureFree"] ?>"  target=blank><?php echo $value["namePicrureFree"] ?></a></td>
                                                <td><?php echo $value["nicknamePicrureFree"] ?></td>
                                                <td><?php echo $value["typePictureFree"] ?></td>
                                                <td><?php echo $value["corePictureFree"] ?></td>
                                                <td><?php echo $value["msPicrureFree"] ?></td>
                                                <td> version <?php echo $value["verPictureFree"] ?></td>
                                                <td>
                                                    <button class="btn btn-danger btnDeletePictureFree" id="<?php echo $value["idPictureFree"]?>">Xóa</button>
                                                    <button data-toggle="modal" data-target="#modalAddPictureFree" class="btn btn-dark btnUpdatePictureFree" id="<?php echo $value["idPictureFree"] ?>">sửa</button>
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

            <?php require '../module/require/modalAddPictureFree.php'; ?>
            <?php require '../module/require/require_footer.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
 
    <?php require '../module/require/require_link_footer.php'?>
    <script src="../js/ajax/innit.js"></script>
    <script src="../js/ajax/pictureFree.ajax.js"></script>
    <?php require '../module/require/datatable.php';?>
<script>
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>

</html>