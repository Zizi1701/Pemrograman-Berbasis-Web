console.log("Tugas3.js berhasil dimuat!");

const fibonacci = (n) => {
    let fib = [0, 1];
    for (let i = 2; i < n; i++) {
        fib[i] = fib[i - 1] + fib[i - 2];
    }
    return fib;
};

console.log("Fungsi Fibonacci siap digunakan!");

const calculator = (operator, ...numbers) => {
    switch (operator) {
        case "+":
            return numbers.reduce((acc, num) => acc + num, 0);
        case "-":
            return numbers.reduce((acc, num) => acc - num);
        case "*":
            return numbers.reduce((acc, num) => acc * num, 1);
        case "/":
            return numbers.reduce((acc, num) => acc / num);
        case "%":
            return numbers.reduce((acc, num) => acc % num);
        default:
            return "Operator tidak dikenal!";
    }
};

console.log("Kalkulator siap digunakan!");
