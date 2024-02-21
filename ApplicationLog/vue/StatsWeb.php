<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 28/12/2017
 * Time: 14:33
 */

$title = 'Serveur Web';







ob_start();

?>
<a class="nav-link js-scroll-trigger" href="index.php?page=weblog">Log d'accès complet</a>
<a class="nav-link js-scroll-trigger" href="index.php?page=accessip">Accès par IP</a>

<?php
$resultatStatAllIP = Select_All_Ip();
$resultatStatAllurl = Select_All_Url();
///

///////

$tableIP = array();
$tableNB = array();

foreach ($resultatStatAllIP as $unlog) {

    $tableIP[] = '"' . $unlog['ip'] . '"';
    $tableNB[] = $unlog['nbConnexions'];
}

$tableUrl=array();
$tableNburl=array();

foreach($resultatStatAllurl as $urllog)
{
    $tableUrl[] = '"'.$urllog['urllog'].'"';
    $tableNburl[] = $urllog['nbUrl'];
}

//////////////////
$chaineIP = '[' . implode(", ", $tableIP) . "]";
$chaineNB = '[' . implode(", ", $tableNB) . "]";
$chaineUrl = '['.implode(", ",$tableUrl)."]";
$chaineNburl = '['.implode(", ",$tableNburl)."]";
?>
<!--Affichage du diagrame camenber du nombre de connexion par IP-->

<canvas id="doughnut-chart" width="30%" height="15%"></canvas>
<script type="text/javascript">
    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: <?= $chaineIP ?>,
            datasets: [
                {
                    label: "Nombre de Connexion par IP",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: <?= $chaineNB ?>
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Nombre de connexion par IP'
            }
        }
    });
</script>
<!--Affichage de l'histogramme du nombre de connexion par IP-->
<canvas id="bar-chart" width="20%" height="10%"></canvas>
<script type="text/javascript">
    // Bar chart
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: <?= $chaineIP ?>,
            datasets: [
                {
                    label: "Nombre de Connexion IP",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: <?= $chaineNB ?>
                }
            ]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: 'Nombre de connexion par IP'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
            }
        }
    });
</script>

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


<?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>
