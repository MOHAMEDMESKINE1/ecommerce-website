<!-- resources/views/components/confirm-delete.blade.php -->

@props(['form', 'name'])

<script>
    $(function () {
        $('.show_confirm').click(function (event) {
            event.preventDefault();
            var form = $(this).closest("{{ $form }}");
            var name = "{{ $name }}";

            swal({
                title: `Are you sure you want to delete ${name}?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    });
</script>
