        
<?php 
include "../../data.php";
include "../../function.php";
$dt = new database();
// echo "<br>";;
    if(isset($_POST["Id"])){
        // echo $_POST["Id"];
        $dt->select("SELECT * FROM loai_sach WHERE Id = '$_POST[Id]'");
        if($sl= $dt->fetch() != 0 && tong_sach_trong_kho($_POST['Id']) == 0){
            $dt->command("DELETE FROM loai_sach WHERE Id = '$_POST[Id]'");
            $dt->command("DELETE FROM ls_tg WHERE Ma_ls = '$_POST[Id]'");
        }
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
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Data Tables</li> -->
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        
                        <!-- <h5 class="card-header">Basic Table</h5>
                        <div id="custom-search" class="search-bar">
                            <input class="form-control  _search" type="text" placeholder="Search for books here...">
                        </div> -->
                        
                        <div class="card-body"> <button type="button" class="btn btn-outline-primary add_sach" data-toggle="modal" data-target="#myModal1"><i class="far fa-plus-square"></i> Thêm tên sách mới</button></div>
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
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            if(!empty($_POST['search'])){
                                                $dt->select('SELECT ls.Id, ls.Ten_sach, tl.Ten theloai, nxb.Ten nhaxuatban FROM loai_sach ls 
                                                INNER JOIN the_loai tl ON ls.Ma_the_loai = tl.Id INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id WHERE ls.Ten_sach LIKE "%'.$_POST['search'].'%" ORDER BY ls.Ten_sach ASC');
                                            }else{
                                                $dt->select('SELECT ls.Id, ls.Ten_sach, tl.Ten theloai, nxb.Ten nhaxuatban FROM loai_sach ls 
                                                INNER JOIN the_loai tl ON ls.Ma_the_loai = tl.Id INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id ORDER BY ls.Ten_sach ASC');
                                            }
                                            while($r=$dt->fetch()){
                                                echo "<tr>  <td>".$r["Id"]."</td> 
                                                <td natsort='".$r["Id"]."' url='book/profilebook.php' class = 'profile'>".$r["Ten_sach"]."</td>";

                                            //lấy danh những tác giả viết cuốn sách
                                                $tg = tg($r["Id"]);
                                            ?>
                                                <td>
                                                        <?php 
                                                            foreach($tg as $r2){
                                                                echo "<p natsort='".$r2."'url='tacgia/profiletacgia.php' class = 'profile'> ".$r2."</p>";
                                                            } 
                                                        ?> 
                                                </td>
                                            <!-- //////////////////////////////////////// -->
                                            <?php
                                                echo "<td natsort='".$r["theloai"]."' url='theloai/profiletheloai.php' class = 'profile'>".$r["theloai"]."</td>
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
                                    $('._content').html(html);
                                }
                            });
                        }else{
                            return false;
                        }
                    }
                });
            })

        </script>
