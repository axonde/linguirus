// блок в 100% высоты feature-2
setInterval(setSize, 10);

function setSize() {
	var heightFeatureTextDecoration = document.getElementById('firstElement').clientHeight;
	heightFeatureTextDecoration = String(heightFeatureTextDecoration+"px");
	var secondElement = document.getElementById('secondElement');
	secondElement.style.height = heightFeatureTextDecoration;
}