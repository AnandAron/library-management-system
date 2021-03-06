<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
        <li>
                <a href="{{ URL::route('home') }}">
                    <i class="menu-icon icon-signout"></i>Home
                </a>
            </li>
            <li>
                <a href="{{ URL::route('search-db') }}">
                    <i class="menu-icon icon-home"></i>Search book from database
                </a>
            </li>
            <li>
                <a href="{{ URL::route('students-for-approval') }}">
                    <i class="menu-icon icon-filter"></i>Students for approval
                </a>
            </li>
            <li>
                <a href="{{ URL::route('registered-students') }}">
                    <i class="menu-icon icon-group"></i>All Students Registered
                </a>
            </li>
            <li>
                <a href="{{ URL::route('all-books') }}">
                    <i class="menu-icon icon-th-list"></i>All Books in Library
                </a>
            </li>
            <li>
                <a href="{{ URL::route('add-books') }}">
                    <i class="menu-icon icon-folder-open-alt"></i>Add Books
                </a>
            </li>
		<li>
                <a href="{{ URL::route('delete-books') }}">
                    <i class="menu-icon icon-folder-open-alt"></i>Delete Books
                </a>
            </li>
            
            <li>
                <a href="{{ URL::route('currently-issued') }}">
                    <i class="menu-icon icon-list-ul"></i>View all books currently issued
                </a>
            </li>
		  <li>
                <a href="{{ URL::route('add-category') }}">
                    <i class="menu-icon icon-list-ul"></i>Add category
                </a>
            </li>
            <li>
                <a href="{{ URL::route('report') }}">
                    <i class="menu-icon icon-list-ul"></i>Reports
                </a>
            </li>
		
		<li id="bc" onclick="showBarcode()">
			<a><i class="menu-icon icon-list-ul"></i>Show Bar Code</a>
		</li>
		

        </ul>
        
        <ul class="widget widget-menu unstyled">
            <li><a href="{{ URL::route('account-sign-out') }}"><i class="menu-icon icon-wrench"></i>Logout </a></li>
        </ul>
    </div>
</div>

<script>
			
			function showBarcode(){
			var un="{{Auth::user()->username}}"
			if (un=='Anand')
			{  window.location="https://www.ruggedtabletpc.com/barcode-generator"
			}
			else window.alert("Admin Permission Required")}
		</script>
