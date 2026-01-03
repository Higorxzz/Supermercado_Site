// Dropdown de departamentos
const deptBtn = document.getElementById('deptBtn');
const deptMenu = document.getElementById('deptMenu');

function closeDept(){
    deptMenu.classList.remove('show');
    deptBtn.setAttribute('aria-expanded','false');
}

deptBtn.addEventListener('click', (e) =>{
    e.stopPropagation();
    const show = deptMenu.classList.toggle('show');
    deptBtn.setAttribute('aria-expanded', show ? 'true' : 'false');
});

// Fecha ao clicar fora
document.addEventListener('click', (e)=>{
    if(!deptMenu.contains(e.target) && !deptBtn.contains(e.target)) closeDept();
});

// Suporte tecla Esc
document.addEventListener('keydown', (e)=>{ if(e.key === 'Escape') closeDept(); });


