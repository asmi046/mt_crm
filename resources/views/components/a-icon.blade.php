<a
@isset($dataname)
    data-{{ $dataname }}="{{ $datavalue }}"
@endisset

@isset($wrapclass)
    class="{{$wrapclass}}"
@endisset

href="{{$href}}">
    <i class="{{ $icon }}"></i>
    <span>{{ $slot}}</span>
</a>
