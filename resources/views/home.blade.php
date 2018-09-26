@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="view overlay">
            <div class="card-body">
                <form role="form" enctype="multipart/form-data" method="post" action="{{ route('new-user')}}">
                    {{ csrf_field() }}

                    <div class="row" style="padding:10px; font-size: 12px;">

                        <div class="col-md-6 col-md-offset-1">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Account Name</label>
                                <input type="text" name="account_name" class="form-control" id="exampleInputEmail1" placeholder="Account Name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>

                                <select id="category_id" type="category_id" class="form-control"
                                        name="category_id" required>

                                    <option value=>Category</option>
                                    <option value="Balance">Balance</option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Fuel">Fuel</option>
                                    <option value="Groseries">Groseries</option>

                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Income Amount</label>
                                <input type="float" name="income_amount" class="form-control" id="income_amount" placeholder="Income Amount">
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Status</label>
                                    <select name="status" class="form-control" style="margin-bottom: 5px;" required>
                                        <option value="1">Income</option>
                                    </select>
                                </div>


                                <div class="row" style="padding: 5px 0px 15px 0px; float:right; font-size: 12px; text-align: center;">
                                <a href="{{ route('pdfview') }}" target="_blank" class="btn btn-primary"> Submit Invoice</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="view overlay">
            <div class="card-body">
                <form role="form" enctype="multipart/form-data" method="post" action="{{ route('new-expense')}}">
                    {{ csrf_field() }}

                    <div class="row" style="padding:10px; font-size: 12px;">

                        <div class="col-md-6 col-md-offset-1">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Account Name</label>
                                <input type="text" name="account_name" class="form-control" id="exampleInputEmail1" placeholder="Account Name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>

                                <select id="category_id" type="category_id" class="form-control"
                                        name="category_id" required>

                                    <option value=>Category</option>
                                    <option value="B">Balance</option>
                                    <option value="T">Transfer</option>
                                    <option value="F">Fuel</option>
                                    <option value="G">Groseries</option>

                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Expense Amount</label>
                                <input type="float" name="expense_amount" class="form-control" id="expense_amount" placeholder="Expense Amount">
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Status</label>
                                    <select name="status" class="form-control" style="margin-bottom: 5px;" required>
                                        <option value="0">Expense</option>
                                    </select>
                                </div>


                                <div class="row" style="padding: 5px 0px 15px 0px; float:right; font-size: 12px; text-align: center;">
                                    <a href="{{ route('pdfview') }}" target="_blank" class="btn btn-primary"> Submit Invoice</a>


                    </div>
                            </div>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>



@endsection
