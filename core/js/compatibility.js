
//https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Function/bind
if (!Function.prototype.bind) {
	Function.prototype.bind = function (oThis) {
		if (typeof this !== "function") {
			// closest thing possible to the ECMAScript 5 internal IsCallable function
			throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
		}

		var aArgs = Array.prototype.slice.call(arguments, 1),
			fToBind = this,
			fNOP = function () {},
			fBound = function () {
				return fToBind.apply(this instanceof fNOP && oThis
					? this
					: oThis,
					aArgs.concat(Array.prototype.slice.call(arguments)));
			};

		fNOP.prototype = this.prototype;
		fBound.prototype = new fNOP();

		return fBound;
	};
}

//https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/String/Trim
if(!String.prototype.trim) {
	String.prototype.trim = function () {
		return this.replace(/^\s+|\s+$/g,'');
	};
}

// Older Firefoxes doesn't support outerHTML
// From http://stackoverflow.com/questions/1700870/how-do-i-do-outerhtml-in-firefox#answer-3819589
function outerHTML(node){
	// In newer browsers use the internal property otherwise build a wrapper.
	return node.outerHTML || (
	function(n){
		var div = document.createElement('div'), h;
		div.appendChild( n.cloneNode(true) );
		h = div.innerHTML;
		div = null;
		return h;
	})(node);
}
