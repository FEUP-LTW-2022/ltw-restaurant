let formHolder = [] ;   

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

function addToCart(name,id, restaurantID, price) {
    console.log("ok")
    let cartList = document.getElementsByClassName("dropdown-content");
    let cart = cartList[0];
    let mybool;
    if ((formHolder.length == 0) || (formHolder[0].id != restaurantID)) {
        let newForm = document.createElement('FORM');
        newForm.id = restaurantID;
        newForm.name = 'form';
        newForm.method = 'POST';
        newForm.action = 'checkout.php';
        formHolder[0] = newForm;
        cart.appendChild(newForm);

        let input = document.createElement('INPUT');
        input.type = 'number';
        input.name = 'dishes[' + id + ']';
        input.id = id;
        input.value = 1;
        let p = document.createElement('p');
        console.log(typeof p);
        p.innerText = name;
        p.id = id;

        p.appendChild(input);
        formHolder[0].appendChild(p);


        let submit = document.createElement('buttom');

    } else {

        let children = formHolder[0].children;
        console.log(children[0]);

        let mybool = false
        for (let i = 0; i < children.length; i++) {
            if (children[i].id == id) {

                children[i].children[0].value++;
                mybool = true;
            }
        }

        if (mybool == false){
            let input = document.createElement('INPUT');
            input.type = 'number';
            input.name = 'dishes[' + id + ']';
            input.id = id;
            input.value = 1;
            let p = document.createElement('p');
            p.id = id;
            p.innerText = name;
            p.appendChild(input);
            formHolder[0].appendChild(p);
        }
    }



}

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}
