//console.log funktion 
/* var debug = 1;
window.log = function(a){ if ( debug == 1 ) console.log(a || "");}; */

// Import all the files used in utils
import {utilsExp} from "./components/utils";
import {headerExp} from "./components/header";
import {frontpageExp} from "./components/frontpage";

//export to index
export const exp = function exports() {
    utilsExp();
    headerExp(); 
    frontpageExp();

}
