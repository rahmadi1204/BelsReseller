<script>
    document.getElementById("uploadImage").addEventListener("change", validateFile)

    function validateFile() {
        let allowedExtensions = ['jpg', 'png'],
            sizeLimit = 1000000; // 1 megabyte

        // destructuring file name and size from file object
        let {
            name: fileName,
            size: fileSize
        } = this.files[0];

        /*
         * if filename is apple.png, we split the string to get ["apple","png"]
         * then apply the pop() method to return the file extension
         *
         */
        let fileExtension = fileName.split(".").pop();

        /*
          check if the extension of the uploaded file is included
          in our array of allowed file extensions
        */
        if (!allowedExtensions.includes(fileExtension)) {
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: 'Jenis Foto Tidak Di Support',
                showConfirmButton: false,
                timer: 2000
            });
            this.value = null;
        } else if (fileSize > sizeLimit) {
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: 'File Terlalu Besar',
                showConfirmButton: false,
                timer: 2000
            });
            this.value = null;
        } else {

        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                $('#viewImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#uploadImage").change(function() {
        readURL(this);
    });

</script>
