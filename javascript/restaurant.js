var formHolder = [] ;
var total;
var totalPrice;
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
}


function generateOrder(name,id,price) {
    let input = document.createElement('INPUT');
    let d1 = document.createElement("div");
    let d2 = document.createElement("div");
    d1.style.marginRight = "1rem";
    d2.style.marginRight = "1rem";
    input.classList.add("inputCart");
    input.type = 'number';
    input.name = 'dishes[' + id + ']';
    input.id = id;
    input.value = 1;
    let p = document.createElement('p');
    p.classList.add("inputCart");
    p.id = id;
    p.innerText = name;
    let priceElem = document.createElement('p');
    priceElem.innerHTML = price;
    p.appendChild(input);
    let platediv = document.createElement("div");
    platediv.appendChild(p);
    platediv.classList.add("inputCartplateDiv");
    platediv.appendChild(d1);
    d1.appendChild(input);
    d1.appendChild(p)
    platediv.appendChild(d2);
    d2.appendChild(priceElem);
    formHolder[0].appendChild(platediv);
}

function addToCart(name,id,price, restaurantID) {
    console.log("ok")
    let cartList = document.getElementsByClassName("dropdown-content");
    let cart = cartList[0];
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
    }



}

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}
