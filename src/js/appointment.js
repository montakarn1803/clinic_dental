$("form").submit(function (e) {
    e.preventDefault()
    let name = $("#name").val()
    let lastname = $("#lastname").val()
    let url = `./backend/appointment.php?name=${name}&lastname=${lastname}`
    let tabeldata = document.getElementById("content")

    fetch(url)
        .catch(tabeldata.innerText = "ไม่พบข้อมูล")
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            var textHTML = ""
            value.forEach(element => {
                textHTML += '<tr style="text-align:center;">'
                textHTML += '<td>' + name+" "+ lastname + '</td>'
                textHTML += '<td>' + element.doctor_name + '</td>'
                textHTML += '<td>' + element.queue_date + '</td>'
                textHTML += '<td>' + element.queue_time_start +" - "+ element.queue_time_end + '</td>'
                textHTML += '</tr>'
            })
            tabeldata.innerHTML = textHTML
        })

})