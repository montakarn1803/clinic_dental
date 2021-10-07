$(document).ready(function () {
    var tabeldata = document.getElementById("content")
    fetch("./backend/get_queue_today.php")
        .catch(tabeldata.innerText = "ไม่พบข้อมูล")
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            var textHTML = ""
            var i = 1
            let Q = 0

            value.forEach(element => {
                textHTML += '<tr>'

                let status = ''
                switch (element.queue_status) {
                    case 'on':
                        textHTML += '<th scope="row">' + (i).toString() + "</th>"
                        textHTML += '<td>' + element.queue_time_start + ' - ' + element.queue_time_end + '</td>'
                        textHTML += '<td>' + element.patient_name + '</td>'
                        textHTML += '<td>' + element.doctor_name + '</td>'
                        status = 'นัดหมายปกติ'
                        textHTML += '<td>' + status + '</td>'
                        textHTML += `<td style="text-align: center;"> <a class="btn btn-success text-white" href="save_history.php?id=${element.queue_id}&user_id=${element.patient_id}">บันทึก</a> &nbsp <a class="btn btn-warning text-white" href="admin_shift_booking.php?id=${element.queue_id}&uid=${element.patient_id}">เลื่อน</a></td>`
                        Q++
                        break;
                    case 'off':
                        textHTML += '<th scope="row">' + (i).toString() + "</th>"
                        textHTML += '<td>' + element.queue_time_start + ' - ' + element.queue_time_end + '</td>'
                        textHTML += '<td>' + element.patient_name + '</td>'
                        textHTML += '<td>' + element.doctor_name + '</td>'
                        status = 'ยกเลิกการนัดหมาย'
                        textHTML += '<td>' + status + '</td>'
                        textHTML += '<td>-</td>'
                        break;
                    case 'finish':
                        textHTML += '<th scope="row">' + (i).toString() + "</th>"
                        textHTML += '<td>' + element.queue_time_start + ' - ' + element.queue_time_end + '</td>'
                        textHTML += '<td>' + element.patient_name + '</td>'
                        textHTML += '<td>' + element.doctor_name + '</td>'
                        status = 'เสร็จสิ้น'
                        textHTML += '<td>' + status + '</td>'
                        textHTML += '<td>-</td>'
                        Q++
                        break;
                }
                textHTML += '</tr>'
                i++
            });
            $("#Q").text(`ว่าง ${20 - Q} คิว`)
            tabeldata.innerHTML = textHTML
        })
});
function queue(choice, ID) {
    let title = ""
    if (choice === 1) {
        title = 'คุณต้องการบันทึกข้อมูลหรือไม่'
    }
    else {
        title = 'คุณต้องการยกเลิกนัดหรือไม่'
    }
    Swal.fire({
        title: title,
        icon: "warning",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'ใช่',
        denyButtonText: 'ไม่',
    }).then((result) => {
        var requestOptions = {
            method: 'POST',
            body: null,
            redirect: 'follow'
        };

        if (result.isConfirmed) {
            var formdata = new FormData();
            formdata.append("id", ID);
            if (choice === 1) {
                formdata.append('choice', 'on')
                requestOptions.body = formdata
            }
            else {
                formdata.append('choice', 'off')
                requestOptions.body = formdata
            }
            fetch("./backend/queue_confirm.php", requestOptions).then(response => location.reload())
        }
    })
}
