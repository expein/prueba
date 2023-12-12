const comprobation = () => {
    let arrivalCity = document.getElementById("arrivalCity").value;
    let departureCity = document.getElementById("departureCity").value;
    let hour = document.getElementById("hour").value;
    let btnSearch = document.getElementById("btnSearch");

    if (arrivalCity == "" || departureCity == "" || hour == "") {
        btnSearch.disabled = true;
    } else {
        btnSearch.disabled = false;
    }
}

function showLoadingMessage() {
    document.getElementById('loadingMessage').classList.remove('hidden');

}