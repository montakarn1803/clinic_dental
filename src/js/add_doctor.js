function loadFile(event) {
    var reader = new FileReader()
    reader.onload = function () {
        var output = document.getElementById('avatar')
        output.src = reader.result
    }
    reader.readAsDataURL(event.target.files[0])
}

$("form").submit(function (e) {
    e.preventDefault();
    var image = document.getElementById('upload').files
    if (image.length <= 0) {
        Swal.fire({
            title: "เกิดข้อผิดพลาด",
            text: "กรุณาอัพโหลดรูปภาพ",
            icon: "error",
            timer: 3000
        })
    } else {
        Swal.fire({
            title: 'คุณต้องการเพิ่มข้อมูลนี้หรือไม่',
            icon: "warning",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'ใช่',
            denyButtonText: 'ไม่',
        }).then((result) => {
            if (result.isConfirmed) {
                let name = $('#name').val()
                let lastname = $('#lastname').val()
                let tel = $('#tel').val()
                let license = $('#license').val()
                var image = document.getElementById('upload')
                var imagename = document.getElementById('upload').files.name
                var formdata = new FormData();
                formdata.append("name", name);
                formdata.append("lastname", lastname);
                formdata.append("tel", tel);
                formdata.append("license", license);
                formdata.append("img", image.files[0], imagename);
                var requestOptions = {
                    method: 'POST',
                    body: formdata,
                    redirect: 'follow'
                };

                fetch("./backend/add_doctor.php", requestOptions)
                    .then(value => {
                        value.text().then((e) => console.log(e))
                        if (value.status === 200) {
                            Swal.fire({
                                title: "การบันทึกข้อมูล",
                                text: "การบันทึกข้อมูลเสร็จสิ้น",
                                icon: "success",
                                timer: 3000
                            }).then(function () {
                                window.location = "admin_manage_doctor.php"
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

            }
        })
    }

})
