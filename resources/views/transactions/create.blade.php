@extends('master.master')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-8 payment-left">
                <div class="card d-flex flex-row p-3">
                    <img src="data:image/jpeg;base64,{{ $book->cover_image }}" class="img-fluid rounded w-25 h-50 h-md-100 w-md-25 me-3"
                        alt="Album Art">
                    <div class="d-flex flex-column ms-2 justify-content-between">
                        <div>
                            <h2>{{ $book->title }}</h2>
                            <p class="fw-semibold fs-6 fs-md-5 text-black-50">@lang('transactions.lbl_by') {{ $book->author }}</p>
                            <p class="fw-semibold fs-5 fs-md-4 text-black">Rp{{ number_format($book->price, 0, ',', '.') }}</p>
                        </div>
                        <p class="text-danger fst-italic disclaimer">
                            @lang('transactions.lbl_disclaimer')
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4">
                    <h6 class="fw-bold">@lang('transactions.lbl_cost')</h6>
                    <div class="d-flex justify-content-between fw-semibold">
                        <span>@lang('transactions.lbl_subtotal')</span>
                        <span>Rp{{ number_format($book->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between fw-semibold">
                        <span>@lang('transactions.lbl_tax')</span>
                        <span>Rp0</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>@lang('transactions.lbl_total')</span>
                        <span>Rp{{ number_format($book->price, 0, ',', '.') }}</span>
                    </div>
                    <button type="submit" class="btn btn-warning my-3 fw-semibold text-white" id="pay-button">@lang('transactions.btn_pay')</button>
                    <a href="{{ route('book.index') }}" class="btn btn-danger fw-semibold">@lang('transactions.lbl_cancel')</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $transaction->snap_token }}', {
                onSuccess: function(result) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route('transactions.success', $transaction->id) }}';
                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';
                    form.appendChild(csrfToken);
                    document.body.appendChild(form);
                    form.submit();
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onPending: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onError: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endsection
