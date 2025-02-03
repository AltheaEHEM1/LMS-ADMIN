document.addEventListener("DOMContentLoaded", function () {
    fetch('/api/charts-data')
        .then(response => response.json())
        .then(data => {
            if (data.booksIssued) createBooksChart(data.booksIssued);
            if (data.booksCirculated) createCirculatedChart(data.booksCirculated);
            if (data.overdueBooks) createOverdueChart(data.overdueBooks);
        })
        .catch(error => console.error('Error fetching data:', error));
});

function createBooksChart(booksData) {
    const ctx = document.getElementById('booksChart');
    if (!ctx) return;
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Books Issued',
                data: booksData,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
}

function createCirculatedChart(circulatedData) {
    const ctx = document.getElementById('circulatedChart');
    if (!ctx) return;
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Books Circulated',
                data: circulatedData,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
}

function createOverdueChart(overdueData) {
    const ctx = document.getElementById('overdueChart');
    if (!ctx) return;
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            datasets: [{
                label: 'Overdue Books',
                data: overdueData,
                backgroundColor: 'rgba(255, 159, 64, 0.6)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 2,
                fill: true,
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
}
