function jimxSearch(par){
	
		var searchArea = null,
			postArea = null,
			d=document,
			searchArea = par.sbox || "searchArea",
			postArea = par.sdata || "postArea",
			strToDisplay = par.sdisplay || "Showing results for: ";

		//<input type="text" placeHolder="search anything.." /></div>
		function setDiv(){
			var newSearchBox = d.createElement("input");
			newSearchBox.setAttribute("type","text");
			newSearchBox.setAttribute("id","text");
			newSearchBox.setAttribute("placeHolder","Search anything...");
			d.getElementById(searchArea).appendChild(newSearchBox);
		}

		function showAll(searchArea){
			var postClass = d.getElementsByClassName(postArea);
			searchArea.childNodes[1].innerHTML="";
			  	for (var i = 0 ; i < postClass.length; i++) { postClass[i].style.display="block";};
		}

		function searchJimx()
		{
		  if(searchArea!=null && postArea!=null)
			{
				var postClass = d.getElementsByClassName(postArea);
				var sbox = d.getElementById(searchArea).childNodes[0];
				var infoDiv = sbox.parentNode.childNodes[1];
				var strToSearch = sbox.value.trim().toLowerCase();
				
				if(strToSearch == "" ){
					 showAll(sbox.parentNode);
			 	}
			    else{
			
					infoDiv.innerHTML = '<br><br><i>'+strToDisplay+'</i>" <b>'+strToSearch+'</b> "...';
					  	for (var i = 0 ; i < postClass.length; i++) {
							s = postClass[i].textContent;
					 			if(s.toLowerCase().indexOf(strToSearch) > -1)	
								{
									postClass[i].style.display="block";
								}
								else{
									postClass[i].style.display="none";
								}
						}
				}		
			}
		}
		
		window.onload=function(){
			setDiv();
			var sbox = d.getElementById(searchArea).childNodes[0];
			var infoDiv = d.createElement("span");
			sbox.parentNode.appendChild(infoDiv);	
			sbox.addEventListener("keyup",searchJimx); 
		}
	}


jimxSearch({
	sbox : "searchArea",
	sdata : "postArea",
	stype : 0,
	sdisplay : "Displaying results for..."
});
