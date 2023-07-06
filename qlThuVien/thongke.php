<?php
session_start();
include 'tksql.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Thống Kê - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="js/morris-bundle/morris.css">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Quản lý</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="?action=logout">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <!-- layoutSidenav_nav.php -->
        <?php
        include './inc/layoutSidenav_nav.php';
        ?>
        <div id="layoutSidenav_content">
            <div class="container">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <form action="thongke.php" class="form">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label" for="datefrom">Ngày bắt đầu</label>
                                        <input type="date" class="form-control" name="datefrom" value=<?php echo $datefrom; ?>>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label" for="dateto">Ngày kết thúc</label>
                                        <input type="date" class="form-control" name="dateto" value=<?php echo $dateto; ?>>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label" for="type">Loại</label>
                                        <select class="form-control" name="type">
                                            <?php
                                            foreach ($types as $key => $value) {
                                                if ($key == $type)
                                                    echo '<option value="' . $key . '" selected>' . $value . '</option>';
                                                else
                                                    echo '<option value="' . $key . '">' . $value . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['permission'])) {
                    if ($_SESSION['permission'] == 1) {
                        echo '
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-12">
                                    <div class="card">
                                        <h5 class="card-header">Thống kê tình hình doanh thu từ ' . $datefrom . ' đến ' . $dateto . '</h5>
                                        <div class="card-body">
                                            <canvas id="doanhthu"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                <a href="tksql.php?xuatfile=doanhthu" class="btn btn-primary" >Xuất File</a>  
                                </div>
                            </div>
                        ';
                    }
                }
                ?>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header">Thống kê đơn hàng từ <?php echo $datefrom ?> đến <?php echo $dateto ?></h5>
                            <div class="card-body">
                                <canvas id="donhang"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="tksql.php?xuatfile=donhang" class="btn btn-primary">Xuất File</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header">Thống kê hàng nhập vào từ <?php echo $datefrom ?> đến <?php echo $dateto ?></h5>
                            <div class="card-body">
                                <canvas id="nhaphang"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="tksql.php?xuatfile=nhaphang" class="btn btn-primary">Xuất File</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="js/datatable.js"></script>
    <script src="js/charts-bundle/Chart.bundle.js"></script>
    <script src="js/charts-bundle/chartjs.js"></script>
    <script src="js/morris-bundle/raphael.min.js"></script>
    <script src="js/morris-bundle/morris.js"></script>
    <script src="js/morris-bundle/Morrisjs.js"></script>
</body>

</html>