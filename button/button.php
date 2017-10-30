<?php
function bot($event){
	if ($event->type=='message'){
		$object=[
			'replyToken'=>$event->replyToken, 
			'message'=>[[
				'type'=>'template', 
				'altText'=>'ボタンが表示できません。', 
				'template'=>[
					'type'=>'buttons', 
					'text'=>'this is buttons'
					'actions'=>[
						[
							'type'=>'postback', 
							'label'=>'bear(postback)', 
							'data'=>'bear'
						],
						[
							'type'=>'message', 
							'label'=>'penguin(message)', 
							'text'=>'penguin'
						], 
						[
							'type'=>'uri', 
							'label'=>'google(URI)', 
							'uri'=>'https://www.google.co.jp/'
						]
					]
				]
			]]
		];
			post('reply', $object);
	}
	if ($event->type=='postback'){
		reply($event, $event->postback->data);
	}
}
?>