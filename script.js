// блок в 100% высоты feature-2
setInterval(setSize, 10);
setInterval(setSize__collateral, 10);
setInterval(setHeight__collateral, 10);

function setSize() {
	var heightFeatureTextDecoration = document.getElementById('firstElement').clientHeight;
	heightFeatureTextDecoration = String(heightFeatureTextDecoration+"px");
	var secondElement = document.getElementById('secondElement');
	secondElement.style.height = heightFeatureTextDecoration;
}

function setSize__collateral() {
	var widthFeatureTextDecoration = document.getElementById('collateralText').clientWidth;
	widthFeatureTextDecoration = String(widthFeatureTextDecoration+"px");
	var secondElement = document.getElementById('collateralElement');
	secondElement.style.width = widthFeatureTextDecoration;
}

function setHeight__collateral() {
	var firstElementHeight = document.getElementById('collateralText').clientHeight;
	firstElementHeight = String((firstElementHeight+7)+"px");
	var secondElement = document.getElementById('collateralElement');
	secondElement.style.top = firstElementHeight;
}


// обработчик событий кнопок

var buttons = document.querySelectorAll('.button');

// register mobile button
var burger = buttons[0];
var contact = buttons[1];
var burgerMenu = document.querySelector('.header--wraper--nav__mobile__burgerMenu')
var burgerItems = burgerMenu.querySelectorAll('.btn-item a');

// logic of mobile buttons
burger.addEventListener("click", function() {
	console.log("click on burger");
	burgerMenu.classList.toggle("active");
	burgerMenu.classList.contains("active") ? burger.setAttribute('style', 'position: fixed;') : burger.setAttribute('style', 'position: inherit;');
});

for (let i=0; i < burgerItems.length; i++) {
	burgerItems[i].addEventListener("click", function() {
		burgerMenu.classList.toggle("active");
	});
}

contact.addEventListener("click", function() {
	console.log("click on contact");
});


//for booking
for (let i=2; i < buttons.length; i++) {
	buttons[i].addEventListener("click", function() {
			alert("⚠️ ЗАПИСЬ НЕДОСТУПНА / BOOKING NOT AVAILABLE ⚠️")
	});
}