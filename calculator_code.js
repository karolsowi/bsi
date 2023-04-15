var operators = ["+", "-", "/", "*"];
var box, lastOpHist, op, equal, dot = null;
var firstNum = true;
var numbers = [];
var operator_value, last_button, calc_operator, total;

function button_number(button) {

    operator = document.getElementsByClassName("operator");
    box = document.getElementById("box");
    last_operation_history = document.getElementById("last_operation_history");
    equal = document.getElementById("equal_sign").value;
    dot = document.getElementById("dot").value;
    last_button = button;

    // jeśli nie naciśnięto operatora ani =
    if (!operators.includes(button) && button!=equal){
        // jeśli to pierwszy naciśnięty
        if (firstNum){
            // 0.
            if (button == dot){
                box.innerText = "0"+dot;
            }
            // jak nie pierwszy to wyczyść i pokaz 
            else {
                box.innerText = button;
            }
            firstNum = false;
        }
        else {
            if (box.innerText.length == 1 && box.innerText == 0){

                if (button == dot){
                    box.innerText += button;
                }
                return;
            }
            // zwróć wartość, jeśli pole już zawiera kropkę i kliknięty przycisk to również kropka
            if (box.innerText.includes(dot) && button == dot){
                return;
            }
            // maximum w input = 20
            if (box.innerText.length == 20){
                return;
            }
            // jeśli naciśnięto "-" a poźniej "." wypisz -0.
            if (button == dot && box.innerText == "-"){
                box.innerText = "-0"+dot;
            }
            // jak nie to cyferke
            else {
                box.innerText += button;
            }  
        }
    }
    // naciśnieto operator
    else {
        // zwróć wartość, jeśli operator został już naciśnięty
        if (operator_value != null && button == operator_value){
            return
        }
        // wyświetl - , jeśli jest to pierwsza wybrana wartość, a następnie zwróć wartość
        if (button == "-" && box.innerText == 0){
            box.innerText = button;
            firstNum = false;
            operator_value = button
            return;
        }
        // zwróć wartość, jeśli operator minus został naciśnięty i jest już wyświetlony na ekranie
        else if (operators.includes(button) && box.innerText == "-"){
            return
        }
        // zwróć wartość, jeśli został naciśnięty operator minus i w historii już jest znak równości
        else if (button == "-" && operator_value == "-" && last_operation_history.innerText.includes("=")){
            return
        }
        // wartość operatora
        if (operators.includes(button)){
            if (typeof last_operator != "undefined" && last_operator != null){
                calc_operator = last_operator
            }
            else {
                calc_operator = button
            }
            if (button == "*"){
                last_operator = "×"
            }
            else if (button == "/"){
                last_operator = "÷"
            }
            else {
                last_operator = button
            }
            operator_value = button
            firstNum = true
        }
        // dodaj pierwszą liczbę do tablicy liczb i wyświetl ją w historii

        if (numbers.length == 0){
            numbers.push(box.innerText)
            if (typeof last_operator != "undefined" && last_operator != null){
                last_operation_history.innerText = box.innerText + " " + last_operator
            }
        }
        // reszta obliczeń
        else {   
            if (numbers.length == 1){
                numbers[1] = box.innerText
            }
            var temp_num = box.innerText
            // oblicz total
            if (button==equal && calc_operator != null){
                var total = calculate(numbers[0], numbers[1], calc_operator)
                box.innerText = total;

                // druga cyferka do historii
                if (!last_operation_history.innerText.includes("=")){
                    last_operation_history.innerText += " " + numbers[1] + " ="
                }
                temp_num = numbers[0]

                numbers[0] = total
                operator_value = null

                // zmień pierwszą liczbę w historii na total.
                var history_arr = last_operation_history.innerText.split(" ")
                history_arr[0] = temp_num
                last_operation_history.innerText = history_arr.join(" ")
            }
            // zaktualizuj historię wartością i wciśniętym operatorem
            else if (calc_operator != null) {
                 last_operation_history.innerText = temp_num + " " + last_operator
                 calc_operator = button
                 numbers = []
                 numbers.push(box.innerText)
            }
        }
    }
}

// obliczenia
function calculate(num1, num2, operator){
    if (operator == "+"){
        total = (Number)(num1)+(Number)(num2)
    }
    else if (operator === "-"){
        total = (Number)(num1)-(Number)(num2)
    }
    else if (operator === "*"){
        total = (Number)(num1)*(Number)(num2)
    }
    else if (operator === "/"){
        total = (Number)(num1)/(Number)(num2)
		if (num2==0 ) {
			alert("Nie dzielimy przez 0!")
			window.location.reload()
		}
    }
    else {
        if (total == box.innerText){
            return total
        }
        else {
            return box.innerText
        }
    }
    // maksymalnie 12 miejsc po przecinku jesli są
    if (!Number.isInteger(total)){
        total = total.toPrecision(12);
    }
    return total;
}

// reset
function button_clear(){
    window.location.reload()
}

function backspace_remove(){
    box = document.getElementById("box");
    var elements = document.getElementsByClassName("operator");

    var last_num = box.innerText;
    last_num = last_num.slice(0, -1)
 
    box.innerText = last_num

    // jak wyczyszczono znaki to 0
    if (box.innerText.length == 0){
        box.innerText = 0
        firstNum = true
    }
}

// zmiana znaku
function plus_minus(){
    box = document.getElementById("box");
    // jak nacisnieto operator
    if (typeof last_operator != "undefined"){
        if (numbers.length>0){
            // jesli ostatnio wciśnieto operator
            if (operators.includes(last_button)){
                // jeśli tylko znak minusa, wyświetl 0
                if (box.innerText == "-"){
                    box.innerText = 0
                    firstNum = true
                    return
                }
                // jeśli nie tylko jest minus, zamień na minus
                else {
                    box.innerText = "-"
                    firstNum = false
                }
            }
            // jeśli ostatnio naciśnięty przycisk nie jest operatorem, zmień jego znak.
            else {
                box.innerText = -box.innerText

                if (numbers.length==1){
                    numbers[0] = box.innerText
                }
                else {
                    numbers[1] = box.innerText
                }
            }
        }
        return
    }
    // jak wyświetla się 0 to pokaż sam znak -
    if (box.innerText == 0){
        box.innerText = "-"
        firstNum = false
        return
    }
    box.innerText = -box.innerText
}

// czyszczenie ostatniego wpisanego
function clear_entry(){
    box = document.getElementById("box");

    if (numbers.length > 0 && typeof last_operator != "undefined"){
        box.innerText = 0
        var temp = numbers[0]
        numbers = []
        numbers.push(temp)
        firstNum = true;
    }
}