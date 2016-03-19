<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <header>
            <title>Projets d'aménagements urbains à Laval</title>
            <meta charset="utf-8"/>
            <link rel="stylesheet" href="projets.css"/>
            <script type="text/javascript" src="query_project.js"></script>
            <script type="text/javascript" src="projets.js"></script>
        </header>
        <?php
            for($projId = 0; $projId < 4; ++$projId)
            {
        ?>
        <section class="project">
            <h1>Projet <?php echo $projId;?></h1>
            <h2 id="title_project_<?php echo $projId; ?>">Description projet <?php echo $projId;?><input type="button" value="more" name="more" class="moreButton actionMore" id="more_button_<?php echo $projId; ?>" onClick="extend_description_project(<?php echo $projId; ?>)" /></h2>
            <p id="description_project_<?php echo $projId; ?>">Description détaillée... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet, magna at varius iaculis, diam neque accumsan mi, sed pharetra turpis tortor eget tortor. Suspendisse bibendum ut nisi sed malesuada. Etiam aliquam faucibus nisi at hendrerit. Fusce quis urna at massa ullamcorper semper. Aliquam finibus laoreet posuere. Ut scelerisque sagittis ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras tempus nisl et dictum pharetra. Vivamus nec nisi lobortis, iaculis lorem vel, accumsan ante. Sed est diam, commodo a sollicitudin in, auctor ac diam. Morbi tempus, ipsum in tempus molestie, ligula tellus venenatis nulla, et egestas tortor libero iaculis nisl.</p>
            <section class="container_proposition_project">
                <?php
                    for($projPropId = 0; $projPropId < 10; ++$projPropId)
                    {
                ?>
                <article class="proposition_project" id="projet_<?php echo $projPropId; ?>">
                    <a href="projet.php?projId=<?php echo $projId;?>&projPropId=<?php echo $projPropId;?>"><h1>proposition de projet <?php echo $projPropId; ?></h1></a>
                    <img alt="image projet" src="http://placehold.it/300x200" />
                </article>
                <?php
                    }
                ?>
            </section>
        </section>
        <?php
            }
        ?>
    </body>
</html>
