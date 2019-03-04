            
            
<?php
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    include "../../data.php";
    include "../../function.php";
    $dt = new database();
    // echo $_POST['control'];
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
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
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
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Sơ lược nội dung</a>
                            </li>
                            <div class="list_book goback"  ><i class="fas fa-backward"></i></div>
                        </ul>
                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                <div class="row">
                                    <?php
                                        $dt->select('SELECT * FROM the_thanh_vien ls INNER JOIN nguoi_muon ON ls.So_the = nguoi_muon.CMND WHERE ls.So_the ="'.$name.'";');
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
                                                    <h3 class="product-title id-card">Thẻ số : <?php echo $r["So_the"]; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                        <ul class="list-unstyled arrow">
                                            <li>Mã bạn đọc:<b> <?php echo $r["Id"]; ?> </b></li>


                                            <li>Tên: <b> <?=$r['Ten']?> </b></li>
                                            <li>Ngày bắt đầu: <b> <?=$r['Ngay_bat_dau']?> </b></li>
                                            <li>Ngày hết hạn: <b> <?=$r['Ngay_het_han']?> </b></li>
                                            <li>Trạng thái: <b>
                                             <?php 
                                                if($r['Trang_thai']==0)
                                                    echo "Hoạt động";
                                                else
                                                    echo "Khóa";
                                             ?> 
                                            </b></li>
                                            <!-- <li>Mã thẻ (CMND): <b> <?=$r['CMND']?> </b></li>
                                            <li>Sô sách đang mượn   : <b> 0 </b></li> -->
                                            <br>
                                            <button class="btn btn-primary lock-card" value="<?=$r['Trang_thai']?>">
                                            <?php 
                                                if($r['Trang_thai']==0){
                                                    echo "Khóa thẻ";
                                                }
                                                else echo "Mở thẻ";
                                            ?></button>
                                            <button class="btn btn-secondary">Gia hạn</button>
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
                        <h5 class="card-header">Số lượng sách đang mượn: 0.</h5>
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
                                            <th>control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(!empty($_POST['search'])){
                                                $dt->select('SELECT sach.Id, sach.Ma_ISBN, sach.Tinh_trang, sach.So_trang, sach.So_lan_tai_bang, sach.Hien_co
                                                FROM sach INNER JOIN loai_sach ls ON sach.Ma_ten_sach = ls.Id WHERE ls.Ten_sach ="'.$name.'" AND sach.Ma_ISBN LIKE "%'.$_POST['search'].'%" ORDER BY ls.Ten_sach ASC');
                                            }else{
                                                $dt->select('SELECT sach.Id, sach.Ma_ISBN, sach.Tinh_trang, sach.So_trang, sach.So_lan_tai_bang, sach.Hien_co
                                            FROM sach INNER JOIN loai_sach ls ON sach.Ma_ten_sach = ls.Id WHERE ls.Ten_sach ="'.$name.'";');
                                            }
                                            
                                            while($r=$dt->fetch()){
                                                if($r["Hien_co"] == 1){
                                                    $hc = "Sẵn sàng";
                                                }else{
                                                    $hc = "Đã cho mượn";
                                                }
                                                echo "<tr>  <td>".$r["Id"]."</td><td>".$r["Ma_ISBN"]."</td><td>".$r["Tinh_trang"]."</td><td>".$r["So_trang"]."</td><td>".$r["So_lan_tai_bang"]."</td><td>".$hc."</td><td></td></tr>";
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