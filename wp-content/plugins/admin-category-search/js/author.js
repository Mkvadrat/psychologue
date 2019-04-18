jQuery(document).ready(function(){
	adminCategorySearch.author.init();
});

adminCategorySearch.author = {
	init : function(){
		jQuery('.postbox select').each(function(){
			var select = jQuery(this);
			var search_field = '<br style="display:block;clear:both;width:100%;"><label>Search</label><br><input type="text" class="postbox-search-field" id="'+select.attr('id')+'_search">';
			select.after(search_field);
		});
	}
};