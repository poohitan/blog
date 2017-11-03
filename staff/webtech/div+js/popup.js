function popup(url,name,width,height) {
	myleft=(screen.width)?(screen.width-width)/2:100;
	mytop=(screen.height)?(screen.height-height)/2:100;
	properties = "width="+width+",height="+height+",top="+mytop+",left="+myleft;
	window.open(url,name,properties);
}