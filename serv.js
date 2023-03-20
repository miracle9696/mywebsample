function servdoc(){
		var serv = new XMLHttpRequest();
		serv.onreadystatechange = function() {
			if (this.readystate == 4 && this.status == 200) {
				document.getElementById('detail').innerHTML = this.responsText;
			}
		};
		serv.open("GET", "service.html", true);
		serv.send();
	}