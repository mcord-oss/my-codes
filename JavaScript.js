// creating a variables and dicleration
var Nane = "JUAN DELA CRUZ";
let Age = 40;
const Pet = "DOG";


// template string----
const fullName = "Rosmus Lerdorf";
const Address = "United State";
let Template = `my full name is `+ fullName + `and my address is`+ Address + `in the philippines`;
alert(Template);
var string = `my full name is ${fullName} and my address is ${Address}`;
console.log(string);



// (1)---array----
const personnalInfo = ["july 10, 1982", "julios", "ordon"];
personnalInfo[3] = "north cotabato";
personnalInfo.push("philippines");
personnalInfo.unshift("philippines");
personnalInfo.pop();
console.log(personnalInfo);
console.log(Array.isArray(personnalInfo));
console.log(personnalInfo.indexOf("july 10, 1982"));
personnalInfo.splice(0, 1);
console.log(personnalInfo);


// (2)---array----
const array = ["JavaScript", "HTML", "CSS", "SQL"];
console.table(array);
console.log(array.lastIndexOf("SQL"));
console.table(array);
console.log(array.shift());
console.table(array);
console.log(array.pop);
console.table(array);
console.table(array);
const Psliced = array.slice(1, 2);
const sliced = array.slice(-1, -2);
console.table(sliced);




// (3)---array----
const data = [23, 32, 47, 345, 959, 557];
console.table(data);
const newArray = data.map(Math.sqrt);
console.table(newArray);
console.table(data);
const checkValue = (value) => {
    console.log(value);
    return value > 557;
};
console.log(data.some(checkValue));



// object leterals---
let person = {
    fname: "ryan",
    lname: "lorenzo",
    email: "lorenz123@gmail.com",
    gender: "male",
    favorates: [

        "grapes", "computer", "cellphone", "running", "fish"
    ],
    family: {

        wife: "madam lorenzo",
        son: "boyeng lorenzo",
        dauter: "bebang lorenzo"
    }
}
console.log(person.lname);
console.log(person.lname, person.fname);
console.log(person.favorates[3]);
console.log(person.family.son);



// array objects---
const contacts = [
    {
        id: 1,
        fullName: "julios depasucat ordon",
        isSaved: "computer"
    },

    {
        id: 2,
        fullName: "dennis depasucat ordon",
        isSaved: "cellPhone"
    },

    {
        id: 3,
        fullName: "ariel depasucat ordon",
        isSaved: "computer"
    }
];
console.log(contacts);
console.log(contacts[1].fullName);



// for loop
for(let i = 0; i <= 10; i++){
    console.log(i);
} 

for(let i = 0; i <= contacts.length; i++){
    console.log(contacts[i].id);
    console.log(contacts[i].id, contacts[i].fullName);
}




// for of
for(let contact of contacts){
    console.log(contact);
    console.log(contact.id);
    console.log(contact.id, contact.fullName, contact.isSaved);
}




// while loop
let i = 0;
while(i <= 10){
    console.log(`ang value na ito ay ${i}`);
    i++;
}




// forEach
contacts.forEach(function(contact){
    console.log(contact.fullName);
    console.log(contact.id);
    console.log(contact);
});




// MAP
const contactsFullName = contacts.map(function(contact){
    return contact.fullName;
});
console.log(contactsFullName);




// filter
const contactPhone = contacts.filter(function(contact){
    return contact.isSaved == "computer";
});
console.log(contactPhone);




// connecting function
const contactPhones = contacts.filter(function(contact){
    return contact.isSaved == "computer";
}).map(function(contact){
    return contact.fullName;
});
console.log(contactPhones);




// JSON format
const contactsJson = JSON.stringify(contacts);
console.log(contactsJson);




// conditionals
const n = 100;
if(n === 100){
    console.log("its 100");
}else if(n > 300){
    console.log("its greater than 400");
}


const m = 300;
if(m === 100){
    console.log("its 100");
}else if(m > 200){
    console.log("the value is greater than 100");
}else{
    console.log("not 100");
}


const x = 100;
if(x === 100 || x > 400){
    console.log("true");
}else{
    console.log("not 100");
}



// function types
let v = 100;
let y = 200;
function getSum(v, y){
    return v + y;
}
console.log(getSum(v, y));



function getSum(x, y){
    return x + y;
}
console.log(getSum(100, 300));



const getSum = (x, y) => {
    return x + y;
}
console.log(getSum(200, 400));



const getSum = (x, y) => x + y;
console.log(getSum(400, 600));


const getSum = x => x + 1000;
console.log(getSum(100));



// OOP class type
class Tao { 
    constructor(firstName, lastName, Bt){
        this.firstName = firstName;
        this.lastName = lastName;
        this.Bt = Bt;
    }

    getFullName(){
        return `${this.firstName} ${this.lastName} ${this.Bt}`;
    }
}

// instanciation
const tao1 = new Tao('julios', 'ordon', 'A+');
console.log(tao1);
console.log(tao1.firstName);
console.log(tao1.getFullName());

const tao2 = new Tao("john", "ordon", "O");
console.log(tao2);



// OOP constructor function type
function Tao(firstName, lastName, Bt){
    this.firstName = firstName;
    this.lastName = lastName;
    this.Bt = Bt;

    this.getFullName = () =>{
        return `${this.firstName}${this.lastName}${this.Bt}`;
    }
}
// instanciate
const tao3 = new Tao("jack", "ordon", "AB");
console.log(tao3.getFullName());



// DOM selection
console.log(window);
alert("hellow");
window.alert('hellow');

const Form3 = document.getElementById('myForm');
const Form1 = document.querySelector("#myForm");
const Form2 = document.querySelector(".container");
const inputs = document.querySelectorAll(".elements");
console.log(Form);
console.log(Form1);
console.log(Form2);
console.log(inputs);

inputs.forEach(function(input){
    console.log(input);
});



// DOM manipulations
const ul = document.querySelector(".items");
console.log(ul);
ul.remove();
ul.lastElementChild.remove();
ul.firstElementChild.remove();
ul.lastElementChild.textContent = "PinoyFreeCoder Channel";
ul.children[1].innerText = "Mcord Handsome";
ul.firstElementChild.innerHTML = "<h1>personnal homepage</h1>";


// BUTTON manipulation
const btn = document.querySelector("#btn");
btn.style.background = "green";


// Events
const btn = document.querySelector("#btn");
const Form = document.querySelector(".container");
const form = document.querySelector("#myForm");
const dorm = document.querySelector(".elements");
const Username = document.querySelector("#username");
const Password = document.querySelector("#password");
const Msg = document.querySelector("#msg");
console.log(Username.value);

btn.addEventListener("click", function(e){
    e.preventDefault();
    console.log("Button was clicked");
    Form.style.background = "red";
    if(Username.value.length === 0 || Password.value.length === 0){
        console.log("False");
        Msg.innerHTML = "<h4 class='error'>Please Complete Details</h4>";
        setTimeout(() => Document.querySelector(".error").remove(), 3000);
    }else{
        console.log("True");
        Form.submit();
    }
});