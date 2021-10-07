$(document).ready(function () {
  start("M")
});

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$('select').on('change', function () {
  start(this.value)
});

function start(con){
  var tabeldata = document.getElementById("content")
  fetch("./backend/summary.php?con="+con)
    .catch(tabeldata.innerText = "ไม่พบข้อมูล")
    .then(response => response.text())
    .then(result => JSON.parse(result)).then(value => {
      var textHTML = ""
      var T = value.type_name
      for (let i = 0; i < T.length; i++) {
        textHTML += '<tr>'
        textHTML += '<th scope="row">' + (i + 1).toString() + "</th>"
        textHTML += `<td> ${value.type_name[i]} </td>`
        textHTML += `<td> ${numberWithCommas(value.price[i])} </td>`
        textHTML += '</tr>'
      }
      tabeldata.innerHTML = textHTML
      $("#price").text("รวม " + numberWithCommas(value.totol_price))
    })
}
