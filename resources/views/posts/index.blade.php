@extends('layouts.app')
@section('content')

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @guest
                    <h2>Please login!</h2>
                @else
                    <div class="sort-forms mt-3 mb-3">
                        <form action="{{route('user_posts.index')}}">

                        </form>


                    </div>
                    <div class="container">
                        <div class="row">
                    @forelse ($posts as $post)
                        @include('layouts.single-post')
                    @empty
                        <h4 class="text-center">No Blog post available</h4>
                    @endforelse
                        </div>
                    </div>
                @endguest
            </div>
            <div class="col-md-2 col-lg-2 col-xl-3">
                @include('layouts.filter-sort', ['action_route' => 'user_posts.index',
                                                         'with_user_list' => false])
            </div>
        </div>
    </div>
    <script>
        let sortDateButton = document.getElementById('sortDateButton');
        let sortStatusButton = document.getElementById('sortStatusButton');
        let sortDateField = document.getElementById('sortDateField');
        let sortStatusField = document.getElementById('sortStatusField');

        let additionForm = document.getElementById('addition-form');
        console.log(sortDateField);
        sortDateButton.addEventListener('click', (e) => {
            if(sortDateField.value === 'asc') {
                sortDateField.value = 'desc';
            } else {
                sortDateField.value = 'asc';
            }
            additionForm.submit();
        } )
        sortStatusButton.addEventListener('click', (e) => {
            if(sortStatusField.value === 'asc') {
                sortStatusField.value = 'desc';
            } else {
                sortStatusField.value = 'asc';
            }
            additionForm.submit();
        })
    </script>
@endsection
