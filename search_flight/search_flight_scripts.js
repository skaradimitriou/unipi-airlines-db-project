/*
 * This method clears all input fields from Search Flight page.
 */

function clearSearchBox(){
    document.getElementById("flight_code").value = "";
    document.getElementById("flight_reservation_date").value = "";
}

function submitQuery(){
    let flightNo = document.getElementById("flight_code").value;
    let flightDate = document.getElementById("flight_reservation_date").value;

    let flightNoValidated = validateField(flightNo, "flight_code");
    let flightDateValidated = validateField(flightDate, "flight_reservation_date");

    if(flightNoValidated && flightDateValidated && isFilled(flightNo) && isFilled(flightDate)){
        document.getElementById("search_flight_form").submit();
    }
}

function validateField(inputTxt, fieldName){
    if(inputTxt.length != 0){
        document.getElementById(fieldName).style = "border:1px solid green;";

        var reversedDate = inputTxt.split("/").reverse().join("/");
        var formattedDate = reversedDate.replaceAll("/","-");

        document.getElementById("flight_reservation_date").value = formattedDate;

        return true;
    } else {
        alert("Το πεδίο" + " " + fieldName + " " + "είναι κενό");
        document.getElementById(fieldName).style = "border:1px solid red;";
        document.getElementById(fieldName).placeholder = "Το πεδίο δεν πρέπει να είναι άδειο";
        return false;
    }
}

function isFilled(field){
    return field.length != 0;
}