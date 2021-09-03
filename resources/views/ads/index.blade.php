<x-layout>
  <x-slot name="title">{{__('ui.tutti_annunci')}}</x-slot>


  <div class="container-fluid" style="padding-right: var(--bs-gutter-x, 0rem);
  padding-left: var(--bs-gutter-x, 0rem);">

  <div class="row justify-content-center">
    <div class="col-12">

      <div id="filtro-categorie" class="d-flex h-100 justify-content-between p-3 text-white bg-gradient bg-dark">
        <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-4">{{__('ui.filtri')}}</span>
        </a>
        <ul class="nav nav-pills mb-auto">
          <li>
            <div class="dropdown nav-link text-white">
              <a class="btn dropdown-toggle text-white" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('ui.categorie')}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{route('ads.index')}}">{{__('ui.tutte_categorie')}}</a></li>
                @foreach ($categories as $category)
                <li><a class="dropdown-item" href="{{route('categories.show', compact('category'))}}">{{__('ui.' . $category->name)}}</a></li>
                @endforeach
              </ul>
            </div>
          </li>
        </ul>

      </div>
    </div>
    </div>
    <div class="row px-5 justify-content-baseline" style="padding: 150px 0px">

      <h2 class="fw-bold text-center mb-5">{{__('ui.tutti_annunci')}}</h2>

      @foreach ($ads as $ad)

        @if ($ad->is_accepted == 1)

        <div class="col-md-3 col-12 mt-5">

            <div class="card mb-3 h-100 shadow-sm">

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

  </div>

  <div class="d-flex justify-content-center my-3">
    {{$ads->links()}}
  </div>

</div>


</x-layout>
