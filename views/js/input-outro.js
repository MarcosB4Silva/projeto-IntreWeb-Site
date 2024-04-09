// Adicionando valor no checkbox outro
const checkbox = document.getElementById('outro_checkbox');
const textoInput = document.getElementById('outro_text');

checkbox.addEventListener('click', () => {
    if(checkbox.checked){
        textoInput.style.display = 'inline';
    } else{
        textoInput.style.display = 'none';
    }
})

textoInput.addEventListener('input', function() {
    let textoModificado = this.value.split(" ").join("_");
    textoModificado = `*.${textoModificado}`;
    checkbox.value = textoModificado;
});