window.onload = function() {
    document.getElementById('searchButton').onclick = searchCheeses;
};

function searchCheeses() {
    var name = document.getElementById('name').value;
    var type = document.getElementById('type').value;
    var country = document.getElementById('country').value;
    var strength = document.getElementById('strength').value;
    var price = document.getElementById('price').value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'search.php?' + buildQueryString(name, type, country, strength, price), true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var results = JSON.parse(xhr.responseText);
            displayResults(results.fetch_obj); // Or 'results.fetch_class' depending on your needs
        }
    };
    xhr.send();
}

function buildQueryString(name, type, country, strength, price) {
    var queryParts = [];
    if (name) queryParts.push('name=' + encodeURIComponent(name));
    if (type) queryParts.push('type=' + encodeURIComponent(type));
    if (country) queryParts.push('country=' + encodeURIComponent(country));
    if (strength) queryParts.push('strength=' + encodeURIComponent(strength));
    if (price) queryParts.push('price=' + encodeURIComponent(price));
    
    return queryParts.join('&');
}

function displayResults(cheeses) {
    var resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = ''; // Clear previous results
    cheeses.forEach(function(cheese) {
        resultsDiv.innerHTML += cheese.name + ' - ' + cheese.type + ' - ' + cheese.country_of_origin +
                                ' - Strength: ' + cheese.strength + ' - Price/g: ' + cheese.price_per_gram + '<br>';
    });
}
