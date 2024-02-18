<?php
/**
 * Created by PhpStorm.
 * User: FRCRUVGO
 * Date: 01/04/2019
 * Time: 10:51
 */

$title="";
ob_start();

$contenu = ob_get_clean();
?>
<section id="conference">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Liste des Conférences sur les Maladies Chroniques</h2>
                <div style="overflow-x:auto;">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Thème</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Durée</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Fonction pour générer une date aléatoire du lundi au vendredi
                        function generateDate() {
                            $timestamp = mt_rand(strtotime('next Monday'), strtotime('next Friday'));
                            return date('d/m/Y', $timestamp);
                        }

                        // Fonction pour générer une heure aléatoire entre 8h et 17h
                        function generateTime() {
                            return str_pad(mt_rand(8, 16), 2, '0', STR_PAD_LEFT) . ':' . str_pad(mt_rand(0, 1) * 30, 2, '0', STR_PAD_LEFT);
                        }

                        // Fonction pour générer une durée aléatoire de 30 minutes, 1 heure ou 2 heures
                        function generateDuration() {
                            $durations = ['30 min', '1h', '2h'];
                            return $durations[array_rand($durations)];
                        }

                        $themes = ["Hypertension Artérielle", "Diabète de Type 2", "Asthme Chronique", "Maladie d'Alzheimer", "Maladie de Parkinson", "Fibromyalgie", "Sclérose en plaques", "Cancer", "Dépression", "Anxiété", "Obésité"];

                        // Génération de 30 conférences
                        for ($i = 0; $i < 30; $i++) {
                            $theme = $themes[array_rand($themes)];
                            $date = generateDate();
                            $time = generateTime();
                            $duration = generateDuration();
                            echo "<tr>";
                            echo "<td>$theme</td>";
                            echo "<td>$date</td>";
                            echo "<td>$time</td>";
                            echo "<td>$duration</td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
render($contenu,  $title);
?>
