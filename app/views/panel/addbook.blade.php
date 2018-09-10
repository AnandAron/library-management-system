@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Add Books</h3>
        </div>
        <div class="module-body">
            <form class="form-horizontal row-fluid">
			<div class="control-group">
                    <label class="control-label">ISBN <span style="color:red;">*</span> </label>
                    <div class="controls">
                        <input type="text" id="isbn-af" data-form-field="isbn" placeholder="Enter ISBN.." class="span8" required>
                    
                         <button type="button" class="btn btn-primary" id="autofill" onclick="loadJsonData()">Auto Fill</button>
                    </div>
                </div>
			<div class="control-group">
                    <label class="control-label">Book ID<span style="color:red;">*</span> </label>
                    <div class="controls">
                        <input type="text" data-form-field="book_id" placeholder="Enter Book ID.." class="span8" id="book_id-af">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Title Of Book<span style="color:red;">*</span> </label>
                    <div class="controls">
                        <input type="text" data-form-field="title" placeholder="Enter the title of the book here..." class="span8" id="title-af">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Author Name<span style="color:red;">*</span> </label>
                    <div class="controls">
                        <input type="text" data-form-field="author" placeholder="Enter the name of author for the book here..." class="span8" id="author-af">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput" >Description of Book<span style="color:red;">*</span> </label>
                    <div class="controls">
                        <textarea class="span8" data-form-field="description" rows="5" placeholder="Enter few lines about the book here" id="desc-af"></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Category<span style="color:red;">*</span> </label>
                    <div class="controls">
                        <select tabindex="1" data-form-field="category" data-placeholder="Select category.." class="span8">
                            @foreach($categories_list as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                
                <div class="control-group">
                    <div class="controls">
                        <button type="button" class="btn btn-primary" id="addbooks">Add Books</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>
@stop

@section('custom_bottom_script')

    <script type="text/javascript" src="{{ Config::get('view.custom.js') }}/script.addbook.js"></script>

@stop
