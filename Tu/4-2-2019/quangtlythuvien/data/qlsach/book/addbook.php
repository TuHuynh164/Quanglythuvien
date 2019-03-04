

<?php
    include "../../data.php";
    $dt = new database();
    function getyear(){
        $date = getdate();
        for($i = 1980; $i <= $date["year"];$i++){
            echo "<option value='$i'> $i </option>";
        }
    }
    function ten_tacgia(){
        $sl = new database();
        $sl->select("SELECT tg.Id, tg.Ten_tac_gia tacgia FROM tac_gia tg ORDER BY tg.Ten_tac_gia ASC ");
        ?>
        <label for="tacgia">Tác giả</label>
        <select name="tacgia" id="tacgia" class="form-control" placeholder="Tìm...." multiple>
        <?php

            while ($r=$sl->fetch()) {
                echo "<option value='$r[tacgia]'>$r[tacgia]</option>";
            }
        ?>
        </select>
        <div class="invalid-tacgia" style="color:#DC3545; margin-top:-20px;font-weight:100;font-size:11px;display:none">
            Please provide a valid city.
        </div>
        <?php
    }
    if(!empty($_POST["ten"]) && !empty($_POST["nxb"]) && !empty($_POST["theloai"]) && !empty($_POST["tacgia"]) && !empty($_POST["gia"]) && !empty($_POST["nam"]) && isset($_POST["vitri"]) && isset($_POST["tomtat"]) && isset($_POST["size"])){
        $ten = $_POST["ten"];
        $nxb = $_POST["nxb"];
        $theloai = $_POST["theloai"];
        $tacgia = $_POST["tacgia"];
        $gia = $_POST["gia"];
        $nam = $_POST["nam"];
        $vitri = $_POST["vitri"];
        $tomtat = $_POST["tomtat"];
        $size = $_POST["size"];
        $checking= true;
        $dt->select("SELECT Id FROM nha_xuat_ban WHERE Ten='$nxb';");
        $nxb=$dt->fetch();
        if($nxb == 0){
            $checking= false;
        }
        $dt->select("SELECT Id FROM the_loai WHERE Ten='$theloai';");
        $theloai=$dt->fetch();
        if($theloai == 0){
            $checking= false;
        }
        $dt->select("SELECT Id FROM vi_tri WHERE Thong_tin='$vitri';");
        $vitri=$dt->fetch();
        if($checking == true){
            $dt->command("INSERT INTO `loai_sach` (`Id`, `Ten_sach`, `Ma_the_loai`, `Ma_NXB`, `Nam_xuat_ban`, `Kho_sach`, `Ma_vi_tri`, `Gia_sach`, `Tom_tat_noi_dung`) VALUES (NULL, '$ten', '$theloai[Id]', '$nxb[Id]', '$nam', '$size', '$vitri[Id]', '$gia', '$tomtat');");
            $dt->select("SELECT Id FROM loai_sach WHERE Ten_sach='$ten' AND Ma_the_loai='$theloai[Id]' AND Ma_NXB='$nxb[Id]';");
            $ls = $dt->fetch();
            foreach($tacgia as $value){
                $dt->select("SELECT Id FROM tac_gia WHERE Ten_tac_gia='$value';");
                $tg=$dt->fetch();
                $dt->command("INSERT INTO `ls_tg` (`Ma_ls`, `Ma_tg`) VALUES ('$ls[Id]', '$tg[Id]');");
            }
            echo "<p style='color:green'>Thêm thành công! <br> Tiếp tục thêm hoặc thoát</p>";
            // echo $theloai['Id'];
            // echo $nxb['Id'];

        }else{
            echo "<p style='color:red'>Thêm không thành công! <br> Hãy chọn chính xác các lựa chọn trong ô để tránh lỗi.</p>";
        }
    }

