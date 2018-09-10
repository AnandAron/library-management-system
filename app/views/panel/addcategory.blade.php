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
                    <table class="table table-striped table-bordered table-condensed">
                           @foreach($categories_list as $category)
                                <tr>
                                <td>{{ $category->category }}</td>
                                
                                <td><button type="button" class="btn" id="{{ $category->id }}" ><a href="http://localhost:8000/delete-category/{{$category->id}}">Delete</a></button></td>
                                </tr>
                            @endforeach
                            <tr><td>
                            <input type="text" id="cat-af" data-form-field="cat" placeholder="Enter new Category.." class="span8">
                  </td><td>
                        <button type="button" class="btn btn-primary" id="addcategory">Add Category</button>
                     </td></tr></table>
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
