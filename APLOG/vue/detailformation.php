<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 20/03/2018
 * Time: 13:25
 */

$contenu = "";
$title = "Details formations";


ob_start();
$idformation = $_GET["idformation"];
$detail = get_detailformation($idformation);
$datesession=get_sessionvalide($idformation);
?>
    <div name="image">

        <table id="inscriformation">
            <tr>
                <td width="50%">
                    <img src='<?= "./contenu/image/" . $detail[0]["image2"]; ?>'/>
                </td>
                <td><?php
                    echo $detail[0]["description"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Lieu:<?= $detail[0]["nom"] ?><br>
                    Adresse:<?= $detail[0]["adresse"] ?><br>
                    Code postal:<?= $detail[0]["codepostal"] ?><br>
                    Téléphone:<?= $detail[0]["telephone"] ?><br>
                </td>
                <?php
                if (isset($_SESSION['connecter'])){

                    ?>
                    <td>
                      <?php  if(empty($datesession))
                        {
                        echo"<br>pas de date de session disponible actuellement";
                        }
                        else{?>
                            Inscription
                        <form method="POST" action="index.php?page=validation">
                            <input name="idformation" value="<?= $idformation ?>" hidden>
                            <select name="session">
                                <?php

                                foreach ($datesession as $data) {
                                    ?>
                                    <option title="Choisir votre date de session" value="<?= $data["numsession"]; ?>">
                                        <?= $data["datelimite"]; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="submit" title="Permet de valider la date d'inscripition" value="s'inscrire">
                        </form>
                         <?php } ?>
                            </td>


                <?php
                }


                else{ ?>
                    <td>Veuillez vous <a title="Vous redirige vers la page de connexion" href="index.php?page=cnx">connecter</a></td>
                <?php } ?>

            </tr>



        </table>
    </div>
<?php

$contenu = ob_get_clean();
render($contenu, $title);

?>