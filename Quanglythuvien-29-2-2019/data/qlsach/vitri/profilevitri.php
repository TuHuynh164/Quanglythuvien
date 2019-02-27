<?php
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    include "../../data.php";
    $dt = new database();
    include "../../function.php";
?>

<div class="container-fluid  dashboard-content">  
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <!-- <h2 class="pageheader-title">Data Tables</h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Quảng lý sách</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Vị trí đặt sách</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <?php echo $name; ?>  </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Tổng hợp sách đặt tại: <b class='fblue'><?php echo $name; ?> </b> </h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên sách</th>
                                    <th>Tác giả</th>
                                    <th>Thể loại</th>
                                    <th>NXB</th>
                                    <th>Số lượng</th>
                                    <th>control</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(!empty($_POST['search'])){
                                        $dt->select('SELECT ls.Id, ls.Ten_sach, tl.Ten theloai, nxb.Ten nhaxuatban FROM loai_sach ls INNER JOIN vi_tri vt ON ls.Ma_vi_tri = vt.Id INNER JOIN the_loai tl 
                                        ON ls.Ma_the_loai = tl.Id INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id WHERE vt.Thong_tin ="'.$name.'" AND ls.Ten_sach LIKE "%'.$_POST['search'].'%" ORDER BY ls.Ten_sach ASC');
                                    }else{
                                        $dt->select('SELECT ls.Id, ls.Ten_sach, tl.Ten theloai, nxb.Ten nhaxuatban FROM loai_sach ls INNER JOIN vi_tri vt ON ls.Ma_vi_tri = vt.Id INNER JOIN the_loai tl 
                                        ON ls.Ma_the_loai = tl.Id INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id WHERE vt.Thong_tin ="'.$name.'" ORDER BY ls.Ten_sach ASC');
                                    }
                                    while($r=$dt->fetch()){
                                        echo "<tr>  <td>".$r["Id"]."</td> 
                                            <td natsort='".$r["Ten_sach"]."' url='book/profilebook.php' class = 'profile'>".$r["Ten_sach"]."</td>"
                                ?>
                                            <td><?php
                                                $tg = tg($r["Id"]);
                                                foreach($tg as $r2){
                                                    echo "<p natsort='".$r2."'url='tacgia/profiletacgia.php' class = 'profile'> ".$r2."</p>";
                                                } 
                                            ?></td>
                                <?php                
                                        echo  "<td natsort='".$r["theloai"]."' url='theloai/profiletheloai.php' class = 'profile'>".$r["theloai"]."</td>
                                            <td natsort='".$r["nhaxuatban"]."' url='nhaxuatban/profilenxb.php' class = 'profile'>".$r["nhaxuatban"]."</td>
                                            <td>".tong_sach($r["Ten_sach"])."/".tong_sach_trong_kho($r["Ten_sach"])."</td>
                                            <td></td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>