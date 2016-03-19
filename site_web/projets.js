function extend_description_project(projId)
{
    var descriptionProjet = document.getElementById("description_project_"+projId);
    descriptionProjet.style.display = "block";

    var moreButton = document.getElementById("more_button_"+projId);
    moreButton.setAttribute("class", "moreButton actionLess");
    moreButton.setAttribute("value", "less");
    moreButton.setAttribute("onClick", "retract_description_project("+projId+")");
}

function retract_description_project(projId)
{
    var descriptionProjet = document.getElementById("description_project_"+projId);
    descriptionProjet.style.display = "none";

    var moreButton = document.getElementById("more_button_"+projId);
    moreButton.setAttribute("class", "moreButton actionMore");
    moreButton.setAttribute("value", "more");
    moreButton.setAttribute("onClick", "extend_description_project("+projId+")");
}

function extend_proposition_project(projId, projPropId, projPropNumbers)
{
    document.getElementById("projPropActivationLink_"+projId+"_"+projPropId).setAttribute("onClick", "retract_proposition_project(" + projId + ", " + projPropId + ", " + projPropNumbers + ")");
    for(var i = 0; i < projPropNumbers; ++i)
    {
        if(i == projPropId)
            continue;
        var other_project = document.getElementById("proj_"+projId+"_prop_"+i);
        other_project.style.display = "none";
    }
    var propositionProject = document.getElementById("proj_"+projId+"_prop_"+projPropId);
    propositionProject.style.width = "100%";

    document.getElementById("img_proj_"+projId+"_prop_"+projPropId).style.display = "none";

    //creation de la vue
    var container = document.createElement("div");
    container.setAttribute("id", "container_proj_" + projId + "_prop_" + projPropId + "_opened");
    propositionProject.appendChild(container);

    //TODO: AJAX

    var titreProjet = document.createElement("H1");
    titreProjet.appendChild(document.createTextNode("Titre de la proposition"));
    container.appendChild(titreProjet);

    var minipageContainer = document.createElement("main");
    container.appendChild(minipageContainer);

    var leftMinipage = document.createElement("div");
    leftMinipage.setAttribute("class", "leftMinipage");
    minipageContainer.appendChild(leftMinipage);

    /*----visualisateur 3D----*/
    //TODO: remplacer par le unity web player
    var visualisateur3D = document.createElement("img");
    visualisateur3D.setAttribute("src", "http://placehold.it/640x480");
    leftMinipage.appendChild(visualisateur3D);

    /*----info bloc----*/
    var infoBloc = document.createElement("div"); //TODO: find better HTML element

    var priceTag = document.createElement("span");
    priceTag.appendChild(document.createTextNode("5 000 000€"));
    infoBloc.appendChild(priceTag);

    var VRbutton = document.createElement("input");
    VRbutton.setAttribute("type", "button");
    VRbutton.setAttribute("value", "Réalité Virtuelle");
    infoBloc.appendChild(VRbutton);

    leftMinipage.appendChild(infoBloc);
}

function retract_proposition_project(projId, projPropId, projPropNumbers)
{
    document.getElementById("projPropActivationLink_"+projId+"_"+projPropId).setAttribute("onClick", "extend_proposition_project(" + projId + ", " + projPropId + ", " + projPropNumbers + ")");
    for(var i = 0; i < projPropNumbers; ++i)
    {
        if(i == projPropId)
            continue;
        var other_project = document.getElementById("proj_" + projId + "_prop_" + i);
        other_project.style.display = "block";
    }

    document.getElementById("img_proj_" + projId + "_prop_" + projPropId).style.display = "inline-block";

    document.getElementById("container_proj_" + projId + "_prop_" + projPropId + "_opened").remove();

    var propositionProject = document.getElementById("proj_" + projId + "_prop_" + projPropId);
    propositionProject.style.width = "auto";
}
