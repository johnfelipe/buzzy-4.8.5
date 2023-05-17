@extends("pages.user.userapp")
@section("usercontent")
<h2>{{ trans('updates.followingposts') }}</h2>
<div class="recent-activity">
    @if($lastPost->total() > 0)
    <ul class="items_lists res-lists">
        @foreach($lastPost as $item)
            @include('pages.catpostloadpage')
        @endforeach
    </ul>
    <div class="clear"></div>
    <div class="center-elements">
        {!! $lastPost->render() !!}
    </div>
    @else
        @include('errors.emptycontent')
    @endif
</div>
@endsection
