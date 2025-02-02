<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    crossorigin="anonymous" />
  <title>{{ $product['name'] }}</title>
  <link rel="stylesheet" type="text/css" href="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cookieconsent.min.css" />
  <script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cookieconsent.min.js"></script>
  <script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cauce_cookie.js"></script>
  <script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/estadisticasweb/scripts/piwik-base.js"></script>
  <script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/estadisticasweb/scripts/piwik-eforma.js"></script>
  <link rel="stylesheet" type="text/css" href="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cookieconsent.min.css" />
  <script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cookieconsent.min.js"></script>
  <script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cauce_cookie.js"></script>
  <script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/estadisticasweb/scripts/piwik-base.js"></script>
  <script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/estadisticasweb/scripts/piwik-eforma.js"></script>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    /* Aplicar tipo de letra desde la sesión */
    body {
      font-family: {{ session('font_family', 'Arial') }};
    }
  </style>
</head>

<body>

  <!-- NavBar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      <a class="navbar-brand" href="#">@yield('title')</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{ route('home') }}">Home</a>
          <a class="nav-link active" href="{{ route('about') }}">About</a>
          <a class="nav-link active" href="{{ route('product') }}">Product</a>

          @guest
          <a class="nav-link active" href="{{ route('login') }}">Login</a>
          <a class="nav-link active" href="{{ route('register') }}">Register</a>
          @endguest

          @auth
          <a class="nav-link active" href="{{ route('settings.show') }}">Settings</a> <!-- Enlace a la página de configuración -->
          <a class="nav-link active" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @endauth
        </div>
      </div>
    </div>
  </nav>

  <header class="text-white text-center py-4" style="background-color: {{ session('header_color', '#1abc9c') }};">
    <div class="container d-flex align-items-center flex-column">
      <h2>{{ $product['name'] }}</h2>
    </div>
  </header>

  <!-- Esto es lo que debe contener el yield "content" -->

  <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ asset('storage/' . $product['image']) }}" class="img-fluid rounded-start">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">
          {{ $product['name'] }} (${{ $product['price'] }})
          </h5>
          <p class="card-text">{{ $product['description'] }}</p>
          <p class="card-text"><small class="text-muted">Añadir a la cesta</small></p>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>{{ now()->format('d/m/Y H:i:s') }}</small>
      <hr>
      <small>
        Desarrollo web en entorno servidor - 2º DAW
      </small>
    </div>
  </div>
  <!-- footer -->

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>
