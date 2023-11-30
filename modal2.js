document.addEventListener('DOMContentLoaded', function () {
    const modalButtons = document.querySelectorAll('[data-modal-toggle2]');
    modalButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const targetModal = document.getElementById(button.dataset.modalTarget);
            if (targetModal) {
                targetModal.classList.toggle('hidden');
            }
        });
    });

    const hideButtons = document.querySelectorAll('[data-modal-hide2]');
    hideButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const targetModal = document.getElementById(button.dataset.modalHide);
            if (targetModal) {
                targetModal.classList.add('hidden');
            }
        });
    });
});



// document.addEventListener('DOMContentLoaded', function () {
//     const modalButtons = document.querySelectorAll('[data-modal-toggle2]');
//     modalButtons.forEach(function (button) {
//         button.addEventListener('click', function () {
//             const targetModal = document.getElementById(button.dataset.modalTarget);
//             if (targetModal) {
//                 targetModal.classList.toggle('hidden');
//             }
//         });
//     });

//     const hideButtons = document.querySelectorAll('[data-modal-hide2]');
//     hideButtons.forEach(function (button) {
//         button.addEventListener('click', function () {
//             const targetModal = document.getElementById(button.dataset.modalHide2);
//             if (targetModal) {
//                 targetModal.classList.add('hidden');
//             }
//         });
//     });
// });
