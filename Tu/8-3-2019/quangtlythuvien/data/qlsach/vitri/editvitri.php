
<?php 
    include "../../data.php";
    $dt = new database();
    if(isset($_POST["editname"])){
        $name = $_POST["editname"];
    }
    if(!empty($_POST["vitri"])){
        $vitri = $_POST["vitri"];
        if(isset($_POST["id"])){
            $id = $_POST["id"];
        }
        $dt->command("UPDATE `vi_tri` SET `Thong_tin` = '$vitri' WHERE `vi_tri`.`Id` = '$id';");
        // $dt->command("INSERT INTO `vi_tri` (`Id`, `Thong_tin`) VALUES (NULL, '$vitri');");
    }
    $dt->select("SELECT * FROM vi_tri WHERE Thong_tin ='$name'");
    $vt = $dt->fetch();
    $idvt = $vt["Id"];
?>
<div id="status2"></div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <label for="vitri">Vị trí mới</label>
        <input type="text" class="form-control" name="vitri" id="vitri" value="<?php echo $vt["Thong_tin"]; ?>"
            placeholder="Thêm thông tin vị trí mới" value="" autocomplete="off" required>
        <div class="invalid-feedback">
            Thêm thông tin
        </div>
    </div>
</div>
<div class="card"></div>
<script>
    function submitform(){
        
        var vitri = $("input[name='vitri']").val();
        if(vitri != ''){
            editname = "<?php echo $name; ?>"
            Id = "<?php echo $idvt; ?>"
            $.ajax({
                type: 'post',
                url: '../data/qlsach/vitri/editvitri.php',
                data:{
                    vitri:vitri,
                    editname:editname,
                    id:Id
                },
                cache: false,
                success: function (html) {
                    // alert("ádasd");
                    
                    profile(vitri, 'vitri/profilevitri.php');
                    // $('#formloading1').html(html);
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