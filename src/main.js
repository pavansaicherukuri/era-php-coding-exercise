document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('location-form');
    const table = document.getElementById('locations-table').getElementsByTagName('tbody')[0];
    const weatherDetails = document.getElementById('weather-details');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        fetch('add_location.php', {
            method: 'POST',
            body: formData
        }).then(() => {
            fetchLocations();
        });
    });

    function fetchLocations() {
        fetch('get_locations.php')
            .then(response => response.json())
            .then(locations => {
                table.innerHTML = '';
                locations.forEach(location => {
                    const row = table.insertRow();
                    row.insertCell(0).textContent = location.x;
                    row.insertCell(1).textContent = location.y;
                    row.insertCell(2).textContent = location.name;
                    const selectButton = document.createElement('button');
                    selectButton.textContent = 'Select';
                    selectButton.addEventListener('click', () => {
                        fetchWeather(location.x, location.y, location.name);
                    });
                    row.insertCell(3).appendChild(selectButton);
                });
            });
    }

    function fetchWeather(x, y, name) {
        const formData = new FormData();
        formData.append('x', x);
        formData.append('y', y);

        fetch('weather.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                weatherDetails.innerHTML = `
                    <h2>${name}</h2>
                    <p>X: ${x}, Y: ${y}</p>
                    <p>Current Weather: ${data.forecast}</p>
                `;
            });
    }

    fetchLocations();
});
