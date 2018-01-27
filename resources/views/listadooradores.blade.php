@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/chocolatr.css') }}"/>
<!--<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>--

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading"><h4>ORADORES</h4></div>
        
            <div class="panel-body">

            	<!--<div id= "insc" style="width:100%; margin:0 auto">-->
        		<div class="team-grids">
        			<div class="col-md-2 col-sm-2 team-grid">
        				<div class="pic">
        					<div class="stack twisted">
        						<img src="../../public/images/team-1.jpg" alt="Wanderer" class="img-responsive" />
        					</div>
        					<span class="pic-caption top-to-bottom">
        						<h4>José Soto</h4>
        						<!-- Social-Icons --> 
        						<div class="social">
        							<ul class="social-icons">
        								<li><a href="https://www.facebook.com/jose.f.cespedes.3" class="facebook"></a></li>									
        								<li><a href="https://www.instagram.com/josefsotoce/" class="instagram"></a></li>
        							</ul>
        						</div>
        						<!-- //Social-Icons -->
        					</span>
        				</div>
        			</div>
        			<div class="col-md-2 col-sm-2 team-grid">
        				<div class="pic">
        					<div class="stack twisted">
        						<img src="../../public/images/team-2.jpg" alt="Wanderer" class="img-responsive" />
        					</div>
        					<span class="pic-caption top-to-bottom">
        						<h4>Nel Lastiri</h4>
        						<!-- Social-Icons -->
        						<div class="social">
        							<ul class="social-icons">
        								<li><a href="https://www.facebook.com/nelsonlastiri/" class="facebook"></a></li>
        								<li><a href="https://www.instagram.com/nelsonlastiri/" class="instagram" ></a></li>
        							</ul>
        						</div>
        						<!-- //Social-Icons -->
        					</span>
        				</div>
        			</div>
        			<div class="col-md-2 col-sm-2 team-grid">
        				<div class="pic">
        					<div class="stack twisted">
        						<img src="../../public/images/team-3.jpg" alt="Wanderer" class="img-responsive" />
        					</div>
        					<span class="pic-caption top-to-bottom">
        						<h4>Yona Adamchuk</h4>
        						<!-- Social-Icons -->
        						<div class="social">
        							<ul class="social-icons">
        								<li><a href="https://www.facebook.com/Adamthan" class="facebook"></a></li>
        								<li><a href="https://www.instagram.com/adamchukyonathan/" class="instagram"></a></li>
        							</ul>
        						</div>
        						<!-- //Social-Icons -->
        					</span>
        				</div>
        			</div>
        			<div class="col-md-2 col-sm-2 team-grid">
        				<div class="pic">
        					<div class="stack twisted">
        						<img src="../../public/images/team-4.jpg" alt="Wanderer" class="img-responsive" />
        					</div>
        					<span class="pic-caption top-to-bottom">
        						<h4>Nico Spies</h4>
        						<!-- Social-Icons -->
        						<div class="social">
        							<ul class="social-icons">
        								<li><a href="https://www.facebook.com/nicospies.debybatmani" class="facebook"></a></li>
        								<li><a href="#" class="instagram"></a></li>
        							</ul>
        						</div>
        						<!-- //Social-Icons -->
        					</span>
        				</div>
        			</div>
        			<div class="col-md-2 col-sm-2 team-grid">
        				<div class="pic">
        					<div class="stack twisted">
        						<img src="../../public/images/team-5.jpg" alt="Wanderer" class="img-responsive" />
        					</div>
        					<span class="pic-caption top-to-bottom">
        						<h4>Lucas Magnin</h4>
        						<!-- Social-Icons -->
        						<div class="social">
        							<ul class="social-icons">
        								<li><a href="https://www.facebook.com/lucasmagninoficial/?pnref=lhc" class="facebook"></a></li>
        								<li><a href="https://www.instagram.com/lucas_magnin/" class="instagram" ></a></li>
        							</ul>
        						</div>
        						<!-- //Social-Icons -->
        					</span>
        				</div>
        			</div>
        			<div class="col-md-2 col-sm-2 team-grid">
        				<div class="pic">
        					<div class="stack twisted">
        						<img src="../../public/images/team-6.jpg" alt="Wanderer" class="img-responsive" />
        					</div>
        					<span class="pic-caption top-to-bottom">
        						<h4>Máxima Expresión</h4>
        						<!-- Social-Icons -->
        						<div class="social">
        							<ul class="social-icons">
        								<li><a href="https://www.facebook.com/M%C3%A1xima-Expresi%C3%B3n-195298560490870/" class="facebook" ></a></li>									
        								<li><a href="#" class="instagram"> </a></li>
        							</ul>
        						</div>
        						<!-- //Social-Icons -->
        					</span>
        				</div>
        			</div>
        			<div class="clearfix"> </div>
        			<br>
        			<div class="form-group">
                        <div class="col-xs-12" style="text-align:center">
                            <a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>
                        </div><br>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>
</div>

@endsection