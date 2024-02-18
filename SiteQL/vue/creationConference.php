<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 09/04/2019
 * Time: 14:33
 */
$title="";
ob_start();
    $conf=consultermesconference();
    $proto = consulterprotocole();
    ?>
    <section id="conference">
    <div class="container">
    <div class="row">
    <table>
        <tr>
            <th>Protocole</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Individuelle</th>
            <th></th>
        </tr>
        <?php
        foreach ($conf as $item) {
            ?>
            <tr>
                <td><?= $item["nom"] ?></td>
                <td><?= $item["date"] ?></td>
                <td><?= $item["heure"] ?></td>
                <td><?= $item["individuelle"]?></td>
                <td><button onclick="delSeance(<?= $item["idseance"]?>)" id="seance-<?= $item["idseance"]?>" class="submit_btn button success large">Supprimer</button></td>
            </tr>
        <?php }
        ?>
    </table>
    <script>

    function delSeance(id) {
        console.log(this);
        var json = {
            MaSeance:id,
        };
        console.log(JSON.stringify((json)));
        $.ajax({
            url: '<?= $GLOBALS['dist_api']  ?>/api.php',
            type: 'get',
            data: {
                delSeance : true
                ,id : id
                //,json : JSON.stringify(json)
            },
            success: function(Data){
                console.log(id + " was DELETED");
                console.log(Data);
                console.log(JSON.parse(Data));
                var i = JSON.parse(Data);
                console.log(i);
                console.log(i.seance);
                console.log(i.success);
                document.location.reload(true);
            },
            error: function(error){
                console.log("Echec "+ id);
                console.log(error);
            }
        });

    }
</script>

    <form action="index.php?page=creeconf" method="POST">
    <div class ="input-group">
      Saisir une date  <input type="date" name="date" value="2018-07-22" min="2018-01-01" max="2050-12-31">
</div>

  <div class ="input-group">
    Saisir une heure    <input type="time"  class="input-append" name="heure" min="09:00" max="19:00">
 </div>
    <script type="text/javascript">

    </script>
<div class ="input-group">
       Séance individuelle <select name="indiv" >
            <option selected value="Oui">Oui</option>
            <option value="Non">Non</option>
</div>

        </select>
      <div class ="input-group">
        Protocole<SELECT name="proto" size="1">
        </div>
            <?php
            foreach ($proto as $value) {
                echo "<option value='", $value["idprotocole"], "'>", $value["nom"], "</option>";
            }
            ?>
        </SELECT>

        <input type="submit"  class="btn btn-primary btn-sm" value="Validez" class="submit_btn button success large">
    </form>

    <?php
    if (isset($_POST["date"]) && isset($_POST["heure"]) && isset($_POST["proto"])) {
        $date = $_POST["date"];
        $protocole = $_POST["proto"];
        $time = $_POST["heure"];
        $indiv=$_POST["indiv"];
        createconf($date, $time, $protocole,$indiv);
        header("Refresh:0");
        ?>
        </div>
        </div>
        </section>
        <?php
    }

    $contenu = ob_get_clean();
    render($contenu, $title);

?>
