<h2>Filters</h2>

<form action="{{route($action_route)}}" method="GET" id="addition-form">
    Statuses:
    @foreach($status_list as $keyStatus => $status)
        <label for="">{{$status}}</label>
        <input type="checkbox"
               onChange="this.form.submit()"
               {{in_array($keyStatus, request()->get('status', [])) ? 'checked' : ''}}
               name="status[]"
               value="{{$keyStatus}}">
        <br>
    @endforeach
    <br>
    <label for="isToday">Today posts</label>
    <input type="checkbox"
           onChange="this.form.submit()"
           {{request()->get('isToday') ? 'checked': ''}}
           name="isToday"
           value="1">

    <div>Sorting</div>
    <select class="form-control" onChange="this.form.submit()"
            name="sortField">
        <option value="" disabled>Choose sort</option>
        @foreach($sort_field_list as $sortFieldKey => $sortFieldValue)
            <option
                {{$sortFieldKey == request()->get('sortField','') ? 'selected' : ''}}
                value="{{$sortFieldKey}}"
            >{{$sortFieldValue}}
            </option>
        @endforeach
    </select>
    <select class="form-control" onChange="this.form.submit()"
            name="sortOrder">
        <option value="" disabled>Choose sort</option>
        @foreach($sort_order_list as $sortOrderKey => $sortOrderValue)
            <option
                {{$sortOrderKey == request()->get('sortOrder','') ? 'selected' : ''}}
                value="{{$sortOrderKey}}"
            >{{$sortOrderValue}}
            </option>
        @endforeach
    </select>

    <br>
</form>
