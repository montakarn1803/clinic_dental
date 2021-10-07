$(document).ready(function () {
    const urlSearchParams = new URLSearchParams(window.location.search);
    const params = Object.fromEntries(urlSearchParams.entries()).id;

    fetch("./backend/user_manage_preedit.php?id=" + params)
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            console.log(value)
            $("#id").val(value[0].patient_id)
            $("#name").val(value[0].patient_firstname)
            $("#lastname").val(value[0].patient_lastname)
            if (value[0].patient_gender === 'M') {
                $("#M").prop("checked", true);
                $("#F").prop("checked", false);
            }
            else {
                $("#F").prop("checked", true);
                $("#M").prop("checked", false);
            }
            $("#bd").val(value[0].patient_birthday)
            $("#drug").val(value[0].patient_drug_allergy)
            $("#tel").val(value[0].patient_phone)
            $("#address").val(value[0].patient_address)
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
    let radios = document.getElementsByName('gender')
    let gender = null
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            gender = radios[i].value
            break;
        }
    }
    let bd = $('#bd').val()
    let drug = $('#drug').val()
    let tel = $('#tel').val()
    let address = $('#address').val()
    const urlSearchParams = new URLSearchParams(window.location.search);
    const params = Object.fromEntries(urlSearchParams.entries()).id;

        var formdata = new FormData();
        formdata.append("name", name);
        formdata.append("lastname", lastname);
        formdata.append("gender", gender);
        formdata.append("birthday", bd);
        formdata.append("drug", drug);
        formdata.append("tel", tel);
        formdata.append("address", address);
        formdata.append("id", params);
        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("./backend/user_manage_edit.php", requestOptions)
            .then(value => {
                value.text().then((e)=>console.log(e))
                if (value.status === 200) {
                    Swal.fire({
                        title: "การบันทึกข้อมูล",
                        text: "การบันทึกข้อมูลเสร็จสิ้น",
                        icon: "success",
                        timer: 3000
                    }).then(function () {
                        window.location = "admin_manage_user.php"
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
    
}})
    })





