<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-plus-circle"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" /></label>
        <button class="emoji-button"></span><span class="fas fa-smile"></button>
        <button class="offer-btn"><h3>ADD OFFER</h2></button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>

             {{-- ---------------------- Offer Modal ---------------------- --}}
  <div class="app-modal" data-name="offer">
    <div class="app-modal-container">
        <div class="messenger-sendCard-offer">
            <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
                @csrf
                <textarea readonly='readonly' name="offerName" class="m-send app-scroll offer-name" placeholder="Offer Name"></textarea>
                <textarea readonly='readonly' name="offerContent" class="m-send app-scroll offer-content" placeholder="Offer Content"></textarea>
                <textarea readonly="readonly" type="number" name="offerPrice" class="m-send app-scroll" placeholder="Offer Price" oninput="this.value = this.value.replace(/[^0-9.]/g, '');"></textarea>
                <div class="app-modal-footer">
                    <a href="javascript:void(0)" class="save-offer-btn app-btn cancel">Save</a>
                </div>
            </form>
        </div>
    </div>
</div>
    </form>

   
</div>