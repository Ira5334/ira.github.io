function checkAvailability() {
    var check_in = document.getElementById('check_in').value;
    var check_out = document.getElementById('check_out').value;

    fetch('check_availability.php', {
        method: 'POST',
        body: JSON.stringify({ check_in: check_in, check_out: check_out }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => console.log(data));
}
