<?php
include "../../data.php";
$dt = new database();
if(isset($_POST['editname'])){
    $id = $_POST['editname'];
    $dt->select("SELECT * FROM `nguoi_muon` WHERE Id =$id");
    // echo "SELECT * FROM `nguoi_muon` WHERE Id =$id";
    $r=$dt->fetch();
}



if(isset($_POST['member_id']) && isset($_POST["member_name"]) && isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["id_number"])){

    $member_id = $_POST['member_id'];
    $member_name = $_POST["member_name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $note = $_POST["note"];
    $id_number = $_POST["id_number"];
    $old_id_number = $_POST["old_id_number"];
 
    $dt->command("UPDATE `nguoi_muon` SET `Ten` = '$member_name ', `Dia_chi` = '$address', `Sdt` = '$phone', `Email` = '$email', `Ghi_chu` = '$note', `CMND` = '$id_number' WHERE `nguoi_muon`.`Id` = $member_id;");
    $dt->command("UPDATE `the_thanh_vien` SET `So_the` = '$id_number' WHERE `the_thanh_vien`.`So_the` = '$old_id_number';");
}
?>
                        <div id="status2"></div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <label for="member_id">ID</label>
                                <input type="text" class="form-control" autocomplete="off" name="member_id" id="member_id"
                                     value="<?=$r['Id']?>" disabled=''>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <label for="member_name">Tên bạn đọc*</label>
                                <input type="text" class="form-control" autocomplete="off" name="member_name" id="member_name"
                                     value="<?=$r['Ten']?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <label for="address">Địa chỉ*</label>
                                <input type="text" class="form-control" autocomplete="off" name="address" id="address"
                                     value="<?=$r['Dia_chi']?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <label for="phone">Số điện thoại*</label>
                                <input type="number" class="form-control" autocomplete="off" name="phone" id="phone"
                                     value="<?=$r['Sdt']?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" autocomplete="off" name="email" id="email"
                                     value="<?=$r['Email']?>">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <label for="note">Ghi chú</label>
                                <input type="text" class="form-control" autocomplete="off" name="note" id="note"
                                     value="<?=$r['Ghi_chu']?>">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <label for="id_number">CMND*</label>
                                <input type="text" class="form-control" autocomplete="off" name="id_number" id="id_number"
                                     value="<?=$r['CMND']?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>   
                        </div>

                        <br>
                        <h5 style="color: red">* : Required</h5>

<script>
    var secondElement = new Choices('#demo-2', { allowSearch: false }).setValue();
    $(document).ready(function(){
        $("input").click(function(){
            $(this).next().show();
            $(this).next().hide();
        });
    });
    let old_id_number='<?=$r['CMND']?>';
    function submitform(){
        var member_id = $("input[name='member_id']").val();
        var member_name = $("input[name='member_name']").val();
        var address = $("input[name='address']").val();
        var phone = $("input[name='phone']").val();
        var email = $("input[name='email']").val();
        var note = $("input[name='note']").val();
        var id_number = $("input[name='id_number']").val();

        if(member_name != '' && address != '' && phone != '' && id_number != ''){
            $.ajax({
                type: 'post',
                url: '../data/qlbandoc/bandoc/editmember.php',
                data:{

                    member_id:member_id,
                    member_name:member_name,
                    address:address,
                    phone:phone,
                    email:email,
                    note:note,
                    id_number:id_number,
                    old_id_number:old_id_number

                },
                cache: false,
                success: function (html) {

                    // $('#formloading1').html(html);
                    // $("#status2").append("<p style='color:green'>Sửa thành công! <br> Tiếp tục thêm hoặc thoát</p>");
                    profile_member(member_id,"bandoc/profilemember.php",id_number);
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
