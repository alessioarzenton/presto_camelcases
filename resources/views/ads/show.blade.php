<x-layout>
  <x-slot name="title">{{__('ui.annuncio')}} {{$ad->title}}</x-slot>


  <div class="container-fluid" style="padding-right: var(--bs-gutter-x, 0rem);
  padding-left: var(--bs-gutter-x, 0rem);">

    <div class="row px-5 justify-content-center" style="padding: 150px 0px">

      <h2 class="fw-bold text-center mb-5">{{__('ui.annuncio')}} <span class="text-main">{{$ad->title}}</span></h2>

        <div class="col-md-4 col-12 mt-5">

            <div class="card h-100 shadow-sm">

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
                    <h4 class="card-title fw-bold text-main">{{$ad->title}}</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="card-title fw-bold mb-2">{{__('ui.' . $ad->category->name)}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">€ {{$ad->price ? $ad->price : 'prezzo non indicato'}}</h6>
                    </div>
                    <p class="card-text">{{$ad->body}}</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-start">
                        <p class="card-text fst-italic">{{$ad->created_at->format('d/m/Y')}}</p>
                        <p class="card-text"><span class="fst-italic"></span> {{$ad->user()->first() ? $ad->user()->first()->name : 'Nessun autore'}}</p>
                    </div>

                </div>

            </div>

        </div>

  </div>

</div>


</x-layout>
