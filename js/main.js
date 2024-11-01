function mhpcPrintQuickNotesContent() {
	
	var quickNotesContent = tinyMCE.get('quicknoteseditor').getContent();

	if (quickNotesContent == ''){
	 	alert('Please type your notes');
	 }else{
	 	w = window.open();
	 	w.document.write(quickNotesContent);
	 	w.print();
	 	w.close();
	 }
}