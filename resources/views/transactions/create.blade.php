@extends('master.master')

@section('content')
<div class="container mt-4">
    <h2>Transaction for {{ $book->title }}</h2>
    <p><strong>Amount:</strong> Rp{{ number_format($transaction->amount, 0, ',', '.') }}</p>

    <form action="{{ route('transactions.success', $transaction->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Complete Payment</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
