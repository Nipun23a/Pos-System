function updateDateTime(){
    const currentDate = new Date();

    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth()+1).padStart(2,'0');
    const day = String(currentDate.getDate()).padStart(2,'0');


    const hours = String(currentDate.getHours()).padStart(2, '0');
    const minutes = String(currentDate.getMinutes()).padStart(2, '0');
    const seconds = String(currentDate.getSeconds()).padStart(2, '0');

    const dateTimeString = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

    const datetimeElement = document.getElementById('datetime');
    datetimeElement.innerText = dateTimeString;

}

updateDateTime();
setInterval(updateDateTime, 1000);


function validateInput(inputValue, fieldName) {
    if (inputValue.trim() === "") {
        alert(fieldName + " must be filled out");
        return false;
    }
    return true;
}


document.addEventListener("DOMContentLoaded",function(){
    var alertBox = document.getElementById('alertBox');
    var closeButton = document.getElementById('cancel');

    function showAlertBox(){
        var overlay = document.getElementById('overlay');
        var alertBox = document.getElementById('alertBox');

        overlay.style.display = 'block';
        alertBox.style.display = 'block';
    }

    function hideAlertBox(){
        var overlay = document.getElementById('overlay');
        var alertBox = document.getElementById('alertBox');

        overlay.style.display = 'none';
        alertBox.style.display = 'none';
    }
    closeButton.addEventListener('click',hideAlertBox);


    forms.addEventListener('submit',function(event){
        event.preventDefault();
        
    })
    }

);