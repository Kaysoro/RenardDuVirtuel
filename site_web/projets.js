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
    minipageContainer.setAttribute("class", "minipageContainer");
    container.appendChild(minipageContainer);

    /*----left minipage----*/
    var leftMinipage = document.createElement("div");
    leftMinipage.setAttribute("class", "minipage minipage_left");
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

    /*----boutons de vote----*/
    //TODO: boutons de vote

    /*---right minipage----*/
    var rightMinipage = document.createElement("aside");
    rightMinipage.setAttribute("class", "minipage minipage_right");
    minipageContainer.appendChild(rightMinipage);

    for(var i = 0; i < 4; ++i)
    {
        //TODO: AJAX
        var comment = document.createElement("div");
        comment.setAttribute("class", "comment");
        rightMinipage.appendChild(comment);

        var commentAuthor = document.createElement("h1");
        commentAuthor.appendChild(document.createTextNode("John Doe a commenté"));
        comment.appendChild(commentAuthor);

        var commentContent = document.createElement("p");
        commentContent.appendChild(document.createTextNode("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit nisi quis enim faucibus semper. Nunc tortor sapien, ullamcorper eget fermentum sed, auctor et ligula. Quisque et magna nec orci malesuada lobortis."));
        comment.appendChild(commentContent);
    }

    var addCommentForm = document.createElement("form");
    addCommentForm.setAttribute("method", "POST");
    addCommentForm.setAttribute("action", "addComment.php");
    rightMinipage.appendChild(addCommentForm);

    var addCommentInputName = document.createElement("input");
    addCommentInputName.setAttribute("type", "text");
    addCommentInputName.setAttribute("name", "posterName");
    addCommentInputName.setAttribute("placeholder", "Votre nom");
    addCommentInputName.setAttribute("required", "true");
    addCommentForm.appendChild(addCommentInputName);

    var addCommentInputText = document.createElement("textarea");
    addCommentInputText.setAttribute("name", "comment");
    addCommentInputText.setAttribute("placeholder", "Votre commentaire");
    addCommentForm.appendChild(addCommentInputText);

    var addCommentInputSubmit = document.createElement("input");
    addCommentInputSubmit.setAttribute("type", "submit");
    addCommentInputSubmit.setAttribute("value", "Ajouter un commentaire");
    addCommentForm.appendChild(addCommentInputSubmit);
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