?>
                        <div id="status"></div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom01">Tên sách</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Tên sách" name="ten" value="" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Thông tin bắt buộc
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                        <label for="nxb">Nhà xuất bản</label>
                                        <input list="list1" type="text" class="form-control" id="nxb" placeholder="Tìm..." name="nxb" autocomplete="off" required>
                                        <datalist id="list1">
                                        <?php
                                            $dt->select("SELECT nxb.Ten FROM nha_xuat_ban nxb ORDER BY nxb.Ten ASC ");
                                            while ($r=$dt->fetch()) {
                                                echo "<option value='$r[Ten]'>";
                                            }
                                        ?>
                                        </datalist> 
                                        <div class="invalid-feedback">
                                        Thông tin bắt buộc
                                        </div>
                                        <!-- <div class="valid-feedback">
                                            Looks good!
                                        </div> -->
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card"></div>
                                        <button type="button" class="btn btn-outline-primary add_nxb2" data-dismiss="modal" data-toggle="modal" data-target="#myModal2"><i class="far fa-plus-square"></i> Thêm thông tin NXB mới</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <label for="theloai">Thể loại</label>
                                        <input list="list2" type="text" class="form-control" id="theloai" placeholder="Tìm..." name="theloai" autocomplete="off" required>
                                        <datalist id="list2">
                                        <?php
                                            $dt->select("SELECT Ten FROM the_loai ORDER BY Ten ASC ");
                                            while ($r=$dt->fetch()) {
                                                echo "<option value='$r[Ten]'>";
                                            }
                                        ?>
                                        </datalist> 
                                        <div class="invalid-feedback">
                                        Thông tin bắt buộc
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card"></div>
                                        <button type="button" class="btn btn-outline-primary add_theloai2" data-dismiss="modal" data-toggle="modal" data-target="#myModal2"><i class="far fa-plus-square"></i> Thêm thông tin thể loại</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <label for="vitri">Vị trí trong thư viện</label>
                                        <input list="list3" type="text" class="form-control" id="vitri" placeholder="Tìm..." name="vitri" autocomplete="off">
                                        <datalist id="list3">
                                        <?php
                                            $dt->select("SELECT Thong_tin FROM vi_tri ORDER BY Thong_tin ASC ");
                                            while ($r=$dt->fetch()) {
                                                echo "<option value='$r[Thong_tin]'>";
                                            }
                                        ?>
                                        </datalist> 
                                        <div class="invalid-feedback">
                                        Thông tin bắt buộc
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card"></div>
                                        <button type="button" class="btn btn-outline-primary add_vitri2" data-dismiss="modal" data-toggle="modal" data-target="#myModal2"><i class="far fa-plus-square"></i> Thêm thông tin vị trí mới</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> 
                                <div class="row">
                                    <!-- ============================================================== --> 
                                    <!-- boxed multiselect  -->
                                    <!-- ============================================================== -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"  id="test">
                                        <?php
                                            ten_tacgia();
                                        ?>
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- end boxed multiselect  -->
                                    <!-- ============================================================== -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card"></div>
                                        <button type="button" class="btn btn-outline-primary add_tacgia2" data-dismiss="modal" data-toggle="modal" data-target="#myModal2"><i class="far fa-plus-square"></i> Thêm thông tin tác giả mới</button>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="form-row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="nam">Năm xuất bản</label>
                                <!-- <input type="text" class="form-control" id="validationCustom03"
                                    placeholder="City" required> -->
                                <select name="nam" class="form-control" id="nam" required>
                                    <option value="" hidden selected> Chọn năm</option>
                                    <?php
                                        getyear();
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                Thông tin bắt buộc
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="validationCustom04">Giá sách</label>
                                <input type="number" name="gia" class="form-control" min=0 id="validationCustom04"
                                    placeholder="VNĐ" autocomplete="off" required>
                                <div class="invalid-feedback">
                                Thông tin bắt buộc
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="validationCustom05">Kích thước</label>
                                <input type="text" name="size" class="form-control" id="validationCustom05"
                                    placeholder="cm*cm" autocomplete="off">
                                <div class="invalid-feedback">
                                Thông tin bắt buộc
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="tomtat">Tóm tắt nội dung</label>
                                    <textarea class="form-control" id="tomtat" rows="3"></textarea>
                                </div>
                            </div>
                            
<script>
    var mutiselect = $("#test").html();
    var savetext = "123";


    function submitform(){
        var ten = $("input[name='ten']").val();
        var nxb = $("input[name='nxb']").val();
        var theloai = $("input[name='theloai']").val();
        var vitri = $("input[name='vitri']").val();
        var tacgia = $("select[name='tacgia']").val();
        var nam = $("select[name='nam']").children("option:selected").val();
        var gia = $("input[name='gia']").val();
        var size = $("input[name='size']").val();
        var tomtat = $("#tomtat").val();
        if(ten !="" && nxb !="" && theloai !="" && tacgia !="" && nam !="" && gia !=""){
            $.ajax({
                type: 'post',
                url: '../data/qlsach/book/addbook.php',
                data: {
                    ten: ten,
                    nxb: nxb,
                    theloai: theloai,
                    vitri: vitri,
                    tacgia: tacgia,
                    nam: nam,
                    gia: gia,
                    size:size,
                    tomtat: tomtat
                },
                cache: false,
                success: function (html) {
                    console.log(tacgia);
                    $('#formloading1').html(html);
                }
            })
            return false;
        }else{
            $("#status").children().remove();
            $("#status").append("<p style='color:red'>Thêm không thành công! <br> Nhập biểu mẫu theo đúng chỉ dẫn để tránh lỗi</p>");
            if(tacgia ==""){
                $(".invalid-tacgia").fadeIn(0);
            }
            alert("Lỗi");
        }
        return false;
    }

    
    $(document).ready(function(){
        $("input").click(function(){
            $(this).next().show();
            $(this).next().hide();
        });
        $(".add_tacgia2").click(function(){
            savetext = $("#tacgia").html();
            // alert(mutiselect);
        })
    });
    function updateselect(){
        var secondElement = new Choices('#tacgia', { allowSearch: false }).setValue();
        return secondElement;
    }
    updateselect();
</script>

<?php

?>
