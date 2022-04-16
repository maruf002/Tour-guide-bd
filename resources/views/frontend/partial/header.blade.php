
	<header>
		<div class="container-fluid position-relative no-side-padding">
			
			
			 
			<li><img src="{{asset('storage/img/nav.png')}}" style="width: 600px; height:83px" alt="tt"></li>
			

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>
		
			<ul class="main-menu visible-on-click" id="main-menu">
			
				<li><a href="{{route('login')}}">Login</a></li>
				<li><a href="{{route('register')}}">Register</a></li>
			</ul><!-- main-menu -->

			{{-- <div class="src-area">
				<form>
					<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input class="src-input" type="text" placeholder="Type of search">
				</form>
			</div> --}}

		</div><!-- conatiner -->
	</header>