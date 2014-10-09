<?php
defined('is_running') or die('Not an entry point...');


class Special_Share_Easy{
	function Special_Share_Easy(){ 
		echo '<h2>This is an Special Script</h2>';
		
		echo '<p>';
		
		echo 'This is an example of a gpEasy Addon in the form of a Special page.';
		
		echo '</p>';
		
		
		echo '<p>';
		
		echo 'Special pages can be used to add more than just content to a gpEasy installation. ';
		
		echo '</p>';
		
		echo '<p>';
		
		echo common::Link('Admin_Share_Easy','An Share_Easy Link');

		echo '</p>';
	}
}
	

