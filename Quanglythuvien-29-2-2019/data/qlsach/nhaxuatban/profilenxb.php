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
                        <h2 class="pageheader-title">Data Tables</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Nhà xuất bản</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $name;  ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-20">
                    <div class="simple-card">
                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">Thông tin cơ bản</a>
                            </li>
                            <div class="list_book goback" ><i class="fas fa-backward"></i></div>
                        </ul>
                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                <div class="row">
                                    <?php
                                        $dt->select('SELECT nxb.Id, nxb.Dia_chi, nxb.lien_he, nxb.Thong_tin FROM nha_xuat_ban nxb WHERE nxb.Ten ="'.$name.'";');
                                        $r=$dt->fetch();
                                    ?>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="product-thumbnail">
                                            <div class="product-img-head">
                                                <div class="product-img">
                                                    <img src="assets/images/eco-product-img-1.png" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                                
                                            </div>
                                            <div class="product-content">
                                                <div class="product-content-head">
                                                    <h3 class="product-title"><?php echo $name; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                        <ul class="list-unstyled arrow">
                                            <li>Mã tác giả:<b> <?php echo $r["Id"]; ?> </b></li>
                                            <li>Địa chỉ: <b> <?php echo $r["Dia_chi"]; ?> </b></li>
                                            <li>Liên hệ: <b> <?php echo $r["lien_he"]; ?> </b></li>
                                            <li>Thông tin: <b> <?php echo $r["Thong_tin"]; ?> </b></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Sách của nhà xuất bản hiện có trong thư viện <?php ?></h5>
                        <div class="card-body">
                            <div>
                                
                            </div>
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
                                                $dt->select('SELECT ls.Id, ls.Ten_sach, tl.Ten theloai, nxb.Ten nhaxuatban
                                                FROM loai_sach ls INNER JOIN the_loai tl ON ls.Ma_the_loai = tl.Id INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id 
                                                WHERE nxb.Ten ="'.$name.'" AND ls.Ten_sach LIKE "%'.$_POST['search'].'%" ORDER BY ls.Ten_sach ASC');
                                            }else{
                                                $dt->select('SELECT ls.Id, ls.Ten_sach, tl.Ten theloai, nxb.Ten nhaxuatban
                                                FROM loai_sach ls INNER JOIN the_loai tl ON ls.Ma_the_loai = tl.Id INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id 
                                                WHERE nxb.Ten ="'.$name.'" ORDER BY ls.Ten_sach ASC;');
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
                                                echo "<td natsort='".$r["theloai"]."' url='theloai/profiletheloai.php' class = 'profile'>".$r["theloai"]."</td>
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