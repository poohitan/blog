var d=document
function clock() {
	var time = new Date()
	var h = '' + time.getHours()
	h = (h.length < 2) ? '0' + h : h
	var m = '' + time.getMinutes()
	m = (m.length < 2) ? '0' + m : m
	var ms = '' + time.getMilliseconds()
	var bla = (ms < 500) ? ':' : '&nbsp;'
	var tmp = h + bla + m
	d.getElementById('time').innerHTML = tmp
	var t = setTimeout('clock()',500)
}