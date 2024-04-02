@if(session('toast-warning'))

<section class="toast" data-delay="1000">
<section class="toast-body py-3 d-flex bg-warning">
   <strong class="ml-auto">{{ session('toast-warning') }}</strong>
   <button type="button" class="mr-2 close" data-dissmis="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>

</section>
</section>
<script>
    $(document).ready(function(){
$('.toast').toast('show');
    });
</script>
@endif
