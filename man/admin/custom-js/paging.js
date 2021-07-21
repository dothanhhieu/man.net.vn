function showTableRow(tb_id,from,to)
{
	var lst_tr = $('#'+tb_id+' tr');
	to=(to<lst_tr.length?to:lst_tr.length);
	for(var i=1;i<lst_tr.length;i++)
	{
		if(i>=from && i<=to)
		{
			lst_tr[i].style.display = '';
		}
		else
		{
			lst_tr[i].style.display = 'none';
		}
	}
}
function paging(tb, lstpage)
{
	var numitem_per_page = parseInt($(lstpage).attr('num-per-page'));
	var num=$(tb+' tr').length;
	var numPage = Math.floor((num-1)/numitem_per_page)+((num-1)%numitem_per_page==0?0:1);
	$(lstpage+' li span[name=cur-page]').html('1/'+numPage);
	for(var i=numitem_per_page+1;i<num;i++)
	{
		$(tb+' tr')[i].style.display = 'none';
	}
	$(lstpage+' li a[name=pre-page]').click(function(){
		var lstpage = $(this).parent().parent().parent().attr('id');
		var cur_page = $('#'+lstpage+' li span[name=cur-page]').html();
		var idx = parseInt(cur_page.substring(0, cur_page.indexOf("/")));
		var num = parseInt(cur_page.substring(cur_page.indexOf("/")+1,cur_page.length));
		if(idx==1)
		{
			return;
		}
		idx--;
		$('#'+lstpage+' li span[name=cur-page]').html(idx+'/'+num);
		var tb_id=$('#'+lstpage).attr('tb-id');
		var numitem_per_page = parseInt($('#'+lstpage).attr('num-per-page'));
		var from=(idx-1)*numitem_per_page+1;
		var to=idx*numitem_per_page;
		showTableRow(tb_id,from,to);
	});
	$(lstpage+' li a[name=next-page]').click(function(){
		var lstpage = $(this).parent().parent().parent().attr('id');
		var cur_page = $('#'+lstpage+' li span[name=cur-page]').html();
		var idx = parseInt(cur_page.substring(0, cur_page.indexOf("/")));
		var num = parseInt(cur_page.substring(cur_page.indexOf("/")+1,cur_page.length));
		
		if(idx==num)
		{
			return;
		}
		idx++;
		$('#'+lstpage+' li span[name=cur-page]').html(idx+'/'+num);
		var tb_id=$('#'+lstpage).attr('tb-id');
		var numitem_per_page = parseInt($('#'+lstpage).attr('num-per-page'));
		var from=(idx-1)*numitem_per_page+1;
		var to=idx*numitem_per_page;
		showTableRow(tb_id,from,to);
	});
}