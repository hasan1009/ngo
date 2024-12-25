<div class="chat-header clearfix">
    @include('chat._header')
</div>
<div class="chat-history">
    <ul class="m-b-0">
        @include('chat._chat')
    </ul>
</div>
<div class="chat-message clearfix">
    <form action="" id="submit_message" method="post" class="mb-0" enctype="multipart/form-data">
        <input type="hidden" value="{{ $getReceiver->id }}" name="receiver_id">
        {{ csrf_field() }}
        <div style="display: block">
            <textarea name="message" id="ClearMessge" required class="form-control emojionearea"></textarea>
        </div>
        <div class="row">
            <div class="col-md-6 hidden-sm " style="margin-top:10px;">
                <a href="javascript:void(0);" id="OpenFile" class="btn btn-outline-primary"><i
                        class="fa fa-image"></i></a>
                <input type="file" style="display: none" name="file_name" id="file_name">
                <span id="getFileName"></span>
            </div>
            <div class="col-md-6" style="text-align: right"><button style="margin-top:10px;" class="btn btn-primary"
                    type="submit">Send</button></div>
        </div>
    </form>
</div>
