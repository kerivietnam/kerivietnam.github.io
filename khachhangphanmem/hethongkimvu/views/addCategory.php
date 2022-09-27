
<?php
    require_once '../module/employer.module.php';
    $employer = new Employer();
    require_once '../module/maintenance.module.php';
    $maintenance = new Maintenance();
    require_once '../module/category.module.php';
    $category = new Category();
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
                <button type="button" class="btn btn-primary btn-updateCategory" data-toggle="modal" data-target="#modalAddCategory" style="position: relative;z-index: 1;">
                    Thêm category
                </button>
              
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title t-center " style="display : inline-block;">Danh sách category</h4>
                                                <div class="boxButton">
                                    <div class="msvbBox">
                                        <div class="radios-lable">
                                            Tìm kiếm theo Category
                                        </div>
                                        <input type="text" class="form-control formSearch" placeholder="nhập category" id="searchByCategory">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
                              
                                <table class="table table-hover t-center">
                                    <thead>
                                        <tr class="t-center">
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên Khách Hàng</th>
                                            <th scope="col">Số CN</th>
                                            <th scope="col">Số DVH</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyAddCategory">
                                        <?php 

                                            $Categorys = $category->getAllCategory();
                                            foreach ($Categorys as $key => $data) { ?>

                                                <tr class="t-center">
                                                    <td><?php echo $key +1 ?></td>
                                                    <td data-value="<?php echo $data["idEmployer"] ?>"><?php echo $data["nameEmployer"] ?></td>
                                                    <td data-value="<?php echo $data["idSeri"] ?>"><?php echo $data["machinenumber"] ?></td>
                                                    <td data-value="<?php echo $data["idContact"] ?>"><?php echo $data["serinumber"] ?></td>
                                                    <td><?php echo $data["categoryName"] ?></td>
                                                    <td>
                                                        <button class="btn btn-danger btnDeleteCategory" id="<?php echo $data["idCategory"] ?>">Xóa</button>
                                                        <button class="btn btn-dark btnUpdateCategory" data-toggle="modal" data-target="#modalAddCategory" id="<?php echo $data["idCategory"] ?>">sửa</button>
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

            <?php require '../module/require/modalAddCategory.php'; ?>
            <?php require '../module/require/require_footer.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
 
    <?php require '../module/require/require_link_footer.php'?>
    <script src="../js/ajax/innit.js"></script>
    <script src="../js/ajax/addCategory.ajax.js"></script>
</body>

</html>