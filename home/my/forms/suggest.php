<?php
//https://github.com/sparksuite/simplemde-markdown-editor	
addStyle('simplemde.min', 'app-static--3p');
addScript('simplemde.min', 'app-static--3p');
?>
<div class="container">
<textarea id="i3-suggestion" style="width: 100%"># Intro
Go ahead, play around with the editor! Be sure to check out **bold** and *italic* styling, or even [links](https://google.com). You can type the Markdown syntax, use the toolbar, or use shortcuts like `cmd-b` or `ctrl-b`.

## Lists
Unordered lists can be started using the toolbar or by typing `* `, `- `, or `+ `. Ordered lists can be started by typing `1. `.

#### Unordered
* Lists are a piece of cake
* They even auto continue as you type
* A double enter will end them
* Tabs and shift-tabs work too

#### Ordered
1. Numbered lists...
2. ...work too!

## What about images?
![Yes](https://i.imgur.com/sZlktY7.png)</textarea>

<script type="text/javascript">
window.onload = function () {
	new SimpleMDE({
		element: document.getElementById("i3-suggestion"),
		spellChecker: false,
		autosave: {
			enabled: true,
			unique_id: 'cdefgab',
		},
	});
}
</script>
</div>
