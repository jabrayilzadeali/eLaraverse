import { sendDataToBackend } from "./helpers";

const wishlists = document.querySelectorAll('[data-wishlist-toggle]')
wishlists?.forEach(wishlist => {
    wishlist.addEventListener('submit', (e) => {
        e.preventDefault()
        console.log(e.target)
        const productId = e.target.querySelector('input').value

        sendDataToBackend({ product_id: productId }, 'POST', '/api/wishlist/toggle')
            .then((item) => {
                if ( document.URL.includes("wishlist") ) {
                    console.log('here')
                    document.querySelector(`[data-product="${item.product_id}"]`).remove()
                } else {
                    document.querySelector(`[data-wishlist-btn="${item.product_id}"]`).innerHTML = item.wishlistHTML

                }
                console.log(item)
            })
            .catch((error) => {
                console.error("Error fetching carts:", error);
            });
    })
})
