const TOGGLE = document.getElementById("showHide");
TOGGLE.addEventListener("onclick", showHoliday);
const HOLIDAY = document.getElementById("currentHoliday");

//if button is pressed with id="showHide"
//it will toggle showing the next holiday or hiding the next holiday
function showHoliday() {
    //if holiday is hidden, remove hidden attribute
    if(HOLIDAY.hasAttribute("hidden") == true) {
        HOLIDAY.removeAttribute("hidden");
        TOGGLE.innerHTML = "Hide Next Holiday";
    //if holiday is shown, set hidden attribute to hidden
    } else {
        HOLIDAY.setAttribute("hidden", "hidden");
        TOGGLE.innerHTML = "Show Next Holiday";
    } 
}