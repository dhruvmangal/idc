<?php
$slide= new SlideController();
$arr['search'] =true;
$arr['status']= 1;
$data = $slide->view($arr);
unset($arr);

$cab= new CabsController();
$arr['search']= true;
$arr['status']= 1;
$dataCab= $cab->view($arr);
unset($arr);

$test= new TestController();
$arr['search']= true;
$arr['status']= 1;
$dataTest= $test->view($arr);
unset($arr);
?>
<html>
	<head>
		<title>IDC Cabs  </title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="view/style.css"/>
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<style>
			
		</style>
	</head>
	
	<script>
	function slide(i){
		//console.log(i);
		var sliders= document.getElementsByClassName('slider');
		var len= sliders.length;
		console.log(sliders[i]);
		setTimeout( function(){
			for(var j=0; j<sliders.length; j++){
				sliders[j].style.display= 'none';
			}
			sliders[i].style.display= 'block';
			if(i == len-1){
				i= -1;
			}
			slide(i+1);	
		}, 3000);
		
		
		
	}
	
	function card(i){
		var cards= document.getElementsByClassName('taxi');
		var len= cards.length;
		
		setTimeout(function(){
			for(var j=0; j<cards.length; j++){
				cards[j].style.display= 'none';
			}
			cards[i].style.display= 'block';
			cards[i+1].style.display= 'block';
			if(i == len-2){
				i= -1;
			}
			card(i+1);	
			
		}, 3000);
	}
	
