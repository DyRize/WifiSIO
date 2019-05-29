    	var monText = "Rouahi Mohamed Amine . email : rouahimedamine@gmail.com, skype : rouahimedamine, Portable : +216 26 711 513 Site web : www.symbolle.com .  J'aimerais travailler dans un poste de développeur/intégrateur informatique, où je pourrait mettre à contribution mes compétences";
		
		var TabText = monText.split("");
		

		
		var temps;
		
		function loop(){
		
			if(TabText.length > 0){
				document.getElementById("text_machine").innerHTML += TabText.shift();
			}else{
                            clearTimeout(temps);
                        }
		
                temps = setTimeout('loop()',100);
                
		}
		loop();