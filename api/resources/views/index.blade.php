<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body class='page'>
    <section class='container'>
        <section>
            <form action="/" method='post'>
            @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" type="search" id="input" name="input" placeholder="Qual empresa deseja pesquisar">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type='submit' id="button-addon2"> <i class="fa fa-search searchIcon hvr-pulse"></i> </button>
                        </div>
                </div>
            </form>
        </section>
    
        @if(isset($name))
        <article class="textArticle">
            <div class="card mb-3 cardContainer" style="max-width: 540px;">
                <div class="row no-gutters">
                        <div class="col-md-4 imgDIv">
                            <i class="fab fa-angellist"></i>
                        </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">{{$name}}</h3>
                            <h6 class="card-subtitle mb-2 text-muted">Selling price ${{$latestPrice}}</h6>
                            <p class="card-text">Current CEO: {{$CEO}}</p>
                            <p class="card-text"><small class="text-muted">{{$description}}</small></p>
                        </div>
                    </div>
                </div>
            </div> 
        </article>
        @endif
    </section>
</body>

</html>
      
