/*
 * Add your JavaScript to this file to complete the assignment.
 */

var hidden = document.getElementsByClassName('hidden');

var createButton = document.getElementById('create-twit-button');

var exitButton = document.getElementsByClassName('modal-close-button');

var cancelButton = document.getElementsByClassName('modal-cancel-button');

var acceptButton = document.getElementsByClassName('modal-accept-button');

var textInput = document.getElementById('twit-text-input');

var attrInput = document.getElementById('twit-attribution-input');

var container = document.getElementsByClassName('twit-container');

var querySearch = document.getElementById('navbar-search-input');

var queryButton = document.getElementById('navbar-search-button');

var totalTwits = document.getElementsByClassName('twit');



function create_twit(text, authorText)
{
	var new_twit = document.createElement('article');	
	new_twit.classList.add('twit');

	var icon = document.createElement('div');
 	icon.classList.add('twit-icon');
	
	icon.appendChild(document.createElement('i'));
	icon.firstChild.classList.add('fa');
	icon.firstChild.classList.add('fa-bullhorn');

	var text_content = document.createElement('div');
	text_content.classList.add('twit-content');


	text_content.appendChild(document.createElement('p'));	
	text_content.firstChild.classList.add('twit-text');

	text_content.appendChild(document.createElement('p'));	
	text_content.lastChild.classList.add('twit-attribution');
	
	//console.log(text_content.firstChild);
	text_content.firstChild.appendChild(document.createTextNode(text));     //text content

	var attrLink = document.createElement('a');
	attrLink.setAttribute('href', '#');
	attrLink.appendChild(document.createTextNode(authorText));

	
	text_content.lastChild.appendChild(attrLink); //attribution

	new_twit.appendChild(document.createTextNode(''));
	new_twit.appendChild(icon);
	new_twit.appendChild(document.createTextNode(''));
	new_twit.appendChild(text_content);
	new_twit.appendChild(document.createTextNode(''));


	container[0].appendChild(new_twit);	

/*
	for (var i = 0; i < totalTwits.length; i++)
	{
		console.log(totalTwits[i].childNodes);
	} 
*/
//	console.log(new_twit);
//	console.log(textNode);	
//	console.log(author);
	
}


function hide_modal()
{
	textInput.value = '';
	attrInput.value = '';
	hidden[0].style.display = 'none';
	hidden[1].style.display = 'none';	
}


exitButton[0].addEventListener('click', function(){

	hide_modal();
});



cancelButton[0].addEventListener('click', function(){
	
	hide_modal();
});



acceptButton[0].addEventListener('click', function(){
	
	var text = textInput.value;
	var authorText = attrInput.value;
    
//	console.log(textInput.value);	
//	console.log(authorText.value);

	if (text === '' || authorText === '') 
	{
		alert("Twit Text and author values cannot be left blank.");
	}
	else
	{
		create_twit(text, authorText);
		hide_modal();
	}
});



createButton.addEventListener('click', function(){


	hidden[0].style.display = 'block';
	hidden[1].style.display = 'block';
	
//	console.log(hidden);

});



queryButton.addEventListener('click', function(){

//	console.log(querySearch);
	var searchText = querySearch.value;
	
	deleteTwits(searchText);

});

function deleteTwits(text)
{
	var thisTwit;
	var thisText;
	var thisAttribution;
	var twitContainerLength = totalTwits.length - 1;

	for (var i = twitContainerLength; i >= 0; i--)
	{
		
		thisTwit = totalTwits[i];

		thisText = thisTwit.lastChild.previousSibling.firstChild.nextSibling;

		thisAttribution = thisTwit.lastChild.previousSibling.lastChild.previousSibling;

	//	console.log(thisText.textContent);
	
	//	console.log(thisAttribution.textContent);

		if (thisText.textContent.toLowerCase().includes(text.toLowerCase()) === false && text !== '' && thisAttribution.textContent.toLowerCase().includes(text.toLowerCase()) === false && text != '')
		{
			totalTwits[i].remove();
		}  

	} 
 
}










