@extends('layouts.app')

@section('content')

    <section class="card">
        <div class="container">

            <header class="card-header">
                <h3>{{Session::get('message')}}</h3>
            </header>
            <div class="card-body">
                <table class="table table-bordered table-striped mb-0 table-responsive" id="datatable-editable">

                    <thead>
                    <tr>
                        <th>Account</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Income Money In</th>
                        <th>Expense Money Out</th>
                        <th>Debit/Credit</th>
                        <th>Overall Balance</th>

                         </tr>
                    </thead>
                    <tbody>

                    <?php $new = 0; ?>

                    @foreach($res as $key)
                        <tr>
                            <td>{{ $key->name }}</td>
                            <td>{{ $key->dates }}</td>
                            <td>{{ $key->description }}</td>
                            <td>{{ $key->category }}</td>
                            <td>{{ $key->sums }}</td>
                            <td>{{ $key->exp}}</td>
                    <td>{{ $key->status == 1 ? 'Credit' : 'Debit' }}</td>
                            <td>                         
                            <?php


                            if  ($key->exp == null )
        
                            {
                                $new = $key->sums + $new;
        
                            }
        
                            else
                            {
                                $new = $new - $key->exp;
        
                                }
        
                            ?>
                        {{$new}}
                    </td>
</tr>
                    </tbody>
                    @endforeach
                </table>


            </div>
        </div>
    </section>
    @endsection