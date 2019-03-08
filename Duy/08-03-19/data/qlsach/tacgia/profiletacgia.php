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
                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Sơ lược về tác giả</a>
                            </li>
                            <button type="button" class="btn btn-outline-primary edittacgia" data-toggle="modal" data-target="#myModal1"><i class="far fa-edit"></i> Chỉnh sửa thông tin</button>
                            <div class="goback" ><i class="fas fa-backward"></i></div>
                        </ul>
                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                <div class="row">
                                    <?php
                                        $dt->select('SELECT tg.Id, tg.Ten_tac_gia, tg.website, tg.Ghi_chu, tg.So_luoc_thong_tin
                                        FROM tac_gia tg WHERE tg.Ten_tac_gia ="'.$name.'";');
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
                                                    <h3 class="product-title"><?php echo $r["Ten_tac_gia"]; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                        <ul class="list-unstyled arrow">
                                            <li>Mã tác giả:<b> <?php echo $r["Id"]; ?> </b></li>
                                            <li>Website: <b> <?php echo $r["website"]; ?> </b></li>
                                            <li>Ghi chú: <b> <?php echo $r["Ghi_chu"]; ?> </b></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                                <p><?php echo $r["So_luoc_thong_tin"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Sách của tác giả hiện có trong thư viện <?php ?></h5>
                        <div class="card-body">
                            <div>
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tên sách</th>
                                            <th>Thể loại</th>
                                            <!-- <th>Tác giả</th> -->
                                            <th>NXB</th>
                                            <th>Số lượng</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $dt->select("SELECT Id FROM tac_gia WHERE Ten_tac_gia = '$name'");
                                            $r=$dt->fetch();

                                            if(!empty($_POST['search'])){
                                                $dt->select('SELECT ls.Id, ls.Ten_sach, tl.Ten theloai, nxb.Ten nhaxuatban FROM loai_sach ls INNER JOIN ls_tg ON ls_tg.Ma_ls = ls.Id 
                                                INNER JOIN the_loai tl ON ls.Ma_the_loai = tl.Id INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id WHERE ls_tg.Ma_tg ="'.$r['Id'].'" AND ls.Ten_sach LIKE "%'.$_POST['search'].'%" ORDER BY ls.Ten_sach ASC');
                                            }else{
                                                $dt->select('SELECT ls.Id, ls.Ten_sach, tl.Ten theloai, nxb.Ten nhaxuatban FROM loai_sach ls INNER JOIN ls_tg ON ls_tg.Ma_ls = ls.Id 
                                                INNER JOIN the_loai tl ON ls.Ma_the_loai = tl.Id INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id WHERE ls_tg.Ma_tg ="'.$r['Id'].'" ORDER BY ls.Ten_sach ASC;');
                                            }

                                            
                                            while($r=$dt->fetch()){
                                        
                                                echo "<tr>  <td>".$r["Id"]."</td> 
                                                <td natsort='".$r["Id"]."' url='book/profilebook.php' class = 'profile'>".$r["Ten_sach"]."</td>
                                      
                                                <td natsort='".$r["theloai"]."' url='theloai/profiletheloai.php' class = 'profile'>".$r["theloai"]."</td>
                                                <td natsort='".$r["nhaxuatban"]."' url='nhaxuatban/profilenxb.php' class = 'profile'>".$r["nhaxuatban"]."</td>
                                                <td class='tongsach'>".tong_sach($r["Id"])."/".tong_sach_trong_kho($r["Id"])."</td>
                                                <td><i class='fas fa-trash-alt xoa'></i></td></tr>";
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
    $(document).ready(function(){
        $(".xoa").click(function(){
            // alert("adas")
            var t = $(this).parents("tr").find(".tongsach").html();
            if(t!= "0/0"){
                alert("Không thể xóa. Có "+t+" cuốn sách này đang tồn tại trong thư viện");
            }else{
                // alert("ádasdasd");
                var x = confirm("Bạn có chắc muốn xóa");
                if(x==true){
                    var Id = $(this).parents('tr').children(":first").text();
                    // alert(Id);
                    $.ajax({
                        type: "post",
                        url: '../data/qlsach/book/lishbook.php',
                        data:{
                            Id:Id
                        },
                        cache: false,
                        success: function (html){
                            // alert("asdasdas");
                            var name = "<?php echo $name; ?>"
                            var url = "tacgia/profiletacgia.php";
                            profile(name, url);
                        }
                    });
                }else{
                    return false;
                }
            }
        });
    })
</script>