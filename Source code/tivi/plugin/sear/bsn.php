<form method="get" action="search.php">
			<div class="col-md-4" style="float: right;">
			<div class="input-group navbar-left input-group-sm">
				<input size="10" id="search" name="s" type="text" class="form-control" placeholder="Tìm kiếm kênh truyền hình" autocomplete="on">
				<span class="input-group-btn">
				<button class="btn btn-default glyphicon glyphicon-search" style="margin-top: -1px;" type="submit"></button>
				</span>
			</div>
		</div>
	
</form>


<script type="text/javascript">
	var options_xml = {
		script:"./plugin/sear/test.php?",
		varname:"input"
	};
	var as_xml = new AutoSuggest('search', options_xml);
</script>
