@extends('backend.layouts.app')

     @include('layouts._message')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Success & Error Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Manage Transactions</h4>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
                            Add Transaction
                        </button>
                        <input type="text" id="searchInput" class="form-control w-25" placeholder="Search Transactions">
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Amount</th>
                                <th>Location</th>
                                <th>Time Delta</th>
                                <th>Payment Intent ID</th>
                                <th>Verified</th>
                                <th>Risk Score</th>
                                <th>Is Fraud</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="transactionTable">
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->transaction_id }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->location }}</td>
                                    <td>{{ $transaction->time_delta }}</td>
                                    <td>{{ $transaction->payment_intent_id }}</td>
                                    <td>{{ $transaction->verified ? 'Yes' : 'No' }}</td>
                                    <td>{{ $transaction->risk_score }}</td>
                                    <td>{{ $transaction->is_fraud ? 'Yes' : 'No' }}</td>
                                    <td>{{ $transaction->status }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editTransactionModal" data-id="{{ $transaction->id }}"
                                            data-transaction_id="{{ $transaction->transaction_id }}" data-amount="{{ $transaction->amount }}"
                                            data-location="{{ $transaction->location }}" data-time_delta="{{ $transaction->time_delta }}"
                                            data-payment_intent_id="{{ $transaction->payment_intent_id }}" data-verified="{{ $transaction->verified }}"
                                            data-risk_score="{{ $transaction->risk_score }}" data-is_fraud="{{ $transaction->is_fraud }}"
                                            data-status="{{ $transaction->status }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Delete Button -->
                                        <button type="button" class="btn btn-danger btn-sm delete-transaction-btn" data-transaction-id="{{ $transaction->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <!-- Delete Form (Hidden) -->
                                        <form id="delete-form-{{ $transaction->id }}" action="" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-container">
                        {{ $transactions->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Transaction Modal -->
<div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTransactionModalLabel">Add New Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Form fields for transaction attributes -->
                    <div class="form-group mb-3">
                        <label for="transaction_id">Transaction ID</label>
                        <input type="text" name="transaction_id" id="transaction_id" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="location">Location</label>
                        <input type="text" name="location"
                        @endsection