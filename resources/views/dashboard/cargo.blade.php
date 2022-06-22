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
            @if(count($cargo) > 0)
                <div class="text-center text-2xl">
                    Best Way Guaranty Cargo
                </div>
                <div class="my-2">
                    <table class="overflow-x-scroll">
                        <tbody>
                            <!-- Main Columns  -->
                            <tr class="text-left">
                                <th>No</th>
                                <th>Customer</th>
                                <th>Customer Phone</th>
                                <th>Goods Type</th>
                                <th>Quantity</th>
                                <th>Weight</th>
                                <th>Rate</th>
                                <th>Amount ($)</th>
                                <th>Details</th>
                                @if(Auth::user()->type == 1)
                                    <th>Action</th>
                                @endif
                            </tr>
                            <!-- Data  -->
                            @foreach($cargo as $item)
                                <tr class="text-left">
                                    <td>
                                        {{  $loop->index + 1 }}
                                    </td>
                                    <td>
                                        {{ $item->cust_name }}
                                    </td>
                                    <td>
                                        {{ $item->cust_phone }}
                                    </td>
                                    <td>
                                        {{ $item->good_type }}
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
                                    @if(Auth::user()->type == 1)
                                        <!-- Action  -->
                                        <td class="flex px-2 justify-center">
                                            <form action="{{ route('cargo-edit', $item->id) }}">
                                                @csrf 
                                                <button class="relative top-2">
                                                    <span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg></span>
                                                </button>
                                            </form>
                                            &nbsp;&nbsp;
                                            <form action="{{ route('cargo-delete', $item->id) }}" method="POST">
                                                @csrf 
                                                @method('DELETE')
                                                <button class="relative top-2">
                                                    <span><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></span>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center text-2xl">
                    No cargo Found
                </div>
            @endif
        </div>
        <div>
            {{ $cargo->links() }}
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection