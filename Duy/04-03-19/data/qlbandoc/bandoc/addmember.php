<?php
include "../../data.php";
$dt = new database();
if(isset($_POST["member_name"]) && isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["id_number"]) && isset($_POST["start_day"]) && isset($_POST["end_day"])){

    $member_name = $_POST["member_name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $note = $_POST["note"];
    $id_number = $_POST["id_number"];
    $start_day = $_POST["start_day"];
    $end_day = $_POST["end_day"];

    $dt->command("INSERT INTO `nguoi_muon` (`Ten`, `Dia_chi`, `Sdt`, `Email`, `Ghi_chu`, `CMND`) VALUES ('$member_name', '$address', '$phone', '$email', '$note', '$id_number');");
    $dt->command("INSERT INTO `the_thanh_vien` (`So_the`, `Ngay_bat_dau`, `Ngay_ket_thuc`, `Trang_thai`) VALUES ('$id_number', '$start_day', '$end_day', '0' );");
}
?>
                        <div id="status2"></div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="member_name">Tên bạn đọc*</label>
                                <input type="text" class="form-control" autocomplete="off" name="member_name" id="member_name"
                                    placeholder="Tên" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="address">Địa chỉ*</label>
                                <input type="text" class="form-control" autocomplete="off" name="address" id="address"
                                    placeholder="Địa chỉ" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="phone">Số điện thoại*</label>
                                <input type="number" class="form-control" autocomplete="off" name="phone" id="phone"
                                    placeholder="Số điện thoại" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" autocomplete="off" name="email" id="email"
                                    placeholder="Email" value="">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="note">Ghi chú</label>
                                <input type="text" class="form-control" autocomplete="off" name="note" id="note"
                                    placeholder="Ghi chú" value="">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="id_number">CMND*</label>
                                <input type="text" class="form-control" autocomplete="off" name="id_number" id="id_number"
                                    placeholder="CMND" value="">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>   
                        </div>
                        <br>
                        <div class="form-row">
<!--                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="validationCustom03">Số thẻ</label>
                                <input type="text" class="form-control" id="validationCustom03"
                                    placeholder="City" required>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div> -->
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="start">Ngày bắt đầu*</label>
                                <input type="date" class="form-control" name="start" id="start"
                                    placeholder="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="end">Ngày hết hạn*</label>
                                <input type="date" class="form-control" name="end" id="end"
                                    placeholder="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid zip.
                                </div>
                            </div>
<!--                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                            </div> -->
<script>
    var secondElement = new Choices('#demo-2', { allowSearch: false }).setValue();
    $(document).ready(function(){
        $("input").click(function(){
            $(this).next().show();
            $(this).next().hide();
        });
    });

    function submitform1(){
        var member_name = $("input[name='member_name']").val();
        var address = $("input[name='address']").val();
        var phone = $("input[name='phone']").val();
        var email = $("input[name='email']").val();
        var note = $("input[name='note']").val();
        var id_number = $("input[name='id_number']").val();
        var start_day = $("input[name='start']").val();
        var end_day = $("input[name='end']").val();

        if(member_name != '' && address != '' && phone != '' && id_number != '' && start_day != '' && end_day != ''){
            $.ajax({
                type: 'post',
                url: '../data/qlbandoc/bandoc/addmember.php',
                data:{
                    member_name:member_name,
                    address:address,
                    phone:phone,
                    email:email,
                    note:note,
                    id_number:id_number,
                    start_day:start_day,
                    end_day:end_day
                },
                cache: false,
                success: function (html) {

                    $('#formloading1').html(html);
                    $("#status2").append("<p style='color:green'>Thêm thành công! <br> Tiếp tục thêm hoặc thoát</p>");
                    var first = $("table").children(":first");
                    first.after("<tr style='color:green'> <td> setting... </td> <td>"+member_name+"</td> <td>"+address+"</td> <td>"+phone+"</td> <td>"+email+"</td> <td>"+note+"</td> <td>"+id_number+"</td></tr>");
                    
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

<?php

?>
