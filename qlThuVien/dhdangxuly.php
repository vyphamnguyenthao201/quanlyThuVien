
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
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
                    <?php
                    ?>
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
            <main>

                <br>
                <div class="_dsproduct">
                    <h4 class="ml-4">Danh sách đơn hàng đang xử lý</h4>
                    <div class="row">
                        <div class="col-11 m-auto">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-striped table-bordered display">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Mã ĐH</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Ngày mua</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Chi tiết</th>
                                            <th scope="col">Xử lý</th>
                                            <th>Xoá ĐH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"></td>
                                            <td scope="col"></td>
                                            <td scope="col"></td>
                                            <td scope="col"></td>
                                            <td scope="col">
                                                <div onclick="requestAjaxToGetOrder('')" class="btn btn-primary">Chi tiết</div>
                                            </td>
                                            <td><a href="?id_order=">
                                                    <div class="btn btn-success">Xử lý</div>
                                                </a></td>

                                            <td>
                                                <a href="?action=delete&id_order=">
                                                    <div class="btn btn-danger">Xoá</div>
                                                </a>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>

    <script>
        function requestAjaxToGetOrder(id_order) {
            $.ajax({
                method: "GET",
                dataType: "html",
                url: "../classes/getdetailorder.php",
                data: {
                    'id_order': String(id_order)
                },
                success: function(response) {
                    $('<div class="modal hide fade">' + response + '</div>').modal();
                }
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="js/datatable.js"></script>
</body>

</html>

<?php
ob_flush();
?>