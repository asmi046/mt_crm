<div class="work_at_name">
    <p>Работать от имени:</p>
    @foreach ($user_list as $item)
        <a @class([ 'active' => auth()->user()->id == $item->id]) href="{{ route('user-chenge', $item->id)}}">{{ $item->name }}</a>
    @endforeach
</div>
