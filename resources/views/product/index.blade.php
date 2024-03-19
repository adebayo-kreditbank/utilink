@extends('layouts.app')

@section('content')
    <div>
        <h1>Product Daily Sales Statistic</h1>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Number of Sales</th>
                        <th>Total Price</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sale->product->name }}</td>
                            <td>{{ $sale->sales_count }}</td>
                            <td>{{ $sale->total_price }}</td>
                            <td>{{ $sale->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
