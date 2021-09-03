<x-layout>
  <x-slot name='title'>Login</x-slot>
  <div class="container vh-100">
    <div class="row h-100 align-items-center">
      <form action="{{route('login')}}" method="POST">
        <h2 class="fw-bold mb-5">{{__('ui.accedi')}}</h2>
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" value="{{old('email')}}" type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input name="password" type="password" class="form-control" id="password">
        </div>

        <button type="submit" class="btn bg-main">{{__('ui.accedi')}}</button>
      </form>
    </div>
  </div>
</x-layout>
