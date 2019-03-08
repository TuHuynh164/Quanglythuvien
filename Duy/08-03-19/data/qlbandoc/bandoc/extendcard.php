<?php
include "../../data.php";
$dt = new database();
if(isset($_POST['editname'])){
    $id = $_POST['editname'];
    $dt->select("SELECT * FROM `the_thanh_vien` WHERE So_the =$id");
    // echo "SELECT * FROM `nguoi_muon` WHERE Id =$id";
    $r=$dt->fetch();
}



if(isset($_POST['card_code']) && isset($_POST["start_day"]) && isset($_POST["end_day"])){

    $card_code = $_POST['card_code'];
    $start_day = $_POST["start_day"];
    $end_day = $_POST["end_day"];
 
    $dt->command("UPDATE `the_thanh_vien` SET `Ngay_bat_dau` = '$start_day',`Ngay_het_han` = '$end_day' WHERE `the_thanh_vien`.`So_the` = '$card_code';");
    // echo "UPDATE `the_thanh_vien` SET `Ngay_bat_dau` = '$start_day',`Ngay_het_han` = '$end_day' WHERE `the_thanh_vien`.`So_the` = '$card_code';";
}
?>                      
                        <div id="status2"></div>
                        <div class="row">
                            <div class="offset-xl-3 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <label for="card_code">Mã thẻ</label>
                                <input type="text" class="form-control" autocomplete="off" name="card_code" id="card_code"
                                     value="<?=$r['So_the']?>" disabled=''>
                            </div>
                            <div class="offset-xl-3 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <label for="start_day">Ngày bắt đầu</label>
                                <input type="date" class="form-control" autocomplete="off" name="start_day" id="start_day"
                                     value="<?=$r['Ngay_bat_dau']?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="offset-xl-3 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <label for="end_day">Ngày kết thúc</label>
                                <input type="date" class="form-control" autocomplete="off" name="end_day" id="end_day"
                                     value="<?=$r['Ngay_het_han']?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                        </div>
                        <br><br>

<script>
    var secondElement = new Choices('#demo-2', { allowSearch: false }).setValue();
    $(document).ready(function(){
        $("input").click(function(){
            $(this).next().show();
            $(this).next().hide();
        });
    });
    function submitform(){
        var card_code = $("input[name='card_code']").val();
        var start_day = $("input[name='start_day']").val();
        var end_day = $("input[name='end_day']").val();

        if(start_day != '' && end_day != ''){
            $.ajax({
                type: 'post',
                url: '../data/qlbandoc/bandoc/extendcard.php',
                data:{

                    card_code:card_code,
                    start_day:start_day,
                    end_day:end_day

                },
                cache: false,
                success: function (html) {

                    // $('#formloading1').html(html);
                    // $("#status2").append("<p style='color:green'>Sửa thành công! <br> Tiếp tục thêm hoặc thoát</p>");
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
