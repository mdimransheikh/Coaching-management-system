<?php
class format{
	public function formatDate($date){
		return date('F j,y  g:i', strtotime($date));
}

	public function textShorten($text, $limit=150){
		$text = $text." ";
		$text = substr($text, 0, $limit);
		$text = substr($text, 0, strrpos($text,' '));
		$text = $text."....";
		return $text;
}
	public function validation($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	public function title(){
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path, '.php');
		if($title == 'index'){
			$title = 'home';
		}elseif($title == 'contact'){
			$title = 'conctact';
		}
		return $title=ucwords($title);
	}
}
?>