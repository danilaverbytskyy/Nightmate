function filterDreamsByMonth () {
  let selectedMonth = parseInt(document.getElementById('month-select').value)

  let dreamItems = document.querySelectorAll('.dream-item')
  dreamItems.forEach(function (item) {
    if (selectedMonth === 0 || selectedMonth === parseInt(item.getAttribute('data-month'))) {
      item.style.display = 'block'
    } else {
      item.style.display = 'none'
    }
  })
}

document.getElementById('month-select').addEventListener('change', filterDreamsByMonth)

window.addEventListener('load', filterDreamsByMonth)