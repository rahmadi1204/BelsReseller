<script>
    $(document).ready(function() {
        // membatasi jumlah inputan
        let maxGroup = 10;

        //melakukan proses multiple input
        $(".addMore").click(function() {
            if ($('body').find('.rowColor').length < maxGroup) {
                let fieldHTML = '<tr class="rowColor">' + $(".rowColor2")
                    .html() +
                    '</tr>';
                $('body').find('.rowColor:last').after(fieldHTML);
            } else {
                alert('Maksimal Hanya ' + maxGroup + ' Warna.');
            }
        });

        //remove fields group
        $("body").on("click", ".remove", function() {
            $(this).parents(".rowColor2").remove();
        });
    });

</script>
