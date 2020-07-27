<div class="col-sm-3">
{{--    <form action="{{route('search')}}" method="GET">--}}
{{--        <input type="text" name="query" id="query" placeholder="Search Your Product"--}}
{{--               value="{{request()->input('query')}}">--}}
{{--    </form>--}}
    <ais-instant-search
        :search-client="searchClient"
        index-name="{{ (new App\Model\Product)->searchableAs() }}"
    >
        <ais-autocomplete>
            <div slot-scope="{ currentRefinement, indices, refine }">
                <input
                    style="width: 100%; font-size: 16px"
                    type="search"
                    :value="currentRefinement"
                    placeholder="Search for a product"
                    @input="refine($event.currentTarget.value)"
                >

                <ul v-if="currentRefinement" v-for="index in indices" :key="index.id" style="padding: 0; margin: 0">

                    <li>
                        <ais-stats/>
                        <ul style="padding: 0; margin: 0">
                            <li v-for="hit in index.hits" :key="hit.objectID">
                                <a :href="/shop/ + hit.slug">
                                    <ais-highlight attribute="name" :hit="hit"/>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </ais-autocomplete>

    </ais-instant-search>


    {{--    <ais-instant-search--}}
    {{--        :search-client="searchClient"--}}
    {{--        index-name="{{ (new App\Model\Product)->searchableAs() }}"--}}
    {{--    >--}}
    {{--        <ais-search-box placeholder="Search articles..."></ais-search-box>--}}
    {{--        --}}

    {{--            <ais-hits>--}}
    {{--                <template slot="item" slot-scope="{ item }">--}}
    {{--                    <div>--}}
    {{--                        <h1>@{{ item.name }}</h1>--}}
    {{--                        <h4>@{{ item.details }}</h4>--}}
    {{--                    </div>--}}
    {{--                </template>--}}
    {{--            </ais-hits>--}}
    {{--    </ais-instant-search>--}}
</div>

</div>
