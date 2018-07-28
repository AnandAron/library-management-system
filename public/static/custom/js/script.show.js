function createUser() {
    var pswd = prompt("Please enter your pswd");
    if (pswd != null && pswd=="admin@nise") {
        document.getElementById("hide").innerHTML="<a href="{{ URL::route('account-create') }}">New librarian? Sign Up</a>";
    }
}
