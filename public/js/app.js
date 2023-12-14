// DETALLLES: permite mostrar y ocultar los detalles de un producto//
// Espera a que el contenido del DOM se cargue antes de ejecutar el JavaScript
 document.addEventListener("DOMContentLoaded", function() {
    // Selecciona todos los elementos necesarios del DOM
    const productCards = document.querySelectorAll(".product");
    const filterButton = document.getElementById("filterButton");
    const resetButton = document.getElementById("resetButton");
    const toggleButton = document.getElementById("toggleButton");

    // Añade un evento de escucha a cada tarjeta de producto para mostrar y ocultar los detalles del producto
    productCards.forEach(productCard => {
        productCard.addEventListener("mouseover", showDetails);
        productCard.addEventListener("mouseout", hideDetails);
    });

    // Añade eventos de escucha para los botones de filtro, restablecimiento y alternancia
    filterButton.addEventListener("click", filterData);
    resetButton.addEventListener("click", resetFilters);
    toggleButton.addEventListener("click", toggleFilters);
});

//La función showDetails se encarga de mostrar los detalles cuando se pasa el cursor
function showDetails(event) {
    const productCard = event.currentTarget;
    const productName = productCard.querySelector("h3").textContent;
    const productType = productCard.getAttribute("data-type");
    const productOrigin = productCard.getAttribute("data-origin");
    const productPrice = productCard.getAttribute("data-price");

    const popupContent = `
        <h2>Detalles del Café</h2>
        <p><strong>Nombre:</strong> ${productName}</p>
        <p><strong>Tipo:</strong> ${productType}</p>
        <p><strong>Origen:</strong> ${productOrigin}</p>
        <p><strong>Precio:</strong> $${productPrice}</p>
    `;

    // Añade los detalles del producto a un div dentro de la tarjeta del producto
    const detailsDiv = productCard.querySelector(".details");
    detailsDiv.innerHTML = popupContent;
    detailsDiv.style.display = "block";
}


// Oculta los detalles del producto
function hideDetails(event) {
    const productCard = event.currentTarget;
    const detailsDiv = productCard.querySelector(".details");
    detailsDiv.style.display = "none";
}
//FILTROS //
// Filtra las tarjetas de producto basándose en los valores de los campos de filtro
function filterData() {
    const type = document.getElementById("type").value.toLowerCase();
    const origin = document.getElementById("origin").value.toLowerCase();
    const price = document.getElementById("price").value;
    const name = document.getElementById("name").value.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();

    const productCards = document.querySelectorAll(".product");

    productCards.forEach(productCard => {
        const productName = productCard.querySelector("h3").textContent.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
        const productType = productCard.getAttribute("data-type").toLowerCase();
        const productOrigin = productCard.getAttribute("data-origin").toLowerCase();
        const productPrice = parseFloat(productCard.getAttribute("data-price"));

        if (
            (name === "" || productName.includes(name)) &&
            (type === "" || productType === type) &&
            (origin === "" || productOrigin === origin) &&
            (price === "" || productPrice <= parseFloat(price))
        ) {
            productCard.style.display = "block";
        } else {
            productCard.style.display = "none";
        }
    });
}

// Restablece los campos de filtro y muestra todas las tarjetas de producto
function resetFilters() {
    document.getElementById("type").value = "";
    document.getElementById("origin").value = "";
    document.getElementById("price").value = "";
    document.getElementById("name").value = "";

    const productCards = document.querySelectorAll(".product");
    productCards.forEach(productCard => {
        productCard.style.display = "block";
    });
}

// Muestra y oculta la sección de filtros
function toggleFilters() {
    const filters = document.querySelector(".filters");
    if (filters.style.display === "none") {
        filters.style.display = "block";
    } else {
        filters.style.display = "none";
    }
}
////CARRITO ////

// Obtén todos los botones de incremento y decremento
var incrementButtons = document.querySelectorAll('.increment');
var decrementButtons = document.querySelectorAll('.decrement');

// Añade un event listener a cada botón de incremento
incrementButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var quantityInput = event.target.parentElement.querySelector('.quantity');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    });
});

// Añade un event listener a cada botón de decremento
decrementButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var quantityInput = event.target.parentElement.querySelector('.quantity');
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    });
});

// Obtén todos los botones de "Agregar al carrito"
// Obtén todos los botones de "Agregar al carrito"
var addToCartButtons = document.querySelectorAll('.add-to-cart');

addToCartButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        // Obtén la información del producto
        var product = event.target.parentElement;
        var name = product.querySelector('h3').textContent;
        var price = parseFloat(product.getAttribute('data-price'));
        var quantity = parseInt(product.querySelector('.quantity').value);
        var imageSrc = product.querySelector('.product-image').src;

        // Añade un atributo de datos al input de cantidad con el nombre del producto
        product.querySelector('.quantity').setAttribute('data-name', name);

        // Añade el producto al carrito
        addToCart(product, name, price, quantity, imageSrc);
    });
});

