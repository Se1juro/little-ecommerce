const formatter = new Intl.NumberFormat("es-CO", {
    style: "currency",
    currency: "COP",
});
let prices = document.querySelectorAll(".price");
for (const price of prices) {
    price.innerHTML=formatter.format(price.textContent);
}
