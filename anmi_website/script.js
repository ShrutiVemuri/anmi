function filterYear(year) {
    // Remove active class from all year elements
    document.querySelectorAll('.year').forEach(function(element) {
        element.classList.remove('active');
    });
    // Add active class to the selected year
    // document.querySelector('.year[onclick="filterYear(' + year + ')"]').classList.add('active');

    // Filter table rows based on the selected year
    var rows = document.querySelectorAll('#webinarTable tbody tr');
    rows.forEach(function(row) {
        if (row.getAttribute('data-year') === year.toString() || year === 'all') {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });

    // Reset month filter
    document.getElementById('month').value = 'all';
}

function filterMonth() {
    // var selectedYear = document.querySelector('.year.active') ? document.querySelector('.year.active').innerText : 'all';
    // var selectedMonth = document.getElementById('month').value;

    var rows = document.querySelectorAll('#webinarTable tbody tr');
//     rows.forEach(function(row) {
//         var rowYear = row.getAttribute('data-year');
//         var rowMonth = row.getAttribute('data-month');

//         if ((rowYear === selectedYear || selectedYear === 'all') && (rowMonth === selectedMonth || selectedMonth === 'all')) {
//             row.style.display = '';
//         } else {
//             row.style.display = 'none';
//         }
//     });
// }

// Initial load, show all rows
// filterYear('all');
