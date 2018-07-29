// JavaScript Document
$(document).ready(function() {
	
	// REDIRECT TO BLOG SEARCH
	if( window.location.hash.indexOf('search') == 1 )
	{
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		
		var searchTerm = vars['term'];
		
		if( searchTerm.length > 0 )
		{
			$.get("/index.php", { act: 'blog', sub: 'search', term: searchTerm, action: 'ajax' })
			.done(function(data) {
				$('.pageTitle').html('Searching for ' + decodeURIComponent(searchTerm));
				$('#body-content').html(data);
			});
		}
		else
		{
			$.get("/index.php", { act: 'blog', action: 'ajax' })
			.done(function(data) {
				$('#pageTitle').html('Personal Blog');
				$('#pageDesc').html('All thoughts are my own and not my employers');
				$('#article-wrap').html(data);
			});	
		}
	}
	
	// BLOG SEARCH
	$('#blogSearchSubmit').click(function() {
            
			event.preventDefault();
			
            var searchTerm = $("#blogsearch").val();
			
			if( searchTerm.length == 0 )
			{
				alert('Please enter a search term before hitting search!');	
				return;
			}
            
			window.location.hash = 'search/?term=' + encodeURIComponent(searchTerm);
			
			if( searchTerm.length > 0 )
			{
				$.get("/index.php", { act: 'blog', sub: 'search', term: searchTerm, action: 'ajax' })
				.done(function(data) {
					$('.page-title').html('Searching for ' + decodeURIComponent(searchTerm));
					$('#article-wrap').html(data);
				});
			}
			else
			{
				$.get("/index.php", { act: 'blog', action: 'ajax' })
				.done(function(data) {
					$('#pageTitle').html('Personal Blog');
					$('#pageDesc').html('All thoughts are my own and not my employers');
					$('#blog-posts').html(data);
				});	
			}
    });
	
	function removeEvents() {
		document.body.removeEventListener('click', sendInteractionEvent);
		window.removeEventListener('scroll', sendInteractionEvent);
	}
	
	function sendInteractionEvent() {
		ga('send', 'event', 'Page Interaction');
		removeEvents();
	}
	
	document.body.addEventListener('click', sendInteractionEvent);
	window.addEventListener('scroll', sendInteractionEvent);
});