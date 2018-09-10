@extends('layout.index')

@section('content')
<div class="content">
    <div class="btn-controls">
        

            <h3>Download Reports </h3>
            <div class="module" >
                <div class="module-body">
                    <a href="http://localhost:8000/get-book-report"><button class="btn btn-primary">Books</button></a>
                    <a href="http://localhost:8000/get-student-report"><button class="btn btn-primary">Students</button></a>
                    <a href="http://localhost:8000/get-issue-report"><button class="btn btn-primary">Issue Logs</button></a>
                </div>
                <div class="module-body" id="module-body-results"></div>
            </div>
        </div>
    </div>
</div>
@stop


@section('custom_bottom_script')
<script type="text/javascript">
   
	
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
