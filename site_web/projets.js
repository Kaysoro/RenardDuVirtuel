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
