

    // Books Chart
    const booksCtx = document.getElementById('booksChart').getContext('2d');
    new Chart(booksCtx, {
        type: 'bar',
        data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
        datasets: [{
            label: 'Books Issued',
            data: [50, 60, 45, 70, 65],
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: false,
        }
    });

    // Reserved Chart
    const reservedCtx = document.getElementById('reservedChart').getContext('2d');
    new Chart(reservedCtx, {
        type: 'bar',
        data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
        datasets: [{
            label: 'Books Reserved',
            data: [10, 15, 8, 12, 9],
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: false,
        }
    });

    // Overdue Chart
    const overdueCtx = document.getElementById('overdueChart').getContext('2d');
    new Chart(overdueCtx, {
        type: 'line',
        data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
        datasets: [{
            label: 'Overdue Books',
            data: [5, 8, 2, 4, 7],
            backgroundColor: 'rgba(255, 159, 64, 0.6)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 2,
            fill: true,
        }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: false,
        }
    });
