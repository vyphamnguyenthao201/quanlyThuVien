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
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div class="container-fluid">
                    <ul class="list-group">
                        <li class="list-group-item position-relative">
                            Clothes
                            <form class="p-0 m-0 float-right" action="" method="POST">
                                <input type="submit" class="btn btn-danger px-2 py-0" value="x">
                            </form>
                            <button class="float-right btn btn-outline-primary px-2 py-0 mr-2" style="margin-top: 1.5px;" data-toggle="collapse" data-target="#categorychild_1">+</button>
                            <ul class="list-group mt-3 ml-2 collapse" id="categorychild_1">
                                <li class="list-group-item">
                                    ádfas
                                    <form action="" method="post" style="display: inline;">
                                        <input type="submit" class="float-right px-2 py-0 btn btn-danger" value="x">
                                    </form>
                                    <i class="float-right mr-3 mt-2 fas fa-wrench text-success" style="cursor: pointer;" data-toggle="modal" data-target="#modelId" onclick="changeCategoryChild(this)" data-idcategorychild=""></i>

                                </li>
                                <li class="list-group-item text-center">
                                    <form id="addform" action="" method="post" style="display: inline;">
                                        <input class="form-control w-50 mb-2 float-left addcate" type="text" name="addnamecategorychild" style="display: none;">
                                        <input type="submit" value="Thêm" class="ml-2 btn btn-outline-primary float-left addcate" style="display:none">
                                        <input type="button" onclick="addCategoryChild()" class=" w-100 px-2 py-0 btn btn-outline-success" id="btnadd" value="+">
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="list-group-item text-center">
                            <form id="addform" action="" method="post" style="display: inline;">
                                <input class="form-control w-50 mb-2 float-left addcategory" type="text" name="addnamecategory" style="display: none;">
                                <input type="submit" value="Thêm" class="ml-2 btn btn-outline-primary float-left addcategory" style="display:none">
                                <input type="button" onclick="addCategory()" class=" w-100 px-2 py-0 btn btn-outline-success" value="+">
                            </form>
                        </li>
                    </ul>
                </div>

            </main>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nhập nội dung cần sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="changeform">
                        <input type="text" name="namecategorychild">
                        <input id="btnsubmit" type="submit" style="visibility : hidden">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btnsave" type="button" class="btn btn-primary" onclick="get()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeCategoryChild(element) {
            let id_categorychild = element.getAttribute('data-idcategorychild');
            console.log(id_categorychild);
            let modal = document.getElementById('changeform');
            let getphp = '?idcategorychild=' + id_categorychild;
            modal.setAttribute('action', getphp);
            let btnsave = document.getElementById('btnsave');
            console.log(btnsave);

            btnsave.onclick = function() {
                let btnsubmit = document.getElementById('btnsubmit');
                btnsubmit.click();
            }
        }

        function addCategoryChild() {
            console.log('ok');
            let show = document.getElementsByClassName('addcate');
            for (let i = 0; i < show.length; i++) {
                show[i].style.display = "block";
            }
        }

        function addCategory() {
            let show = document.getElementsByClassName('addcategory');
            for (let i = 0; i < show.length; i++) {
                show[i].style.display = "block";
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
</body>

</html>