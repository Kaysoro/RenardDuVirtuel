function request(callback, offre, value)
{
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
            callback(xhr.responseText);
    }

    var URLoffre = encodeURIComponent(offre);
    var URLvalue = encodeURIComponent(value);

    xhr.open("GET", "voteHandler.php?offre=" + URLoffre + "&value=" + URLvalue, true);
    xhr.send(null);
}

function buttonResult(sData)
{
    if(sData == "OK")
    {
        //TODO
    }
    else
    {
        //TODO
    }
}
