function cartWishCheck() {
    fetch('http://127.0.0.1:8000/cart_count/')
        .then(response => {
            return response.json();
        })
        .then(data => {
            // console.log(data);
            document.getElementById("cart_icon").innerHTML = data;
        })
        .catch(error => {
            console.log(error);
        })

    fetch('http://127.0.0.1:8000/wish_count/')
        .then(response => {
            return response.json();
        })
        .then(data => {
            document.getElementById("wish_icon").innerHTML = data;
        })
        .catch(error => {
            console.log(error);
        })

}
window.onload = cartWishCheck;

function cartAdd(product_id, thisbtn)
{
    thisbtn.classList.remove("bg-purple-700", "hover:bg-purple-500");
    thisbtn.classList.add("text-center", "bg-gray-500");
    thisbtn.innerHTML = "Cart added";
    thisbtn.disabled=true;
    
    let cartCount = parseInt(document.getElementById("cart_icon").innerHTML);
    document.getElementById("cart_icon").innerHTML = cartCount+1;

    fetch('http://127.0.0.1:8000/cart_add/' + product_id)
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.log(error);
        });
}

function WishAdd(product_id, thisbtn)
{
    thisbtn.classList.remove("bg-green-800", "hover:bg-green-600");
    thisbtn.classList.add("text-center", "bg-stone-800");
    thisbtn.innerHTML = "Cart added";
    thisbtn.disabled=true;

    let wishCount = parseInt(document.getElementById("wish_icon").innerHTML);
    document.getElementById("wish_icon").innerHTML = wishCount+1;

    console.log('http://127.0.0.1:8000/wish/' + product_id);

    fetch('http://127.0.0.1:8000/wish_add/' + product_id)
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.log(error);
        })
}
//console.log('abc');

function QuantityWisePriceChange__old(quantity, unitPrice, productId) {
    document.getElementById("total_price_" + productId).innerHTML = quantity.value * unitPrice + " tk/-";


    let grandTotal = document.getElementById("grandTotal").value;

    grandTotal - (quantity.value * unitPrice)
    // grandTotal.innerHTML = quantity.value * unitPrice + " tk/-";
    // alert(parseIn(quantity) * parseIn(unitPrice));
}

function QuantityWisePriceChange(product_id) {
    // alert("aaaa");
    fetch('http://127.0.0.1:8000/checkoutproductlist/' + product_id)
        .then(response => {
            return response.text();
        })
        .then(data => {
            console.log(data);
            document.getElementById("checkout_product_list_table").innerHTML = data;
            
        })
        .catch(error => {
            console.log(error);
        })
}