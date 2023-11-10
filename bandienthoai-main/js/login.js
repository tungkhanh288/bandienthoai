const wraper = document.querySelector('.wraper');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');

registerlink.addEventListener('click', ()=>{
    wraper.classList.add('active');
});

loginlink.addEventListener('click', ()=>{
    wraper.classList.remove('active');
});