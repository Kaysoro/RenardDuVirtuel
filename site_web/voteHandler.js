function request(callback, offre, value)
{
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
            callback(xhr.responseText, offre);
    }

    var URLoffre = encodeURIComponent(offre);
    var URLvalue = encodeURIComponent(value);

    xhr.open("GET", "voteHandler.php?offre=" + URLoffre + "&value=" + URLvalue, true);
    xhr.send(null);
}

function buttonResult(sData, offre)
{
    if(sData == "OK")
    {
		var message = document.getElementById("message");
		message.style.display = "block";
        var bouton_pour = document.getElementById("bouton_pour_prop_"+offre);
        var bouton_contre = document.getElementById("bouton_contre_prop_"+offre);

        bouton_pour.setAttribute("class", "littleButton-gray disabled");
        bouton_contre.setAttribute("class", "littleButton-gray disabled");
    }
    else
    {
    }
}
