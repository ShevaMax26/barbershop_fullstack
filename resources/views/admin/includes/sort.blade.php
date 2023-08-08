@if(request()->query('sort') === $field && request()->query('direction') === 'asc')
    <a href="{{ request()->fullUrlWithQuery(['sort' => $field, 'direction' => 'desc']) }}" class="text-white">
        {{ $name }} <i class="fas fa-sort-up"></i>
    </a>
@elseif(request()->query('sort') === $field && request()->query('direction') === 'desc')
    <a href="{{ request()->fullUrlWithQuery(['sort' => $field, 'direction' => 'asc']) }}" class="text-white">
        {{ $name }} <i class="fas fa-sort-down"></i>
    </a>
@else
    <a href="{{ request()->fullUrlWithQuery(['sort' => $field, 'direction' => 'asc']) }}" class="text-white">
        {{ $name }} <i class="fas fa-sort"></i>
    </a>
@endif
