

  // Books Chart
const booksCtx = document.getElementById('booksChart').getContext('2d');
new Chart(booksCtx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // Monthly labels
        datasets: [{
            label: 'Books Issued',
            data: [50, 60, 45, 70, 65, 80, 90, 85, 75, 95, 100, 110], // Monthly data for issued books
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true, // Make chart responsive
        maintainAspectRatio: false, // Allow resizing
        scales: {
            x: {
                // Ensuring that labels fit well on smaller screens
                ticks: {
                    autoSkip: true,
                    maxRotation: 45, // Reduce label rotation if needed
                    minRotation: 45,
                }
            }
        }
    }
});


    // Circulated Books Chart by Month
const circulatedCtx = document.getElementById('circulatedChart').getContext('2d');
new Chart(circulatedCtx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // Months of the year
        datasets: [{
            label: 'Books Circulated',
            data: [100, 120, 95, 110, 105, 130, 125, 140, 110, 115, 100, 125], // Example data for circulated books each month
            backgroundColor: 'rgba(75, 192, 192, 0.6)', // Color for the bars
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true, // Make chart responsive
        maintainAspectRatio: false, // Allow resizing
        scales: {
            x: {
                ticks: {
                    autoSkip: true,
                    maxRotation: 45,
                    minRotation: 45,
                }
            }
        }
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
