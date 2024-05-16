<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Weather App</h1>
        <form id="location-form">
            <div class="form-group">
                <label for="x">X Coordinate:</label>
                <input type="text" id="x" name="x" required>
            </div>
            <div class="form-group">
                <label for="y">Y Coordinate:</label>
                <input type="text" id="y" name="y" required>
            </div>
            <div class="form-group">
                <label for="name">Location Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button type="submit">Add Location</button>
        </form>
        <table id="locations-table">
            <thead>
                <tr>
                    <th>X Coordinate</th>
                    <th>Y Coordinate</th>
                    <th>Location Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id="weather-details">
            Weather details will appear here.
        </div>
    </div>
    <script src="main.js" defer></script>
</body>
</html>