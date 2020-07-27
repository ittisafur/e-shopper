<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        @foreach($categories as $category)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{route('category.index', $category->slug)}}">{{$category->name}}</a></h4>
            </div>
        </div>
        @endforeach
    </div><!--/category-products-->


    <div class="shipping text-center"><!--shipping-->
        <img src="images/home/shipping.jpg" alt=""/>
    </div><!--/shipping-->

</div>
