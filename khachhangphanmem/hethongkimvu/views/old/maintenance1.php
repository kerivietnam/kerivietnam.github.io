<?php 
require_once '../module/all.module.php';
    $all = new All();
  require_once '../module/maintenance.module.php';
  $maintenance = new Maintenance();
  require_once '../module/employer.module.php';
  $employer = new Employer();
  require_once '../module/product.module.php';
  $product = new Product();
  require_once '../module/picture.module.php';
  $picture = new Picture();

    // echo json_encode($all->getAll());
   
    // die;

?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<?php include '../module/require/require_head.php' ?>

<body class=" sidebar-mini ">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper ">


        <!-- endmodalSOCN -->
        <?php require '../module/require/require_sidebar.php';?>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <?php include '../module/require/require_navbar.php' ?>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="card-button">
                    <div class="button-left">
                        <button class="btn btn-primary" onclick="modalCN()">
                            <span>Thêm số CN</span>
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </div>
                    <div class="button-right">
                        <button class="btn btn-success" onclick="modalDS()">
                            <span>Thêm dữ liệu</span>
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header">
                                <h4 style="text-align:center; margin:0">Công ty HƯNG PHÁT</h4>
                            </div>

                            <div class="card-body ">

                                <table border="1" Cellspacing="0" Cellpadding="1" class="table table-hover t-center">
                                    <thead>
                                        <tr>
                                            <th scope="col" rowspan="2" class="bg-table1 bg-table">
                                                <div class="iconGroup">
                                                    <span><i class="fas fa-edit"></i></span>
                                                    <span><i class="fas fa-backspace"></i></span>
                                                    <span onclick="modalCN()"><i class="fas fa-plus-square"></i></span>
                                                </div>
                                                SỐ CN
                                            </th>
                                            <th scope="col" rowspan="2" class="bg-table1 bg-table">
                                                <div class="iconGroup">
                                                    <span><i class="fas fa-edit"></i></span>
                                                    <span><i class="fas fa-backspace"></i></span>
                                                    <span onclick="modalDS()"><i class="fas fa-plus-square"></i></span>
                                                </div>
                                                SỐ DO DVH
                                            </th>
                                            <th scope="col" rowspan="2" class="bg-table">TÌNH TRẠNG</th>
                                            <th scope="col" rowspan="2" class="bg-table">
                                                <div class="iconGroup">
                                                    <span><i class="fas fa-edit"></i></span>
                                                    <span><i class="fas fa-backspace"></i></span>
                                                    <span data-toggle="modal" data-target="#modalAddProduct"><i
                                                            class="fas fa-plus-square"></i></span>
                                                </div>
                                                TÊN HÀNG HÓA
                                            </th>
                                            <th scope="col" rowspan="2" class="bg-table">ĐVT</th>
                                            <th scope="col" rowspan="2" class="bg-table">SỐ LG</th>
                                            <th scope="col" colspan="3" class="bg-table">
                                                <div class="iconGroup">
                                                    <span><i class="fas fa-edit"></i></span>
                                                    <span><i class="fas fa-backspace"></i></span>
                                                    <span data-toggle="modal" data-target="#modalAddPicture"><i
                                                            class="fas fa-plus-square"></i></span>
                                                </div>
                                                BVE
                                            </th>
                                            <th scope="col" rowspan="2" class="bg-table">PHÔI</th>
                                            <th scope="col" rowspan="2" class="bg-table">GC</th>
                                            <th scope="col" rowspan="2" class="bg-table">Đ/GIÁ</th>
                                            <th scope="col" rowspan="2" class="bg-table">T/TIỀN</th>
                                            <th scope="col" rowspan="2" class="bg-table">VAT</th>
                                            <th scope="col" rowspan="2" class="bg-table">T/TIỀN VAT</th>
                                            <th scope="col" rowspan="2" class="bg-table">T/TOÁN</th>
                                            <th scope="col" rowspan="2" class="bg-table">CÒN LẠI</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="bg-table">LOẠI</th>
                                            <th scope="col" class="bg-table">TÊN BV</th>
                                            <th scope="col" class="bg-table">VER</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td rowspan="17">CN 05</td>
                                            <td rowspan="17">DO -587</td>
                                            <td rowspan="10">1</td>
                                            <td rowspan="10">Dao MP420</td>
                                            <td rowspan="10">Bộ</td>
                                            <td rowspan="10">3</td>
                                            <td rowspan="3">2D</td>
                                            <td>BV_2D_1</td>
                                            <td>1</td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                        </tr>
                                        <tr>
                                            <td>BV_2D_1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>

                                            <td>BV_2D2</td>
                                            <td>2</td>

                                        </tr>
                                        <tr>
                                            <td rowspan="2">3D</td>
                                            <td>BV_3D_1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>BV_3D_2</td>
                                            <td>2</td>

                                        </tr>
                                        <tr>
                                            <td rowspan="5">CNC</td>
                                            <td>BV_CNC_1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>

                                            <td>BV_CNC_2</td>
                                            <td>2</td>

                                        </tr>
                                        <tr>

                                            <td>BV_CNC_3</td>
                                            <td>3</td>

                                        </tr>
                                        <tr>
                                            <td>BV_CNC_4</td>
                                            <td>4</td>

                                        </tr>
                                        <tr>
                                            <td>BV_CNC_5</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Bánh xe vặn nắp STM</td>
                                            <td>Cái</td>
                                            <td>10</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Khuôn tube &Phi;32 L2</td>
                                            <td>Cái</td>
                                            <td>5</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Khuôn tube &Phi;25 L6</td>
                                            <td>Cái</td>
                                            <td>5</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Khuôn tube &Phi;32 L6</td>
                                            <td>Cái</td>
                                            <td>5</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Khuôn tube &Phi;22 L6</td>
                                            <td>Cái</td>
                                            <td>5</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Khuôn tube &Phi;28 L6</td>
                                            <td>Cái</td>
                                            <td>5</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="t-bold">
                                            <td>I</td>
                                            <td>PGH PO 11998182 - Ms Hằng</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>


                                        <tr>
                                            <td rowspan="17">CN 04</td>
                                            <td rowspan="6">DO -588</td>
                                            <td rowspan="6">1</td>
                                            <td rowspan="6">Dao MP420</td>
                                            <td rowspan="6">Bộ</td>
                                            <td rowspan="6">3</td>
                                            <td rowspan="3">2D</td>
                                            <td>BV_2D_1</td>
                                            <td>1</td>
                                            <td rowspan="6"></td>
                                            <td rowspan="6"></td>
                                            <td rowspan="6"></td>
                                            <td rowspan="6"></td>
                                            <td rowspan="6"></td>
                                            <td rowspan="6"></td>
                                            <td rowspan="6"></td>
                                            <td rowspan="6"></td>
                                        </tr>
                                        <tr>
                                            <td>BV_2D_1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>

                                            <td>BV_2D2</td>
                                            <td>2</td>

                                        </tr>
                                        <tr>
                                            <td rowspan="2">3D</td>
                                            <td>BV_3D_1</td>
                                            <td>1</td>

                                        </tr>
                                        <tr>

                                            <td>BV_3D_2</td>
                                            <td>2</td>

                                        </tr>
                                        <tr>
                                            <td rowspan="1">CNC</td>
                                            <td>BV_CNC_1</td>
                                            <td>1</td>

                                        </tr>
                                        <tr>
                                            <td rowspan="6">DO -589</td>
                                            <td rowspan="10">1</td>
                                            <td rowspan="10">Dao MP420</td>
                                            <td rowspan="10">Bộ</td>
                                            <td rowspan="10">3</td>
                                            <td rowspan="3">2D</td>
                                            <td>BV_2D_1</td>
                                            <td>1</td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                            <td rowspan="10"></td>
                                        </tr>
                                        <tr>
                                            <td>BV_2D_1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>

                                            <td>BV_2D2</td>
                                            <td>2</td>

                                        </tr>
                                        <tr>
                                            <td rowspan="2">3D</td>
                                            <td>BV_3D_1</td>
                                            <td>1</td>

                                        </tr>
                                        <tr>

                                            <td>BV_3D_2</td>
                                            <td>2</td>

                                        </tr>
                                        <tr>
                                            <td rowspan="5">CNC</td>
                                            <td>BV_CNC_1</td>
                                            <td>1</td>

                                        </tr>
                                    </tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require '../module/require/require_footer.php';?>
            <!-- modalSOCN -->
            <?php include '../module/require/modalTTN.php';?>
            <?php include '../module/require/modalCN.php';?>
            <!-- modal product and picture -->
            <?php include '../module/require/modalAddPicture.php';?>
            <?php include '../module/require/modalAddProduct.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
    <?php require '../module/require/require_link_footer.php';?>
    <script src="../js/ajax/innit.js"></script>
    <script src="../js/ajax/maintenance.ajax.js"></script>
    <script src="../js/ajax/all.ajax.js"></script>
</body>

</html>