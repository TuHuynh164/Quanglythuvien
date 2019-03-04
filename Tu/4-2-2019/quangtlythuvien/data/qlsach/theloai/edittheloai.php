<?php
include "../../data.php";
$dt = new database();
if(isset($_POST["editname"])){
    $name = $_POST["editname"];
}
if(!empty($_POST["name"]) && !empty($_POST["code"])){
    $code = $_POST["code"];
    $name = $_POST["name"];
    if(isset($_POST["id"])){
        $id = $_POST["id"];
    }
    $dt->command("UPDATE `the_loai` SET `Ten` = '$name', `Ma_chuyen_muc` = '$code' WHERE `the_loai`.`Id` = '$id';");
    // $dt->command("INSERT INTO `the_loai` (`Id`, `Ten`, `Ma_chuyen_muc`) VALUES (NULL, '$name', '$code');");
}
$dt->select("SELECT * FROM the_loai WHERE Ten ='$name'");
$tl = $dt->fetch();
$idtl = $tl["Id"];
?>
<div id="status2"></div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <label for="tentheloai">Tên thể loại</label>
        <input type="text" class="form-control" name="ten" id="tentheloai"
            placeholder="Tên thể loại" value="<?php echo $tl["Ten"]; ?>" autocomplete="off" required>
        <div class="invalid-feedback">
            Thêm thông tin
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
        <label for="machuyenmuc">Mã chuyên mục</label>
        <input type="text" class="form-control" name="ma" id="machuyenmuc"
            placeholder="Mã chuyên mục" value="<?php echo $tl["Ma_chuyen_muc"]; ?>" autocomplete="off" required>
        <div class="invalid-feedback">
            Thêm thông tin
        </div>
    </div>
</div>
<div class="card"></div>
<script>
    function submitform(){
        var name = $("input[name='ten']").val();
        var code = $("input[name='ma']").val();
        if(name != '' && code != ''){
            editname = "<?php echo $name; ?>"
            Id = "<?php echo $idtl; ?>"
            $.ajax({
                type: 'post',
                url: '../data/qlsach/theloai/edittheloai.php',
                data:{
                    name:name,
                    code:code,
                    editname:editname,
                    id:Id
                },
                cache: false,
                success: function (html) {
                    // $('#formloading1').html(html);
                    profile(name, 'theloai/profiletheloai.php');
                    $(".close").click();
                    // alert("adasdas");
                }
            });
            return false;
        }else{
            $("#status2").children().remove();
            $("#status2").append("<p style='color:red'>Thêm không thành công! <br> Nhập biểu mẫu theo đúng chỉ dẫn để tránh lỗi</p></p>");
        }
        return false;
    }
</script>
