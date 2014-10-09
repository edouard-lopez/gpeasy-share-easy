<?php
/*
by Édouard Lopez: http://www.google.com/profiles/edouard.lopez
*/
defined('is_running') or die('Not an entry point...');





class Gadget_Share_Easy{

  private $sharingSnippet = null;

  function setSharingSnippet()
  {
    global $dataDir, $addonPathData;
    if (!file_exists($addonPathData.'/SharingSnippet.php') || isset($sharingSnippet))
    {
    	$file = $addonPathData.'/SharingSnippet.php';
    	$snippet = '$sharingSnippet = \'\';';
	    $this->sharingSnippet = $snippet;
	    gpFiles::SaveFile($file,$contents,$snippet);
    } else 
    {
      require $addonPathData.'/SharingSnippet.php';
      $this->sharingSnippet = $sharingSnippet;
    }
  }
  
  function getSharingSnippet()
  {
    return htmlspecialchars_decode($this->sharingSnippet);
  }

	function Gadget_Share_Easy(){
    $this->setSharingSnippet();
  	echo $this->getSharingSnippet();
	}
	
//	function __construct()
//	{
//    echo $this->setSharingSnippet();
//	}
}
