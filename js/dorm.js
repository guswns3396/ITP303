let box = document.querySelector("#desc-box");
let short = document.querySelector("#short");
let long = document.querySelector("#long");
let more = document.querySelector("#more");
let less = document.querySelector("#less");
console.log(box);
box.onclick = function() {
	if (long.classList.contains("hidden")) {
		long.classList.remove("hidden");
		short.classList.add("hidden");
		less.classList.remove("hidden");
		more.classList.add("hidden");
	}
	else {
		short.classList.remove("hidden");
		long.classList.add("hidden");
		more.classList.remove("hidden");
		less.classList.add("hidden");
	}
}