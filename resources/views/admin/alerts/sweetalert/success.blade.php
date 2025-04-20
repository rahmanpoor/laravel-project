@if (session('swal-success'))
    <script>
        $(document).ready(function (){
            Swal.fire({
                title: 'موفقیت',
                text: '{{ session('swal-success') }}',
                icon: 'success',
                confirmButtonText: 'باشه',
            });
        });
    </script>
@endif
