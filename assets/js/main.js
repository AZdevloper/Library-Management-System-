
function update( isbn ,title ,author ,publish_year ,langage , id) {

  document.getElementById("book_isbn").value = isbn;
  document.getElementById("book_author").value = author;
  document.getElementById("book_title").value = title;
  document.getElementById("book_lang").value = langage;
  document.getElementById("book_date").value = publish_year;
  document.getElementById("book_id").value = id;



}
// resit form

function resit() {
  document.getElementById("form-task").reset();
}


function showBtn(btn){
 
  if(btn == "modifier"){
 
    document.getElementById("task-save-btn").style.display = "none";
    document.getElementById("task-update-btn").style.display = "block";

  }


  else if(btn == "ajouter"){
   document.getElementById("task-save-btn").style.display = "block";
    document.getElementById("task-update-btn").style.display = "none";
    
  }


}
sign_up_frstname.addEventListener('input',function(e){
 
  var pattern = /^[A-Z]?[a-z]{3,15}$/;
  var currentValue = e.target.value;
  let valid = pattern.test(currentValue);
  console.log(valid)



    if (valid) {
      e.target.classList.remove('border-danger') ;
      label_error.classList.add('d-none');  

      e.target.classList.add('border-success','border-2');    
    }else{
     
      e.target.classList.add('border-danger','border-2'); 
      label_error.classList.remove('d-none') ;

      label_error.classList.add('d-block');  
    }
})

sign_up_lastname.addEventListener('input',function(e){
 
  var pattern = /^[A-Z]?[a-z]{3,15}$/;
  var currentValue = e.target.value;
  let valid = pattern.test(currentValue);
  console.log(valid)



    if (valid) {
      e.target.classList.remove('border-danger') ;
      label_error.classList.add('d-none');  

      e.target.classList.add('border-success','border-2');    
    }else{
     
      e.target.classList.add('border-danger','border-2'); 
      label_error.classList.remove('d-none') ;

      label_error.classList.add('d-block');  
    }
})

let check = ()=>{


  //Declare Reg using slash
let reg = /abc/
//Declare using class, useful for buil a RegExp from a variable
reg = new RegExp('abc')

//Option you must know: i -> Not case sensitive, g -> match all the string
let str = 'Abc abc abc'
str.match(/abc/) //Array(1) ["abc"] match only the first and return
console.log(str.match(/abc/) )
str.match(/abc/g) //Array(2) ["abc","abc"] match all
str.match(/abc/i) //Array(1) ["Abc"] not case sensitive
str.match(/abc/ig) //Array(3) ["Abc","abc","abc"]
//the equivalent with new RegExp is
str.match('abc', 'ig') //Array(3) ["Abc","abc","abc"]
}

// const name = document.getElementById('name')
// const password = document.getElementById('password')
// const form = document. getElementById('form')
// const errorElement = document. .getElementById('error')

// form.addEventListener('submit', (e) =>
//    let messages = []
//    if (name. value === El II name. value == null) {
//     messages.push('Name is required')
//    if (password. value.length <= 6) {
//     messages.push('Password must be longer than 6 characters')
//    if (password.v value.length >= 20) {
//     messages.push('Password must be less than 20 characters')
//    if (messages.length > 0) {
//     e.preventDefault()
//      errorElement. innerText = messages.join(', ')
