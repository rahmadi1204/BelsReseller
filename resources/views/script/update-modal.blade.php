<script>
    $(document).ready(function() {
        /**
         * for showing edit item popup
         */

        $(document).on('click', "#update-item", function() {
            $(this).addClass(
                'update-item-trigger-clicked'
            ); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            let options = {
                'backdrop': 'static'
            };
            $('#update-modal').modal(options)
        })

        // on modal show
        $('#update-modal').on('show.bs.modal', function() {
            let el = $(".update-item-trigger-clicked"); // See how its usefull right here?
            let row = el.closest(".data-row");

            // get the data
            let id = el.data('update-id');
            let code = el.data('update-code');
            let name = el.data('update-name');
            let stok = el.data('update-stok');
            let image = el.data('update-image');

            // fill the data in the input fields
            $("#modal-update-id").val(id);
            $("#modal-update-code").val(code);
            $("#modal-update-name").val(name);
            $("#modal-update-stok").val(stok);
            $("#modal-update-image").attr('src', '../../dist/img/products/' + image);

        })

        // on modal hide
        $('#update-modal').on('hide.bs.modal', function() {
            $('.update-item-trigger-clicked').removeClass('update-item-trigger-clicked')
            $("#update-form").trigger("reset");
        });
    })

</script>
