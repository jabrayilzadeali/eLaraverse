import "./bootstrap";
import "./carousel";
import "./theme";
import "./navbar";
import "./userOptions";
import "./productsMobileFilter";
import "./sortProducts";
import "./changeProductTab";
import "./auth";
import "./cartToggle";
import "./cart"
import {
    calculateTotalPrice,
    updateProductsUi,
} from "./helpers";
import "./checkout"
import "./wishlist"

const flashMessage = document.querySelector('[flash-message]')



if (flashMessage) {
    flashMessage.style.display = 'none';
}

updateProductsUi();

localStorage.setItem("firstTimeLogin", false);
