<?php
include "../../data.php";
$dt = new database();
if(!empty($_POST["name"]) && !empty($_POST["code"])){
    $code = $_POST["code"];
    $name = $_POST["name"];
    $dt->command("INSERT INTO `the_loai` (`Id`, `Ten`, `Ma_chuyen_muc`) VALUES (NULL, '$name', '$code');");
}
?>
<div id="status2"></div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <label for="tentheloai">Tên thể loại</label>
        <input type="text" class="form-control" name="ten" id="tentheloai"
            placeholder="Tên thể loại" value="" autocomplete="off" required>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Thêm thông tin
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
        <label for="machuyenmuc">Mã chuyên mục</label>
        <input type="text" class="form-control" name="ma" id="machuyenmuc"
            placeholder="Mã chuyên mục" value="" autocomplete="off" required>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Thêm thông tin
        </div>
    </div>
</div>
<div class="card"></div>
<script>
    function submitform1(){
        var name = $("input[name='ten']").val();
        var code = $("input[name='ma']").val();
        if(name != '' && code != ''){
            $.ajax({
                type: 'post',
                url: '../data/qlsach/theloai/addtheloai.php',
                data:{
                    name:name,
                    code:code
                },
                cache: false,
                success: function (html) {
                    if(tap2 == "qlsach/theloai/listtheloai.php"){
                        $('#formloading1').html(html);
                        $("#status2").append("<p style='color:green'>Thêm thành công! <br> Tiếp tục thêm hoặc thoát</p>");
                        var first = $("table").children(":first");
                        first.after("<tr style='color:green'> <td> setting... </td> <td>"+name+"</td> <td>"+code+"</td> <td></td> </tr>")
                    }else{
                        $("#theloai").val(name);
                        $(".close2").click();
                    }
                }
            });
            return false;
        }else{
            $("#status2").children().remove();
            $("#status2").append("<p style='color:red'>Thêm không thành công! <br> Nhập biểu mẫu theo đúng chỉ dẫn để tránh lỗi</p></p>");
        }
    }
</script>
