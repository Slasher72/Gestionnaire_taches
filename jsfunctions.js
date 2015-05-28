
//------------------------------ MAKE LIST FOR MYSQL (1)
/**
 * 
 * @returns {undefined}
 */
$(function() {
$( "#sortlist" ).sortable({
	update: function(){
		$('#message').html('Items have been moved but not saved');
	}
});
});

//--------- SAVE THE ORDER
/**
 * 
 */
$('#button').click(function(event){
       var order = $("#sortlist").sortable("serialize");
       $('#message').html('Saving changes..');
       $.post("save.php",order,function(theResponse){
                     $('#message').html(theResponse);
                     });
       event.preventDefault();
});

$(function() {
$( "#sortlistThree, #sortlistFour" ).sortable({
	connectWith: ".connectMe"
}).disableSelection();
});



var setSelector = "#sortlistTwo";
var setCookieName = "listOrder";
var setCookieExpiry = 7;
 

function getOrder() {
	$.cookie(setCookieName, $(setSelector).sortable("toArray"), { expires: setCookieExpiry, path: "/" });
}
 

function restoreOrder() {
	var list = $(setSelector);
	if (list == null) return
 
	var cookie = $.cookie(setCookieName);
	if (!cookie) return;

	var IDs = cookie.split(",");

	var items = list.sortable("toArray");
 
	var rebuild = new Array();
	for ( var v=0, len=items.length; v<len; v++){
		rebuild[items[v]] = items[v];
	}
 
	for (var i = 0, n = IDs.length; i < n; i++) {
 
		var itemID = IDs[i];
 
		if (itemID in rebuild) {
 
			var item = rebuild[itemID];
 
			var child = $("ul" + setSelector + ".ui-sortable").children("#" + item);
 
			var savedOrd = $("ul" + setSelector + ".ui-sortable").children("#" + itemID);
 
			child.remove();
 
			$("ul" + setSelector + ".ui-sortable").filter(":first").append(savedOrd);
		}
	}
}
 
$(function() {
	$(setSelector).sortable({
		axis: "y",
		cursor: "move",
		update: function() { getOrder(); }
	});
 
	restoreOrder();
});


