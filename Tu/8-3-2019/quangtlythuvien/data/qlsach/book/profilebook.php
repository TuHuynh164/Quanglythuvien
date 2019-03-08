            
            
<?php
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    include "../../data.php";
    include "../../function.php";
    $dt = new database();
    $dt->select('SELECT ls.Id, ls.Ten_sach , tl.Ten theloai, nxb.Ten nhaxuatban,ls.Nam_xuat_ban namxb, ls.Kho_sach, ls.Gia_sach, vt.Thong_tin vitri, ls.Tom_tat_noi_dung FROM loai_sach ls 
    INNER JOIN the_loai tl ON ls.Ma_the_loai = tl.Id INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id INNER JOIN vi_tri vt ON ls.Ma_vi_tri = vt.Id WHERE ls.Id ="'.$name.'"');
    $r=$dt->fetch();
    if($r == 0){
        $dt->select('SELECT ls.Id, ls.Ten_sach , tl.Ten theloai, nxb.Ten nhaxuatban,ls.Nam_xuat_ban namxb, ls.Kho_sach, ls.Gia_sach, ls.Tom_tat_noi_dung FROM loai_sach ls 
    INNER JOIN the_loai tl ON ls.Ma_the_loai = tl.Id INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id WHERE ls.Id ="'.$name.'"');
    $r=$dt->fetch();
    $r["vitri"]="";
    }

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
                                    <li class="breadcrumb-item"><a class="breadcrumb-link list_book cursor">Quảng lý sách</a></li>
                                    <li class="breadcrumb-item"><a class="breadcrumb-link list_book cursor">Danh sách tên sách</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $r["Ten_sach"];  ?></li>
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
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Sơ lược nội dung</a>
                            </li>
                            <button type="button" class="btn btn-outline-primary editbook" data-toggle="modal" data-target="#myModal1"><i class="far fa-edit"></i> Chỉnh sửa thông tin</button>
                            <div class="goback"  ><i class="fas fa-backward"></i></div>
                        </ul>
                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                <div class="row">
                                    <?php

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
                                                    <h3 class="product-title"><?php echo $r["Ten_sach"]; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                        <ul class="list-unstyled arrow">
                                            <li>Mã sách:<b> <?php echo $r["Id"]; ?> </b></li>


                                            <li> <p> Tác giả:
                                                <?php 
                                                    $tg = tg($r["Id"]);
                                                    $num_of_items = count($tg);
                                                    $num_count = 0;
                                                    foreach($tg as $tg){
                                                        echo "<b natsort='".$tg."' url='tacgia/profiletacgia.php' class = 'profile'>".$tg."</b>";
                                                        $num_count = $num_count + 1;
                                                        if ($num_count < $num_of_items) {
                                                            echo ", ";
                                                        }
                                                    }
                                                ?>
                                            </p></li>
                                            <li>Thể loại: <b natsort='<?php echo $r["theloai"]; ?>' url='theloai/profiletheloai.php' class = 'profile'> <?php echo $r["theloai"]; ?> </b></li>
                                            <li>Nhà xuất bảng: <b natsort='<?php echo $r["nhaxuatban"]; ?>' url='nhaxuatban/profilenxb.php' class = 'profile'> <?php echo $r["nhaxuatban"]; ?> </b></li>
                                            <li>Năm xuất bảng: <b> <?php echo $r["namxb"]; ?> </b></li>
                                            <li>Khổ sách: <b> <?php echo $r["Kho_sach"]; ?> </b></li>
                                            <li>Giá sách: <b> <?php echo number_format($r["Gia_sach"]).' VNĐ'; ?> </b></li>
                                            <li>Vị trí trong thư viện: <b  natsort='<?php echo $r["vitri"]; ?>' url='vitri/profilevitri.php' class = 'profile'> <?php echo $r["vitri"]; ?> </b></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                                <p><?php echo $r["Tom_tat_noi_dung"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Số lượng sách: <?php echo tong_sach($name)."/".tong_sach_trong_kho($name);?> sẵn sàng.</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Mã ISBN</th>
                                            <th>Tình trạng</th>
                                            <th>Số trang</th>
                                            <th>Số lần tái bảng</th>
                                            <th>Hiện có</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(!empty($_POST['search'])){
                                                $dt->select('SELECT sach.Id, sach.Ma_ISBN, sach.Tinh_trang, sach.So_trang, sach.So_lan_tai_bang, sach.Hien_co
                                                FROM sach INNER JOIN loai_sach ls ON sach.Ma_ten_sach = ls.Id WHERE ls.Id ="'.$name.'" AND sach.Ma_ISBN LIKE "%'.$_POST['search'].'%" ORDER BY ls.Ten_sach ASC');
                                            }else{
                                                $dt->select('SELECT sach.Id, sach.Ma_ISBN, sach.Tinh_trang, sach.So_trang, sach.So_lan_tai_bang, sach.Hien_co
                                            FROM sach INNER JOIN loai_sach ls ON sach.Ma_ten_sach = ls.Id WHERE ls.Id ="'.$name.'";');
                                            }
                                            
                                            while($r=$dt->fetch()){
                                                if($r["Hien_co"] == 1){
                                                    $hc = "Sẵn sàng";
                                                }else{
                                                    $hc = "Đã cho mượn";
                                                }
                                                echo "<tr>  <td>".$r["Id"]."</td><td>".$r["Ma_ISBN"]."</td><td>".$r["Tinh_trang"]."</td><td>".$r["So_trang"]."</td><td>".$r["So_lan_tai_bang"]."</td><td>".$hc."</td><td><a href='QRcode.php?id=$r[Id]&ISBN=$r[Ma_ISBN]' title='In mã vạch cho sách' target='_blank'><i class='fas fa-outdent'></i></a></td></tr>";
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
<script>
    var editname = "<?php echo $name; ?>";
</script>