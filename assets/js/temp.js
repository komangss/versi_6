
$(document).ready(function () {
	$("#celcius").click(function () {
		$("#showCelcius").show();
		$("#showfhn").hide();
		$("#showkvn").hide();
	});
	$("#kvn").click(function () {
		$("#showkvn").show();
		$("#showCelcius").hide();
		$("#showfhn").hide();
	});
	$("#fhn").click(function () {
		$("#showfhn").show();
		$("#showCelcius").hide();
		$("#showkvn").hide();
	});
	$("#btnreply").click(function () {
		$("#reply").show();
	});

	document.getElementById("showfhn").style.display = "none";
	document.getElementById("showkvn").style.display = "none";


	function temperatureConverter(valNum) {
		valNum = parseFloat(valNum);
		document.getElementById("outputFahrenheit").innerHTML = (valNum * 1.8) + 32;
		document.getElementById("outputKelvin").innerHTML = valNum + 273.15;
		if (isNaN(valNum)) {
			document.getElementById("outputFahrenheit").innerHTML = "Input Kosong";
			document.getElementById("outputKelvin").innerHTML = "Input Kosong";
		}
	}
	function temperatureConverter2(valNum2) {
		valNum2 = parseFloat(valNum2);
		document.getElementById("outputCelcius").innerHTML = (valNum2 - 32) / 1.8;
		document.getElementById("outputKelvin2").innerHTML = valNum2 + 273.15;
		if (isNaN(valNum2)) {
			document.getElementById("outputCelcius").innerHTML = "Input Kosong";
			document.getElementById("outputKelvin2").innerHTML = "Input Kosong";
		}
	}
	function temperatureConverter3(valNum3) {
		valNum3 = parseFloat(valNum3);
		document.getElementById("outputFahrenheit2").innerHTML = ((valNum3 - 273.15) * 1.8) + 32;
		document.getElementById("outputCelcius2").innerHTML = valNum3 - 273.15;
		if (isNaN(valNum3)) {
			document.getElementById("outputFahrenheit2").innerHTML = "Input Kosong";
			document.getElementById("outputCelcius2").innerHTML = "Input Kosong";
		}
	}


});
