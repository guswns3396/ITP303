document.querySelector("#rating-id").oninput = function() {
	document.querySelector("#slider-val").innerHTML = document.querySelector("#rating-id").value;
}