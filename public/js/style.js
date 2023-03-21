// menu burger

function myFunction() {
    var burger = document.getElementById("myLinks");
    if (burger.style.display === "block") {
      burger.style.display = "none";
    } else {
      burger.style.display = "block";
      
    }
  }


  // bouton deplier formulaire

 const formActor = document.getElementById('actor-form')
 const formCasting = document.getElementById('form-casting')
 const formReal = document.getElementById('form-real')

 const btnAdd = document.querySelector('.btn-add') 
 const btnAddCast = document.querySelector('.btn-add-cast')
 const btnAddReal = document.querySelector('.btn-add-real') 

// bouton acteur
 btnAdd.addEventListener('click', function(){
  formActor.classList.toggle('block')
 })

// bouton casting
 btnAddCast.addEventListener('click', function(){
  formCasting.classList.toggle('block')
 })

 // bouton casting
 