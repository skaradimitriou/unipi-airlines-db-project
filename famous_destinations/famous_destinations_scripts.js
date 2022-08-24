function clearSearchBox(){
    document.getElementById("flight_year").value = "";
}

function submitQuery(){
    let flightYear = document.getElementById("flight_year").value;
    let flightYearValidated = validateField(flightYear, "flight_year");

    if(flightYearValidated && isFilled(flightYear)){
        document.getElementById("popular_flights_form").submit();
    }
}

function validateField(inputTxt, fieldName){
    if(inputTxt.length != 0){
        document.getElementById(fieldName).style = "border:1px solid green;";
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

/**
 * Function that contains only number characters on text change
 */

 function containsOnlyNumbers(fieldName){
    let field =  document.getElementById(fieldName).value;

    const reg = new RegExp('^[0-9]+$');
    if(field != ""){
        if(!(reg.test(field))){
            alert("Το πεδίο αυτό θα πρέπει να περιέχει μόνο αριθμούς.");
            document.getElementById(fieldName).value = "";
            document.getElementById(fieldName).placeholder = "Το πεδίο αυτό θα πρέπει να περιέχει μόνο αριθμούς.";
            document.getElementById(fieldName).style = "border:1px solid red;";
        } else {
            document.getElementById(fieldName).style = "border:none";
        }
    }
}