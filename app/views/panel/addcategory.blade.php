@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Add Categories</h3>
        </div>
        <div class="module-body">
            <form class="form-horizontal row-fluid">

                <div class="control-group">
                    <label class="control-label"><b>Categories</b></label>
                    <div class="controls">
                           @foreach($categories_list as $category)
                                <p>{{ $category->category }}</p>
                            @endforeach
                        
                    </div>
                <div class="controls">
                        <input type="text" id="cat-af" data-form-field="cat" placeholder="Enter new Category.." class="span8">
                    </div>
                    <div class="controls">
                        <button type="button" class="btn btn-inverse" id="addcategory">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>
@stop

@section('custom_bottom_script')

    <script type="text/javascript" src="{{ Config::get('view.custom.js') }}/script.addcategory.js"></script>

@stop
