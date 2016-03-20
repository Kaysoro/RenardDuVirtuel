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

    document.getElementById("container_proj_" + projId + "_prop_" + projPropId).setAttribute("class", "container_proj opened");
}

function retract_proposition_project(projId, projPropId, projPropNumbers)
{
    document.getElementById("projPropActivationLink_"+projId+"_"+projPropId).setAttribute("onClick", "extend_proposition_project(" + projId + ", " + projPropId + ", " + projPropNumbers + ")");

    document.getElementById("container_proj_" + projId + "_prop_" + projPropId).setAttribute("class", "container_proj");

    document.getElementById("img_proj_" + projId + "_prop_" + projPropId).style.display = "inline-block";

    var propositionProject = document.getElementById("proj_" + projId + "_prop_" + projPropId);
    propositionProject.setAttribute("class", "proposition_project");

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
