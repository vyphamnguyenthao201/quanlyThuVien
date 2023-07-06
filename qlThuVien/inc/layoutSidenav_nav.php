<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link collapsed" href="tkuser.php" data-toggle="collapse" data-target="#collapseUserAccount">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Thống kê
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUserAccount">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dsuser.php">Đơn đặt hàng</a>
                    </nav>
                </div>
                <div class="collapse" id="collapseUserAccount">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dsuser.php">Bán hàng</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="../admin/danhmucsach.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Quản lý chương trình khuyến mãi
                </a>
                <a class="nav-link" href="dssanpham.php">
                    <div class="sb-nav-link-icon"><i class="fab fa-buffer"></i></div>
                    Quản lý sản phẩm
                </a>
                <a class="nav-link" href="../admin/danhmucsach.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Quản lý thương hiệu
                </a>
                <a class="nav-link" href="dhdangxuly.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-dice-d20"></i></div>
                    Quản lý hoá đơn
                </a>
                <a class="nav-link" href="../admin/danhmucsach.php">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Quản lý nhập hàng
                </a>
                <?php
				if(isset($_SESSION['Permission'])){
					if($_SESSION['Permission']==1) echo
					'<a class="nav-link" href="dsuser.php">
					<div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
						Quản lý nhân viên
					</a>';
				}
				?>
            </div>

        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: <?php if(isset($_SESSION['Fullname'])) echo $_SESSION['Fullname']; ?></div>
        </div>
    </nav>
</div>