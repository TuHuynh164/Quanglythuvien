<?php 
    include "../../data.php";
    $dt = new database();
    if(isset($_POST["Id"])){
        $Id = $_POST["Id"];
        // $dt->select("SELECT Thong_tin FROM vi_tri WHERE Id='$Id'");
        // $vt = $dt->fetch();
        // $dt->command("INSERT INTO `vi_tri` (`Id`, `Thong_tin`) VALUES (NULL, '$vitri');");
    }
    if(isset($_POST["name"])){
        $name = $_POST["name"];
    }
    if(!empty($_POST["vitri"])){
        $vitri = $_POST["vitri"];
        $dt->select("SELECT Id FROM vi_tri WHERE Thong_tin='$vitri'");
        $idvt = $dt->fetch();
        if($idvt!=0){
            $dt->command("UPDATE `loai_sach` SET `Ma_vi_tri` = '$idvt[Id]' WHERE `loai_sach`.`Id` = '$Id';");
        }else{
            // $message = "wrong answer";
            // echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
?>
<div id="status2"></div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <label for="vitri">Duy chuyển từ <?php echo $name; ?> tới:</label>
            <input list="list3" type="text" class="form-control" id="vitri" value="" placeholder="Tìm..." name="vitri" autocomplete="off" required>
            <datalist id="list3">
            <?php
                $dt->select("SELECT Thong_tin FROM vi_tri ORDER BY Thong_tin ASC ");
                while ($r=$dt->fetch()) {
                    echo "<option value='$r[Thong_tin]'>";
                }
            ?>
            </datalist> 
            <div class="invalid-feedback">
                Không được bỏ trống
            </div>
    </div>
</div>
<div class="card"></div>
<script>
    function submitform(){
        var vitri = $("input[name='vitri']").val();
        // alert(vitri);
        if(vitri != ''){
            var Id = "<?php echo $Id; ?>"
            var name = "<?php echo $name; ?>"
            $.ajax({
                type: 'post',
                url: '../data/qlsach/vitri/changevt.php',
                data:{
                    vitri:vitri,
                    Id:Id
                },
                cache: false,
                success: function (html) {
                    profile(name, 'vitri/profilevitri.php');
                    $(".close").click();
                }
            });
            return false;
        }else{
            $("#status2").children().remove();
            $("#status2").append("<p style='color:red'>Thêm không thành công! <br> Nhập biểu mẫu theo đúng chỉ dẫn để tránh lỗi</p></p>");
        }
    }
</script>