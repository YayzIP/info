const addTableBtn = document.getElementById('addTable');

const tableForm = document.querySelector('form[action="addTable.php"]');

addTableBtn.addEventListener('click', () => {
    if (tableForm.style.display == 'none') {
        tableForm.style.display = 'block';
    } else {
        tableForm.style.display = 'none';
    }
});