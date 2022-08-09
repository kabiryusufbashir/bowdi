<!-- Dept  -->
@include('includes.dept-front')
<!-- Rank  -->
@include('includes.rank-front')
<!-- Document  -->
@include('includes.doc-front')
<!-- Document  -->
@include('includes.directory-front')
<!-- Report  -->
@include('includes.report-front')
<!-- Blog  -->
@include('includes.blog-front')
<!-- Staff  -->
@include('includes.staff-front')
<!-- Report  -->
@include('includes.leave-front')
<!-- Profile -->
@include('includes.profile-front')

<!-- Script  -->
@if(Auth::user()->type == 1)
    <script src="{{ asset('js/main.js') }}"></script>
@elseif(Auth::user()->type == 2)
    <script src="{{ asset('js/hr.js') }}"></script>
@elseif(Auth::user()->type == 3)
    <script src="{{ asset('js/normal.js') }}"></script>
@endif

<script src="{{ mix('/js/app.js') }}"></script>
