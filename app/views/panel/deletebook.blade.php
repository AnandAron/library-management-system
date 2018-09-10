@extends('layout.index')

@section('content')
<div class="content">
    <div class="btn-controls">
        

            <h3>Delete Book</h3>
            <div class="module" >
                <div class="module-body">
                    <form class="form-horizontal row-fluid" id="findissueform" onsubmit="return false;">
                        <div class="control-group">
                            <label class="control-label">Enter Book ID</label>
                            <div class="controls">
                                <input type="text" id="bookId" placeholder="" class="span9">
                                <a class="btn homepage-form-submit">Find</a>
                                <button class="btn btn-primary" onClick="window.location.href='http://localhost:8000/delete-book/'+document.getElementById('bookId').value">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="module-body" id="module-body-results"></div>
            </div>
        </div>
    </div>
</div>
@stop


@section('custom_bottom_script')
<script type="text/javascript">
   
	var categories_list = {{ json_encode($categories_list) }}
   
</script>

<script type="text/javascript" src="{{ Config::get('view.custom.js') }}/script.mainpage.js"></script>


<script type="text/template" id="search_book">
    @include('underscore.search_book')
</script>
<script type="text/template" id="search_issue">
    @include('underscore.search_issue')
</script>
<script type="text/template" id="search_student">
    @include('underscore.search_student')
</script>
<script type="text/template" id="approvalstudents_show">
    @include('underscore.approvalstudents_show')
</script>
@stop
