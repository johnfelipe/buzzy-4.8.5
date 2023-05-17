@extends("_contact.mailbox.mailapp")
@section("mailcontent")
<form id="contacts" name="contacts">
    {{ csrf_field() }}
    <input type="hidden" name="contacts[]" value="{{ $lastmail->id }}">
</form>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <h3 class="box-title"><i class="fa fa-{{ $lastmail->category->description }}"></i>
                {{ $lastmail->category->name }}</h3> - Read Mail
        </h3>
        <div class="box-tools pull-right">

            @if($lastmail->label_id > 0)
            <div class="label label-info" style="background-color: {{ $lastmail->label->color }} !important;">
                {{ $lastmail->label->name }}</div>
            @endif
        </div>
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
        <div class="mailbox-read-info">
            <span class="mailbox-read-time pull-right">
                <a href="javascript:" class="mailbox-star" data-id="{{ $lastmail->id }}">@if($lastmail->stared==1) <i
                        class="fa fa-star text-yellow"></i> @else <i class="fa fa-star"></i> @endif</a>
                <a href="javascript:" class="mailbox-important"
                    data-id="{{ $lastmail->id }}">@if($lastmail->important==1) <i class="fa fa-flag text-red"></i> @else
                    <i class="fa fa-flag"></i> @endif</a>

                <div class="clear"></div>
                {{ $lastmail->created_at }}
            </span>

            <h3>{{ $lastmail->name > "" ? $lastmail->name : '<No Name>' }}</h3>
            <h5>{{ trans("buzzycontact.From") }} {{ $lastmail->email }}
            </h5>
        </div><!-- /.mailbox-read-info -->
        <div class="mailbox-controls">
        </div>
        <div class="mailbox-read-message">
            {!! nl2br($lastmail->text) !!}
        </div><!-- /.mailbox-read-message -->
    </div><!-- /.box-body -->

    <div class="box-footer">
        <div class="pull-right">
            <a href="{{ route('admin.mailbox.new', ['t' => 'reply', 'mail' => $lastmail->id ]) }}" class="btn btn-info"><i
                    class="fa fa-reply"></i> {{ trans("buzzycontact.Reply") }} </a>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle doaction" data-type="move" data-action="trash"
                data-toggle="dropdown" aria-expanded="true"><span class="fa fa-trash"></span>
                {{ trans("buzzycontact.Trash") }} </button>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                aria-expanded="true">{{ trans("buzzycontact.Actions") }} <span class="fa fa-caret-up"></span></button>
            <ul class="dropdown-menu pull-left">
                <li><a href="javascript:" class="doaction" data-type="do" data-action="read"><i
                            class="fa fa-check text-green"></i> {{ trans("buzzycontact.Read") }}</a></li>
                <li><a href="javascript:" class="doaction" data-type="do" data-action="unread"><i
                            class="fa fa-check"></i> {{ trans("buzzycontact.Unread") }}</a></li>
                <li><a href="javascript:" class="doaction" data-type="do" data-action="stared"><i
                            class="fa fa-star text-yellow"></i> {{ trans("buzzycontact.Stared") }}</a></li>
                <li><a href="javascript:" class="doaction" data-type="do" data-action="unstared"><i
                            class="fa fa-star"></i> {{ trans("buzzycontact.Unstared") }}</a></li>
                <li><a href="javascript:" class="doaction" data-type="do" data-action="important"><i
                            class="fa fa-flag text-red"></i> {{ trans("buzzycontact.Important") }}</a></li>
                <li><a href="javascript:" class="doaction" data-type="do" data-action="unimportant"><i
                            class="fa fa-flag"></i> {{ trans("buzzycontact.Unimportant") }}</a></li>
                <li class="divider"></li>
                <li><a href="javascript:" class="doaction" data-type="deleteperma" data-action="deleteperma"><i
                            class="fa fa-remove"></i> {{ trans("buzzycontact.Deletepermanently") }}</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                aria-expanded="true">{{ trans("buzzycontact.Move") }} <span class="fa fa-caret-up"></span></button>
            <ul class="dropdown-menu pull-left">
                @foreach($mailcat as $i => $category)
                <li class="{{ Request::segment(3)==$category->slug ? 'hide' : ""}}">
                    <a href="javascript:" class="doaction" data-type="move" data-action="{{ $category->slug  }}">
                    <i class="fa fa-{{ $category->description }}"></i> {{ trans("buzzycontact.towhere") }}
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
                @foreach($mailprivatecat as $i => $category)
                <li class="{{ Request::segment(3)==$category->slug ? 'hide' : ""}}">
                    <a href="javascript:" class="doaction" data-type="move" data-action="{{ $category->slug  }}">
                        <i class="fa fa-folder" style="color: {{ $category->color }} !important;"></i>
                        {{ trans("buzzycontact.towhere") }} {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

    </div><!-- /.box-footer -->
</div><!-- /. box -->

@endsection
