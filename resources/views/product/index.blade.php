<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    crossorigin="anonymous" />
  <title>{{ $title }}</title>
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
</head>

<body>

  <!-- header -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      <a class="navbar-brand" href="#">{{ $title }}</a>
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
        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>{{ $subtitle }}</h2>
    </div>
  </header>

  <!-- header -->
  <div class="row">
    <!-- Bucle con una iteración por cada producto -->
    @foreach ($products as $product)
    <div class="col-md-4 col-lg-3 mb-2">
      <div class="card">
      <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-card" alt="producto">
        <div class="card-body text-center">
          <a href="{{ url('/products/' . $product['id']) }}" class="btn bg-primary text-white">{{ $product['name'] }}</a>
        </div>
      </div>
    </div>
    @endforeach
    <!-- FIN bucle con una iteración por cada producto -->
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
