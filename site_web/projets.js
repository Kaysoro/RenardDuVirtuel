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
    var propositionProject = document.getElementById("proj_" + projId + "_prop_" + projPropId);
    propositionProject.setAttribute("class", "proposition_project opened");
    //propositionProject.style.width = "100%";

    document.getElementById("img_proj_"+projId+"_prop_"+projPropId).style.display = "none";

    //TODO: visibilite des items a l'ouverture

    /*----visualisateur 3D----*/
    //TODO: remplacer par le unity web player

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
}

function retract_proposition_project(projId, projPropId, projPropNumbers)
{
    document.getElementById("projPropActivationLink_"+projId+"_"+projPropId).setAttribute("onClick", "extend_proposition_project(" + projId + ", " + projPropId + ", " + projPropNumbers + ")");

    document.getElementById("container_proj_" + projId + "_prop_" + projPropId + "_opened").remove();
    document.getElementById("img_proj_" + projId + "_prop_" + projPropId).style.display = "inline-block";

    var propositionProject = document.getElementById("proj_" + projId + "_prop_" + projPropId);
    propositionProject.setAttribute("class", "proposition_project");

    function delayedFunc ()
    {
        if(propositionProject.classList.contains("opened"))
            return;

        for(var i = 0; i < projPropNumbers; ++i)
        {
            if(i == projPropId)
                continue;
            var other_project = document.getElementById("proj_" + projId + "_prop_" + i);
            other_project.style.display = "block";
        }
    }

    propositionProject.addEventListener("transitionend", delayedFunc, true);

    propositionProject.removeEventListener("transitionend", delayedFunc);


}
