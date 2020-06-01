{{-- inc/messages.blade.php --}}

@if(count($errors) > 0)
@foreach($errors->all() as $error)
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    Toast.fire({
        type: 'error',
        title: "{{$error}}"
    })

</script>
@endforeach
@endif

@if(session('success'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    Toast.fire({
        type: 'success',
        title: "{{session('success')}}"
    })

</script>
@endif

@if(session('error'))
<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

Toast.fire({
  type: 'error',
  title: "{{session('error')}}"
})

</script>
@endif
