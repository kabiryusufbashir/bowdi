@extends('layouts.dashboard')

@section('container')
    <!-- Nav  -->
    @include('layouts.template')
    <!-- Menu  -->
    <div class="col-span-10">
        <div id="menu" class="p-6">
        <!-- Notification -->
        @include('includes.notification')
        <!-- Message  -->
        <div class="py-1 mb-8 text-center">
            @include('layouts.messages')
        </div>
        <!-- Section  -->
        <div id="homeBar" class="">
            @if(count($payment) > 0)
                <div class="text-center text-2xl">
                    Best Way Guaranty Record of Payment <br>
                    {{ date('F', mktime(null, null, null, $month, 1)) }}, {{ $year }}
                </div>
                <div class="my-2">
                    <table class="overflow-x-scroll">
                        <tbody>
                            <!-- Main Columns  -->
                            <tr class="text-left">
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Customer Phone</th>
                                <th>Quantity</th>
                                <th>Weight</th>
                                <th>Rate</th>
                                <th>Amount ($) (W x R)</th>
                                <th>Delivery Details</th>
                            </tr>
                            <!-- Data  -->
                            @foreach($payment as $item)
                                <tr class="text-left">
                                    <td>
                                        {{ $item->day }}/{{ $item->month }}/{{ $item->year }}
                                    </td>
                                    <td>
                                        {{ $item->cust_name }}
                                    </td>
                                    <td>
                                        {{ $item->cust_phone }}
                                    </td>
                                    <td>
                                        {{ $item->quantity }}
                                    </td>
                                    <td>
                                        {{ $item->weight }}
                                    </td>
                                    <td>
                                        {{ $item->rate }}
                                    </td>
                                    <td>
                                        {{ $item->amount }}
                                    </td>
                                    <td>
                                        {{ $item->ship_details }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center text-2xl">
                    No Payment Found
                </div>
            @endif
        </div>
        <div>
            {{ $payment->links() }}
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection