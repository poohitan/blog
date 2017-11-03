
	<!-- Footer -->
	<div id="footer">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
 			<tr>
    			<td width="50%" align="left">
					<div id="pages_navigation">
						<?php e($_s['pages_link']); e($_s['ctrl_prev']); e($_s['ctrl_next']); ?>
					</div>
				</td>
   				<td width="50%" align="right">
					<? @container('footer'); ?>
				</td>
			</tr>
		</table>
	</div>
	<!--/ Footer -->
</div>
<div id="shadow"></div>

<!-- Показує кількість коментарів Disqus -->
    <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'poohitan'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
		//Disqus не вміє відміняти к-сть коментарів, тому юзаєм не його вбудований скрипт, а перероблений
       // s.src = '//' + disqus_shortname + '.disqus.com/count.js';
	   s.src = '<?php e($_s['base_url']);?>/plugins/disqus/comments-count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script>
<!--/ Показує кількість коментарів Disqus -->

<?php if (!is_admin()){ ?>
<!-- Google Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10797087-16']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--/ Google Analytics -->

<!-- Таємниче посилання на сторінку входу -->
<div id="login">
	<a href="<?php e($_s['base_url']);?>?action=login"><img src="<?php e($_s['base_url']);?>/templates/empty.png"  border="0"/></a>
</div>
<!--/ Таємниче посилання на сторінку входу -->
<?php } ?>
</body>
</html>


