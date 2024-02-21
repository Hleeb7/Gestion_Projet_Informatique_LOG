<!--Affichage de l'histogramme du nombre de connexion par IP-->
<canvas id="bar-chart" width="600" height="400"></canvas>
<script type = "text/javascript">
    // Bar chart
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: <?= $chaineUrl ?> ,
            datasets: [
                {
                    label: "Nombre d'url égaux",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data: <?= $chaineNburl ?>
                }
            ]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Nombre dUrl égaux'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero : true
                    }
                }],
            }
        }
    });
</script>
<!---------------------------------------------------------------->

<!--Affichage du diagrame camenber du nombre d'url egaux-->

<canvas id="doughnut-chart" width="800" height="450"></canvas>
<script type = "text/javascript">
    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: <?= $chaineUrl ?>,
            datasets: [
                {
                    label: "Nombre d'Url égaux",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data:  <?= $chaineNburl ?>
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Nombre dUrl égaux'
            }
        }
    });
</script>
<!---------------------------------------------------------------->