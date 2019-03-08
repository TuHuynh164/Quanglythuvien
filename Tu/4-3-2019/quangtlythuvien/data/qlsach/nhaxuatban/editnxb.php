<?php
include "../../data.php";
$dt = new database();
if(isset($_POST["editname"])){
    $name = $_POST["editname"];
}
if(!empty($_POST["name"]) && !empty($_POST["diachi"]) && !empty($_POST["lienhe"]) && isset($_POST["detail"])){
    $diachi = $_POST["diachi"];
    $name = $_POST["name"];
    $lienhe = $_POST["lienhe"];
    $detail = $_POST["detail"];
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        // echo $id;
    }
    $dt->command("UPDATE `nha_xuat_ban` SET `Ten` = '$name', `Dia_chi` = '$diachi', `Lien_he` = '$lienhe', `Thong_tin` = '$detail' WHERE `nha_xuat_ban`.`Id` = '$id';");
}
// echo $name;
$dt->select("SELECT * FROM nha_xuat_ban WHERE Ten ='$name'");
$nxb = $dt->fetch();
$idnxb = $nxb["Id"];
?>
                        <div id="status2"></div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="tennxb">Tên nhà xuất bản</label>
                                <input type="text" class="form-control" id="tennxb" name="ten" placeholder="Tên nhà xuất bản" value='<?php echo $nxb["Ten"]; ?>' autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Không được bỏ trống
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <label for="diachi">Địa chỉ</label>
                                <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ" value="<?php echo $nxb["Dia_chi"]; ?>" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Không được bỏ trống
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <label for="lienhe">Liên hệ</label>
                                <input type="text" class="form-control" id="lienhe" name="lienhe" placeholder="Liên hệ" autocomplete="off" value="<?php echo $nxb["Lien_he"]; ?>" required>
                                <div class="invalid-feedback">
                                    Không được bỏ trống
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="thongtinnxb">Thông tin</label>
                                    <textarea class="form-control" id="thongtinnxb" rows="3"> <?php echo $nxb["Thong_tin"]; ?> </textarea>
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

    function submitform(){

        var name = $("input[name='ten']").val();
        var diachi = $("input[name='diachi']").val();
        var lienhe = $("input[name='lienhe']").val();
        var detail = $("#thongtinnxb").val();
        // alert(detail);
        if(name != '' && diachi != '' && lienhe != ""){
            editname = "<?php echo $name; ?>"
            Id = "<?php echo $idnxb; ?>"
            $.ajax({
                type: 'post',
                url: '../data/qlsach/nhaxuatban/editnxb.php',
                data:{
                    name:name,
                    diachi:diachi,
                    lienhe:lienhe,
                    detail:detail,
                    editname:editname,
                    id:Id
                },
                cache: false,
                success: function (html) {
                    // alert("ádasdsa");
                    // $('#formloading1').html(html);
                    profile(name, 'nhaxuatban/profilenxb.php');
                    $(".close").click();
                    
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