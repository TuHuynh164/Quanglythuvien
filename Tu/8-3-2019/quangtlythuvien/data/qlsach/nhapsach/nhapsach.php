<?php
    include "../../data.php";
    $dt = new database();
    // if(!empty($_POST["a"]) && isset($_POST["b"]) && isset($_POST["c"]) && isset($_POST["d"]) && isset($_POST["e"])){
    //     echo "<br>";
    //     echo "aaaaaaaaaaaaa";
    // }
    // if(!empty($_POST["tensach"]) && !empty($_POST["ISBN"]) && !empty($_POST["tai_ban"]) && !empty($_POST["page"]) && !empty($_POST["so_luong"])){
    //     print_r($_POST["tensach"]);
    //     print_r($_POST["ISBN"]);
    //     print_r($_POST["tai_ban"]);
    //     print_r($_POST["page"]);
    //     print_r($_POST["so_luong"]);
    // }


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
                                <li class="breadcrumb-item"><a class="breadcrumb-link nhapsach cursor">Cập nhập sách mới</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>  

        <div class="row">
            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card" style="background:#C0C6FF">
                    <!-- <h5 class="card-header" >Bootstrap Validation Form</h5> -->
                    <div class="card-body">
                        <form class="needs-validation">
                            <div class="card">
                                <h5 class="card-header  bg-info text-white">Thông tin về phiếu nhập</h5>
                                <div class="card-body">
                                <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                            <label for="ma_phieu">Mã phiếu</label>
                                            <input type="number" class="form-control required" id="ma_phieu" placeholder="Mã phiếu" autocomplete="off" value="" required>
                                            <div class="invalid-feedback a">
                                                Thông tin bắt buộc.
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                            <label for="nguoi_nhap">Người nhập</label>
                                            <input type="text" class="form-control" id="nguoi_nhap" placeholder="Người nhập"  value="Tên nhân viên" readonly>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                            <label for="chung_tu">Số chứng từ</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="chung_tu" placeholder="Không bắt buộc" autocomplete="off" value=''>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                            <label for="ngay_nhap">Ngày nhập</label>
                                            <div class="input-group">
                                                <input type="datetime-local " class="form-control" id="ngay_nhap" value='<?php echo date("d/m/Y"); ?>' aria-describedby="inputGroupPrepend" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="Ghi_chu">Ghi chú</label>
                                                <textarea class="form-control" id="Ghi_chu" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb -->
                            <div class="card">
                                <h5 class="card-header  bg-info text-white" style="background:#C0C6FF">Chi tiết phiếu nhập   <button type="button" style="float:right;margin-right:50px;" class="btn btn-primary add_sach" data-toggle="modal" data-target="#myModal1"><i class="far fa-plus-square"></i> Thêm tên sách mới</button></h5>
                                
                                <div class="card-body" id="copy"> 
                                    <div class="form-row">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mb-2">
                                            <label for="validationCustom03">Chọn tên sách</label>
                                            <input list="ten-nxb" type="text" class="form-control tensach required" id="theloai" placeholder="Tìm..." name="" autocomplete="off" required>
                                            <datalist id="ten-nxb">
                                                <!-- <option value='$r[loaisach] / NXB: $r[tennxb]'> -->
                                                <?php
                                                    $dt->select("SELECT ls.Ten_sach loaisach, nxb.Ten tennxb FROM loai_sach ls INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id ORDER BY loaisach ASC");
                                                    while ($r=$dt->fetch()) {
                                                        echo "<option value='$r[loaisach] - $r[tennxb]'>";
                                                    }
                                                ?>
                                            </datalist> 
                                            <div class="invalid-feedback">
                                                Thông tin bắt buộc.
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-2">
                                            <label for="validationCustom03">Mã ISBN</label>
                                            <input type="number" class="form-control ISBN required" id="ISBN" autocomplete="off" placeholder="Mã ISBN" required>
                                            <div class="invalid-feedback">
                                                Thông tin bắt buộc.
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-2">
                                            <label for="validationCustom03">Số lần tái bản</label>
                                            <input type="number" class="form-control tai_ban required" id="tai_ban" autocomplete="off" placeholder="Số lần tái bản" required>
                                            <div class="invalid-feedback">
                                                Thông tin bắt buộc.
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-2">
                                            <label for="validationCustom03">Số trang sách</label>
                                            <input type="number" class="form-control page required" id="page" autocomplete="off" placeholder="Số trang sách" required>
                                            <div class="invalid-feedback">
                                                Thông tin bắt buộc.
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-2">
                                            <label for="validationCustom03">Số lượng</label>
                                            <input type="number" class="form-control so_luong required" id="so_luong" autocomplete="off" placeholder="Số lượng" required>
                                            <div class="invalid-feedback">
                                                Thông tin bắt buộc.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- //////////////////////////////// -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button type="button" style="font-size:20px; margin: 10px;" class="btn btn-outline-primary them"><i class="fas fa-plus"></i></button>
                                    <button type="button" style="font-size:20px; margin: 10px; display:none;" class="btn btn-outline-primary bot"><i class="fas fa-times"></i></button>
                                </div>
                                
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <button class="btn btn-primary formnhapsach" type="submit">Submit form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end validation form -->
            <!-- ============================================================== -->
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var div = $("#copy").html();
            $(".them").click(function() {
                var a = $(this).parents(".card").find(".card-body").last();
                var b = $(this).parents(".card").find(".card-body")
                a.after("<div class='card-body'> </div>");
                $(this).parents(".card").find(".card-body").last().append(div).hide(0,function(){
                    $(this).show(300);
                });
                if( b.length >= 3){
                    $(".bot").fadeIn();
                }
            })
            $(".bot").click(function(){
                var a = $(this).parents(".card").find(".card-body").last();
                var b = $(this).parents(".card").find(".card-body")
                a.hide(300,function(){
                    $(this).remove();
                });
                if(b.length <= 4){
                    $(".bot").fadeOut(0);
                }
            })
            // $("#ma_phieu").keyup(function () { 
            //     $(".a").hide(0);
            //     $(this).css("border", "1px solid #D2D2E4");
            // });
            // $(".required").each(function () {
                
            // });
            $(".formnhapsach").click(function(){
                return formnhapsach();
            })
        });
        function formnhapsach(){
            var flag = true;
            $(".required").each(function () {
                var abc = $(this).val();
                if(abc == ''){
                    $(this).css("border", "1px solid #DC3545").parent().find(".invalid-feedback").show();
                    flag = false;
                }
                $(this).keyup(function () {
                    $(this).css("border", "1px solid #D2D2E4").parent().find(".invalid-feedback").hide(0);
                });
            });
            if(flag == true){
                var a = $("#ma_phieu").val();
                var b = $("#nguoi_nhap").val();
                var c = $("#chung_tu").val()
                var d = $("#ngay_nhap").val();
                var e = $("#Ghi_chu").val();
                // console.log(a+b+c+d+e);
                var in1 = $(".tensach");
                var in2 = $(".ISBN");
                var in3 = $(".tai_ban");
                var in4 = $(".page");
                var in5 = $(".so_luong");
                var tensach = [];
                var ISBN = [];
                var tai_ban = [];
                var page = [];
                var so_luong = [];
                // console.log(in1.length);
                for(let i = 0; i < in1.length; i++){
                    tensach[i] = in1.eq(i).val();
                    ISBN[i] = in2.eq(i).val();
                    tai_ban[i] = in3.eq(i).val();
                    page[i] = in4.eq(i).val();
                    so_luong[i] = in5.eq(i).val();
                }
                // console.log(tensach);
                $.ajax({
                    type: "post",
                    url: '../data/qlsach/nhapsach/show.php',
                    data:{
                        a:a,
                        b:b,
                        c:c,
                        d:d,
                        e:e,
                        tensach:tensach,
                        ISBN:ISBN,
                        tai_ban:tai_ban,
                        page:page,
                        so_luong:so_luong
                    },
                    cache: false,
                    success: function (html){
                        $('._content').html(html);
                        // console.log(a);
                        // console.log(b);
                        // console.log(c);
                        // console.log(d);
                        // console.log(e);
                        // console.log(tensach);
                        // console.log(ISBN);
                        // console.log(tai_ban);
                        // console.log(page);
                        // console.log(so_luong);
                    }
                });
            }
            return false;
        }
    
    </script>