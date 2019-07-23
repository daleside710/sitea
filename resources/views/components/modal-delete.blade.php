<div id="{{ $id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ ucfirst(__('word.delete')) }} @isset($title) {{$title}} @endisset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ ucfirst(__('msg.delete_confirm')) }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">{{ ucfirst(__('word.no')) }}</button>
                <button type="button" class="btn btn-primary modal-confirm">{{ ucfirst(__('word.yes')) }}</button>
            </div>
        </div>
    </div>
</div>