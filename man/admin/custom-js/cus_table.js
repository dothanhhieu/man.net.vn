function search_tb(tb_id,col_idx,begin_idx,keyword)
{
	alert(col_idx);
	$('#'+tb_id+" tr").each(function(index) {
		if(index<begin_idx)
			return;
		$row = $(this);
		var id = $row.find('td:nth-child('+col_idx+')').text();
		
		if (id.toLowerCase().indexOf(keyword.toLowerCase()) != 0) {
			$(this).hide();
		}
		else {
			$(this).show();
		}
  });
}