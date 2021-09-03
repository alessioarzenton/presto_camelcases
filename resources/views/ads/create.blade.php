<x-layout>
    <x-slot name='title'>{{__('ui.inserisci_annuncio')}}</x-slot>

    <div class="container py-5">

      <div class="row h-100 align-items-center">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                  {{$error}}
                </div>
            @endforeach
        @endif

        <form action="{{route('ads.store')}}" method="POST">
          <h2 class="fw-bold mb-5">{{__('ui.inserisci_annuncio')}}</h2>
          @csrf

          <input
            type="hidden"
            name="uniqueSecret"
            value="{{$uniqueSecret}}">


          <div class="mb-3">
            <label for="title" class="form-label">{{__('ui.titolo')}}</label>
            <input name="title" value="{{old('title')}}" type="text" class="form-control @error('title')
                is-invalid
            @enderror" id="title">
          </div>
          <div class="mb-3">
            <label for="body" class="form-label">{{__('ui.corpo')}}</label>
            <textarea name="body" type="text" class="form-control @error('body')
                is-invalid
            @enderror" id="body">{{old('body')}}</textarea>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">{{__('ui.prezzo')}}</label>
            <input name="price" value="{{old('price')}}" type="text" class="form-control @error('price')
                is-invalid
            @enderror" id="price">
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">{{__('ui.scegli_categoria')}}</label>
            <select name="category" class="form-select" aria-label="Default select example">
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{__('ui.' . $category->name)}}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3 form-group row">
            <label for="images" class="col-md-12 col-form-label text-md-right">{{__('ui.immagini')}}</label>
            <div class="col-md-12">

              <div class="dropzone" id="drophere"></div>

            </div>
          </div>


          <button type="submit" class="btn bg-main">{{__('ui.salva')}}</button>
        </form>

      </div>

    </div>

  </x-layout>
