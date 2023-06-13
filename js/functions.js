function loadPrice(){
                    
    var res = document.getElementById("foods").value;
    var req = new XMLHttpRequest();
    req.open('POST', '../private/request.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState === 4 && req.status === 200) {
        var response = req.responseText;
        document.getElementById("price").innerHTML = response;
        }
    };
    req.send('res=' + encodeURIComponent(res));
}

    var foodList = []; // Array to store selected food objects
    var i = 1;
    var  totalPrice = 0;  //total price of food ordered

function addFood() {
        event.preventDefault();
        var foodSelect = document.getElementById("foods");
        var selectedFoodName = foodSelect.options[foodSelect.selectedIndex].value;

        var priceElement = document.getElementById("price");
        var price = priceElement.innerText;

        var amountElement = document.querySelector("input[name='amount']");
        var amount = amountElement.value;
        if (selectedFoodName === "" || price === "" || amount === "") {
            return false; 
        }

        var foodObject = {
            name: selectedFoodName,
            price: price,
            amount: amount
        };

        foodList.push(foodObject); 

      
        foodSelect.selectedIndex = 0;
        priceElement.innerText = "";
        amountElement.value = "";

        const id = "orderedList"; 
        displayTable(id,foodObject);
        
}

function displayTable(id, object) {
    var element = document.getElementById(id);
    var footer = document.getElementById("tableFooter");
        var row = document.createElement("tr");
    
        
        var emptyCell = document.createElement("td");
        emptyCell.textContent = i;                   
        row.appendChild(emptyCell);

        var nameCell = document.createElement("td");
        nameCell.textContent = object.name;
        row.appendChild(nameCell);

        var amountCell = document.createElement("td");
        amountCell.textContent = object.amount;
        row.appendChild(amountCell);

        var priceCell = document.createElement("td");
        priceCell.textContent = object.price * object.amount;
        row.appendChild(priceCell);

        element.appendChild(row);

        i++
        totalPrice = totalPrice + (object.price * object.amount);
        footer.innerText = "total price: " + totalPrice;
}



function clearFood(){
            //code to clear food from new order table
}
function takeOrder(foodList) {
    var xhr = new XMLHttpRequest();
    var url = '../private/request.php';
    var jsonData = JSON.stringify(foodList);
    console.log(jsonData);

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/json');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText;
            console.log(response + "##");
            document.getElementById("orderedList").innerHTML = response;
        }
    };

    xhr.send('order=' + jsonData);
    foodList = [];
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.tables form')[1].addEventListener('submit', function(event) {
        event.preventDefault();
        takeOrder(foodList);
    });
});