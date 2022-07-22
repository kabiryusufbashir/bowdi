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
            @if(count($leave) > 0)
                <div class="text-center text-2xl mb-8">
                    Borno Women Development Initiative (BOWDI) <br> <b>Leave Requests</b>
                </div>
                <div class="my-2">
                    <table class="overflow-x-scroll text-sm">
                        <tbody>
                            <!-- Main Columns  -->
                            <tr class="text-left">
                                <th>No</th>
                                <th>Requested By</th>
                                <th>Requested Date</th>
                                <th>No of Days</th>
                                <th>Date of Leave</th>
                                <th>Nature of Leave</th>
                                <th>Approved By</th>
                                @if(Auth::user()->type == 1 || $leave != null)
                                    <th>Action</th>
                                @endif
                            </tr>
                            <!-- Data  -->
                            @foreach($leave as $item)
                                <tr class="text-left">
                                    <td>
                                        {{  $loop->index + 1 }}
                                    </td>
                                    <td>
                                        {{ App\Models\User::where('id', $item->user_id)->pluck('name')->first() }}
                                    </td>
                                    <td>
                                        {{ $item->request_date }}
                                    </td>
                                    <td>
                                        {{ $item->no_of_days }}
                                    </td>
                                    <td>
                                        {{ $item->date_of_leave }}
                                    </td>
                                    <td>
                                        {{ $item->nature_of_leave }}
                                    </td>
                                    @if($item->approved_by != null)
                                        @if($item->status == 1)
                                            <td class="text-green-600">
                                                Approved By {{ App\Models\User::where('id', $item->approved_by)->pluck('name')->first() }}
                                            </td>
                                        @else
                                            <td class="text-red-600">
                                                Rejected By {{ App\Models\User::where('id', $item->approved_by)->pluck('name')->first() }}
                                            </td>
                                        @endif
                                    @else 
                                        <td>
                                            Pending
                                        </td>
                                    @endif
                                    @if($item->approved_by == null)
                                        @if(Auth::user()->type == 1 || $item->user_id === Auth::user()->id)
                                            <!-- Action  -->
                                            <td class="flex px-2 items-center">
                                                @if(Auth::user()->type == 1)
                                                    <form action="{{ route('leave-approve') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="leave_id" value="{{ $item->id }}"> 
                                                        <button type="submit" class="relative top-2 bg-green-600 py-2 px-2 rounded-full text-white text-sm">
                                                            Approve
                                                        </button>
                                                    </form>
                                                    &nbsp;&nbsp;
                                                    <form action="{{ route('leave-reject') }}" method="POST">
                                                        @csrf 
                                                        <input type="hidden" name="leave_id" value="{{ $item->id }}"> 
                                                        <button type="submit" class="relative top-2 bg-red-600 py-2 px-2 rounded-full text-white text-sm">
                                                            Reject
                                                        </button>
                                                    </form>
                                                @endif
                                                &nbsp;&nbsp;
                                                <form action="{{ route('leave-edit', $item->id) }}">
                                                    @csrf 
                                                    <button class="relative top-2">
                                                        <span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg></span>
                                                    </button>
                                                </form>
                                                &nbsp;&nbsp;
                                                <form action="{{ route('leave-delete', $item->id) }}" method="POST">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <button class="relative top-2">
                                                        <span><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></span>
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
                                    @else 
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center text-2xl">
                    No Leave Request Found
                </div>
            @endif
        </div>
        <div>
            {{ $leave->links() }}
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection