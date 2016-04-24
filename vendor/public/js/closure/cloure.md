
```
var n = 20;

function f1() {
	var n = 999;
	nAdd = function() {
		n = n + 1;
	}
	function f2() {
		console.log(n);
	}

	return f2;
}
```

##nAdd为全局变量，但是因为在函数内部声明，所以必须等到函数执行时候才能真正声明。
nAdd(); //undifined
```
var result = f1();
result();
```
##nAdd()在f1()执行后，声明为全局变量，可以在函数外部调用，但因为定义在f1()内，所以函数的作用域也在f1()内，因此 nAdd引用变量n时候，回向父级检查，首先用的是f1 内的n;
```
nAdd();
result();
```

```
