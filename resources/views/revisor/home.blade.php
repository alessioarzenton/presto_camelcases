<x-layout>
<x-slot name="title">Home Revisor</x-slot>

@if (!$ad)

<div class="container-fluid vh-100">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="alert alert-danger">
                {{__('ui.messaggio_revisor')}}
            </div>
        </div>
    </div>
</div>

@else

<div class="container-fluid py-5">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-6 col-10">

                <div class="card mb-3 h-100 shadow-sm">

                    <div class="card-body">
                        @if ($ad->images)
                            @foreach ($ad->images as $image)

                                    <img src="{{$image->getUrl(300,150)}}" class="d-block w-100" alt="{{$image->file}}">
                                    <ul class="list-group my-2">
                                        <li class="list-group-item list-group-item-danger" aria-current="true">{{__('ui.contenuti_immagine')}}:</li>
                                        <li class="list-group-item">Adult: {{$image->adult}}</li>
                                        <li class="list-group-item">Medical: {{$image->medical}}</li>
                                        <li class="list-group-item">Spoof: {{$image->spoof}}</li>
                                        <li class="list-group-item">Violence: {{$image->violence}}</li>
                                        <li class="list-group-item">Racy: {{$image->racy}}</li>
                                    </ul>
                                    <ul class="list-group mb-2">
                                        <li class="list-group-item list-group-item-danger" aria-current="true">{{__('ui.argomenti_immagine')}}:</li>
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                            <li class="list-group-item">- {{$label}}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                            @endforeach
                        @endif
                        @if (count($ad->images) == 0)
                                <img src="{{Storage::url("public/segnaposto.jpg")}}" class="d-block w-100 mb-2" alt="segnaposto">
                        @endif

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

        <div class="row justify-content-center mt-5">

            <div class="col-md-6 col-12 text-center">

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rigetta">
                    {{__('ui.bottone_rigetta')}}
                </button>
                        <!-- Modal -->
                <div class="modal fade" id="rigetta" tabindex="-1" aria-labelledby="rigetta-label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="rigetta-label">{{__('ui.bottone_sicuro')}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('revisor.reject', $ad->id)}}" method="POST">
                                            @csrf
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.bottone_indietro')}}</button>
                                            <button type="submit" class="btn btn-danger text-white">{{__('ui.bottone_rigetta')}}</button>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-12 text-center">

                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#accetta">
                    {{__('ui.bottone_accetta')}}
                </button>
                        <!-- Modal -->
                <div class="modal fade" id="accetta" tabindex="-1" aria-labelledby="rigetta-label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="accetta-label">{{__('ui.bottone_sicuro')}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('revisor.accept', $ad->id)}}" method="POST">
                                            @csrf
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.bottone_indietro')}}</button>
                                            <button type="submit" class="btn btn-success text-white">{{__('ui.bottone_accetta')}}</button>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    @endif

</div>



</x-layout>
