$(document).ready(function () {
    const urlSearchParams = new URLSearchParams(window.location.search);
    const params = Object.fromEntries(urlSearchParams.entries()).id;

    fetch("./backend/doctor_manage_preedit.php?id=" + params)
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            console.log(value)
            $("#id").val(value[0].doctor_id)
            $("#name").val(value[0].doctor_firstname)
            $("#lastname").val(value[0].doctor_lastname)
            $("#tel").val(value[0].doctor_phone)
            $("#license").val(value[0].doctor_license)
        })
})

$("form").submit(function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'คุณต้องการแก้ไขข้อมูลนี้หรือไม่',
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
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries()).id;

            var formdata = new FormData();
            formdata.append("name", name);
            formdata.append("lastname", lastname);
            formdata.append("tel", tel);
            formdata.append("license", license);
            formdata.append("id", params);
            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch("./backend/doctor_manage_edit.php", requestOptions)
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
})




