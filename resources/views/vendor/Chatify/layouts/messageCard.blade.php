<?php
$seenIcon = (!!$seen ? 'check-double' : 'check');
$timeAndSeen = "<span data-time='$created_at' class='message-time'>
        ".($isSender ? "<span class='fas fa-$seenIcon' seen'></span>" : '' )." <span class='time'>$timeAgo</span>
    </span>";
?>

<div class="message-card @if($isSender) mc-sender @endif" data-id="{{ $id }}">
    {{-- Delete Message Button --}}
    @if ($isSender)
        <div class="actions">
            <i class="fas fa-trash delete-btn" data-id="{{ $id }}"></i>
        </div>
    @endif
    {{-- Card --}}
    <div class="message-card-content">
        @if (@$attachment->type != 'image' || $message)
            <div class="message">
                {!! ($message == null && $attachment != null && @$attachment->type != 'file') ? $attachment->title : nl2br($message) !!}
                {!! $timeAndSeen !!}
                {{-- If attachment is a file --}}
                @if(@$attachment->type == 'file')
                <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$attachment->file]) }}" class="file-download">
                    <span class="fas fa-file"></span> {{$attachment->title}}</a>
                @endif
                @if (@$offerName)
                    <div class="open-offer-btn"><p style="padding:0px 30px;"><span class="fas fa-file "></span> OFFER </p></div>
                    <div class="app-modal" data-name="open-offer">
                        <div class="app-modal-container">
                            <div class="messenger-sendCard-offer">
                                <span class="fas fa-times cancel-offer"></span>
                                    <div class="row">
                                        <textarea readonly='readonly' name="deneme" class="m-send app-scroll" placeholder="{{$offerName}}"></textarea>
                                    </div>
                                    <textarea readonly='readonly' name="deneme2" class="m-send app-scroll" placeholder="{{$offerContent}}"></textarea>
                                    <textarea readonly='readonly' name="deneme3" class="m-send app-scroll" placeholder="{{$offerPrice}}"></textarea>
                                    <a href="javascript:void(0)" class="app-btn a-btn-danger delete">Reject</a>
                                    <a href="javascript:void(0)" class="app-btn a-btn-success delete">Pay</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif
        @if(@$attachment->type == 'image')
        <div class="image-wrapper" style="text-align: {{ $isSender ? 'end' : 'start'}}">
            <div class="image-file chat-image" style="background-image: url('{{ Chatify::getAttachmentUrl($attachment->file) }}')">
                <div>{{ $attachment->title }}</div>
            </div>
            @if (@$offerName)
                    <div class="open-offer-btn"><p style="padding:0px 30px;"><span class="fas fa-file "></span> OFFER </p></div>
                    <div class="app-modal" data-name="open-offer">
                        <div class="app-modal-container">
                            <div class="messenger-sendCard-offer">
                                <span class="fas fa-times cancel-offer"></span>
                                    <textarea readonly='readonly' name="deneme" class="m-send app-scroll" placeholder="{{$offerName}}"></textarea>
                                    <textarea readonly='readonly' name="deneme2" class="m-send app-scroll" placeholder="{{$offerContent}}"></textarea>
                                    <textarea readonly='readonly' name="deneme3" class="m-send app-scroll" placeholder="{{$offerPrice}}"></textarea>
                                    <a href="javascript:void(0)" class="app-btn a-btn-danger delete">Reject</a>
                                    <a href="javascript:void(0)" class="app-btn a-btn-success delete">Pay</a>
                            </div>
                        </div>
                    </div>
                @endif
            <div style="margin-bottom:5px">
                {!! $timeAndSeen !!}
            </div>
        </div>
        @endif
    </div>
</div>
