// JavaScript Document	

function addNewRow(){
}

function ballClicked(t,b){
	var id = "t"+t+"b"+b;
	var curBall = document.getElementById(id);
	
	var destTube = document.getElementById('selectedTube');
	var numBalls = destTube.getElementsByTagName('article').length;
	if (numBalls < 4){
		destTube.appendChild(curBall);
		numBalls = destTube.getElementsByTagName('article').length;
		if (numBalls == 4){
			var timeout=setTimeout(clearTube(),	 1000);
			//clearTimout(timeout);
		}
	}
}

function clearTube(){
	return function(){
		var destTube = document.getElementById('selectedTube');
		while (destTube.firstChild) {
			destTube.removeChild(destTube.firstChild);
		}
	};
}

function fillEmUp(){
	var maxBalls = 4;
	var tubes = document.getElementsByName('tube');
	for(var i=0; i<tubes.length-1; i++){
		var curTube = tubes.item(i).getElementsByName('ball');
		for (var t=0; t < maxBalls; t++){
			var ball = curTube.item(t);
			ball.setAttribute('class','yellow');
		}	
	}
}