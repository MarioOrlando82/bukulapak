<div aria-live="polite" aria-atomic="true" class="position-relative border-0">
    <div class="toast-container position-absolute top-0 end-0 p-3">
        <div class="toast {{ $type === 'success' ? 'text-white' : 'bg-danger text-white' }}" role="alert"
            aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="10000"
            style="background-color: {{ $type === 'success' ? '#199d45' : '#dc3545' }};">
            <div class="toast-header">
                <strong class="me-auto">
                    @if ($type === 'success')
                        @lang('component.type_success')
                    @else
                        @lang('component.type_failed')
                    @endif
                </strong>
                <small class="text-muted fw-semibold">@lang('component.toast_header')</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ $message }}
            </div>
        </div>
    </div>
</div>
