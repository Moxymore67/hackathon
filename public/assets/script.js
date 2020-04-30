

function getCountries() {
    let token = 'CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv';
    const url = `https://api.windy.com/api/webcams/v2/list?show=countries;categories&key=CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv`;
    axios.get(url).then(function (response) {
        return response.data;
    }).then(function (countries) {
            //console.log('data decoded from JSON:', countries);
            result = "omegadrol";
            var jsonCountries = JSON.stringify(countries.result.countries);
            var jsonCategories = JSON.stringify(countries.result.categories);

            console.log(jsonCategories);
            post('/', {countries: jsonCountries, categories: jsonCategories});
        }
    );

}


function getCategories() {
    let token = 'CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv';
    const url = `https://api.windy.com/api/webcams/v2/list?show=categories&key=CSueTiJgLo8WgS54Jc8c5xZX6QX5I8jv`;
    axios.get(url).then(function (response) {
        return response.data;
    }).then(function (categories) {
        //console.log('data decoded from JSON:', countries);

        var json = JSON.stringify(categories.result);

        return json;
        //post('/template-parts/index-parts/index-javascript.php', {countries: json});
    });
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
