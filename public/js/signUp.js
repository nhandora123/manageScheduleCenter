$(document).ready(function () {
    
    $("#email").keyup(function () {
        var user = $(this).val();
        $.post("../Ajax/checkingUsername", { email: user }, function (data) {
            if (data == 0) {
                var au = "";
                $(':input[type="submit"]').prop('disable', false);
            } else {
                var au = "Đã trùng tên đăng nhập";
                $(':input[type="submit"]').prop('disable', true);

            }
            $("#checkUsername").html(au);
        })
        //$("#checkUsername").html(user); 
    })
});