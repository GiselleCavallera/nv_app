@extends('layouts.app')

@section('content')
<div class="inicioapp" id="inicioapp" style:"height:100%;">

<br><br><br><br><br><br><br><br><br>
</footer>
<div class="dummy" style="width: 100%;">

    <div class="col-sm-4" style="text-align: center; background-color:#EA0E7D; display: inline-block; width: 33%; float: left;
    ">
        <a href="{{ route('informacionhospedaje') }}" style="text-decoration: none; float: center">
            <div style="text-decoration: none; float:center">
            	<img src="images/iconos/hospedaje120.png"  style="float: center">
            	<br><br>
            </div>
        </a>
    </div>
    <div class="col-sm-4" style="text-align: center; text-decoration: none; background-color: #8BCC00; display: inline-block; width: 34%; float: center;">
        <a href="{{ route('inscripciones') }}" style="text-decoration: none; float: center">
            <div style="text-decoration: none; float:center">
            	<img src="images/iconos/oradores120.png" style="float: center">
            	<br><br>
            </div>
        </a>
    </div> 
    <div class="col-sm-4" style="text-align: center; background-color: #0084C0; display: inline-block; width: 33%; float: right;">
        <a href="{{ route('informacionhospedaje') }}" style="text-decoration: none; float: center">
            <div style="text-decoration: none; float:center">
            	<img src="images/iconos/talleres120.png"  style="float: center">
            	<br><br>
            </div>
        </a>
    </div>                   
</div>
<div class="dummy" style="width: 100%; height: 100%">
    <div class="col-sm-4" style="text-align: center; background-color: #8BCC00; display: inline-block; width: 33%; float: left;
    ">
        <a href="{{ route('informacionhospedaje') }}" style="text-decoration: none; float: center">
            <div style="text-decoration: none; float:center">
            	<img src="images/iconos/documentos120.png"  style="float: center">
            	<br><br>
            </div>
        </a>
    </div>
    <div class="col-sm-4" style="text-align: center; text-decoration: none; background-color: #0084C0; display: inline-block; width: 34%; float: center;">
        <a href="{{ route('inscripciones') }}" style="text-decoration: none; float: center">
            <div style="text-decoration: none; float:center">
            	<img src="images/iconos/reflexiones120.png"  style="float: center">
            	<br><br>
            </div>
        </a>
    </div> 
    <div class="col-sm-4" style="text-align: center; background-color: #8BCC00; display: inline-block; width: 33%; float: right;">
        <a href="{{ route('informacionhospedaje') }}" style="text-decoration: none; float: center">
            <div style="text-decoration: none; float:center">            
            	<img src="images/iconos/redes120.png"  style="float: center">
            	<br><br>
            </div>
        </a>
    </div>                   
</div>
</div>
</footer>
<!--<br><br><br>
<div class="dummy">	
	<div id="bl-main" class="bl-main">
		<section>
			<div class="bl-box">
				<div class="eye-box">
					<img src="images/eye.png" alt="" />
					<h2 class="bl-icon bl-icon-about">About</h2>
				</div>
			</div>
			<div class="bl-content about">
				
			</div>
			<span class="bl-icon bl-icon-close"><img src="images/close.png" alt="" /></span>
		</section>
		<section id="bl-work-section">
			<div class="bl-box">
				<div class="eye-box">
					<img src="images/box.png" alt="" />
					<h2 class="bl-icon bl-icon-works">Works</h2>
				</div>
			</div>
			<span class="bl-icon bl-icon-close"><img src="images/close.png" alt="" /></span>
		</section>
		<section>
			<div class="bl-box">
				<div class="eye-box">
					<img src="images/eye.png" alt="" />
					<h2 class="bl-icon bl-icon-about">HOLAAA</h2>
				</div>
			</div>
			<div class="bl-content about">
				
			</div>
			<span class="bl-icon bl-icon-close"><img src="images/close.png" alt="" /></span>
		</section>
		<section>
			<div class="bl-box">
				<div class="eye-box">
					<img src="images/service.png" alt="" />
					<h2 class="bl-icon bl-icon-blog">Services</h2>
				</div>
			</div>
			<div class="bl-content serve">
				<div class="container">
					
				</div>
			</div>
			<span class="bl-icon bl-icon-close"><img src="images/close.png" alt="" /></span>
		</section>
		<section>
			<div class="bl-box">
				<div class="eye-box">
					<img src="images/mail.png" alt="" />
					<h2 class="bl-icon bl-icon-contact">Contact</h2>
				</div>
			</div>
			<div class="bl-content">
				<div class="contact_top">
					<div class="container">
							
					</div>
				</div>
				<div class="copy-right">
					<p>Copyright &copy; 2015 Splashy. All Rights  Reserved | Template by &nbsp;<a href="http://w3layouts.com">W3Layouts</a></p>
				</div>
			</div>
			
			<span class="bl-icon bl-icon-close"><img src="images/close.png" alt="" /></span>
		</section>
		<section>
			<div class="bl-box">
				<div class="eye-box">
					<img src="images/service.png" alt="" />
					<h2 class="bl-icon bl-icon-blog">MUNDOOO</h2>
				</div>
			</div>
			<div class="bl-content serve">
				<div class="container">
					
				</div>
			</div>
			<span class="bl-icon bl-icon-close"><img src="images/close.png" alt="" /></span>
		</section>
	</div>
</div> --> 
<!--<div class="container">
    <div class="row">


    </div>
</div>-->
@endsection