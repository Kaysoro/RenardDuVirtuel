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
				<li><a href="index.php">{ Accølad }</a></li>
                <li>
                    <a class="fa fa-sign-out fa-1x" href="disconnect.php"></a>
                    <a href="disconnect.php">	Déconnecter</a>
                </li>
				<li class="centered">test@test.com</li>
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
                    <img class="resized rounded" alt="image projet" src="offres/<?php echo $projProp['MaquetteUnity']; ?>.png" id="img_proj_<?php echo $projId; ?>_prop_<?php echo $projPropId; ?>" />
                    <div id="container_proj_<?php echo $projId."_prop_".$projPropId; ?>" class="container_proj">
                        <main class="minipageContainer">
						
							<!-- LEFT -->
                            <div class="minipage minipage_left">
								<p><?php echo $projProp['Description']; ?></p><span class="price">Prix du projet : <?php echo $projProp['Prix']; ?>&euro;</span>
								 <img class="maquette rounded" src="http://placehold.it/480x320"/>
                                <div>
                                    <a href="<?php echo $projProp['PathWebGL']; ?>"><input class="littleButton" type="button" value="Visualisation 3D" /></a>
									<a href="<?php echo $projProp['PathApk']; ?>"><input class="littleButton" type="button" value="Réalité Virtuelle" /></a>
                                </div>
							</div>
							
							<!-- RIGHT -->
                            <div class="minipage minipage_right">
							<a name="pour" class="littleButton-green"/><i class="fa fa-smile-o fa-2x"></i></a>
							<a name="contre" class="littleButton-red"/><i class="fa fa-frown-o fa-2x"></i></a>
				<?php
                $comments = getComments($db, $databaseProjPropId);
                foreach($comments as $comment)
                {
				?>
                                    <div class="comment">
                                        <h1><?php echo $comment['Pseudo'];?></h1>
                                        <p><?php echo $comment['Texte'];?></p>
                                    </div>
				<?php
                }
				?>
								<div>
                                    <form method="POST" action="addComment.php">
                                        <input type="hidden" name="projId" value="<?php echo $projId; ?>" />
                                        <input type="hidden" name="projPropId" value="<?php echo $databaseProjPropId; ?>" />
										
                                        <textarea name="comment" placeholder="Ajouter un commentaire" required></textarea>
                                       <input class="littleButton" type="submit" value="Ajouter un commentaire" />
                                    </form>
                                </div>
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
