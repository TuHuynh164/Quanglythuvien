                        
<?php
include "../../data.php";
$dt = new database();
if(!empty($_POST["name"]) && !empty($_POST["diachi"]) && isset($_POST["lienhe"]) && isset($_POST["detail"])){
    $diachi = $_POST["diachi"];
    $name = $_POST["name"];
    $lienhe = $_POST["lienhe"];
    $detail = $_POST["detail"];
    $dt->command("INSERT INTO `nha_xuat_ban` (`Id`, `Ten`, `Dia_chi`, `Lien_he`, `Thong_tin`) VALUES (NULL, '$name', '$diachi', '$lienhe', '$detail');");
}
?>
                        <div id="status2"></div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="tennxb">Tên nhà xuất bản</label>
                                <input type="text" class="form-control" id="tennxb" name="ten" placeholder="Tên nhà xuất bản" value="" autocomplete="off" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <label for="diachi">Địa chỉ</label>
                                <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ" value="" autocomplete="off" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <label for="lienhe">Liên hệ</label>
                                <input type="text" class="form-control" id="lienhe" name="lienhe" placeholder="Liên hệ" autocomplete="off" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="thongtinnxb">Thông tin</label>
                                    <textarea class="form-control" id="thongtinnxb" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
<script>
    var secondElement = new Choices('#mutiadd2', { allowSearch: false }).setValue();
    $(document).ready(function(){
        $("input").click(function(){
            $(this).next().show();
            $(this).next().hide();
        });
    });

    function submitform1(){
        var name = $("input[name='ten']").val();
        var diachi = $("input[name='diachi']").val();
        var lienhe = $("input[name='lienhe']").val();
        var detail = $("#thongtinnxb").val();
        // alert(detail);
        if(name != '' && diachi != '' && lienhe != ""){
            $.ajax({
                type: 'post',
                url: '../data/qlsach/nhaxuatban/addnxb.php',
                data:{
                    name:name,
                    diachi:diachi,
                    lienhe:lienhe,
                    detail:detail
                },
                cache: false,
                success: function (html) {
                    if(tap2 == "qlsach/nhaxuatban/listnxb.php"){
                        $('#formloading1').html(html);
                        $("#status2").append("<p style='color:green'>Thêm thành công! <br> Tiếp tục thêm hoặc thoát</p>");
                        var first = $("table").children(":first");
                        first.after("<tr style='color:green'> <td> setting... </td> <td>"+name+"</td> <td>"+diachi+"</td> <td>"+lienhe+"</td> <td>"+detail+"</td></tr>");
                    }else{
                        $("#nxb").val(name);
                        $(".close2").click();
                    }
                }
            });
            return false;
        }else{
            $("#status2").children().remove();
            $("#status2").append("<p style='color:red'>Thêm không thành công! <br> Nhập biểu mẫu theo đúng chỉ dẫn để tránh lỗi</p>");
        }
        return false;
    }
</script>