const addTableBtn = document.getElementById('addTable');
const addComandaBtn = document.getElementById('addComanda');

const tableForm = document.querySelector('form[action="addTable.php"]');
const comandaForm = document.querySelector('form[action="addComanda.php"]');

addTableBtn.addEventListener('click', () => {
    if (tableForm.style.display == 'none') {
        tableForm.style.display = 'block';
    } else {
        tableForm.style.display = 'none';
    }
});

addComandaBtn.addEventListener('click', () => {
    if (comandaForm.style.display == 'none') {
        comandaForm.style.display = 'block';
    } else {
        comandaForm.style.display = 'none';
    }
});