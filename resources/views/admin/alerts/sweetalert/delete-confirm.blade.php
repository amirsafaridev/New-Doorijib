<script>


$(document).ready(function(){
var className='{{ $className }}';
var element=$('.'+className);
element.on('click',function(e){
    e.preventDefault();
    const swalWithBootstrapButtons=Swal.mixin({
         customClass:{
             confirmButton:'btn btn-success mx-2',
             cancelButton:'btn btn-danger mx-2'
         },
         buttonsStyling:false
        });
   swalWithBootstrapButtons.fire({
  title: 'آیا از حذف کردن داده اطمینان دارید؟',
  text: "شما میتوانید درخواست خود را لغو کنید!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'بله داده حذف شود',
  cancelButtonText: 'خیر',
  reverseButtons:true

}).then((result) => {
  if(result.value==true){
      $(this).parent().submit();
    }
//       swalWithBootstrapButtons.fire(
//       title:'اطلاعات حذف شد!',
//      text: 'شما اطلاعات مورد نظر را حذف کردید!',
//      icon: 'success'
//     );
//   }
  else if(result.dismiss ===Swal.DismissReason.cancel){
    swalWithBootstrapButtons.fire({
     title: ' لغو درخواست',
     text: 'درخواست شما لغو شد!',
      icon:'error',
      confirmButtonText:'باشه'
     } );
  }
});
});
});




</script>
