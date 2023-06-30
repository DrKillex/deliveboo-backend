import './bootstrap';
import Alpine from 'alpinejs';
import '~resources/scss/app.scss';
import.meta.glob([
    '../img/**'
]);

import * as bootstrap from 'bootstrap';

window.Alpine = Alpine;

Alpine.start();
if (document.querySelector('.form-input-image')) {
    const imageInput = document.querySelector('#image');
    imageInput.addEventListener('change', showPreviewProduct);
}
// show preview upload image function Product
function showPreviewProduct(event) {
    if (event.target.files.length > 0) {
        const src = URL.createObjectURL(event.target.files[0]);
        const preview = document.getElementById("file-image-preview");
        preview.src = src;
        preview.style.display = "block";
        preview.classList.add('mt-4', 'mb-3');
    }
}


// Condizione per Checkbox show Image Upload
// if (document.querySelector('.form-input-image')) {

//     const imageInputContainer = document.querySelector('#image-input-container');
//     const imageInput = document.querySelector('#image');
//     const setImageInput = document.getElementById('set_image');

//     imageInput.addEventListener('change', showPreview);
//     setImageInput.addEventListener('change', function () {
//         if (setImageInput.checked) {
//             //true
//             imageInputContainer.classList.remove('d-none');
//             imageInputContainer.classList.add('d-block');
//         } else {
//             //false
//             imageInputContainer.classList.remove('d-block');
//             imageInputContainer.classList.add('d-none');
//         }
//     });

// }