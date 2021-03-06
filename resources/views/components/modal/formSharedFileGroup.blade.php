<div class="modal fade" id="modal-block-file-group" tabindex="-1" aria-labelledby="modal-block-file-group" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                {!! Form::open(['route' => 'group.file.share']) !!}
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">{{ $title }}</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    {{ $slot }}
                </div>
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Share</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>