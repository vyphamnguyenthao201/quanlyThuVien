<?php
    if(isset($_GET['xuatfile']))
    {
        $xuatfile = $_GET['xuatfile'];
        if($xuatfile == 'doanhthu'){
            $html = '<table><tr><td>Thoi gian</td><td>Tong tien</td></tr>';
            for($i=0;$i<count($labeldoanhthu);$i++){
                $html.='<tr><td>'.$labeldoanhthu[$i].'</td><td>'.$datadoanhthu[$i].'</td></tr>';
            }
            $html.='</table>';
            header('Content-Type:application/xls');
            header('Content-Disposition:attachment;filename=thongkedoanhthu.xls');
            echo $html;
        }
        else if($xuatfile == 'donhang'){
            $html = '<table><tr><td>Ten</td><td>Tong</td></tr>';
            for($i=0;$i<count($labeldonhang);$i++){
                $html.='<tr><td>'.$labeldonhang[$i].'</td><td>'.$datadonhang[$i].'</td></tr>';
            }
            $html.='</table>';
            header('Content-Type:application/xls');
            header('Content-Disposition:attachment;filename=thongkedonhang.xls');
            echo $html;
        }
        else if($xuatfile == 'nhaphang'){
            $html = '<table><tr><td>Ten</td><td>Tong</td></tr>';
            for($i=0;$i<count($labelnhaphang);$i++){
                $html.='<tr><td>'.$labelnhaphang[$i].'</td><td>'.$datanhaphang[$i].'</td></tr>';
            }
            $html.='</table>';
            header('Content-Type:application/xls');
            header('Content-Disposition:attachment;filename=thongkenhaphang.xls');
            echo $html;
        }
    }
    if(isset($_GET['datefrom']))
        $datefrom = $_GET['datefrom'];
    else 
        $datefrom = '2021-01-01';
    if(isset($_GET['dateto']))
        $dateto = $_GET['dateto'];
    else 
        $dateto = '2021-12-31';
    if(isset($_GET['type']))
        $type = $_GET['type'];
    else 
        $type = 'bar';
    $types = array("bar"=>"Bar","pie"=>"Pie", "line"=>"Line", "doughnut"=>"Doughnut");
    $con = mysqli_connect("localhost","root","","ooad");
    $sql = "select sum(hoadon.TongTien) as TongTien, month(hoadon.NgayLap) as month, year(hoadon.NgayLap) as year from hoadon where hoadon.NgayLap BETWEEN '". $datefrom ."' and '". $dateto ."' group by year(hoadon.NgayLap), month(hoadon.NgayLap)";
    $result = mysqli_query($con, $sql);
    foreach($result as $row){
       
        $date = $row["month"] .'-'. $row["year"];
        $labeldoanhthu[] = $date;
        $datadoanhthu[] = $row["TongTien"];
    }
    $sql = "select sum(TongTien) as TongTien, month(phieunhap.NgayNhap) as month, year(phieunhap.NgayNhap) as year from phieunhap where phieunhap.NgayNhap BETWEEN '". $datefrom ."' and '". $dateto ."' group by year(phieunhap.NgayNhap), month(phieunhap.NgayNhap)";
    $result = mysqli_query($con, $sql);
    foreach($result as $row){
        $date = $row["month"] .'-'. $row["year"];
        $labelnhaphang[] = $date;
        $datanhaphang[] = $row["TongTien"];
    }
    $sql = "SELECT SUM(chitiethoadon.SoLuong) as tong, sanpham.TenSanPham as ten FROM hoadon, chitiethoadon, sanpham where hoadon.MaHoaDon = chitiethoadon.MaHoaDon AND sanpham.MaSanPham = chitiethoadon.MaSanPham AND hoadon.NgayLap BETWEEN '". $datefrom ."' and '". $dateto ."' group by chitiethoadon.MaSanPham";
    $result = mysqli_query($con, $sql);
    foreach($result as $row){
        $labeldonhang[] = $row['ten'];
        $datadonhang[] = $row['tong'];
    }
?>
<script>
    var type = <?php echo json_encode($type); ?>;
    var label = <?php echo json_encode($labeldoanhthu); ?>;
    var data = <?php echo json_encode($datadoanhthu); ?>;
    var labelnhaphang = <?php echo json_encode($labelnhaphang); ?>;
    var datanhaphang = <?php echo json_encode($datanhaphang); ?>;
    var labeldonhang = <?php echo json_encode($labeldonhang); ?>;
    var datadonhang = <?php echo json_encode($datadonhang); ?>;
</script>