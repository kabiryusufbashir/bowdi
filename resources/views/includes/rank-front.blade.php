<div id="rank" class="hidden">
    <div id="rank-content">
        <div id="rank-header" class="bg-green-800 text-white p-4 flex justify-between">
            <span>New Rank</span>
            <span id="closeModalRank" class="cursor-pointer">X</span>
        </div>
        <div id="rank-body" class="p-4">
            <!-- Add rank  -->
            <div id="addRankForm" class="hidden">
                <form action="{{ route('add-rank') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div class="lg:grid grid-cols-2 gap-4 items-center">
                        <div>
                            <label for="name" class="text-lg font-medium">Rank Name</label><br>
                            <input type="text" name="name" value="{{old('name')}}" placeholder="Rank Name" class="input-field">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>     
                        <div class="text-center">
                            <button class="submit-button">Add Rank</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>