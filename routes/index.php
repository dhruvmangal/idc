<?php
header("Access-Control-Allow-Origin: http://localhost:8012/pot/");


$request = $_SERVER['REQUEST_URI'];
switch($request){
	
	case '/pot/':
		require_once 'controller/slideController.php';
		require_once 'controller/cabsController.php';
		require_once 'controller/testController.php';
		require_once 'view/index.php';
		
		
		break;
		
		
	case '/pot/contact/':
		require_once 'view/contact.php';
		
		
		break;
		
		
	case '/pot/about/':
		echo 'b';
		break;
		
		
	case '/pot/admin/auth/signup/':
		require_once 'controller/adminController.php';
		$admin = new AdminController();
		$res= $admin->create($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/admin/auth/login/':
		
		
		require_once 'controller/adminController.php';
		$admin = new AdminController();
		$res= $admin->login($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/admin/view/':
		require_once 'controller/adminController.php';
		$admin = new AdminController();
		$res= $admin->view($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/admin/update/':
		require_once 'controller/adminController.php';
		$admin = new AdminController();
		$res= $admin->update($_POST);
		echo json_encode($res);
		break;
	
	case '/pot/admin/delete/':
		require_once 'controller/adminController.php';
		$admin = new AdminController();
		$res= $admin->delete($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/city/create/':
		require_once 'controller/cityController.php';
		$city = new CityController();
		$res= $city->create($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/city/view/':	
		require_once 'controller/cityController.php';
		$city = new CityController();
		$res= $city->view($_POST);
		echo json_encode($res);
		break;
	
	case '/pot/city/update/':	
		require_once 'controller/cityController.php';
		$city = new CityController();
		$res= $city->update($_POST);
		echo json_encode($res);
		break;	
	
	case '/pot/city/delete/':	
		require_once 'controller/cityController.php';	
		$city = new CityController();
		$res= $city->delete($_POST);
		echo json_encode($res);
		break;
	
	case '/pot/slide/create/':
		require_once 'controller/slideController.php';
		$target_file= '../pot/view/'.basename($_FILES["slide"]["name"]);
		$flag= move_uploaded_file($_FILES["slide"]["tmp_name"], $target_file);
			
		$_POST['slide']= basename($_FILES["slide"]["name"]);	
		$slide = new SlideController();
		$res= $slide->create($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/slide/view/':	
		require_once 'controller/slideController.php';	
		$slide = new SlideController();
		$res= $slide->view($_POST);
		echo json_encode($res);
		break;
	
	case '/pot/slide/update/':
		require_once 'controller/slideController.php';	
		$slide = new SlideController();
		$res= $slide->update($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/slide/delete/':	
		require_once 'controller/slideController.php';	
		$slide = new SlideController();
		$res= $slide->delete($_POST);
		echo json_encode($res);
		break;	
	
	case '/pot/cab/create/':
		require_once 'controller/cabsController.php';
		$target_file= '../pot/view/'.basename($_FILES["cab"]["name"]);
		$flag= move_uploaded_file($_FILES["cab"]["tmp_name"], $target_file);
			
		$_POST['image']= basename($_FILES["cab"]["name"]);	
		$cab = new CabsController();
		$res= $cab->create($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/cab/view/':	
		require_once 'controller/cabsController.php';	
		$cab = new CabsController();
		$res= $cab->view($_POST);
		echo json_encode($res);
		break;
	
	case '/pot/cab/update/':
		require_once 'controller/cabsController.php';	
		$cab = new CabsController();
		$res= $cab->update($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/cab/delete/':	
		require_once 'controller/cabsController.php';	
		$cab = new CabsController();
		$res= $cab->delete($_POST);
		echo json_encode($res);
		break;
	/* testimonials */	
	case '/pot/test/create/':
		require_once 'controller/testController.php';
		$target_file= '../pot/view/'.basename($_FILES["image"]["name"]);
		$flag= move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
			
		$_POST['image']= basename($_FILES["image"]["name"]);	
		$tsm = new TestController();
		$res= $tsm->create($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/test/view/':	
		require_once 'controller/TestController.php';	
		$tsm = new TestController();
		$res= $tsm->view($_POST);
		echo json_encode($res);
		break;
	
	case '/pot/test/update/':
		require_once 'controller/testController.php';	
		$tsm = new TestController();
		$res= $tsm->update($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/test/delete/':	
		require_once 'controller/TestController.php';	
		$tsm = new TestController();
		$res= $tsm->delete($_POST);
		echo json_encode($res);
		break;

	/* USER */
	case '/pot/user/create/':
		require_once 'controller/userController.php';
		$user = new UserController();
		$res= $user->create($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/user/view/':	
		require_once 'controller/userController.php';	
		$user = new UserController();
		$res= $user->view($_POST);
		echo json_encode($res);
		break;
	
	case '/pot/user/update/':
		require_once 'controller/userController.php';	
		$user = new UserController();
		$res= $user->update($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/user/delete/':	
		require_once 'controller/userController.php';	
		$tsm = new UserController();
		$res= $tsm->delete($_POST);
		echo json_encode($res);
		break;	
	
	/*oneway stars*/
	
	case '/pot/oneway/create/':
		require_once 'controller/onewayController.php';	
		$oneway = new OnewayController();
		$res= $oneway->create($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/oneway/view/':
		require_once 'controller/onewayController.php';	
		$oneway = new OnewayController();
		$res= $oneway->view($_POST);
		echo json_encode($res);
		break;

	case '/pot/oneway/update/':
		require_once 'controller/onewayController.php';	
		$oneway = new OnewayController();
		$res= $oneway->update($_POST);
		echo json_encode($res);
		break;

	case '/pot/oneway/delete/':
		require_once 'controller/onewayController.php';	
		$oneway = new OnewayController();
		$res= $oneway->delete($_POST);
		echo json_encode($res);
		break;		
	
	case '/pot/onewaycabs/create/':
		require_once 'controller/onewayCabsController.php';	
		$oneway = new OnewayCabsController();
		$res= $oneway->create($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/onewaycabs/view/':
		require_once 'controller/onewayCabsController.php';	
		$oneway = new OnewayCabsController();
		$res= $oneway->view($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/onewaycabs/update/':
		require_once 'controller/onewayCabsController.php';	
		$oneway = new OnewayCabsController();
		$res= $oneway->update($_POST);
		echo json_encode($res);
		break;	
	
	case '/pot/onewaycabs/delete/':
		require_once 'controller/onewayCabsController.php';	
		$oneway = new OnewayCabsController();
		$res= $oneway->delete($_POST);
		echo json_encode($res);
		break;
		
	case '/pot/onewayfair/create/':
		require_once 'controller/onewayFairController.php';	
		$oneway = new OnewayFairController();
		$res= $oneway->create($_POST);
		echo json_encode($res);
		break;	
	
	case '/pot/onewayfair/view/':
		require_once 'controller/onewayFairController.php';	
		$oneway = new OnewayFairController();
		$res= $oneway->view($_POST);
		echo json_encode($res);
		break;	
	
	case '/pot/onewayfair/update/':
		require_once 'controller/onewayFairController.php';	
		$oneway = new OnewayFairController();
		$res= $oneway->update($_POST);
		echo json_encode($res);
		break;	
	
	case '/pot/onewayfair/delete/':
		require_once 'controller/onewayFairController.php';	
		$oneway = new OnewayFairController();
		$res= $oneway->delete($_POST);
		echo json_encode($res);
		break;	
	
	/* oneway ends */
	
	default:
		echo 'not found';
		break;
}


?>