<?php
    require '../module/authentication.module.php';
    require '../module/employer.module.php';
    $authen = new Authentication();
    $employyer = new Employer();
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/now-ui-dashboard-pro/examples/forms/extended.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2020 16:42:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>
        Now UI Dashboard PRO by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/bootstrap.min.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Files -->

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/now-ui-dashboard.minaa26.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css">

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');</script>
    <!-- End Google Tag Manager -->


</head>

<body class=" sidebar-mini ">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper ">
    <?php require '../module/require/require_sidebar.php';?>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#">HƯNG PHÁT SOLUTIONS</a>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="navbar-nav">
                            <div class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="fas fa-sign-out-alt" style="font-size:1rem;"></i>
                                    <p>
                                        <span class="d-md-block">Logout</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalconfirmAuthen">
                Cấp quyền
            </button>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title t-center">Danh sách Nhân viên</h4>
                            </div>
                            <div class="card-body ">
                               <form action="" method="get">
                                <table class="table table-hover t-center">
                                    <thead class="tread-table">
                                        <tr class="t-center">
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên nhân viên</th>
                                            <th scope="col">Màn hình</th>
                                            <th scope="col">Các quyền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $employers = $authen->getAllUser();
                                    foreach ($employers as $key => $employer) {
                                      
                                       
                                    ?>
                                   
                                        <tr class="t-center trAuthentication">
                                            <th scope="row"><?php echo $key + 1 ?></th>
                                            <?php
                                                $employyerUer = $employyer->getEmployersById($employer["idUser"]);
                                                foreach ($employyerUer as $key => $value) {  ?>
                                                <td data-user="<?php echo $value["idEmployer"] ?>" ><?php echo $value["nameEmployer"] ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td><?php echo $employer["nameScreen"] ?></td>
                                            <td>
                                                <div class="row">
                                                    <?php 
                                                        $types = $authen->getAllType();
                                                        $arrAuthen =  json_decode($employer["authenticationUser"]);
                                                        foreach ($types as $key => $type) {
                                                    ?>
                                                        <?php 
                                                            if(in_array($type["idAuthentication"] , $arrAuthen)){ ?>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="checkbox" class="authenCheck" checked value="<?php echo $type["idAuthentication"] ?>">
                                                                        <label
                                                                            class="col-md-6 col-form-label label-admin"><?php echo $type["nameAuthentication"] ?></label>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }else{
                                                        ?>
                                                             <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="checkbox" class="authenCheck" value="<?php echo $type["idAuthentication"] ?>">
                                                                        <label
                                                                            class="col-md-6 col-form-label label-admin"><?php echo $type["nameAuthentication"] ?></label>
                                                                    </div>
                                                                </div>
                                                        <?php } ?>

                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php    
                                        }
                                    ?>
                                    </tbody>
                                </table>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- bảng ở trong đây -->
            </div>
            <?php require '../module/require/require_footer.php';?>

<?php
    include './modalAddAuthenScreen.php';
?>
        </div>

    </div>

    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/plugins/bootstrap-datetimepicker.js"></script>
    <script src="../js/plugins/bootstrap-notify.js"></script>
    <script src="../js/plugins/bootstrap-switch.js"></script>
    <script src="../js/plugins/fullcalendar.min.js"></script>
    <script src="../js/plugins/jquery-jvectormap.js"></script>
    <script src="../js/plugins/jquery.bootstrap-wizard.js"></script>
    <script src="../js/plugins/jquery.dataTables.min.js"></script>
    <script src="../js/plugins/jquery.validate.min.js"></script>
    <script src="../js/plugins/moment.min.js"></script>
    <script src="../js/plugins/nouislider.min.js"></script>
    <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="../js/plugins/sweetalert2.min.js"></script>
    <script src="../js/core/bootstrap.min.js"></script>
    <script src="../js/core/jquery.min.js"></script>
    <script src="../js/core/popper.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGat1sgDZ-3y6fFe6HD7QUziVC6jlJNog"></script>
    <script src="../js/now-ui-dashboard.minaa26.js" type="text/javascript"></script>
    <script src="../demo/jquery.sharrre.js"></script>
    <script src="../js/ajax/innit.js"></script>
    <script src="../js/ajax/authen.ajax.js"></script>
    <script src="../js/ajax/editAuthen.ajax.js"></script>
</body>

</html>