const modal = document.getElementById("fileModal");
const fileInput = document.getElementById("profPic");
const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

function openModal() {
    modal.style.display = "block";
}

function closeModal() {
    modal.style.display = "none";
}

function validFile() {
    let filePath = fileInput.value;
    if (!allowedExtensions.exec(filePath)) {
        alert('Invalid file type');
        fileInput.value = '';
        return false;
    }
    else {
        if (fileInput.files.length > 0) {
            for (let i = 0; i <= fileInput.files.length - 1; i++) {
                const fsize = fileInput.files.item(i).size;
                const file = Math.round((fsize / 1024));
                if (file > 2048) {
                    alert("File too big, please select a file less than 2mb");
                    fileInput.value = '';
                    return false;
                }
            }
        }
    }
}

function isEmpty() {
    if (fileInput.value === '') {
        alert("No file was selected")
        return false;
    }
}

window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}