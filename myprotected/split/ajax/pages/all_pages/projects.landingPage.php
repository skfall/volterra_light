<?php 
	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'appTable'=>$appTable);
	$data['headContent'] = $zh->getLandingHeader($headParams);

	$itemsList = $zh->getProjects($params);
	$totalItems = $zh->getProjects($params,true);
	foreach ($itemsList as $key => &$section) {
		$section['section_caption'] = strip_tags($section['section_caption']);
	}
	$on_page = (isset($_COOKIE['global_on_page']) ? $_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
	$pages = ceil($totalItems/$on_page);
	$start_page = (isset($params['start']) ? $params['start'] : 1);
	
	$frst_page = 1;
	$prev_page = 1;
	$next_page = $pages;
	$last_page = $pages;
				
	if($start_page < $pages) $next_page = $start_page+1;
	if($start_page > 1) $prev_page = $start_page-1;

	if(isset($_COOKIE['filter-1']) && $_COOKIE['filter-1']) $data['filter']['f1'] = 1;
	if(isset($_COOKIE['filter-2']) && $_COOKIE['filter-2']) $data['filter']['f2'] = 1;
	if(isset($_COOKIE['filter-3']) && $_COOKIE['filter-3']) $data['filter']['f3'] = 1;

	$filter1_options = array( 'By ID'=>'M.id', 'By Name'=>'M.name' );
	$filter2_options = array( 
							'Публикация'	=> array( 'fieldName'=>'M.block', 'params' => array('Yes'=>'0', 'No'=>'1') )
							);
	$filter3_options = array( 
							'sort' => array( 'ID'=>'id', 'Вопросу'=>'question', 'Порядковому номеру'=>'order_id' ),
							'order' => array(  'По убыванию'=>' DESC', 'По возрастанию'=>'' ) 
							);
	$filterFormParams = array(	'params'=>$params, 
								'headParams'=>$headParams, 
								'filter1_options'=>$filter1_options, 
								'filter2_options'=>$filter2_options, 
								'filter3_options'=>$filter3_options, 
								'on_page'=>$on_page 
							  );
	
	$filterFormStr = $zh->getLandingFilterForm($filterFormParams);

	$tableColumns = array(
						  'Checkbox'			=>	array('type'=>'checkbox',	'field'=>''),
						  'Название'			=>	array('type'=>'text',		'field'=>'name'),
						  'Алиас'				=>	array('type'=>'text',		'field'=>'alias'),
						  'Тип'					=>	array('type'=>'text',		'field'=>'type'),
						  'Публикация'			=>	array('type'=>'block',		'field'=>'block'),
						  'Просмотр'			=>	array('type'=>'cardView',	'field'=>'Смотреть'),
						  'Редактирование'		=>	array('type'=>'cardEdit',	'field'=>'Редактировать'),
						  'ID'					=>	array('type'=>'text',		'field'=>'id')
						  );
	
	$tableParams = array( 'itemsList'=>$itemsList, 'tableColumns'=>$tableColumns, 'headParams'=>$headParams );
	
	$tableStr = $zh->getItemsTable($tableParams);
	
	// START PAGINATION
	
	$pagiParams = array( 'headParams'=>$headParams, 'start_page'=>$start_page, 'pages'=>$pages, 'on_page'=>$on_page );
	
	$pagiStr = $zh->getLandingPagination($pagiParams);
	
	// Join Content
	
	$data['bodyContent'] = $filterFormStr;
	
	$data['bodyContent'] .= $tableStr;
	
	$data['bodyContent'] .= $pagiStr;

?>