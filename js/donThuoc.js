let currentIndex = 0;

document.addEventListener("DOMContentLoaded", function () {
    const dateField = document.getElementById("date");
    const today = new Date().toISOString().split('T')[0];
    dateField.value = today;


});

function addMedication() {
    const medicationList = document.getElementById("medicationList");
    const medicationItem = document.querySelector(".medication-item");
    const newMedication = medicationItem.cloneNode(true);

    currentIndex++;
    newMedication.setAttribute("data-index", currentIndex);
    newMedication.querySelectorAll("input, select").forEach(input => {
        const name = input.getAttribute("name");
        if (name) {
            const baseName = name.split("[")[0];
            input.setAttribute("name", `${baseName}[${currentIndex}]`);
        }
        input.value = "";  // Reset the value for the new cloned item
    });
    medicationList.appendChild(newMedication);
}

function removeMedication() {
    const medicationList = document.getElementById("medicationList");
    if (medicationList.children.length > 1) {
        medicationList.removeChild(medicationList.lastChild);
        currentIndex--;
    }
}

function printFormData() {
    // Get the form element
    const form = document.getElementById("prescriptionForm");

    // Create a FormData object to gather all form values
    const formData = new FormData(form);
    console.log("Form Data:");

    // Iterate over the form data and log each key-value pair
    for (let [key, value] of formData.entries()) {
        console.log(`${key}: ${value}`);
    }

    // For testing, submit the form here if needed (comment this out after testing)
    // form.submit();
}
