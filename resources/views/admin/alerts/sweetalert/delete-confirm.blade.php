<script>
    $(document).ready(function() {



        var className = '{{ $className }}'
        var element = $('.' + className);


        element.on('click', function(e) {


            e.preventDefault();

            const swalWithBootstrapButtons = Swal.mixin({

                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: "حذف شود؟",
                text: "میتوانید درخواست را لغو نمایید",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "حذف",
                cancelButtonText: "لغو",
                reverseButtons: true
            }).then((result) => {
                if (result.value == true) {
                    $(this).parent().submit();
                } else if (result.dismiss == Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "لغو",
                        text: "درخواست لغو شد",
                        icon: "error",
                        confirmButtonText: 'باشه'
                    });
                }
            });



        });
    });
</script>
