 	<footer>
		
	</footer>
	<?php wp_footer(); ?>
	<script type="text/javascript">
		if (!Modernizr.svg) {
		  jQuery("#logo img").attr("src", "<?= get_template_directory_uri(); ?>/assets/built/images/logo.svg");
		}
		jQuery(document).ready(function(){
			jQuery(function($) {
			  $('input[name="company"]').autoComplete({
			    minChars: 1,
			    source: function(term, response){
			      $.getJSON('https://autocomplete.clearbit.com/v1/companies/suggest', { query: term }, function(data){ response(data); });
			    },
			    renderItem: function (item, search) {
			      default_logo = 'https://s3.amazonaws.com/clearbit-blog/images/company_autocomplete_api/unknown.gif'

			      if(item.logo == null) {
			        logo = default_logo
			      } else {
			        logo = item.logo + '?size=30x30'
			      }

			      container = '<div class="autocomplete-suggestion" data-name="'+item.name+'" data-val="'+search+'">'
			      container += '<span class="icon"><img align="center" src="'+logo+'" onerror="this.src=\''+default_logo+'\'"></span> '
			      container += item.name+'<span class="domain">'+item.domain+'</span></div>';
			      return container
			    },
			    onSelect: function(e, term, item){
			      $('input[name="company"]').val(item.data('name'))
			    },
			  });
			});
		});
	</script>
	<script>
		(function(d,b,a,s,e){ var t = b.createElement(a),
		    fs = b.getElementsByTagName(a)[0]; t.async=1; t.id=e;
		    t.src=('https:'==document.location.protocol ? 'https://' : 'http://') + s;
		    fs.parentNode.insertBefore(t, fs); })
		(window,document,'script','scripts.demandbase.com/12n0lkFp.min.js','demandbase_js_lib');
	</script>
</div>
</body>
</html>