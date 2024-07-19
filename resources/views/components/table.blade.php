@props(['name'])
  <x-card-wrapper class="mt-0 mb-3">
    <h3 class="text-center">{{ ucwords($name) }}</h3>
    <table class="table table-light table-hover">
      {{ $slot }}
  </x-card-wrapper>