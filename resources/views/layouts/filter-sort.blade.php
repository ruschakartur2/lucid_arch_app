<h2>Filters</h2>

<form action="{{route($action_route)}}" method="GET" id="addition-form">
    <h5>Statuses:</h5>
    @foreach($status_list as $keyStatus => $status)
        <label for="">{{$status}}</label>
        <input type="checkbox"
               onChange="this.form.submit()"
               {{in_array($keyStatus, request()->get('status', [])) ? 'checked' : ''}}
               name="status[]"
               value="{{$keyStatus}}">
        <br>
    @endforeach
    @if($with_user_list)
    <h5>Users:</h5>
    @foreach($user_list as $user)
        <label for="">{{$user->name}}</label>
        <input type="checkbox"
               onChange="this.form.submit()"
               name="userId[]"
               {{in_array($user->id, request()->get('userId', [])) ? 'checked' : ''}}
               value="{{$user->id}}">
        <br>
    @endforeach
    <br>
    @endif
    <h5>Date</h5>
    <label for="isToday">Today posts</label>
    <input type="checkbox"
           onChange="this.form.submit()"
           {{request()->get('isToday') ? 'checked': ''}}
           name="isToday"
           value="1">

    <h5 class="mt-2">Sorting</h5>
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
