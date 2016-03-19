<?php
session_start();
if(!isset($_SESSION['connected']) || !$_SESSION['connected'])
    header('Location:./');
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <header>
            <title>Projets d'aménagements urbains à Laval</title>
            <meta charset="utf-8"/>
            <link rel="stylesheet" href="projets.css"/>
            <script type="text/javascript" src="projets.js"></script>
        </header>
<?php
$projPropNumbers = array(10,1,2,3,4,5,6);

for($projId = 0; $projId < count($projPropNumbers); ++$projId)
{
?>
        <section class="project" id="proj_<?php echo $projId;?>">
            <h1>Projet <?php echo $projId;?></h1>
            <h2 id="title_project_<?php echo $projId; ?>">Description projet <?php echo $projId;?><input type="button" value="more" name="more" class="moreButton actionMore" id="more_button_<?php echo $projId; ?>" onClick="extend_description_project(<?php echo $projId; ?>)" /></h2>
            <p id="description_project_<?php echo $projId; ?>">Description détaillée... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet, magna at varius iaculis, diam neque accumsan mi, sed pharetra turpis tortor eget tortor. Suspendisse bibendum ut nisi sed malesuada. Etiam aliquam faucibus nisi at hendrerit. Fusce quis urna at massa ullamcorper semper. Aliquam finibus laoreet posuere. Ut scelerisque sagittis ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras tempus nisl et dictum pharetra. Vivamus nec nisi lobortis, iaculis lorem vel, accumsan ante. Sed est diam, commodo a sollicitudin in, auctor ac diam. Morbi tempus, ipsum in tempus molestie, ligula tellus venenatis nulla, et egestas tortor libero iaculis nisl.</p>
            <section class="container_proposition_project">
<?php
    for($projPropId = 0; $projPropId < $projPropNumbers[$projId]; ++$projPropId)
    {
?>
                <article class="proposition_project" id="proj_<?php echo $projId; ?>_prop_<?php echo $projPropId; ?>">
                    <a href="projet.php?projId=<?php echo $projId;?>&projPropId=<?php echo $projPropId;?>" id="projPropActivationLink_<?php echo $projId . "_" . $projPropId;?>"><h1>proposition de projet <?php echo $projPropId; ?></h1></a>
                    <img alt="image projet" src="http://placehold.it/300x200" id="img_proj_<?php echo $projId; ?>_prop_<?php echo $projPropId; ?>" />
                </article>
<?php
    }
?>
            </section>
        </section>
<?php
}
?>
        <script type="text/javascript">
            //startup script
            var projPropNumbers = <?php echo json_encode($projPropNumbers);?>;
            for(var projId = 0; projId < projPropNumbers.length; ++projId)
            {
                for(var projPropId = 0; projPropId < projPropNumbers[projId]; ++projPropId)
                {
                    var projPropActivationLink = document.getElementById("projPropActivationLink_"+projId+"_"+projPropId);
                    projPropActivationLink.setAttribute("href", "#proj_"+projId);
                    projPropActivationLink.setAttribute("onClick", "extend_proposition_project(" + projId + ", " + projPropId + ", " + projPropNumbers[projId] + ")");
                }
            }
        </script>
    </body>
</html>