function addToCart(product, name, price, quantity, imageSrc) {
    // Obtén el carrito y los totales
    var cart = document.getElementById('carrito');
    var totalQuantity = document.getElementById('total-quantity');
    var totalPrice = document.getElementById('total-price');

    // Crea un nuevo elemento para el producto en el carrito
    var cartItem = document.createElement('div');
    cartItem.innerHTML = `
        <img src="${imageSrc}" alt="${name}">
        <p>${name} x${quantity}: $${(price * quantity).toFixed(2)}</p>
        <button class="remove">Eliminar</button>
    `;
    cartItem.setAttribute('data-name', name); // Añade un atributo de datos con el nombre del producto

    // Añade el producto al carrito
    cart.insertBefore(cartItem, totalQuantity);

    // Añade un event listener al botón de "Eliminar"
    cartItem.querySelector('.remove').addEventListener('click', function(event) {
        // Resta la cantidad y el precio del producto de los totales
        totalQuantity.textContent = 'Cantidad total: ' + (parseInt(totalQuantity.textContent.replace('Cantidad total: ', '')) - quantity);
        totalPrice.textContent = 'Precio total: $' + (parseFloat(totalPrice.textContent.replace('Precio total: $', '')) - price * quantity).toFixed(2);

        // Busca el input de cantidad que tenga el mismo atributo de datos y restablece su valor a 1
        var quantityInput = document.querySelector(`.quantity[data-name="${name}"]`);
        if (quantityInput) {
            quantityInput.value = 1;
        }

        // Decrementa la notificación del carrito
        var cartNotification = document.getElementById('cart-notification');
        cartNotification.textContent = parseInt(cartNotification.textContent) - 1;

        // Elimina el producto del carrito
cart.removeChild(cartItem);
});

// Incrementa la notificación del carrito
var cartNotification = document.getElementById('cart-notification');
cartNotification.textContent = parseInt(cartNotification.textContent) + 1;

// Actualiza los totales
totalQuantity.textContent = 'Cantidad total: ' + (parseInt(totalQuantity.textContent.replace('Cantidad total: ', '')) + quantity);
totalPrice.textContent = 'Precio total: $' + (parseFloat(totalPrice.textContent.replace('Precio total: $', '')) + price * quantity).toFixed(2);
}

// Añade un event listener al botón de "Vaciar carrito", "Cancelar" y "Confirmar"
['vaciar-carrito'].forEach(function(id) {
var button = document.getElementById(id);
if (button) {
    button.addEventListener('click', function() {
        // Restablece la notificación del carrito
        document.getElementById('cart-notification').textContent = '0';
    });
}
});

// Añade un event listener a los botones "Cancelar" y "Confirmar" usando jQuery
['#cancel', '#confirm'].forEach(function(id) {
$(id).click(function() {
    // Restablece la notificación del carrito
    document.getElementById('cart-notification').textContent = '0';
});
});


// Obtén el botón que muestra y oculta el carrito
var showCartButton = document.getElementById('show-cart');

// Añade un event listener al botón
showCartButton.addEventListener('click', function(event) {
// Muestra u oculta el carrito
var cart = document.getElementById('carrito');
if (cart.style.display === 'none') {
cart.style.display = 'block';
} else {
cart.style.display = 'none';
}
});

// VENTANA FLOTANTE DE COMPRA//
$(document).ready(function() {
    const checkoutButton = $("#checkout");
    const confirmButton = $("#confirm");
    const cancelButton = $("#cancel");
    const modalBackground = $("#modal-background");
    const modal = $("#modal");
    const carrito = $("#carrito");
    const emptyCartButton = $("#vaciar-carrito");

    emptyCartButton.click(function() {
        clearFields();
    });

    checkoutButton.click(function() {
        modalBackground.show();
        modal.show();
    });

    cancelButton.click(function() {
        modalBackground.hide();
        modal.hide();
        carrito.hide();
        clearFields();
    });

    confirmButton.click(function(event) {
        var productsInCart = updateCart();

        if (productsInCart.length === 0) {
            alert('Por favor, añade productos al carrito antes de confirmar la compra.');
            return;
        }

        var phone = document.querySelector('input[name="phone"]').value;
        var payment = document.querySelector('select[name="payment"]').value;
        var names = document.querySelector('input[name="names"]').value;

        var productData = [];

        productsInCart.forEach(product => {
            var productText = product.querySelector('p').textContent;
            var name = productText.split(' x')[0];
            var quantity = parseInt(productText.split(' x')[1].split(':')[0]);
            var price = parseFloat(productText.split(':')[1].replace('$', ''));

            productData.push({
                name: name,
                price: price,
                quantity: quantity
            });
        });

        var data = {
            payment: payment,
            names: names,
            phone: phone,
            products: productData
        };

        fetch('/purchase/store', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('La respuesta de la red no fue correcta');
            }
            return respuesta.json();
        })
        .then(data => {
            console.log('Success:', data);
            alert('Compra exitosa');
            modalBackground.hide();
            modal.hide();
            carrito.hide();
            clearFields();
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('Ha ocurrido un error al procesar tu compra. Por favor, intenta de nuevo.');
        });
    });

    function updateCart() {
        return document.querySelectorAll('#carrito div');
    }

    function clearFields() {
        var productsInCart = updateCart();
        productsInCart.forEach(product => {
            product.remove();
        });

        var quantityInputs = document.querySelectorAll('.quantity');
        quantityInputs.forEach(input => {
            input.value = 1;
        });

        var totalQuantity = document.getElementById('total-quantity');
        var totalPrice = document.getElementById('total-price');
        totalQuantity.textContent = 'Cantidad total: 0';
        totalPrice.textContent = 'Precio total: $0.00';
    }
});