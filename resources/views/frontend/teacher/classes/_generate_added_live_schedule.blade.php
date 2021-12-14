@foreach ($last_save_data->classes as $item)
    <tbody>
            @foreach ($item->live_class as $key => $live_class)
                <tr>
                    @if ($key == 0)
                        <td rowspan="{{count($item->live_class)}}">{{$item->id}}</td>
                        <td>{{$live_class->start_date}}</td>
                        <td>{{$live_class->start_time}}</td>
                        <td>{{$live_class->start_time}}</td>
                        <td class="action-wrapper" rowspan="3">
                            <a href="javascript:void(0);" class="action-edit" data-id="{{$item->id}}"><img src="{{ asset('frontend/images/icon-edit.png') }}" alt="icon-edit" width="14" height="14" /></a>
                            <a href="javascript:void(0);" class="action-trash"><img src="{{ asset('frontend/images/icon-trash.png') }}" alt="icon-trash" width="" height="14"/></i></a>
                        </td>
                    @else
                        <td>{{$live_class->start_date}}</td>
                        <td>{{$live_class->start_time}}</td>
                        <td>{{$live_class->start_time}}</td>
                    @endif
                </tr>
            @endforeach
    </tbody>
@endforeach
<input type="hidden" name="to_update" value="{{$last_save_data->id}}">