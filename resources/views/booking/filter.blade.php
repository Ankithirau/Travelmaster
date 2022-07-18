<input type="text" name="route_id" value="{{$route_id}}">
@php
$i = 1;
$num = 0;
@endphp
@foreach ($points as $item)
    <tr>
        <td>
            <input type="checkbox" class="checkhour" value="1" name="route_checkbox[]" id="route_checkbox" required>
            <input type="hidden" name="route_name[]" class="form-control route_name" id="route_name_{{ $item->id }}"
                value="">
            <input type="hidden" name="route_name[]" class="form-control route_name"
                id="route_name_{{ $item->id }}"
                value="{{ isset($item->bus_assign[0]->route_name) ? $item->bus_assign[0]->route_name : '' }}"
                autocomplete="off">
            {{-- <input type="text" name="route_name[]" class="form-control route_name" id="route_name_{{ $item->id }}"
                value="{{ isset($item->bus_assign[0]->route_name) ? $item->bus_assign[0]->route_name : '' }}"
                autocomplete="off">
            <div class="route_name {{ $num }} text-danger error-inline"></div> --}}
        </td>
        <td>{{ $i++ }}</td>
        <td>
            {{ $item->county_name }}
            <input type="hidden" name="counties_id[]" class="counties_id" value="{{ $item->counties_id }}"
                id="counties_id">
            <input type="hidden" name="product_id" class="product_id" value="{{ $item->product_id }}" id="product_id"
                data-url="{{ route('bus.create', $item->product_id) }}">
        </td>
        <td>
            {{ $item->name }}
            <input type="hidden" name="pickup_point_id[]" class="pickup_point_id" value="{{ $item->id }}"
                id="pickup_point_id">
        </td>
        <td>
            {{ $item->seat_count }}
            <input type="hidden" name="seat_count[]" class="seat_count" value="{{ $item->seat_count }}"
                id="seat_count">
        </td>

        <td>
            <select name="date_concert[]" class="form-control date_concert" id="date_concert_{{ $item->id }}">
                <option value="" selected>Select Concert Date</option>
                @foreach ($item->date_concert as $date)
                    @if (isset($item->bus_assign[0]->schedule_date) ? $item->bus_assign[0]->schedule_date : 0 == trim($date))
                        <option value="{{ $date }}" selected>{{ date('d/m/Y', strtotime($date)) }}
                        </option>
                    @else
                        <option value="{{ $date }}">{{ date('d/m/Y', strtotime($date)) }}</option>
                    @endif
                @endforeach
            </select>
            <div class="date_concert {{ $num }} text-danger error-inline"></div>
        </td>
        <td>
            <select name="buses[]" class="form-control buses" id="buses_{{ $item->id }}">
                <option value="" selected>Select Bus</option>
                @foreach ($buses as $bus)
                    @if (isset($item->bus_assign[0]->bus_id) ? $item->bus_assign[0]->bus_id : 0 == $bus->id)
                        <option value="{{ $bus->id }}" selected>{{ $bus->bus_number }}</option>
                    @else
                        <option value="{{ $bus->id }}">{{ $bus->bus_number }}</option>
                    @endif
                @endforeach
            </select>
            <div class="buses {{ $num }} text-danger error-inline"></div>
        </td>
        <td>
            <input type="button" class="btn btn-primary schedule_update" value="update"
                data-action="{{ route('bus.add_schedule', isset($item->id) ? $item->id : 0) }}" />
        </td>
    </tr>
    @php
        $num++;
    @endphp
@endforeach
