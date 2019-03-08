            
            
<?php
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    include "../../data.php";
    include "../../function.php";
    $dt = new database();
    $dt2 = new database();


    $dt->select('SELECT * FROM nguoi_muon ls INNER JOIN the_thanh_vien ON the_thanh_vien.So_the = ls.CMND WHERE ls.Id ="'.$name.'";');
    $r=$dt->fetch();
?>
        <div class="container-fluid  dashboard-content">  
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title"><?php echo $r["Ten"]?></h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="breadcrumb-link">Bạn đọc</a></li>
                                    <li class="breadcrumb-item"><a class="breadcrumb-link">Danh sách bạn đọc</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $r["Ten"];  ?></li>
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
                                <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">Thông tin bạn đọc</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Thông tin thẻ</a>
                            </li>
                            <button class="btn btn-outline-primary edit_member" value="<?=$r['Id']?>" data-toggle="modal" data-target="#myModal1"><i class="far fa-edit"></i> Chỉnh sửa thông tin</button>
                            <div class="goback"  ><i class="fas fa-backward"></i></div>
                        </ul>
                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="product-thumbnail">
                                            <div class="product-img-head">
                                                <div class="product-img">
                                                    <img src="assets/images/eco-product-img-1.png" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                                
                                            </div>
                                            <div class="product-content">
                                                <div class="product-content-head">
                                                    <h3 class="product-title"><?php echo $r["Ten"]; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                        <ul class="list-unstyled arrow">
                                            <li>Mã bạn đọc:<b> <?php echo $r["Id"]; ?> </b></li>


                                            <li>Tên: <b> <?=$r['Ten']?> </b></li>
                                            <li>Địa chỉ: <b class = 'profile'> <?php echo $r["Dia_chi"]; ?> </b></li>
                                            <li>Số điện thoại: <b class = 'profile'> <?php echo $r["Sdt"]; ?> </b></li>
                                            <li>Email: <b class = 'profile'> <?php echo $r["Email"]; ?> </b></li>
                                            <li>Ghi chú: <b> <?=$r['Ghi_chu']?> </b></li>
                                            <li class = 'profile_card'>Mã thẻ (CMND): <b> <?=$r['CMND']?> </b></li>
                                            <li>Sô sách đang mượn   : <b> 0 </b></li>
                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                                <div class="row">
                                    <?php
                                        $dt2->select('SELECT * FROM the_thanh_vien ls INNER JOIN nguoi_muon ON ls.So_the = nguoi_muon.CMND WHERE ls.So_the ="'.$id.'";');
                                        $r2=$dt2->fetch();
                                    ?>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="product-thumbnail">
                                            <div class="product-img-head">
                                                <div class="product-img bg-light">
                                                    <div class="text-center m-auto" id='QR_code'></div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-content-head">
                                                    <h3 class="product-title"><span>Thẻ số : </span><span class="id-card font-weight-bold"><?=$r2["So_the"]?></span></h3>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                        <ul class="list-unstyled arrow">
                                            <li>Mã bạn đọc:<b> <?php echo $r2["Id"]; ?> </b></li>


                                            <li>Tên: <b> <?=$r2['Ten']?> </b></li>
                                            <li>Ngày bắt đầu: <b> <?=$r2['Ngay_bat_dau']?> </b></li>
                                            <li>Ngày hết hạn: <b> <?=$r2['Ngay_het_han']?> </b></li>
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
                                            <button class="btn btn-secondary extend_card" value="<?=$r2["So_the"]?>" data-toggle="modal" data-target="#myModal1">Gia hạn</button>
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
<?php
    $QR_code = $r2["So_the"];
    // if (strlen($QR_code)==9) {
    //     $QR_code = "000".$QR_code;
    // }
?>
<script type="text/javascript">
    var defaultSettings = {
      barWidth: 2,
      barHeight: 75,
      moduleSize: 5,
      showHRI: true,
      addQuietZone: true,
      marginHRI: 5,
      bgColor: "#FFFFFF",
      color: "#000000",
      fontSize: 20,
      output: "css",
      posX: 0,
      posY: 0
    };
    $(document).ready(function(){
            $("#QR_code").barcode(
                "<?php echo $QR_code; ?>", // Value barcode (dependent on the type of barcode)
                "codabar",defaultSettings // type (string)
            ); 
        });
</script>