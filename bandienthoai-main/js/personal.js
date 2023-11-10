const wrapper = document.querySelector('.wrapper');
const updatelink = document.querySelector('.update');
const iconclose = document.querySelector('.icon-close');

updatelink.addEventListener('click', () => {
    wrapper.classList.add('active');
});

iconclose.addEventListener('click', () => {
    wrapper.classList.remove('active');
});

