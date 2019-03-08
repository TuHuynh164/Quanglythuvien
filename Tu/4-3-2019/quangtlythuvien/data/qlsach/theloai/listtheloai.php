

<?php 
include "../../data.php";
include "../../function.php";
$dt = new database();
// echo "<br>";;
    if(isset($_POST["Id"])){
        // echo $_POST["Id"];
        $dt->select("SELECT * FROM the_loai WHERE Id = '$_POST[Id]'");
        if($sl= $dt->fetch() != 0 && dem_ten_sach($_POST['Id']) == 0){
            $dt->command("DELETE FROM the_loai WHERE Id = '$_POST[Id]'");
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
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <!-- <h5 class="card-header">Basic Table</h5> -->
                        <!-- <div id="custom-search" class="search-bar">
                            <input class="form-control  _search" type="text" placeholder="Search for books here...">
                        </div> -->
                        <div class="card-body"> <button type="button" class="btn btn-outline-primary add_theloai" data-toggle="modal" data-target="#myModal1"><i class="far fa-plus-square"></i> Thêm thông tin mới</button></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tên thể loại</th>
                                            <th>Mã chuyên mục</th>
                                            <th>Số lượng sách</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(!empty($_POST['search'])){
                                                $dt->select('SELECT tl.Id, tl.Ten, tl.Ma_chuyen_muc FROM the_loai tl
                                                WHERE tl.Ten LIKE "%'.$_POST['search'].'%" ORDER BY tl.Ten ASC');
                                            }else{
                                                $dt->select('SELECT tl.Id, tl.Ten, tl.Ma_chuyen_muc FROM the_loai tl ORDER BY tl.Ten ASC');
                                            }
                                            while($r=$dt->fetch()){
                                                echo "<tr>
                                                        <td>{$r['Id']}</td>
                                                        <td natsort='".$r['Ten']."'url='theloai/profiletheloai.php' class = 'profile' >{$r['Ten']}</td>
                                                        <td>{$r['Ma_chuyen_muc']}</td>
                                                        <td class='tongsach'>".dem_ten_sach($r['Id'])."</td>
                                                        <td><i class='fas fa-trash-alt xoa'></i></td>
                                                    </tr>";
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
                // $(document).on("click",".fa-trash-alt",function(){
                //     
                // });
                $(".xoa").click(function(){
                    // alert("adas")
                    var t = $(this).parents("tr").find(".tongsach").html();
                    if(t>0){
                        
                        alert("Không thể xóa. Có "+t+" tác phẩm của thể loại này đang tồn tại trong thư viện");
                    }else{
                        var x = confirm("Bạn có chắc muốn xóa");
                        if(x==true){
                            var Id = $(this).parents('tr').children(":first").text();
                            // alert(Id);
                            $.ajax({
                                type: "post",
                                url: '../data/qlsach/theloai/listtheloai.php',
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