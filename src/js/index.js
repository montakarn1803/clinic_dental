$(document).ready(function () {
    fetch("./backend/user_chack.php")
        .then(value => {
            if (value.status === 401) {
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่มีสิทธิ์เข้าถึง',
                    text: 'กรุณาติดต่อผู้ดูแลระบบที่สาขา',
                    timer: 3000
                }).then(()=>{
                    window.location = "login.php"
                })
            }})
})