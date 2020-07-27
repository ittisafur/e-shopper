(function () {
    const client = algoliasearch("C2J6Y456YH", "1bbefe4260109b41565842b055a9373b");
    const products = client.initIndex('products');
    var enterPressed = false;
// <img src="${window.location.origin}/storage/${_highlightResult.image.value}" alt="" class="algolia-thumb">
    autocomplete('#aa-search-input', {}, [
        {
            source: autocomplete.sources.hits(products, {hitsPerPage: 3}),
            displayKey: 'name',
            templates: {
                // header: '<div class="aa-suggestions-category">Products</div>',

                suggestion({_highlightResult}) {
                    const markUp = `
                        <div class="algolia-result">
                            <span>
                                ${_highlightResult.name.value}
                            </span>
                            <span>$${(_highlightResult.price.value).toFixed(2)}</span>
                        </div>
                        <div class="algolia-details">
                            <span>${_highlightResult.details.value}</span>
                        </div>
                    `;
                    return markUp;
                    // return `<span>${_highlightResult.name.value}</span><span>${_highlightResult.price.value / 100}</span>`;
                },
                empty(result) {
                    return `Sorry ${result.query} not found`;
                }
            },
        }

    ]).on('autocomplete:selected', function (event, suggestion, dataset) {
        window.location.href = window.location.origin + `/shop/${suggestion.slug}`
        enterPressed = true;
    }).on('keyup', function (e) {
        if (e.keyCode === 13 && !enterPressed) {
            window.location.href = window.location.origin + '/search-algolia?products%5Bquery%5D=' + document.getElementById('aa-search-input').value;
        }
    });

})();
