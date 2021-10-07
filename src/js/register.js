window.onload = ()=>{
    $("#passwordnotmatch").hide()
}
$("form").submit(function (e) {
    e.preventDefault();
    $("#passwordnotmatch").hide()
    let name = $('#name').val()
    let lastname = $('#lastname').val()
    let radios = document.getElementsByName('gender')
    let gender = null
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            gender = radios[i].value
            break;
        }
    }
    let email = $('#email').val()
    let password = $('#password').val()
    let confirmpassword = $('#confirmpassword').val()

    if (password === confirmpassword) {
        var formdata = new FormData();
        formdata.append("name", name);
        formdata.append("lastname", lastname);
        formdata.append("gender", gender);
        formdata.append("email", email);
        formdata.append("password", password);
        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("./backend/register_patient.php", requestOptions)
            .then(value => {
                if (value.status === 200) {
                    Swal.fire({
                        title: "การบันทึกข้อมูล",
                        text: "การบันทึกข้อมูลเสร็จสิ้น",
                        icon: "success",
                        timer: 3000
                    }).then(function () {
                        window.location="login.php"
                    })
                }

                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'กรุณาติดต่อผู้ดูแลระบบ',
                        timer: 3000
                    })
                }
            })
    } else{
        $("#passwordnotmatch").show()
    }
})





