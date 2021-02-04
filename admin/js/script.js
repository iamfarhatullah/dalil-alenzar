$("#menu-toggle").click( function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("menuDisplayed");
});


function confirmDelete() {
	return confirm("Are you sure?");
}



