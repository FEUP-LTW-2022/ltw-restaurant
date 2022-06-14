var formHolder = [] ;
var total;
var totalPrice;
var cart;

function openTab(x, TabName) {
    let i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        tablinks[i].style.borderBottom="none";}

    tablinks[x].style.borderBottom="4px solid green";
    document.getElementById(TabName).style.display = "block";
}
function updatePrice(id,value) {
    children = formHolder[0].children;
    for (let i = 0; i < children.length; i++) {
        if (children[i].id == id) {

            children[i].children[1].innerHTML = parseFloat(children[i].children[1].id) * parseInt(value);
            mybool = true;
        }
    }

    total++;
    totalPrice = parseFloat(totalPrice) + parseFloat(value);
    console.log(totalPrice);

    cart.children[2].children[0].innerHTML = totalPrice;
}


function generateOrder(name,id,price) {
    let input = document.createElement('INPUT');
    input.classList.add("inputCart");
    input.type = 'number';
    input.name = 'dishes[' + id + ']';
    input.id = id;
    input.value = 1;
    let p = document.createElement('p');
    p.id = id;
    p.innerText = name;
    let priceElem = document.createElement('p');
    priceElem.id = price;
    priceElem.innerText = price;
    input.onchange = function () {
        updatePrice(input.id,input.value);
    }
    p.appendChild(input);
    p.appendChild(priceElem);
    formHolder[0].appendChild(p);
}

function addToCart(name,id,price, restaurantID) {
    console.log("ok")
    let cartList = document.getElementsByClassName("dropdown-content");
    cart = cartList[0];
    if ((formHolder.length == 0) || (formHolder[0].id != restaurantID)) {
        let newForm = document.createElement('FORM');
        newForm.classList.add("edit-restaurant")
        newForm.id = restaurantID;
        newForm.name = 'form';
        newForm.method = 'POST';
        newForm.action = 'checkout.php';
        formHolder[0] = newForm;
        cart.appendChild(newForm);

        generateOrder(name,id,price);

        let checkoutBtn = document.createElement('button');
        checkoutBtn.innerHTML = "Checkout"
        checkoutBtn.classList.add("checkbtn")
        checkoutBtn.onclick =function (){formHolder[0].submit()};


        let CartPrice = document.createElement('div');
        CartPrice.innerHTML = 'total';
        let priceDiv = document.createElement('div');
        priceDiv.innerHTML = price;


        CartPrice.appendChild(priceDiv);
        cart.appendChild(CartPrice);
        cart.appendChild(checkoutBtn);

        totalPrice = price;
    } else {

        let children = formHolder[0].children;
        console.log(children[0]);

        let mybool = false;
        for (let i = 0; i < children.length; i++) {
            if (children[i].id == id) {
                children[i].children[0].value++;
                children[i].children[1].innerHTML = parseFloat(children[i].children[1].innerHTML) + parseFloat(price);
                mybool = true;
            }
        }

        if (mybool === false){
            generateOrder(name,id,price);
        }

        total++;
        totalPrice = parseFloat(totalPrice) + parseFloat(price);
        console.log(totalPrice);

        cart.children[2].children[0].innerHTML = totalPrice;
    }



}

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}