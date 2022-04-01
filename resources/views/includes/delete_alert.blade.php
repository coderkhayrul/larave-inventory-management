<script>
    $(document).ready(function (e) {
        $(document).on("click", ".delete-modal", function (e) {
            var delete_id = $(this).attr('data-value');
            console.log(delete_id);
            $('button[name="delete_data"]').val(delete_id);
        });
    });
</script>
