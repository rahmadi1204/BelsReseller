<script>
    $(document).ready(function() {
        /**
         * for showing edit item popup
         */

        $(document).on('click', "#show-item", function() {
            $(this).addClass(
                'show-item-trigger-clicked'
            ); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            let options = {
                'backdrop': 'dinamis'
            };
            $('#modal-default').modal(options)
        })

        // on modal show
        $('#modal-default').on('show.bs.modal', function() {
            let el = $(".show-item-trigger-clicked"); // See how its usefull right here?
            let row = el.closest(".data-row");

            // get the data
            let image = el.data('show-image');

            // fill the data in the input fields
            $("#modal-show-image").attr('src', '../../dist/img/products/' + image);

        })

        // on modal hide
        $('#modal-default').on('hide.bs.modal', function() {
            $('.show-item-trigger-clicked').removeClass('show-item-trigger-clicked')
            $("#show-form").trigger("reset");
        });
    })

</script>
