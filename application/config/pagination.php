<?php
	
	/*$config['base_url'] = $base_url;
	$config['total_rows'] = $total_records;
	$config['per_page'] = 10;*/
	$config['num_links'] = 2;
	$config['uri_segment'] = 3;
	$config['use_page_numbers'] = TRUE;
	$config['reuse_query_string'] = TRUE;

	$config['full_tag_open'] = '<ul class="pagination pull-right" style="margin:0;">';
	$config['full_tag_close'] = '</ul>';

	$config['first_link'] = 'First Page';
	$config['first_tag_open'] = '<li class="firstlink hide">';
	$config['first_tag_close'] = '</li>';

	$config['last_link'] = 'Last Page';
	$config['last_tag_open'] = '<li class="lastlink hide">';
	$config['last_tag_close'] = '</li>';

	$config['next_link'] = 'Next';
	$config['next_tag_open'] = '<li class="nextlink">';
	$config['next_tag_close'] = '</li>';

	$config['prev_link'] = 'Prev';
	$config['prev_tag_open'] = '<li class="prevlink">';
	$config['prev_tag_close'] = '</li>';

	$config['cur_tag_open'] = '<li class="curlink active"><a>';
	$config['cur_tag_close'] = '</a></li>';

	$config['num_tag_open'] = '<li class="numlink">';
	$config['num_tag_close'] = '</li>';
?>