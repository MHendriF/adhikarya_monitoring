<script>
      $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var linkURL = $(this).attr("href");
        swal({
            title: 'Perhatian',
            text: "Data akan dihapus",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Data!'
        }).then(function () {
              window.location.href = linkURL;
        },
        function (dissmiss){
            console.log("Cancel to delete "+linkURL);
          }
        );
    })
  </script>


  <script>
      $(document).on('click', '#propose', function (e) {
      e.preventDefault();
      var form = $(this).parents('form');

      swal({
          title: 'Perhatian',
          text: "Dokumen akan dikirimkan ke email approval secara berjenjang",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
      }).then(function () {
        swal(
          'Berhasil',
          'Dokumen mulai dikirimkan ke email approval, harap tunggu.',
          'success'
        ),
        form.submit();
      }, function (dismiss) {
        if (dismiss === 'cancel') {
          console.log("Cancel to propose "+form);
        }
      })

    })
  </script>
