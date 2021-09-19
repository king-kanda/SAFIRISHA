
// qoutes form.
const errlog= document.getElementById('err')
const namE = document.getElementById('name');
const email = document.getElementById('email')
const phone = document.getElementById('phone')
const goods = document.getElementById('goods')
const destination = document.getElementById('dst')
const btn = document.getElementById('gen_q')



btn.addEventListener('click',e=>{
    if(namE.value || email.value || phone.value || goods.value || destination.value === '' ){
        e.preventDefault();
        console.log("pol")
    }
})

