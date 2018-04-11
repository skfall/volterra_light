<?php 
	// Start header content

	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable );
	
	$data['headContent'] = $zh->getCardViewHeader($headParams);
	
	// Start body content
	
	$cardItem = $zh->getHomeSection($item_id);
	$cardItem['section_caption'] = strip_tags($cardItem['section_caption']);
	$slides = $zh->getHomeSlides($cardItem["section_slider_id"]);
	if ($slides) $cardItem['slides'] = $slides;
	

	$rootPath = ROOT_PATH;
	
	$cardTmp = array(
					 'ID'						=>	array( 'type'=>'text', 		'field'=>'id', 				'params'=>array() ),
					 'Заголовок'					=>	array( 'type'=>'text', 		'field'=>'section_caption', 		'params'=>array() ),
					 'Подаголовок'					=>	array( 'type'=>'text', 		'field'=>'section_sub_caption', 			'params'=>array() ),
					 'Контент'			=>	array( 'type'=>'text', 		'field'=>'section_content', 		'params'=>array() ),
					 'Дата редактирования'		=>	array( 'type'=>'date', 		'field'=>'modified', 		'params'=>array() )
					 );

	if($slides){
		$cardTmp['Слайды'] = array( 'type'=>'images',	'field'=>'slides',			'params'=>array( 'path'=>RSF.'/split/files/home_slides/', 'field'=>'filename' ) );
	}


	$cardViewTableParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath );
	
	$cardViewTableStr = $zh->getCardViewTable($cardViewTableParams);
	
	// Join content
	
	$data['bodyContent'] .= "
		<div class='ipad-20' id='order_conteinter'>
			<h3>Детальный просмотр секции #$item_id</h3>";
	
	$data['bodyContent'] .= $cardViewTableStr;
				
	$data['bodyContent'] .=	"
		</div>
	";

?>