$(document).ready(function () {
    var tabeldata = document.getElementById("content")
    fetch("./backend/get_booking_tb.php")
        .catch(tabeldata.innerText = "ไม่พบข้อมูล")
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            var textHTML = ""
            var i = 1
            value.forEach(element => {
                textHTML += '<tr>'
                textHTML += '<th scope="row">' + (i).toString() + "</th>"
                textHTML += '<td>' + element.queue_id + '</td>'
                textHTML += '<td>' + element.queue_date + '</td>'
                textHTML += '<td>' + element.queue_time_start + ' - ' + element.queue_time_end + '</td>'
                let status = ''
                switch (element.queue_status) {
                    case 'on':
                        status = 'นัดหมายปกติ'
                        textHTML += '<td>' + status + '</td>'
                        textHTML += '<td style="text-align: center;"><a class="btn btn-warning text-white" href="shift_booking.php?booking_id=' + element.queue_id + '">เลื่อน</a>' + '</td>'
                        break;
                    case 'off':
                        status = 'ยกเลิกการนัดหมาย'
                        textHTML += '<td>' + status + '</td>'
                        textHTML += '<td>-</td>'
                        break;
                    case 'pedding':
                        status = 'รอการอนุมัติ'
                        textHTML += '<td>' + status + '</td>'
                        textHTML += '<td>-</td>'
                        break;
                    case 'shift':
                            status = 'รอเลื่อน'
                            textHTML += '<td>' + status + '</td>'
                            textHTML += '<td>-</td>'
                            break;
                    case 'finish':
                                status = 'เรียบร้อยแล้ว'
                                textHTML += '<td>' + status + '</td>'
                                textHTML += '<td>-</td>'
                                break;
                }

                textHTML += '</tr>'
                i++
            });
            tabeldata.innerHTML = textHTML
        })


});
