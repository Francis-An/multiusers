import './bootstrap';


// Cover Image
document.getElementById('uploadCover').addEventListener('change', () => {
    var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadCover").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("coverPreview").src = oFREvent.target.result;
        };
});

// Profile Image
document.getElementById('uploadProfile').addEventListener('change', () => {
    var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadProfile").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("profilePreview").src = oFREvent.target.result;
        };
});


// Liscence file
// document.getElementById('uploadLiscence').addEventListener('change', () => {
//     var oFReader = new FileReader();
//     oFReader.readAsDataURL(document.getElementById("uploadLiscence").files[0]);
    
//     oFReader.onload = function (oFREvent) {
//         document.getElementById("liscencePreview").value = oFREvent.target.result;
//     };
// });

// Drug image
// document.getElementById('uploadProfil').addEventListener('change', () => {
//     var oFReader = new FileReader();
//         oFReader.readAsDataURL(document.getElementById("uploadProfil").files[0]);

//         oFReader.onload = function (oFREvent) {
//             document.getElementById("profilPreview").src = oFREvent.target.result;
//         };
// });




// Statart of medicine single page

// function changeImage(element) {

//               var main_prodcut_image = document.getElementById('main_product_image');
//               main_prodcut_image.src = element.src;
              
        
// }
        

// End of medicne single page