</script>
	<body  onload="slide(0); card(0);">
		<header>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 upper-header">
						<center>Welcome to IDC Cabs</center>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="logo">
							<center><h4>IDC Cabs</h4></center>
						</div>
					</div>
					<div class="col-md-1 col-xs-3"></div>
					<div class="col-md-7 col-xs-3">
						<ul>
							<a href="/pot/"><li><i class="fa fa-home"></i>Home</li></a>
							<li><i class="fa fa-ticket"></i>Tours</li>
							<li><i class="fa fa-car"></i> Oneway</li>
							<li><i class="fa fa-road"></i> Round Trip</li>
							<a href="contact/"><li><i class="fa fa-phone"></i> Contact</li></a>
							<li><button class="btn btn-primary" style="margin-top: -5px;"><i class="fa fa-sign-in"></i> Login</button></li>
						</ul>
						<div class="menu-icon">&#x2630;</div>
					</div>
				</div>
			</div>
		</header>
		<nav>
			
			<ul>
				<li><i class="fa fa-home"></i>Home</li>
				<li><i class="fa fa-ticket"></i>Tours</li>
				<li><i class="fa fa-car"></i> Oneway</li>
				<li><i class="fa fa-road"></i> Round Trip</li>
				<li><i class="fa fa-phone"></i> Contact</li>
				<li><button class="btn btn-primary btn-login" style="margin-top: -5px;"><i class="fa fa-sign-in"></i> Login</button></li>
			</ul>
			<div class="nav-footer">
				<center>Version 1.0.2</center>
			</div>
		</nav>
		<section style="position: relative;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<?php for($i=0; $i<count($data['data']); $i++){ ?>
						
						<img src="view/<?php echo $data['data'][$i]['slide'];?>" class="slider"/>
						<?php } ?>
						
					</div>
				</div>
				<div class="row search-panel">
					<div class="col-md-6">
						<div class="search-div">
							<div>
								
								<div class="btn-menu-div">
									<button class="btn btn-menu">Oneway</button>
								</div>
								<div class="btn-menu-div">	
									<button class="btn btn-menu">Round Trip</button>
									
								</div>
							</div>
							<br/>
							<form>
								<br/>
								<br/>
								<h4>Search Cab</h4>
								<div class="half">
									<label>Pickup City</label>
									<input type="text" class="form-control">
								</div>
								<div class="half-fill"><i class="fa fa-arrow-left"></i><i class="fa fa-arrow-right"></i></div>
								<div class="half">
									<label>Drop City</label>
									<input type="text" class="form-control">
								</div>
								<br/>
								<div class="half">
									<label>Pickup Date</label>
									<input type="date" class="form-control">
								</div>
								<div class="half-fill"></div>
								<div class="half">
									<label>Drop Date</label>
									<input type="date" class="form-control">
								</div>
								
								<div class="half">
									<label>Phone No.</label>
									<input type="number" class="form-control" maxlength="10">
								</div>
								<br/>
								<div class="half"></div>
								<button type="submit" class="btn btn-submit">Search <i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<center><h2>How it works?</h2></center>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
						<div class="works-panel">
							<div class="circle">
								<i class="fa fa-car"></i>
							</div>
							<div class="line"></div>
							<div class="circle">
								<i class="fa fa-list"></i>
							</div>
							<div class="line"></div>
							<div class="circle">
								<i class="fa fa-id-card-o"></i>
							</div>
							<div class="line"></div>
							<div class="circle">
								<i class="fa fa-credit-card"></i>
							</div>
							
						</div>
					</div>
					<div class="col-md-3">
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<center><h2>Taxi Packages</h2></center>
						<br/>
						<br/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1">
					</div>
					<div class="col-md-6 col-xs-12">
						
						<?php
							for($i=0; $i<count($dataCab['data']); $i++){
						?>
						<div class="card taxi">
							<div class="card-img-panel">
								<img src="view/<?php echo $dataCab['data'][$i]['image'];?>" class="card-img"/>
							</div>
							<div class="card-details">
								<center><h4><?php echo $dataCab['data'][$i]['name'];?></h4></center>
								<br/>
								<h5 class="price"><?php echo $dataCab['data'][$i]['capacity'];?> Persons </h5>
								<h5><?php echo $dataCab['data'][$i]['desc'];?> </h5>
								
								<br/>
								<br/>
								<br/>
							</div>
							<div class="card-btn">
								<button class="btn btn-tour">MORE</button>
							</div>
						</div>
						<?php
							}
						?>
						
						
						
						
					
					</div>
					
					<div class="col-md-5 col-xs-6">
						<div class="banner">
							<div class="banner-panel">
								<center><h3>IDC cabs & Tours</h3><center>
								<br/>
								<p>Download our Android app to get faster services.</p>
								<br/>
								<center><img src="view/download.png" class="download"></center>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		
		
		<section>
			<div class="container-fluid">
			</div>
		</section>
		
		
		<section>	
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<center><h2>IDC Cabs Tour Packages</h2></center>
						<br/>
						<br/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1">
					</div>
					<div class="col-md-10">
						<div class="card">
							<div class="card-img-panel">
								<img src="view/lotus.jpg" class="card-img"/>
							</div>
							<div class="card-details">
								<center><h4>Delhi- Agra</h4></center>
								<br/>
								<h5 class="price">&#8377; 2599 /-</h5>
								<h5>Round Trip</h5>
								<h5>3 Days/ 2 Nights</h5>
								<h5>Delhi - Agra - Delhi</h5>
								<br/>
							</div>
							<div class="card-btn">
								<button class="btn btn-tour">MORE</button>
							</div>
						</div>
						
						<div class="card">
							<div class="card-img-panel">
								<img src="view/lotus.jpg" class="card-img"/>
							</div>
							<div class="card-details">
								<center><h4>Delhi- Agra</h4></center>
								<br/>
								<h5 class="price">&#8377; 2599 /-</h5>
								<h5>Round Trip</h5>
								<h5>3 Days/ 2 Nights</h5>
								<h5>Delhi - Agra - Delhi</h5>
								<br/>
							</div>
							<div class="card-btn">
								<button class="btn btn-tour">MORE</button>
							</div>
						</div>
						
						<div class="card">
							<div class="card-img-panel">
								<img src="view/lotus.jpg" class="card-img"/>
							</div>
							<div class="card-details">
								<center><h4>Delhi- Agra</h4></center>
								<br/>
								<h5 class="price">&#8377; 2599 /-</h5>
								<h5>Round Trip</h5>
								<h5>3 Days/ 2 Nights</h5>
								<h5>Delhi - Agra - Delhi</h5>
								<br/>
							</div>
							<div class="card-btn">
								<button class="btn btn-tour">MORE</button>
							</div>
						</div>
						
						<div class="card">
							<div class="card-img-panel">
								<img src="view/lotus.jpg" class="card-img"/>
							</div>
							<div class="card-details">
								<center><h4>Delhi- Agra</h4></center>
								<br/>
								<h5 class="price">&#8377; 2599 /-</h5>
								<h5>Round Trip</h5>
								<h5>3 Days/ 2 Nights</h5>
								<h5>Delhi - Agra - Delhi</h5>
								<br/>
							</div>
							<div class="card-btn">
								<button class="btn btn-tour">MORE</button>
							</div>
						</div>
						
					
					</div>
					<div class="col-md-1">
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<center><h2>Our Testimonials</h2></center>
					</div>
					
					
				</div>
				
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
					<?php
						
						for($i=0; $i<count($dataTest['data']); $i++){
							
					?>
						<div class="test-card">
							<div class="test-card-img-panel">
								<div class="test-card-img">
									<img src="view/<?php echo $dataTest['data'][$i]['image']?>" class="test-card-img"/>
								</div>
							</div>
							<div class="test-comment">
								<center><?php echo $dataTest['data'][$i]['name']; ?></center>
								<br/>
								<?php echo $dataTest['data'][$i]['desc']; ?>
							</div>
						</div>
					<?php
						}
						unset($dataTest);
					?>	
						
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</section>
		
		
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<center><h2>We drive in these cities</h2></center>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="city">Delhi - Jaipur </div>
						<div class="city">Delhi- Gurgaon</div>
						<div class="city">Delhi - Ahemedabad</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
						<div class="city">Jaipur</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</section>
		
		
		<section></section>
		<div class="floating-window">
			<img src="view/whatsapp.png" class="floating-window-img"/>
		</div>
		<div class= "footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
							<h4>Company</h4>
						<ul>
							<li>About Us</li>
							<li>Privacy Policy</li>
							<li>Terms & Condition</li>
							
							<li>FAQs</li>
						</ul>
					</div>
					<div class="col-md-3">
						<h4>Links</h4>
						<ul>
							<li><a href="https://www.facebook.com/IDC-CAB-Outstation-Taxi-106943014615199/" target="_blank"><img src="view/fb.png" class="social-icon"></a></li>
							<li><a href="https://api.whatsapp.com/message/UIKQJOFWMWQUD1" target="_blank"><img src="view/wa.png" class="social-icon"></a></li>
							<li><a href="https://www.instagram.com/invites/contact/?i=x99ztdz63r22&utm_content=koxrvcz" target="_blank"><img src="view/insta.png" class="social-icon"></a></li>
							
							
						</ul>
					</div>
					
					<div class="col-md-3">
						<h4>Tours</h4>
						<ul>
							<li>Chandighar Manali</li>
							<li>Delhi Agra</li>
							<li>Delhi Amritsar</li>
							<li>Delhi Simla</li>
							
						</ul>
					</div>
					
					<div class="col-md-3">
						<h4>Tours</h4>
						<ul>
							<li><i class="fa fa-phone"></i>+91 8426020355</li>
							<li><i class="fa fa-envelope"></i> contact@idcabs.in</li>
							
							<li><i class="fa fa-envelope"></i> tours@idcabs.in</li>

							
						</ul>
					</div>
					
				</div>
			</div>
		</div>
		<div class="footer-strip">
			<i class="fa fa-copyright"></i> All copyrights reserved.
		</div>
		<footer>
			<h4><b>Covid Alert: </b> Please wear mask inside cab</h4>
		</footer>
	</body>
</html>

