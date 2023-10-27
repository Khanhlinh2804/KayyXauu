
// tăng sản phẩm
let numberQuantity = document.getElementById('quantity');
let quantity = numberQuantity.value;
let maxQuantity = parent('{{ $product-> quantity}}'); // Số lượng tối đa

let render = (quantity) => {
    numberQuantity.value = quantity;
}

let handlePlus = () => {
    if (quantity < maxQuantity) {
        quantity++;
        render(quantity);
    }
}

let handleMinus = () => {
    if (quantity > 1) {
        quantity--;
    }
    render(quantity);
}

numberQuantity.addEventListener('input', () => {
    quantity = numberQuantity.value;
    quantity = parseInt(quantity); // Đưa về dạng số
    quantity = (isNaN(quantity) || quantity == 0) ? 1 : quantity;

    // Kiểm tra nếu quantity vượt quá maxQuantity
    if (quantity > maxQuantity) {
        quantity = maxQuantity;
    }

    render(quantity);
});


// ----------sort---------
$(document).ready(function(){
    $("#sort").on('change',function(){
        this.form.submit();
    })
});
