@if(session('alert-section-error'))

<div class="alert alert-danger alert-dismissible fade show">
<h4 class="alert-heading">&times; خطا</h4>
<hr>
<p class="mb-0">
{{ session('alert-section-error') }}

</p>
<button type="button" class="close" data-dissmis="alert" aria-label="Close" style="right: auto!important;left: 0!important;"><span aria-hidden="true">&times;</span></button>
</div>

@endif