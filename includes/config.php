<?php
	$localhost = "localhost";
	$DBusername = "root";
	$dbname = "foodex_new";
	$pwd="";

	$mysqlilink = @mysqli_connect($localhost,$DBusername,$pwd)or die('<center><div>wrong in connect with server</div>'.mysqli_connect_error()."</center>");


	@mysqli_select_db($mysqlilink,$dbname)or die('<center><div>wrong in connect with database</div>'.mysqli_connect_error($mysqlilink)."</center>");

	@mysqli_set_charset($mysqlilink,"UTF8")or die('<center><div>wrong </div>'.mysqli_connect_error($mysqlilink)."</center>");


	//  ======================  Start Path ============================
	//  ====================== =========== ============================

	// HTTP
	// define('HTTP_SERVER', 'http://localhost/Foodex_new/admin/');
	$PATH_SERVER 			= 'http://localhost/Foodex_new/';
	$PATH_PHOTOES 			= $PATH_SERVER . 'photoes/';
	$PATH_ATTACHMENTS 		= $PATH_SERVER . 'attachments/';

	$PATH_ADMIN 			= $PATH_SERVER . 'admin/';
	$PATH_RECEIVER 			= $PATH_SERVER . 'receiver/';
	$PATH_DONATOR 			= $PATH_SERVER . 'donator/';

	$PATH_ADMIN_ADMIN = $PATH_ADMIN . 'admin/';
	$PATH_ADMIN_DONATOR = $PATH_ADMIN . 'donator/';
	$PATH_ADMIN_DONATION = $PATH_ADMIN . 'donation/';
	$PATH_ADMIN_RECEIVER = $PATH_ADMIN . 'receiver/';
	$PATH_ADMIN_RECEIVER_ORDER = $PATH_ADMIN . 'receiver_order/';
	
	
	$PATH_ADMIN_INCLUDES 			= $PATH_ADMIN . 'includes/';
	$PATH_ADMIN_TEMPLATE 			= $PATH_ADMIN . 'template/';
	$PATH_ADMIN_PHOTOES 			= $PATH_ADMIN . 'photoes/';
	$PATH_ADMIN_LANG 			    = $PATH_ADMIN . 'lang/';
	

	// DIR
	define('DIR_APPLICATION', 'C:/xampp/htdocs/Foodex_new/');
	define('DIR_ADMIN', 'C:/xampp/htdocs/Foodex_new/admin/');
	define('DIR_ADMIN_INCLUDES', 'C:/xampp/htdocs/Foodex_new/admin/includes/');
	define('DIR_ADMIN_TEMPLATE', 'C:/xampp/htdocs/Foodex_new/admin/template/');
	define('DIR_ADMIN_PHOTOES', 'C:/xampp/htdocs/Foodex_new/admin/photoes/');
	define('DIR_PHOTOES', 'C:/xampp/htdocs/Foodex_new/photoes/');
	define('DIR_LANG', 'C:/xampp/htdocs/Foodex_new/lang/');
	define('DIR_ATTACHMENTS', 'C:/xampp/htdocs/Foodex_new/attachments/');



	//  ======================  End  Path =============================
	//  ====================== =========== ============================


	//  ======================  Start Function ============================
	//  ====================== =============== ============================
	function getTitle() {

		global $pageTitle;

		if (isset($pageTitle)) {

			echo $pageTitle;

		} else {

			echo 'Default';

		}
	}


  function checkAdminSession($path = "http://localhost/Foodex_new/" , $page = "login.php")
  {
            if (!isset($_SESSION['user']))
            {
				header('Location:'. $path . $page);
            }
			if (!(isset($_SESSION['userType'])))
			{
				header('Location:'. $path . $page);
			} 
			if($_SESSION['userType'] != 'a')
			{
				header('Location:'. $path . $page);
			}
  }

  function checkDonatorSession($path = "http://localhost/Foodex_new/" , $page = "login.php")
  {
            if (!isset($_SESSION['user']))
            {
				header('Location:'. $path . $page);
            }
			if (!(isset($_SESSION['userType'])))
			{
				header('Location:'. $path . $page);
			} 
			if($_SESSION['userType'] != 'd')
			{
				header('Location:'. $path . $page);
			}
  }

  function checkReceiverSession($path = "http://localhost/Foodex_new/" , $page = "login.php")
  {

			if (!isset($_SESSION['userID']))
			{
				header('Location:'. $path . $page);
			}
			if (!isset($_SESSION['user']))
			{
				header('Location:'. $path . $page);
            }
			if (!(isset($_SESSION['userType'])))
			{
				header('Location:'. $path . $page);
			} 
			if($_SESSION['userType'] != 'r')
			{
				header('Location:'. $path . $page);
			}
  }

  function isLogin()
  {
	if(isset($_SESSION['user']))
	{
		if(isset($_SESSION['userType']))
		{
			if($_SESSION['userType'] == 'a' || $_SESSION['userType'] == 'r' || $_SESSION['userType'] == 'd')
			{
				return true;
			}
		}
	}
	return false;	
  }

  function getLoginType()
  {
	if(isLogin())
	{
		return $_SESSION['userType'];
	}
	else
	{
		return null;
	}
  }

  function isAdmin() { if(getLoginType() == 'a') return true; }
  function isDonator() { if(getLoginType() == 'd') return true; }
  function isReceiver() { if(getLoginType() == 'r') return true; }
  function getLoginEmail() { return $_SESSION['user'] ;}

	//  ======================  End Function ============================
	//  ====================== ============= ============================
?>