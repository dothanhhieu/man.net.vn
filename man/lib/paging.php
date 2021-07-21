<?php
class Paging
{
	static public function div_Page($num_item, $num_item_per_page, $page_idx, &$num_page,&$begin, &$end)
	{
		$num_page=floor($num_item/$num_item_per_page)+($num_item%$num_item_per_page!=0?1:0);
		$begin=($page_idx-1)*$num_item_per_page+1;
		$end=($begin+$num_item_per_page-1>$num_item?$num_item:$begin+$num_item_per_page-1);
	}
}
?>