@extends('master.master')

@section('content')
    <div class="container mt-4">
        <h2>Transaction for {{ $book->title }}</h2>
        <p><strong>Amount:</strong> Rp{{ number_format($transaction->amount, 0, ',', '.') }}</p>
        <button type="submit" class="btn btn-success" id="pay-button">Complete Payment</button>
        <a href="{{ route('book.index') }}" class="btn btn-secondary">Cancel</a>
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
