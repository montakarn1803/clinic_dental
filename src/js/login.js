$("#form").submit(function (e) {
    e.preventDefault();
    
    var formdata = new FormData();
        formdata.append("username", $('#username').val());
        formdata.append("password", $('#password').val());

    var requestOptions = {
        method: 'POST',
        body: formdata,
    };
    fetch("./backend/login.php", requestOptions)
        .then(value => {
            if(value.status!==200){
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
                    timer: 3000
                })
            }
            else {
                window.location="index.php"
            }
        })

})