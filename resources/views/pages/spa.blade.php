
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@yield('meta-title', config('app.name') . ' | Blog')</title>
		<meta name="description" content="@yield('meta-description', 'Este es el blog de Zendero')">
		<link rel="stylesheet" href="/css/normalize.css">
		<link rel="stylesheet" href="/css/framework.css">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/responsive.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
		{{-- Directiva stack --}}
			@stack('styles')
	</head>
	<body>
		<div id="app">
			<div class="preload"></div>
			<!-- Header -->
			<header class="space-inter">
				<div class="container container-flex space-between">
					<figure class="logo"><img src="/img/logo.png" alt=""></figure>
					<nav class="custom-wrapper" id="menu">
						<div class="pure-menu"></div>
									{{-- <router-link to='/nosotros'>Nosotros</router-link> --}}
									{{-- <router-link to='/archivo'>Archivo</router-link> --}}
									{{-- <router-link to='/contacto'>Contacto</router-link> --}}
						<ul class="container-flex list-unstyled">
							<li class="pure-menu-item">
									<router-link to='/' class="pure menu-link c-gris-2 text-uppercase">Inicio</router-link>
							</li>
							<li class="pure-menu-item">
									<router-link to='/nosotros' class="pure menu-link c-gris-2 text-uppercase">Nosotros</router-link>
							</li>
							<li class="pure-menu-item">
									<router-link to='/archivo' class="pure menu-link c-gris-2 text-uppercase">Archivo</router-link>
							</li>
							<li class="pure-menu-item">
									<router-link to='/contacto' class="pure menu-link c-gris-2 text-uppercase">Contacto</router-link>
							</li>
						</ul>
					</nav>
				</div>
			</header>
			<!-- Fin Header -->

			<!-- Contenido -->
				<router-view></router-view>
			{{-- Fin Contenido --}}

		{{-- {{ $posts->appends(request()->all())->links() }} --}}
		<!-- Footer -->
			<section class="footer">
				<footer>
					<div class="container">
						<figure class="logo"><img src="/img/logo.png" alt=""></figure>
						<nav>
							<ul class="container-flex space-center list-unstyled">
								<li><a href="index.html" class="text-uppercase c-white">home</a></li>
								<li><a href="about.html" class="text-uppercase c-white">about</a></li>
								<li><a href="archive.html" class="text-uppercase c-white">archive</a></li>
								<li><a href="contact.html" class="text-uppercase c-white">contact</a></li>
							</ul>
						</nav>
						<div class="divider-2"></div>
						<p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.</p>
						<div class="divider-2" style="width: 80%;"></div>
						<p>© 2017 - Zendero. All Rights Reserved. Designed & Developed by <span class="c-white">Agencia De La Web</span></p>
						<ul class="social-media-footer list-unstyled">
							<li><a href="#" class="fb"></a></li>
							<li><a href="#" class="tw"></a></li>
							<li><a href="#" class="in"></a></li>
							<li><a href="#" class="pn"></a></li>
						</ul>
					</div>
				</footer>
			</section>
			<!-- Fin Footer -->
		</div>

		{{-- Archivo de compilación de Laravel-Mix --}}
			<script src="{{ mix('js/app.js') }}"></script>
			
		{{-- Directiva Stack --}}
			@stack('scripts')
	</body>
</html>

	