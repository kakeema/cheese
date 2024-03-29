window.onload = function() {
    document.getElementById('searchButton').onclick = searchCheeses;   
};

function searchCheeses() {
    var name = document.getElementById('name').value; // Stores the value within the id called name, from the forms input element into the variable called name.
    var type = document.getElementById('type').value;
    var country = document.getElementById('country').value;
    var strength = document.getElementById('strength').value;
    var price = document.getElementById('price').value;

    var xhr = new XMLHttpRequest(); 
    // XMLHttpRequest() is used to interact with servers, allows for me to retrieve data from a URL without a full page refresh which is important for a business 
    //as it does not interrupt what the user is doing. Instanitating this allows me to use its properties and methods when I use the variable xhr.
    
    
    xhr.open('GET', 'search.php?' + buildQueryString(name, type, country, strength, price), true); // the .open() takes 3 params, The HTTP request, URL, and an optional booelean value
    //where true will allow for the request to be asynchronisation. This does not send data to the server, only sends it up with what to use.
    xhr.onload = function() { // This sets up a function for when the request has been completed, where the function handles the response from the server.
        if (xhr.status === 200) { // 200 means OK, so this will check if the status is OK, where OK means the request was successfull
            var results = JSON.parse(xhr.responseText); // This parses the JSON string returned from the server into a JavaScript object.
            displayResults(results.fetch_obj); // Or 'results.fetch_class' not sure 100 percent yet. This calls the displayResults function, passing it the parsed results for display.
        }
    };
    xhr.send(); // Sends the request back to the server again.
}

function buildQueryString(name, type, country, strength, price) {
    var queryParts = [];
    if (name) queryParts.push('name=' + encodeURIComponent(name)); // This checks if the parameter is true. If so, it adds a URL-encoded query string part to the queryParts array variable
    // using the push function, where encodeURIComponent() is used to basically ensure that the values are safe to include in a URL, for security reasons.
    if (type) queryParts.push('type=' + encodeURIComponent(type));
    if (country) queryParts.push('country=' + encodeURIComponent(country));
    if (strength) queryParts.push('strength=' + encodeURIComponent(strength));
    if (price) queryParts.push('price=' + encodeURIComponent(price));
    
    return queryParts.join('&'); // returns the array, but in between each index is the &, this is used to form a proper query string to append to the URL.
}

function displayResults(cheeses) {
    var resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = ''; // Clear any previous data from the resultsDiv variable to an empty string
    cheeses.forEach(function(cheese) { // Appends an HTML string for each cheese to resultsDiv.innerHTML, effectively displaying each cheese's details.
        resultsDiv.innerHTML += cheese.name + ' - ' + cheese.type + ' - ' + cheese.country_of_origin +
                                ' - Strength: ' + cheese.strength + ' - Price/g: ' + cheese.price_per_gram + '<br>';
    });
}
