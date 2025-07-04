<nav {{ $attributes->merge([
    'class' => 'fixed top-0 left-0 w-full z-50 bg-white shadow py-4'
]) }}>
  <div class="px-4 sm:px-6 max-w-7xl mx-auto flex items-center justify-between min-h-[72px]">
    @isset($left)
    {{ $left }}
    @endisset

    @isset($right)
    {{ $right }}
    @endisset
  </div>
</nav>