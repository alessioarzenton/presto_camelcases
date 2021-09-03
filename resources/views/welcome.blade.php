<x-layout>


    <div class="container-fluid py-5">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-10 bg-light p-5" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.8)), url('{{Storage::url('public/welcome-image.jpg')}}'); background-repeat: no-repeat; background-size: cover; background-position: bottom; ">

                <h1 class="display-5 fw-bold text-main">Presto.it</h1>
                <p class="col-md-8 fs-4 text-white">{{__('ui.welcome')}}</p>
                @auth
                <a class="btn bg-main btn-lg"  href="{{route('ads.create')}}">{{__('ui.bottone')}}</a>
                @else
                <a class="btn bg-main btn-lg"  href="{{route('register')}}">{{__('ui.bottone')}}</a>
                @endauth

            </div>

            <div class="col-md-6 col-10 pt-5">

                @if (session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif

                @if (session('accesso.negato'))
                  <div class="alert alert-danger">
                    {{session('accesso.negato')}}
                  </div>
                @endif

            </div>

            <div class="col-10" style="padding-top: 150px">
              <div class="row justify-content-center">
                <h2 class=" fw-bold text-center mb-3">{{__('ui.esplora')}}</h2>
                @foreach ($categories as $category)

                <div class="col-md-5 col-10 mb-3">
                  <div class="card text-center rounded text-white" style="background-color: #212528">
                    <div class="card-body">
                      <h5 class="card-title fw-bold">{{__('ui.' . $category->name)}}</h5>
                      <a href="{{route('categories.show', compact('category'))}}" class="btn bg-main">{{__('ui.bottone_categoria')}} {{__('ui.' . $category->name)}}</a>
                    </div>
                  </div>
                </div>

                @endforeach
              </div>
            </div>

            <div class="col-10" style="padding: 150px 0">

                <h2 class=" fw-bold text-center mb-3">{{__('ui.esplora_annunci')}}</h2>

                <div class="row justify-content-baseline-md justify-content-center">

                    @foreach ($ads as $ad)

                        @if ($ad->is_accepted == 1)

                        <div class="col-md-4 col-10 mb-4">

                            <div class="card shadow h-100">

                            <div id="cat-{{$ad->id}}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{$ad->images()->first() ? $ad->images()->first()->getUrl(300,150) : Storage::url("public/segnaposto.jpg")}}" class="d-block w-100" alt="...">
                                    </div>
                                    @if ($ad->images)
                                        @foreach ($ad->images as $image)
                                            @if (!$loop->first)
                                            <div class="carousel-item">
                                                <img src="{{$image->getUrl(300,150)}}" class="d-block w-100" alt="...">
                                            </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="carousel-item">
                                            <img src="{{Storage::url("public/segnaposto.jpg")}}" class="d-block w-100" alt="...">
                                        </div>
                                    @endif
                                </div>
                                @if (count($ad->images) > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#cat-{{$ad->id}}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#cat-{{$ad->id}}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                                </button>
                                @endif
                            </div>

                                <div class="card-body">
                                    <h4 class="card-title fw-bold text-main text-truncate">{{$ad->title}}</h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title fw-bold mb-2">{{__('ui.' . $ad->category->name)}}</h6>
                                        <h6 class="card-subtitle mb-2 text-muted">€ {{$ad->price ? $ad->price : 'prezzo non indicato'}}</h6>
                                    </div>
                                    <p class="card-text text-truncate">{{$ad->body}}</p>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-start">
                                        <p class="card-text fst-italic">{{$ad->created_at->format('d/m/Y')}}</p>
                                        <p class="card-text"><span class="fst-italic"></span> {{$ad->user()->first() ? $ad->user()->first()->name : 'Nessun autore'}}</p>
                                    </div>
                                <a href="{{route('ads.show',compact('ad'))}}" class="btn bg-main text-white">{{__('ui.bottone_esplora')}}</a>

                                </div>
                            </div>

                        </div>

                        @endif

                    @endforeach

                    <div class="col-md-4 col-10 mb-4">

                        <div class="card shadow h-100">

                            <div class="card-body">
                              @auth
                              <a class="w-100"  href="{{route('ads.create')}}"><img class="card-img-top" src="{{Storage::url("public/plus.jpg")}}" alt=""></a>
                              <h4 class="fw-bold text-main">{{__('ui.più')}}</h4>
                              <a class="btn no-transform w-100"  href="{{route('ads.create')}}">{{__('ui.bottone')}}</a>
                              @else
                              <a class="w-100"  href="{{route('register')}}"><img class="card-img-top" src="{{Storage::url("public/plus.jpg")}}" alt=""></a>
                              <div class="d-flex flex-column align-items-center">
                                  <h4 class="fw-bold text-main">{{__('ui.bottone')}}</h4>
                                  <a class="btn no-transform w-100"  href="{{route('register')}}">{{__('ui.aggiungi')}}</a>
                                </div>
                            @endauth
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


</x-layout>

