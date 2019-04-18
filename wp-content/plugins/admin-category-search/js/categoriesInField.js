jQuery(document).ready(function(){
	adminCategorySearch.categoriesInField.init();
});

adminCategorySearch.categoriesInField = {
	init : function(){
		var search_div = '<div class="hide-if-no-js">';
		search_div += '<label>Search</label>';
		search_div += '<input type="text" name="search-field-in" class="meta-box-search-field" style="width:100%;" />';
		search_div +='</div>';

		jQuery(search_div).insertBefore(jQuery('.categorydiv'));
	}
};