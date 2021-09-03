<x-layout>
    <x-slot name='title'>{{__('ui.registrati')}}</x-slot>

    <div class="container vh-100">
      <div class="row h-100 align-items-center">

        <form action="{{route('register')}}" method="POST">
            <h2 class="fw-bold mb-5">{{__('ui.registrati')}}</h2>
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">{{__('ui.nome')}}</label>
              <input name="name" type="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input name="password" type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">{{__('ui.conferma')}} password</label>
              <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn bg-main">{{__('ui.registrati')}}</button>
                <a href="{{route('login')}}" class="btn bg-main">{{__('ui.gia_registrato')}}</a>
            </div>

          </form>

      </div>
    </div>
</x-layout>
