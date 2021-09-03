<x-layout>
    <x-slot name='title'>{{__('ui.lavora')}}</x-slot>

    <div class="container vh-100">

      <div class="row h-100 align-items-center">

        @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif

        <form action="{{route('user.messageRevisor')}}" method="POST">
          @csrf
          <h2 class="fw-bold mb-5">{{__('ui.titolo_diventa_revisore')}}</h2>
          <p class="fw-bold mb-5">{{__('ui.form_revisore')}}</p>
          <div class="mb-3">
            <label for="name" class="form-label">{{__('ui.nome')}}</label>
            <input name="name" value="{{Auth::user()->name}}" type="text" class="form-control" id="name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" value="{{Auth::user()->email}}" type="text" class="form-control" id="email">
          </div>
          <div class="mb-3">
            <label for="body" class="form-label">{{__('ui.messaggio')}}</label>
            <textarea name="body" type="text" class="form-control" id="body">{{old('body')}}</textarea>
          </div>
          <button type="submit" class="btn bg-main">{{__('ui.form_invia')}}</button>
        </form>

      </div>

    </div>

  </x-layout>
