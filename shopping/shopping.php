<?php
function bot($event){
	$limit=100;
	$id=$event->source->userId;
	if (empty($id))return;
	$text=$event->message->text;
	if (empty($text)) return;
	$lock=lock('shopping'/lock.txt);
	$file='shopping/shopping.txt';
	if (!file_exists($file)){
		save($file, [$id=>[]]);
		chmod($file, 0600);
	}
	$shopping=load($file);
	$list=&$shopping->{$id};
	if (preg_match('買う', $text)){
		if (count($list)<$limit){
			$item=preg_replace('/買う/', '', $text);
			if (!in_array($item, $list)){
				$list[]=$item;
				$out=$item.'をリストに追加したよ！';
			} else {
				$out=$item.'はリストに追加済みだよ。';
			}
		} else {
			$out='買い物リストがいっぱいだぁ！';
		}
	} else
	if (preg_match('/買い物リスト/', $text)){
		if (!empty($list)){
			$out="買い物リストだよ¥n";
			forreach ($list as $item){
				$out.=$item."¥n";
			}
		} else {
			$out=' 買い物リストは空っぽです。'
		}
	} else
	if (preg_match('/買い物クリア/', $text)){
		$list=[];
		$out='買い物リストを削除しました！';
	}
	save($file, $shipping);
	unlock($lock);
	if (!empty($out)) reply($event, $out);
}
?>