const unidade = document.getElementById('unidade');
const campoValor = document.getElementById('campoValor');
const labelValor = document.getElementById('labelValor');
const inputValor = document.querySelector('[name="valor"]');

if (unidade) {

    unidade.addEventListener('change', function() {

        if (this.value === '') {
            campoValor.style.display = 'none';
            return;
        }

        campoValor.style.display = 'block';

        if (this.value === 'km') {
            labelValor.textContent = 'Distância (km)';
            inputValor.placeholder = 'Ex: 10';
        }

        if (this.value === 'tempo') {
            labelValor.textContent = 'Tempo (minutos)';
            inputValor.placeholder = 'Ex: 45';
        }

    });

}