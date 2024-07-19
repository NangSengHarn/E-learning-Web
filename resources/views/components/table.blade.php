@props(['name'])
    <x-card-wrapper>
    <h3 class="text-center">{{ ucwords($name) }}</h3>
    <table class="table table-light table-hover">
      {{ $slot }}
    </x-card-wrapper>