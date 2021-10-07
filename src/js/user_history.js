$("form").submit(function (e) {
    e.preventDefault()
    let name = $("#name").val()
    let lastname = $("#lastname").val()
    let date = $("#date").val()
    let url = `./backend/user_history.php?name=${name}&lastname=${lastname}&date=${date}`
    let tabeldata = document.getElementById("content")

    fetch(url)
        .catch(tabeldata.innerText = "ไม่พบข้อมูล")
        .then(response => response.text())
        .then(result => JSON.parse(result)).then(value => {
            var textHTML = ""
            var i = 1
            value.forEach(element => {
                textHTML += '<tr>'
                textHTML += '<th scope="row">' + (i).toString() + "</th>"
                textHTML += '<td>' + element.name + '</td>'
                textHTML += '<td>' + element.namelist + '</td>'
                textHTML += '<td>' + element.date + '</td>'
                textHTML += '</tr>'
                i++
            })
            tabeldata.innerHTML = textHTML
        })

})