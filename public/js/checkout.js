const form = document.querySelector('#checkout_form');
const reg = /^\d{16}$/;

let name = form.elements.namedItem("name");
let lastname = form.elements.namedItem("lastname");
let email = form.elements.namedItem("email");
let town = form.elements.namedItem("town");
let psc = form.elements.namedItem("psc");
let street = form.elements.namedItem("street");
let house_id = form.elements.namedItem("house_id");
let phone_number = form.elements.namedItem("phone_number");
let card_number = form.elements.namedItem("card_number");
let card_exp_month = form.elements.namedItem("card_exp_month");
let card_exp_year = form.elements.namedItem("card_exp_year");
let card_cvc = form.elements.namedItem("card_cvc");

name.addEventListener('input', validate);
lastname.addEventListener('input', validate);
email.addEventListener('input', validate);
town.addEventListener('input', validate);
psc.addEventListener('input', validate);
street.addEventListener('input', validate);
house_id.addEventListener('input', validate);
phone_number.addEventListener('input', validate);
card_number.addEventListener('input', validate);
card_exp_month.addEventListener('input', validate);
card_exp_year.addEventListener('input', validate);
card_cvc.addEventListener('input', validate);


function validate(e) {
    let target = e.target;

    if(target.name == "name") {
        if(target.value == "") {
            target.classList.remove('border-green-500');
            target.classList.add('border-black');
        }
        else {
            target.classList.remove('border-red-500');
            target.classList.add('border-green-500');
        }
    }

    if(target.name == "lastname") {
        if(target.value == "") {
            target.classList.remove('border-green-500');
            target.classList.add('border-black');
        }
        else {
            target.classList.remove('border-red-500');
            target.classList.add('border-green-500');
        }
    }

    if(target.name == "email") {
        const email_reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        
        if(! email_reg.test(target.value)) {
            target.classList.remove('border-green-500');
            target.classList.add('border-black');
        }
        else {
            target.classList.remove('border-red-500');
            target.classList.add('border-green-500');
        }
    }

    if(target.name == "town") {
        if(target.value == "") {
            target.classList.remove('border-green-500');
            target.classList.add('border-black');
        }
        else {
            target.classList.remove('border-red-500');
            target.classList.add('border-green-500');
        }
    }

    if(target.name == "psc") {
        if(target.value == "") {
            target.classList.remove('border-green-500');
            target.classList.add('border-black');
        }
        else {
            target.classList.remove('border-red-500');
            target.classList.add('border-green-500');
        }
    }

    if(target.name == "street") {
        if(target.value == "") {
            target.classList.remove('border-green-500');
            target.classList.add('border-black');
        }
        else {
            target.classList.remove('border-red-500');
            target.classList.add('border-green-500');
        }
    }

    if(target.name == "house_id") {
        if(target.value == "") {
            target.classList.remove('border-green-500');
            target.classList.add('border-black');
        }
        else {
            target.classList.remove('border-red-500');
            target.classList.add('border-green-500');
        }
    }

    if(target.name == "phone_number") {
        if(target.value == "") {
            target.classList.remove('border-green-500');
            target.classList.add('border-black');
        }
        else {
            target.classList.remove('border-red-500');
            target.classList.add('border-green-500');
        }
    }


    if(target.name == "card_number") {
        if(reg.test(target.value)) {
            target.classList.remove('border-black');
            target.classList.add('border-green-500');
        }
        else if(target.value == ""){
            target.classList.remove('border-green-500');
            target.classList.remove('border-red-500');
            target.classList.add('border-black');
        }
        else {
            target.classList.remove('border-green-500');
            target.classList.add('border-red-500');
        }
    }

    if(target.name == "card_exp_month") {
        const monthNow = new Date().getMonth() + 1;
        if(target.value == "" || target.value.length != 2 || (target.value < monthNow || target.value > 12)) {
            target.classList.remove('border-green-500');
            target.classList.add('border-red-500');
        }
        else {
            target.classList.remove('border-red-500');
            target.classList.add('border-green-500');
        }
    }

    if(target.name == "card_exp_year") {
        const yearNow = new Date().getFullYear();
        if(target.value == "" || target.value.length != 4 || (target.value < yearNow || target.value > yearNow + 100)) {
            target.classList.remove('border-green-500');
            target.classList.add('border-red-500');
        }
        else {
            target.classList.remove('border-red-500');
            target.classList.add('border-green-500');
        }
    }

    if(target.name == "card_cvc") {
        if(target.value == "" || target.value.length != 3) {
            target.classList.remove('border-green-500');
            target.classList.add('border-red-500');
        } 
        else {
            target.classList.remove('border-red-500');
            target.classList.add('border-green-500');
        }
    }
}
