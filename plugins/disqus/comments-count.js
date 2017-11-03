var DISQUSWIDGETS, disqus_domain, disqus_shortname;
typeof DISQUSWIDGETS == "undefined" && (DISQUSWIDGETS = function () {
    var c = {}, n = document.getElementsByTagName("HEAD")[0] || document.body,
        i = {}, m = {
            identifier: 1,
            url: 2
        };
    c.domain = "disqus.com";
    c.forum = "";
    c.getCount = function () {
        var a, b;
        a = encodeURIComponent;
        var o = document.location.protocol + "//" + c.forum + "." + c.domain + "/count-data.js?",
            d = [],
            g = 0,
            j = 10;
        b = document.getElementsByTagName("A");
        for (var h, e, f, k = 0; k < b.length; k++) {
            h = b[k];
            e = h.getAttribute("data-disqus-identifier");
            f = h.hash === "#disqus_thread" && h.href.replace("#disqus_thread",
                "");
            if (e) f = m.identifier;
            else if (f) e = f, f = m.url;
            else continue;
            var l;
            i.hasOwnProperty(e) ? l = i[e] : (l = i[e] = {
                elements: [],
                type: f
            }, d.push(a(f) + "=" + a(e)));
            l.elements.push(h)
        }
        d.sort();
        for (a = d.slice(g, j); a.length;) b = document.createElement("script"), b.async = !0, b.src = o + a.join("&"), n.appendChild(b), g += 10, j += 10, a = d.slice(g, j)
    };
    c.displayCount = function (a) {
		var result;
        for (var b, c, d, g = a.counts, a = a.text.comments; b = g.shift();)
            if (c = i[b.id]) {
                if (b.comments == 0) {
					result = "Немає коментарів";
				}
				else if (b.comments == 1) {
					result = "1 коментар";
				}
				else {
					var numStr = b.comments.toString();
					var lastDigit = numStr.charAt(numStr.length - 1);
					if (lastDigit >=2 && lastDigit <= 4) {
						result = b.comments + " коментарі";
					}
					else {
						result = b.comments + " коментарів";
					}
				}
                c = c.elements;
                for (d = c.length - 1; d >= 0; d--) c[d].innerHTML = result
            }
    };
    return c
}());
(function () {
    if (typeof disqus_domain != "undefined") DISQUSWIDGETS.domain = disqus_domain;
    DISQUSWIDGETS.forum = disqus_shortname;
    DISQUSWIDGETS.getCount()
})();