$(document).ready(function () {
    var tabeldata = document.getElementById("content")
    fetch("./backend/get_shift.php")
        .catch(tabeldata.innerText = "ไม่พบข้อมูล")
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            var textHTML = ""
            var i = 1
            value.forEach(element => {
                textHTML += '<tr>'
                textHTML += '<th scope="row">' + (i).toString() + "</th>"
                textHTML += '<td>' + element.queue_id + '</td>'
                textHTML += '<td>' + element.patient_id + '</td>'
                textHTML += '<td>' + element.queue_date + '</td>'
                textHTML += '<td>' + element.queue_time_start + ' - ' + element.queue_time_end + '</td>'
                textHTML += '<td>เลื่อน</td>'
                textHTML += `<td style="text-align: center;"> <a class="btn btn-success text-white" onclick = "shift(${element.queue_id},'${element.patient_id}','shift')">บันทึก</a> &nbsp <a class="btn btn-danger text-white" onclick = "shift(${element.queue_id},'${element.patient_id}','cancel')">ยกเลิก</a></td>`
                textHTML += '</tr>'
                i++
            });
            tabeldata.innerHTML = textHTML
        })


});

function shift(QID,ID,status) {
    Swal.fire({
        title: status === "shift"?'คุณต้องการเลื่อนนัดนี้หรือไม่':"คุณต้องการยกเลิกนัดนี้หรือไม่",
        icon:"warning",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'ใช่',
        denyButtonText: 'ไม่',
    }).then((result) => {
        if (result.isConfirmed) {
           
            var formdata = new FormData();
            formdata.append("ID", ID);
            formdata.append("QID", QID);
            formdata.append("S", status);
            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch("./backend/admin_shifting.php", requestOptions)
                .then( (value) => {
                    console.log(value.text())
                    if(value.status!==200){
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'กรุณาติดต่อผู้ดูแลระบบ',
                            timer: 3000
                        })
                    }
                    else {
                        Swal.fire({
                            title: "การเลื่อนนัด",
                            title: status === "shift"?'การเลื่อนนัดเสร็จสิ้น':"การยกเลิกนัดเสร็จสิ้น",
                            icon: "success",
                            timer:3000
                        }).then(function () {
                            location.reload()
                        })
                    }
                })


        }
    })
}


