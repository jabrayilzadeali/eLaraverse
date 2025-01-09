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


updateProductsUi();

localStorage.setItem("firstTimeLogin", false);
