$(document).ready(function () {
    $("form :input").blur(function () {
        if ($(this).is("#rootusr")) {
            if ($(this).val() == "") {
                $(this).val("");
                $(this).css("border", "1px solid red");
                $(this).attr("placeholder", "*管理员名不能空");
            } else {
                // border: 1px solid #ced4da;
                $(this).css("border", "1px solid #ced4da");
                $(this).attr("placeholder", "管理员");
            }
        } else if ($(this).is("#rootpwd")) {
            if ($(this).val() == "") {
                $(this).val("");
                $(this).css("border", "1px solid red");
                $(this).attr("placeholder", "*密码不能空");
            } else {
                // border: 1px solid #ced4da;
                $(this).css("border", "1px solid #ced4da");
                $(this).attr("placeholder", "密码");
            }
        }

    });


    $("#rootsub").click(function () {
        if ($("#rootusr").val() == "" || $("#rootpwd").val() == '') {
            alert("管理员名与密码不能空");
        }
        else {
            $("form").submit();
        }
    });
});