<script>
    $(document).ready(function() {
        /**
         * for showing edit item popup
         */

        $(document).on('click', "#delete-item", function() {
            $(this).addClass(
                'delete-item-trigger-clicked'
            ); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            let options = {
                'backdrop': 'static'
            };
            $('#delete-modal').modal(options)
        })

        // on modal show
        $('#delete-modal').on('show.bs.modal', function() {
            let el = $(".delete-item-trigger-clicked"); // See how its usefull right here?
            let row = el.closest(".data-row");

            // get the data
            let id = el.data('delete-id');
            let name = el.data('delete-name');

            // fill the data in the input fields
            $("#modal-delete-id").val(id);
            $("#modal-delete-name").text(name);

        })

        // on modal hide
        $('#delete-modal').on('hide.bs.modal', function() {
            $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
            $("#delete-form").trigger("reset");
        });
    })

</script>
