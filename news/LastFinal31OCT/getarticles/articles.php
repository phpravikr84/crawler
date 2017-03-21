<?php 
include('articlescripts.php');
$search = new articlescripts();
$articles = $search->getArticles($_REQUEST['author_id']);
print_r ($articles);
//echo $authorname['media_contact_name'];
 ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Supernewsroom | Search</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

 

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class=" mini-navbar">

    <div id="wrapper">



        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Search Result</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Search</a>
                        </li>
                        <li class="active">
                            <strong>Contact Profile</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
		<!--/////////////Profile Starts here/////// -->
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
			
			
			<!--/////////////Profile Left Panel here/////// -->
			    <div class="col-md-3"> 
                    <div class="ibox float-e-margins text-center" >
								<div class="ibox-title" style="background: #E6E6E6;">
									<h1>Ahmad Naser Abdul Wahab</h1>
									<div class="m-b-sm">
                                        <img alt="image" class="img-circle circle-border m-b-md" src="img/media_contact_photo/a4.jpg" style="width:180px;">
										<p><button class="btn btn-danger btn-circle" type="button"><i class="fa fa-globe"></i></button>
											<button class="btn btn-danger btn-circle" type="button"><i class="fa fa-facebook"></i></button>
											<button class="btn btn-danger btn-circle" type="button"><i class="fa fa-twitter"></i></button>
											<button class="btn btn-danger btn-circle" type="button"><i class="fa fa-youtube"></i></button>
											<button class="btn btn-danger btn-circle" type="button"><i class="fa fa-instagram"></i></button>									
										</p>
									</div>								
									<div class="btn-group">
									<button class="btn btn-danger" type="button"><i class="fa fa-envelope"></i> Send Email</button>
									<button class="btn btn-danger" type="button"><i class="fa fa-star"></i> Add Favourite</button>
									</div>
								</div>
								<div class="widget-text-box text-left" style="background: #E6E6E6; border-left: 6px solid #ed5565;">
											<h4 class="media-heading">Designation</h4>
											<p>Managing Editor</p>
								</div>
								<div class="widget-text-box text-left" style="background: #E6E6E6; border-left: 6px solid #ed5565;">
											<h4 class="media-heading">Desk</h4>
											<p>News</p>
								</div>
								<div class="widget-text-box text-left" style="background: #E6E6E6; border-left: 6px solid #ed5565;">
											<h4 class="media-heading">Desk</h4>
											<p>News</p>
								</div>
								<div class="widget-text-box text-left" style="background: #E6E6E6;border-left: 6px solid #ed5565;">
											<h4 class="media-heading">Company</h4>
											<p><a href="search_media_organization.html"> Berita Harian </a></p>
								</div>
								<div class="widget-text-box text-left" style="background: #E6E6E6;border-left: 6px solid #ed5565;">
											<h4 class="media-heading">Industry / Tag</h4>
											<p>
											<span class="label"><i class="fa fa-tag"></i> Aviation</span>
											<span class="label"><i class="fa fa-tag"></i> Banking</span>
											<span class="label"><i class="fa fa-tag"></i> Technology & Scince</span>
											<span class="label"><i class="fa fa-tag"></i> Education</span>
											<span class="label"><i class="fa fa-tag"></i> Education</span>
											</p> 
								</div>
                    </div>					
                </div>
								
                <!--/////////////Profile Right Panel here/////// -->
                <div class="col-md-9">
				
				<!--///////////// First Row Porfile Tabs/////// -->
				<div class="row">
				<div class="col-md-12">				
                    <div class="ibox" style="box-shadow: 2px 2px 4px rgba(0,0,0,0.2);" >
                        <div class="ibox-content">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Profile</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Biography</a></li>
								<li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-magic"></i> Alerts</a></li>								
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active ">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Name / Designation</th>
										<th>Contact</th>
										<th>Industry / Tags</th>
										                      
									</tr>
								</thead>
								<tbody>									
										<tr>
											<td><div><strong><a href=" viewprofile.html">Ahmad Naser Abdul Wahab</a> </strong><br /> <small>Managing Editor</small>
												</div>
											</td>
											<td><i class="fa fa-envelope"> </i> naserwahab@beritaharian.com.my
											    <br /><i class="fa fa-phone"> </i> 03 7710 0056
												<br /><i class="fa fa-print"> </i> 03 7710 0056
											</td>
											<td>											
											
												<p>
														<span class="label"><i class="fa fa-tag"></i> Aviation</span>
														<span class="label"><i class="fa fa-tag"></i> Banking</span>
														<span class="label"><i class="fa fa-tag"></i> Technology & Scince</span>
														<span class="label"><i class="fa fa-tag"></i> Education</span>
														<span class="label"><i class="fa fa-tag"></i> Education</span>	
												</p> 
											</td>
											
										</tr>									
										
										</tbody>

										</table>    
                                        </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
								<div class="panel-body">
                                    <strong>Donec quam felis</strong>

                                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                        and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                        sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                </div>
                                    
                                </div>
								<div id="tab-3" class="tab-pane">
								<div class="panel-body">
                                    <strong>GEookwe sd777</strong>

                                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                        and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                        sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
				</div>
				</div>
				
				<!--/////////////Second Rows Devidev to The Twiter & Latest Article Crawler/////// -->
				<div class="row">

				<!--/////////////Twitter/////// -->
				<div class="col-md-6">
					<div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Latest Tweets</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
										<a class="close-link">
                                        <i class="fa fa-times"></i>
										</a>
                                    </div>
									
                                </div>
                                <div class="ibox-content no-padding">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <p><a class="text-info" href="#">@Alan Marry</a> I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 minuts ago</small>
                                        </li>
                                        <li class="list-group-item">
                                            <p><a class="text-info" href="#">@Stock Man</a> Check this stock chart. This price is crazy! </p>
                                            <div class="text-center m">
                                                <span id="sparkline8"></span>
                                            </div>
                                            <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 hours ago</small>
                                        </li>
                                        <li class="list-group-item">
                                            <p><a class="text-info" href="#">@Kevin Smith</a> Lorem ipsum unknown printer took a galley </p>
                                            <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small>
                                        </li>
                                        <li class="list-group-item ">
                                            <p><a class="text-info" href="#">@Jonathan Febrick</a> The standard chunk of Lorem Ipsum</p>
                                            <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 hour ago</small>
                                        </li>
                                        <li class="list-group-item">
                                            <p><a class="text-info" href="#">@Alan Marry</a> I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 minuts ago</small>
                                        </li>
                                        <li class="list-group-item">
                                            <p><a class="text-info" href="#">@Kevin Smith</a> Lorem ipsum unknown printer took a galley </p>
                                            <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
				
				</div>
				<div class="col-md-6">
					<div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Latest Article</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="feed-activity-list">

                                 <?php 

                                        //print_r($articles);
                                        //$numArticles = count($articles);
                                       //echo $numArticles;
                                        if($articles!=0){
                                        while($articlesList = $articles->fetch_array(MYSQLI_ASSOC)){


                                ?>
                                   
                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right text-navy">Published <?php echo $articlesList['article_published_date']; ?></small>
                                            <a href="<?php echo $articlesList['atricle_link']; ?>"><strong><?php echo $articlesList['article_title']; ?></strong></a>
                                            <div><small><?php echo $articlesList['article_summary']; ?></small></div>
                                            <a href="<?php echo $articlesList['atricle_link']; ?>"><small class="text-muted">Read More</a></small>
                                        </div>
                                    </div>
                                    
                                    <?php } 
                                            }
                                            else{ ?>

                                                 <div class="feed-element">
                                        <div>
                                            
                                            <div style="color:#ed5565"><small>Oops! 404 - Article not found</small></div>
                                           
                                        </div>
                                    </div>

                                           <?php }
                                    ?>
                                   
                                   
                                    

                                   <!--  <div class="feed-element">
                                        <div>
                                            <small class="pull-right text-navy">Published 12. 06. 201</small>
                                            <a href="#"><strong>Sarawak a crucial partner in national development, says Liow</strong></a>
                                            <div><small>MIRI: The Federal Government views Sarawak as a top-priority partner, says Transport Minister Datuk Seri Liow Tiong Lai.</small></div>
                                            <a href="#"><small class="text-muted">Read More</a></small>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right text-navy">Published 12. 06. 201</small>
                                            <a href="#"><strong>Sarawak a crucial partner in national development, says Liow</strong></a>
                                            <div><small>MIRI: The Federal Government views Sarawak as a top-priority partner, says Transport Minister Datuk Seri Liow Tiong Lai.</small></div>
                                            <a href="#"><small class="text-muted">Read More</a></small>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right text-navy">Published 12. 06. 201</small>
                                            <a href="#"><strong>Sarawak a crucial partner in national development, says Liow</strong></a>
                                            <div><small>MIRI: The Federal Government views Sarawak as a top-priority partner, says Transport Minister Datuk Seri Liow Tiong Lai.</small></div>
                                            <a href="#"><small class="text-muted">Read More</a></small>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
				
				</div>
				</div>	
				
				</div>				
			</div>			
        </div>
		
		<div class="footer fixed">
            <div class="pull-right">
                Go to the top <i class="fa fa-caret-up"></i>
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
 

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

	


</body>

</html>
