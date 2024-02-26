var biList = document.querySelector(".bi-list");
var sidebar = document.querySelector(".sidebar");

var isTextVisible = false;

function sideBtn() {
    if (isTextVisible) {
        sidebar.style.display = "none";
        // biList.innerHTML = "<i class='bi bi-list'></i>";
        biList.classList.remove("bi-x");
        biList.classList.add("bi-list");
    } else {
        sidebar.style.display = "block";
        // biList.innerHTML = "<i class='bi bi-x'></i>";
        biList.classList.remove("bi-list");
        biList.classList.add("bi-x");
    }
    // Update the state
    isTextVisible = !isTextVisible;
}

// Add event listener to the biList
biList.addEventListener("click", sideBtn);