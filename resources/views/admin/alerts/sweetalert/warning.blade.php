@if(session('swal-warning'))
<script>
$(document).ready(function () {
    Swal.fire({
  icon: 'warning',
  text:'{{ session('swal-warning') }}',
  confirmButtonText:'باشه'
});
});
</script>
@endif
