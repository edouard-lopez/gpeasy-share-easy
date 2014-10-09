<?php
/*
by Édouard Lopez: http://www.google.com/profiles/edouard.lopez
*/
defined('is_running') or die('Not an entry point...');

class Admin_Share_Easy{
  private $serviceProvider = array(
    'AddThis' => 'http://www.addthis.com/web-button-select',
    'ShareThis' => 'http://sharethis.com/publishers/get-sharing-button'
  );
  private $language = 'en';
  private $sharingSnippet = null;

  function shuffleArray()
  {
      if (!is_array($this->serviceProvider)) return $this->serviceProvider;

      $keys = array_keys($this->serviceProvider);
      shuffle($keys);
      $random = array();
      foreach ($keys as $key)
      {
        $random[$key] = $this->serviceProvider[$key];
      }
    return $random;
  }

  function getServiceProvider()
  {
    return $this->serviceProvider;
  }
  
  function getRandomServiceProvider()
  {
    return $this->shuffleArray();
  }

  function setLanguageUsingConfigFile()
  {
		global $config, $rootDir, $dataDir, $addonRelativesnippet, $addonPathCode;
		require($dataDir.'/data/_site/config.php');
		if(!empty($config['language']) && file_exists($addonPathCode.'/languages/'.$config['language'].'.php')) 
		{
		  $this->language = $config['language'];
    } else
    {
      require $addonPathCode.'/languages/'.$this->language.'.php';
      message($langmessage['Missing your language']);
    }
  }

  function getLanguage()
  {
    return $this->language;
  }
  
  function getLanguageFile()
  {
    global $addonPathCode;
    return $addonPathCode.'/languages/'.$this->getLanguage().'.php';
  }

  function addSharingSnippet()
  {
    global $dataDir, $addonPathData;
    require $this->getLanguageFile();

  	$file = $addonPathData.'/SharingSnippet.php';
    $this->sharingSnippet = htmlspecialchars($_REQUEST['HTMLsnippet']);
  	$snippet = '$sharingSnippet = "'.$this->sharingSnippet.'"';
    if (gpFiles::SaveFile($file,"",$snippet))
    {
	    message(
	      '<p>'.$langmessage['Snippet added'].'</p>'.
	      '<p>'.$langmessage['Locate sharing buttons'].' '.
	                $langmessage['Change sharing buttons location'].
        '</p>'
        , common::Link('Admin_Theme_Content', $langmessage['current_layout'], 'cmd=editlayout&layout=default')
      );
    }
  }
  
  function setSharingSnippet()
  {
    global $dataDir, $addonPathData;
    	$file = $addonPathData.'/SharingSnippet.php';
    	require $file;
	    $this->sharingSnippet = $sharingSnippet;
  }  
  
  function getSharingSnippet()
  {
    global $addonPathData;
    if (file_exists($addonPathData.'/SharingSnippet.php') && isset($sharingSnippet))
    {
      $this->setSharingSnippet($sharingSnippet);
    }
    return $this->sharingSnippet;
  }
  
	function Admin_Share_Easy()
	{
    global $addonPathCode;
//    var_dump($this->getLanguageFile());
    require $this->getLanguageFile();
		?>
		
		  <h2><?php echo $langmessage['Add sharing service'];?></h2>
		  <p><?php echo $langmessage['Principle intro']?></p>
		  
		  <h3><?php echo $langmessage['Get HTML snippet'];?></h3>
<!--		  <p></p>-->
	    <ul>
        <?php 
          foreach ($this->getRandomServiceProvider() as $service => $url)
          {
	            ?>
	            <li><a href="<?php echo $url;?>" target="_blank" title="<?php echo $langmessage['open in new window'];?>"><?php echo $service;?></a></li>
	            <?php
          }
        ?>
	    </ul>
	    
		  <h3><?php echo $langmessage['Add HTML snippet to your site'];?></h3>
		  <form action='?' method="GET">
		    <input type="hidden" name="cmd" value="addService" />
		    <textarea id='HTMLsnippet' name='HTMLsnippet' rows="15" cols="80" placeholder="<?php echo $langmessage['placeholder: insert HTML from sharing service'];?>"><?php echo $this->getSharingSnippet();?></textarea>
		    <input type="submit" value="<?php echo $langmessage['submit: add sharing button'];?>" />
		  </form>

<?php 
//		echo common::Link('Special_Share_Easy','An Share_Easy Link');			
	}
	
  function __construct()
  {
    $this->setLanguageUsingConfigFile();
    
    if (isset($_REQUEST['cmd']))
    {
      switch ($_REQUEST['cmd'])
      {
        case 'addService':
          $this->addSharingSnippet();
        break;
        default: break;
      }
    }
    $this->setSharingSnippet();
    $this->Admin_Share_Easy();
  }
}
	

