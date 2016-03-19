<?php
session_start();
if(!isset($_SESSION['connected']) || !$_SESSION['connected'])
    header('Location:./');

include_once('databaseFuncs.php');

$db = connectDB();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>{ Accølad } Aménagement collaboratif et citoyen du Laval de demain</title>
            <meta charset="utf-8" />
            <link rel="stylesheet" href="projets.css" />
            <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
            <script type="text/javascript" src="projets.js"></script>
    </head>

    <body class="bg">

   <div class="fixed">
        <nav class="primary clearfix">
            <ul id="topnav" class="sf-menu">
                <li>test@test.com</li>
                <li>
                    <a class="fa fa-power-off fa-1x" href="disconnect.php"></a>
                    <a href="disconnect.php">	Déconnecter</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="margeYolo"></div>

        <?php

        $projects = getProjects($db);

        foreach($projects as $project)
        {
            $projId = $project['ID'];
        ?>
        <section class="project" id="proj_<?php echo $projId;?>">
            <h1><?php echo $project['Nom'];?></h1>
            <p><?php echo $project['Description'];?></p>
            <section class="container_proposition_project">
                <?php
            $projProps = getPropositionsForProject($db, $projId);
            $nbPropParProj[$projId] = count($projProps);

            foreach($projProps as $projPropId=>$projProp)
            {
                $databaseProjPropId = $projProp['ID'];
                ?>
                <article class="proposition_project propProj_<?php echo $projId; ?>" id="proj_<?php echo $projId."_prop_".$projPropId; ?>">
                    <a class="button" href="projet.php?projId=<?php echo $projId;?>&projPropId=<?php echo $projProp['ID'];?>" id="projPropActivationLink_<?php echo $projId . "_" . $projPropId;?>">
                        <h1><?php echo $projProp['Entreprise'];?></h1>
                    </a>
                    <img class="rounded" alt="image projet" src="http://placehold.it/300x200" id="img_proj_<?php echo $projId; ?>_prop_<?php echo $projPropId; ?>" />
                    <div id="container_proj_<?php echo $projId."_prop_".$projPropId; ?>" class="container_proj">
                        <main class="minipageContainer">
                            <div class="minipage minipage_left">

                              <!-- TODO -->
                              <frame>
                              <canvas class="emscripten" id="canvas" oncontextmenu="event.preventDefault()" height="480px" width="640px"></canvas>
                              <br>
                              <div class="logo"></div>
                              <div class="fullscreen"><img src="./unity/web_gl/TemplateData/fullscreen.png" width="38" height="38" alt="Fullscreen" title="Fullscreen" onclick="SetFullscreen(1);" /></div>
                              <div class="title">VirtualCup</div>
                            </div>
                            <script type='text/javascript'>
                          var Module = {
                            TOTAL_MEMORY: 268435456,
                            errorhandler: null,			// arguments: err, url, line. This function must return 'true' if the error is handled, otherwise 'false'
                            compatibilitycheck: null,
                            dataUrl: "./unity/web_gl/Development/web gl.data",
                            codeUrl: "./unity/web_gl/Development/web gl.js",
                            memUrl: "./unity/web_gl/Development/web gl.mem",
                          };
                        </script>
                        <script src="./unity/web_gl/Development/UnityLoader.js"></script>
                      </frame>
                                <!-- <img src="http://placehold.it/648x480" /> -->
                                <div>
                                    <span><?php echo $projProp['Prix'];?>&euro;</span>
                                    <input type="button" value="R&eacute;alit&eacute Virtuelle" />
                                </div>
                            </div>
                            <div class="minipage minipage_right">
                                <div id="comment_section_<?php echo $projId . "_" . $projPropId;?>"><!-- //TODO: meilleur ID -->
                                </div>
                                <div>
                                    <form method="POST" action="addComment.php">
                                        <input type="hidden" name="projId" value="<?php echo $projId; ?>" />
                                        <input type="hidden" name="projPropId" value="<?php echo $projPropId; ?>" />
                                        <textarea name="comment" placeholder="Ajouter un commentaire" required></textarea>
                                        <input type="submit" value="Ajouter un commentaire" />
                                    </form>
                                </div>
                            </div>
                        </main>
                    </div>
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
            <?php
                $projIds = array();
                foreach($projects as $projet)
                    $projIds[] = $projet['ID'];
            ?>
            var projIds = <?php echo json_encode($projIds); ?>;
            var projPropLength = <?php echo json_encode($nbPropParProj);?>;
            for (var projI = 0; projI < projIds.length; ++projI)
            {
                var projId = projIds[projI];

                for (var projPropId = 0; projPropId < projPropLength[projId]; ++projPropId)
                {
                    var projPropActivationLink = document.getElementById("projPropActivationLink_" + projId + "_" + projPropId);
                    projPropActivationLink.setAttribute("href", "#proj_" + projId);
                    projPropActivationLink.setAttribute("onClick", "extend_proposition_project(" + projId + ", " + projPropId + ", " + projPropLength[projId] + ")");
                }
            }
        </script>

    </body>

</html>
