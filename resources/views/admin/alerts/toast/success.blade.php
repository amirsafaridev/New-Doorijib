@if(session('toast-success'))

<section class="toast" data-delay="1000">
<section class="toast-body py-3 d-flex bg-success">
   <strong class="ml-auto">{{ session('toast-success') }}</strong>
   <button type="button" class="mr-2 close" data-dissmis="toast" aria-label="Close">
       <span aria-hidden="true">&times;</span>
    </button>

</section>
</section>
<script>
    $(document).ready(function(){
$('.toast').toast('show');
    });
</script>
@endif
