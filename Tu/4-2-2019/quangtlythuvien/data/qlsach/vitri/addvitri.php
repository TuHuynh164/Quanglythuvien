
<?php 
    include "../../data.php";
    $dt = new database();
    if(!empty($_POST["vitri"])){
        $vitri = $_POST["vitri"];
        $dt->command("INSERT INTO `vi_tri` (`Id`, `Thong_tin`) VALUES (NULL, '$vitri');");
    }
?>
<div id="status2"></div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <label for="vitri">Vị trí mới</label>
        <input type="text" class="form-control" name="vitri" id="vitri"
            placeholder="Thêm thông tin vị trí mới" value="" autocomplete="off" required>
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
        var vitri = $("input[name='vitri']").val();
        if(vitri != ''){
            $.ajax({
                type: 'post',
                url: '../data/qlsach/vitri/addvitri.php',
                data:{
                    vitri:vitri,
                },
                cache: false,
                success: function (html) {
                    if(tap2 == "qlsach/vitri/listvitri.php"){
                        $('#formloading1').html(html);
                        $("#status2").append("<p style='color:green'>Thêm thành công! <br> Tiếp tục thêm hoặc thoát</p>");
                        var first = $("table").children(":first");
                        first.after("<tr style='color:green'> <td> setting... </td> <td>"+vitri+"</td> </tr>")
                    }else{
                        $("#vitri").val(vitri);
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