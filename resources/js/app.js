require('./bootstrap');
import algoliasearch from 'algoliasearch/lite';

window.algoliasearch = algoliasearch;

import Vue from 'vue';
import Searchable from './Searchable'
import InstantSearch from 'vue-instantsearch';

Vue.use(InstantSearch);
const app = new Vue({
        el: '#app',
        components: {
            Searchable
        },
        data: {
            searchClient: algoliasearch(
                'B2J6Y456HY',
                '1bbefe4260109b41565842b055a9373b'
            )
        }
});
