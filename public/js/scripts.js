$(document).ready(function(){
	// Wireup Foundation
	$(document).foundation();
	
	$bars = $('#bar_dd');
	$neighborhoods = $('#nh_dd');
	$neighborhoodSort = $('#nh_sort_dd');
	// Reset Dropdowns
	$bars.prop('selectedIndex', 0);
	$neighborhoods.prop('selectedIndex', 0);
	$neighborhoodSort.prop('selectedIndex', 0);

	$bars.change(function(event){
		if(this.value !== "#"){
			window.location = '/bar/' + this.value;
		}
	});
	$neighborhoods.change(function(event){
		if(this.value !== "#"){
			window.location = '/neighborhood/' + this.value;
		}
	});
	$neighborhoodSort.change(function(event){
		if(this.value !== "#"){
			window.location = '/day/' + day + '/neighborhood/' + this.value;
		}
	});
});