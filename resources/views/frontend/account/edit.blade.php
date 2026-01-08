@extends('layouts.app')

@section('title')
    Account | edit
@endsection

@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('account.update',$account) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Balance</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-muted mb-3">Add you blanace for your expenses</p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                            <input type="number" class="form-control mb-2" name="balance" value="{{$account->balance}}" aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    <p class="text-muted mb-3">Add Comment</p>
                                    <div class="form-floating">
                                        <textarea class="form-control" name="account_comment" placeholder="Leave a comment here" id="floatingTextarea">{{$account->account_comment}}</textarea>
                                        <label for="floatingTextarea">Comments</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-secondary" data-bs-dismiss="modal">Cansel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
    </div>
</div>

@endsection

@section('scripts')



@endsection


