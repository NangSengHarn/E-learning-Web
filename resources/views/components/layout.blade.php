<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/app.css">
  </head>
  <body id="home">

    <x-navbar />
    {{ $slot }}
    <x-footer />
    <!-- jquery link  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script>
      //show image preview
    const thumbnail = document.getElementById('thumbnail');
    thumbnail.onchange = () => {
    const selectedFile = thumbnail.files[0];
    console.log(selectedFile);
    if (selectedFile) {
        
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
        }
        reader.readAsDataURL(selectedFile);
        $('#img').attr("hidden", false);
      }else{
        $('#img').attr("hidden", true);
      }
    }
    
    </script>

    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous">
    </script>
     <!-- ckeditor js link  -->
     <script src="/ckeditor/ckeditor.js"></script>
     <script>ClassicEditor
         .create( document.querySelector( '.editor' ), {
           licenseKey: '',
         } )
         .then( editor => {
           window.editor = editor;
         } )
         .catch( error => {
           console.error( 'Oops, something went wrong!' );
           console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
           console.warn( 'Build id: yri1u5ivu6tj-4jhto8qlg224' );
           console.error( error );
         } );
     </script>
</body>
</html>