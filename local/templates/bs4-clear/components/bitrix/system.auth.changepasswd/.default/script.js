$(document).ready(function () {
    var inputChecker = "TRUE";
    $(".authInputBlock .input i").click(function () {
        if (inputChecker == "TRUE") {
            $(this).siblings('input').attr('type','text');
            $(this).removeClass("fa-eye");
            $(this).addClass("fa-eye-slash");
            inputChecker = "FALSE"
        } else {
            $(this).siblings('input').attr('type','password');
            $(this).removeClass("fa-eye-slash");
            $(this).addClass("fa-eye");
            inputChecker = "TRUE"
        }
    });
});
