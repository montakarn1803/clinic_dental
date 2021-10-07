$(document).ready(function () {
    var tabeldata = document.getElementById("content")
    fetch("./backend/doctor_history.php")
        .catch(tabeldata.innerText = "ไม่พบข้อมูล")
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            var textHTML = ""
            var i = 1
            value.forEach(element => {
                textHTML += '<tr>'
                textHTML += '<th scope="row">' + (i).toString() + "</th>"
                textHTML+='<td>'+'<img class="imgshow" src="./src/images/doctors/'+element.doctor_img+'"/></td>'
                textHTML += '<td>' + element.doctor_firstname+' '+ element.doctor_lastname+ '</td>'
                textHTML += '<td>' + element.doctor_phone+ '</td>'
                textHTML += '<td>' + element.doctor_license+ '</td>'
                textHTML += `<td style="text-align: center;" ><a class="btn btn-warning text-white" href="doctor_manage_edit.php?id=${element.doctor_id}" ><i class="fas fa-user-edit"></i></a>&nbsp&nbsp<a class="btn btn-danger text-white" onclick="del('${element.doctor_id}')"><i class="fas fa-trash"></i></a></td>`
                textHTML += '</tr>'

                i++
            });
            tabeldata.innerHTML = textHTML
        })


});

function del(ID) {
    Swal.fire({
        title: 'คุณต้องการลบข้อมูลนี้หรือไม่',
        icon:"warning",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'ใช่',
        denyButtonText: 'ไม่',
    }).then((result) => {
        if (result.isConfirmed) {
            var formdata = new FormData();
            formdata.append("id", ID);
            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch("./backend/delete_doctor.php", requestOptions)
                .then(value => {
                    if(value.status!==200){
                        console.log(value.text())
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'กรุณาติดต่อผู้ดูแลระบบ',
                            timer: 3000
                        })
                    }
                    else {
                        Swal.fire({
                            title: "การลบข้อมูล",
                            text: "การลบข้อมูลเสร็จสิ้น",
                            icon: "success",
                            timer:3000
                        }).then(function () {
                            window.location="admin_manage_doctor.php"
                        })
                    }
                })


        }
    })
}


