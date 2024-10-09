import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const delete_buttons = document.querySelectorAll('.delete');

delete_buttons.forEach((button) => {
    button.addEventListener('click', (event) => {
        event.preventDefault();

        const modal = document.getElementById('deleteModal');

        const bootstrap_modal = new bootstrap.Modal(modal);
        bootstrap_modal.show();

        const buttonDelete = modal.querySelector('.confirm-delete');

        const projectName = button.getAttribute('data-projectName');

        const ModalText = modal.querySelector('#modal_text');
        ModalText.innerHTML = `Sei sicuro di volere cancellare questo progetto?<br><strong>${projectName}</strong>`;

        buttonDelete.addEventListener('click', function () {
            button.parentElement.submit();
        })
    }
    );
});

document.addEventListener('DOMContentLoaded', function () {

    var successAlert = document.getElementById('success-alert');

    if (successAlert) {
        setTimeout(function () {
            successAlert.classList.add('fade-out');
        }, 3000);
    }

});