function validateUserInput() {
    let dbOperation = document.getElementById("operation").value; 

    let aircraft_code = document.getElementById("aircraft_code").value; 
    let aircraft_model = document.getElementById("aircraft_model").value; 
    let aircraft_capacity = document.getElementById("capacity").value; 
    let aircraft_range = document.getElementById("range").value; 

    let aircraft_location = document.getElementById("aircraft_location").value; 

    let allFieldsFilled = checkIfAllFieldsAreFilled();

    let dbOperationVerified = validateField(dbOperation, "operation");
    let codeVerified = validateCode(aircraft_code, "aircraft_code");
    let modelVerified = validateField(aircraft_model, "aircraft_model");
    let capacityVerified = validateCapacity(aircraft_capacity, "capacity");
    let rangerified = validateRange(aircraft_range, "range");
    let locationVerified = validateField(aircraft_location, "aircraft_location");

    if(allFieldsFilled && dbOperationVerified && codeVerified && modelVerified && capacityVerified && rangerified && locationVerified){
        document.getElementById("aircraft_form").submit();
    }
}

function checkIfAllFieldsAreFilled(){
    let dbOperation = document.getElementById("operation").value; 
    let aircraft_code = document.getElementById("aircraft_code").value; 
    let aircraft_model = document.getElementById("aircraft_model").value; 
    let aircraft_capacity = document.getElementById("capacity").value; 
    let aircraft_range = document.getElementById("range").value; 
    let aircraft_location = document.getElementById("aircraft_location").value; 

    if(isFilled(dbOperation) && isFilled(aircraft_code) && isFilled(aircraft_model) && isFilled(aircraft_capacity)
     && isFilled(aircraft_range) && isFilled(aircraft_location)){
         return true;
    } else {
        return false;
    }
}

function isFilled(field){
    return field.length != 0;
}

function validateCode(inputTxt, fieldName){
    if(inputTxt.length != 0){
        var codeIsValid = false;
        if(parseInt(inputTxt) > 100 && parseInt(inputTxt) < 1000){
            codeIsValid = true
        } else {
            codeIsValid = false;
        }

        if(codeIsValid) {
            document.getElementById(fieldName).style = "border:1px solid green;";
            return true;
        } else {
            alert("Το πεδίο αυτό θα πρέπει να περιέχει μόνο αριθμούς απο 100 μεχρι και 999.");
            document.getElementById(fieldName).value = "";
            document.getElementById(fieldName).placeholder = "Το πεδίο αυτό θα πρέπει να περιέχει μόνο αριθμούς απο 100 μεχρι και 999";
            document.getElementById(fieldName).style = "border:1px solid red;";
            return false;
        }
    } else {
        alert("Το πεδίο" + " " + fieldName + " " + "είναι κενό");
        document.getElementById(fieldName).style = "border:1px solid red;";
        document.getElementById(fieldName).placeholder = "Το πεδίο δεν πρέπει να είναι άδειο";
        return false;
    }
}

function validateCapacity(inputTxt, fieldName){
    if(inputTxt.length != 0){
        var capacityIsValid = false;
        if(parseInt(inputTxt) > 50 && parseInt(inputTxt) < 251){
            capacityIsValid = true
        } else {
            capacityIsValid = false;
        }

        if(capacityIsValid) {
            document.getElementById(fieldName).style = "border:1px solid green;";
            return true;
        } else {
            alert("Το πεδίο αυτό θα πρέπει να περιέχει μόνο αριθμούς απο 50 μεχρι και 250.");
            document.getElementById(fieldName).value = "";
            document.getElementById(fieldName).placeholder = "Το πεδίο αυτό θα πρέπει να περιέχει μόνο αριθμούς απο 50 μεχρι και 250";
            document.getElementById(fieldName).style = "border:1px solid red;";
            return false;
        }
    } else {
        alert("Το πεδίο" + " " + fieldName + " " + "είναι κενό");
        document.getElementById(fieldName).style = "border:1px solid red;";
        document.getElementById(fieldName).placeholder = "Το πεδίο δεν πρέπει να είναι άδειο";
        return false;
    }
}

function validateRange(inputTxt, fieldName){
    if(inputTxt.length != 0){
        var rangeIsValid = false;
        if(parseInt(inputTxt) > 1000 && parseInt(inputTxt) < 10000){
            rangeIsValid = true
        } else {
            rangeIsValid = false;
        }

        if(rangeIsValid) {
            document.getElementById(fieldName).style = "border:1px solid green;";
            return true;
        } else {
            alert("Το πεδίο αυτό θα πρέπει να περιέχει μόνο αριθμούς απο 1000 μεχρι και 9999.");
            document.getElementById(fieldName).value = "";
            document.getElementById(fieldName).placeholder = "Το πεδίο αυτό θα πρέπει να περιέχει μόνο αριθμούς απο 1000 μεχρι και 9999";
            document.getElementById(fieldName).style = "border:1px solid red;";
            return false;
        }
    } else {
        alert("Το πεδίο" + " " + fieldName + " " + "είναι κενό");
        document.getElementById(fieldName).style = "border:1px solid red;";
        document.getElementById(fieldName).placeholder = "Το πεδίο δεν πρέπει να είναι άδειο";
        return false;
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