const ctx = document.getElementById('myChart');

let aspectRatio = null;

aspectRatio = screen.width > 500 ? 2 : 1;

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['CS', 'CE', 'CBA', 'COC', 'CELA', 'CITHM'],
        datasets: [{
            label: 'Number of Students',
            data: [60, 70, 130, 435, 120, 220],
            borderWidth: 2,
            backgroundColor: [
                'rgba(75, 192, 192, 0.3)', // CS
                'rgba(153, 102, 255, 0.3)', // CE
                'rgba(255, 159, 64, 0.3)', // CBA
                'rgba(255, 99, 132, 0.3)', // COC
                'rgba(54, 162, 235, 0.3)', // CELA
                'rgba(255, 206, 86, 0.3)'  // CITHM
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)', // CS
                'rgba(153, 102, 255, 1)', // CE
                'rgba(255, 159, 64, 1)', // CBA
                'rgba(255, 99, 132, 1)', // COC
                'rgba(54, 162, 235, 1)', // CELA
                'rgba(255, 206, 86, 1)'  // CITHM
            ],
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
       aspectRatio: aspectRatio,
    }
});