var n = 20;

function f1() {
	var n = 999;
	nAdd = function() {
		n = n + 1;
	}
	function f2() {
		n++;
		console.log(n);
	}

	return f2;
}

//f1();
//nAdd();
console.log(n);
var jj = f1();
jj();
console.log(n);
jj();
jj();