function showHint(str) 
{
  if (str.length == 0) 
  {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } 
  else 
  {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
	{
      if (this.readyState == 4 && this.status == 200) 
	  {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "views/_search.tpl.php?q=" + str, true);
    xmlhttp.send();
  }
}

function showUser(str) 
{
  if (str == "") 
  {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } 
  else 
  {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
	{
      if (this.readyState == 4 && this.status == 200) 
	  {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getuser.php?q="+str,true);
    xmlhttp.send();
  }
}
