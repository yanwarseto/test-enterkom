document.addEventListener('DOMContentLoaded', () => {
    const cartItems = [];
    const buttons = document.querySelectorAll('.add-to-cart');
    const modalButtons = document.querySelectorAll('.add-to-cart-modal');
    const orderButton = document.querySelector('.order-menu'); // Select the order button

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            addToCart(button);
        });
    });

    modalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal');
            const selectedVariant = modal.querySelector('.form-check-input:checked');
            if (selectedVariant) {
                addToCart(selectedVariant);
            }
        });
    });

    orderButton.addEventListener('click', () => {
        saveOrder();
    });

    function addToCart(button) {
        let uid_order = button.getAttribute('data-id'); // Changed to uid_order
        let name = button.getAttribute('data-name');
        let varian = button.getAttribute('data-varian');
        let image = button.getAttribute('data-image');
        let price = parseFloat(button.getAttribute('data-harga')); 
        let pidvarian = button.getAttribute('data-pidvarian'); 

        if (varian == null || varian === "") {
            varian = '-';
        }

        // Check if item already exists in the cart
        const existingItem = cartItems.find(item => item.uid_order === uid_order && item.varian === varian);
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cartItems.push({ uid_order, name, varian, image, price, pidvarian, quantity: 1 });
        }

        updateCartModal();
    }

    function updateCartModal() {
        const cartItemsContainer = document.getElementById('cart-items');
        const totalHargaElement = document.getElementById('total-harga');
        cartItemsContainer.innerHTML = '';

        // Create a number formatter for currency
        const currencyFormatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        });

        let totalHarga = 0;

        cartItems.forEach(item => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('col-12', 'mb-3');
            cartItem.innerHTML = `
                <div class="row">
                    <div class="col-4">
                        <div class="dish-img"><a href="#"><img src="${item.image}" alt="" class="rounded-circle img-fluid"></a></div>
                    </div>
                    <div class="col-5">
                        <div class="dish-content">
                            <h5 class="dish-title"><b>${item.name}</b></h5>
                            <div class="menu-price">
                                <p style="font-style: italic; font-weight:bold; font-size:15px"> Varian : ${item.varian} </p>
                                <p class="dish-title"><b>Quantity: ${item.quantity}</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3" style="padding-left:0">
                        <div class="dish-content">
                            <p class="dish-title"><b>${currencyFormatter.format(item.price * item.quantity)}</b></p>
                        </div>
                    </div>
                </div>
            `;
            cartItemsContainer.appendChild(cartItem);

            totalHarga += item.price * item.quantity;
        });

        totalHargaElement.textContent = currencyFormatter.format(totalHarga);
    }

    function saveOrder() {
        // Directly create an array of items without wrapping it in an "items" key
        const orderData = cartItems.map(item => ({
            uid_order: item.uid_order,
            nama_pesanan: item.name,
            varian: item.varian,
            quantity: item.quantity,
            price: item.price * item.quantity, // Total price for the item
            uid_pesanan_master: generateUID(), // Ensure this function is defined
            pidvarian: item.pidvarian,
        }));
       
        fetch('http://localhost/test-enterkom/public/save-order', { // Replace with your actual endpoint
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(orderData), // Send the array directly
        })
        .then(response => response.json())
        .then(data => {
            console.log('Response from server:', data); // Log the complete response
            if (data.success) {
                alert('Order has been saved successfully!');
                // Clear the cart
                cartItems.length = 0;
                updateCartModal();
            } else {
                alert('Error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error saving your order. Please try again.');
        });
    }
    

    function generateUID() {
        return 'uid-' + Math.random().toString(36).substr(2, 9);
    }
});
