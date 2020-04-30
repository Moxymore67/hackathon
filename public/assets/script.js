function getAllParameters() {
    let token = 'CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv';
    const url = `https://api.windy.com/api/webcams/v2/list?show=countries;categories&key=CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv`;
    axios.get(url).then(function (response) {
        return response.data;
    }).then(function (countries) {
            //console.log('data decoded from JSON:', countries);

            var jsonCountries = JSON.stringify(countries.result.countries);
            var jsonCategories = JSON.stringify(countries.result.categories);

            console.log(jsonCategories);
            post('/', {countries: jsonCountries, categories: jsonCategories});
        }
    );
}


function sexyData() {
    let token = 'CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv';
    const url = `https://api.windy.com/api/webcams/v2/list/category=beach/country=FR/limit=50/orderby=popularity?show=webcams:player,location&key=CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv`;
    axios.get(url).then(function (response) {
        return response.data;
    }).then(function (countries) {
            console.log('data decoded from JSON:', countries.result.webcams);

            var jsonGetCountries = JSON.stringify(countries.result.webcams);
            post('/', {webcams: jsonGetCountries});
        }
    );
}

/**
 * sends a request to the specified url from a form. this will change the window location.
 * @param {string} path the path to send the post request to
 * @param {object} params the paramiters to add to the url
 * @param {string} [method=post] the method to use on the form
 */

function post(path, params, method = 'post') {

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    const form = document.createElement('form');
    form.method = method;
    form.action = path;

    for (const key in params) {
        if (params.hasOwnProperty(key)) {
            const hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = params[key];

            form.appendChild(hiddenField);
        }
    }
    document.body.appendChild(form);
    form.submit();
}

function refresh() {
    window.location.href = '/';
}