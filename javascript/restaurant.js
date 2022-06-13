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
    if(formHolder.length == 0){
        console.log("bish")
        let newForm = document.createElement('FORM');
        newForm.id = restaurantID;
        newForm.name = 'form';
        newForm.method = 'POST';
        newForm.action = 'checkout.php';
        formHolder[0] = newForm;
        cart.appendChild(newForm);
    } else if(formHolder[0].id != restaurantID){
        let form = document.createElement('FORM');
        form.id = restaurantID;
        form.name = 'form';
        form.method = 'POST';
        form.action = 'checkout.php';
        formHolder[0] = form;
        cart.appendChild(form);
    }

    let input=document.createElement('INPUT');
    input.type='HIDDEN';
    input.name='dishes[]';
    input.value=id;
    formHolder[0].appendChild(input);
}

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}
