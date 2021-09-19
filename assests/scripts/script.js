// HOMEPAGE FORM.
const btn =document.getElementById('pkg_btn')
    
        btn.addEventListener('click',e=>{
                
                const warning = document.getElementById('em-wrn');
                const email = document.getElementById('pkg_id');
                email_Input = email.value;
                if(email_Input === ''){
                   e.preventDefault();
                   warning.classList.remove('d-none')
                }
                else{
                    warning.classList.add('d-none')
                 }
            
        });


