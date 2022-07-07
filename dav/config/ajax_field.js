function getpage(fld){



var page = fld;







var xmlhttp=false; //Clear our fetching variable







        try {







                xmlhttp = new ActiveXObject('Msxml2.XMLHTTP'); //Try the first kind of active x object…







        } catch (e) {







                try {







                        xmlhttp = new







                        ActiveXObject('Microsoft.XMLHTTP'); //Try the second kind of active x object







            } catch (E) {







                xmlhttp = false;







                        }







        }







        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {







                xmlhttp = new XMLHttpRequest(); //If we were able to get a working active x object, start an XMLHttpRequest







        }







        	//This is the path to the file we just finished making *







		







   var file = 'city.php?page='; 







	xmlhttp.open('GET', file + page, true); //Open the file through GET, and add the page we want to retrieve as a GET variable **







    xmlhttp.onreadystatechange=function() {







        if (xmlhttp.readyState==4) { //Check if it is ready to recieve data







                var conten = xmlhttp.responseText; //The content data which has been retrieved ***







                if( conten ){ //Make sure there is something in the content variable







					var contenDemo="<select name='description' class='fieldform'><option readonly>Choose Description</option></select>";







					document.getElementById('conten').innerHTML = conten; 







					//Change the inner content of your div to the newly retrieved content ****







                }







        }







        }







        xmlhttp.send(null) //Nullify the XMLHttpRequest







return false;







}

