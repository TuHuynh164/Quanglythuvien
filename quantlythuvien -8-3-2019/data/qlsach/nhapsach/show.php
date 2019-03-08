<?php
    include "../../data.php";
    $dt = new database();
    if(!empty($_POST["a"]) && isset($_POST["b"]) && isset($_POST["c"]) && isset($_POST["d"]) && isset($_POST["e"])){
        echo "<br>";
        echo "aaaaaaaaaaaaa";
        $ma_phieu = $_POST["a"];
        $nguoi_nhap = $_POST["b"];
        $chung_tu = $_POST["c"];
        $ngay_nhap = $_POST["d"];
        $Ghi_chu = $_POST["e"];
    }
    if(!empty($_POST["tensach"]) && !empty($_POST["ISBN"]) && !empty($_POST["tai_ban"]) && !empty($_POST["page"]) && !empty($_POST["so_luong"])){
        $tensach = $_POST["tensach"];
        $ISBN = $_POST["ISBN"];
        $tai_ban = $_POST["tai_ban"];
        $page = $_POST["page"];
        $so_luong = $_POST["so_luong"];

        print_r($_POST["tensach"]);
        print_r($_POST["ISBN"]);
        print_r($_POST["tai_ban"]);
        print_r($_POST["page"]);
        print_r($_POST["so_luong"]);
    }


?>
<div class="container-fluid  dashboard-content">  
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="breadcrumb-link list_book cursor">Quảng lý sách</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link list_book cursor">Danh sách tên sách</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            
            <div class="card">
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

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>