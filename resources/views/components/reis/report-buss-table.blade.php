<table class="bus_table">
    <tr>
        <th colspan="{{ count($schema[0]) }}">Место водителя</th>
    </tr>
    @foreach ($schema as $item)
        <tr>
            @foreach ($item as $place)
                <td>
                    @if ($place > 0)
                        № {{ $place }}<br>
                        @if (isset($reservesplaces[$place]))
                            {{ $reservesplaces[$place]->f }} {{ $reservesplaces[$place]->i }} {{ $reservesplaces[$place]->o }} <br>
                            {{ $reservesplaces[$place]->order->punkt }} <br>
                            {{ $reservesplaces[$place]->phone }}
                        @endif
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
</table>
