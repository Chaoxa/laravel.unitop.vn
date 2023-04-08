<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.tiny.cloud/1/9zvlmm63vtiuu9i3wnr44t7ploxgrkb6fclj3ilmsfqvi1c4/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
  <script>
    var editor_config = {
          path_absolute : "http://localhost/laravel-unitop.vn/",
          selector: 'textarea.my-editor',
          relative_urls: false,
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
          ],
          toolbar: "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat",
          file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
      
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
              cmsURL = cmsURL + "&type=Images";
            } else {
              cmsURL = cmsURL + "&type=Files";
            }
      
            tinyMCE.activeEditor.windowManager.openUrl({
              url : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no",
              onMessage: (api, message) => {
                callback(message.content);
              }
            });
          }
        };
      
        tinymce.init(editor_config);
  </script>
  <title>@yield('title')</title>
</head>

<body>
  <div id="wraper">
    <div id="header" class="bg-dark mb-3">
      <div class="container">
        <div class="row">
          <div class="col-md-4  text-white text-bold py-2">
            <a href="{{url('admin/products/show')}}"><img src="images/logo.png" height="26px" alt=""><b
                class="text-white">TQ Store</b></a>
          </div>
          <div class="col-md-8">
            <a href="{{url('cart/show')}}" class="py-2 d-block float-right text-danger">Giỏ hàng<span
                class="text-success">({{Cart::count()}})</span></a>
          </div>
        </div>
      </div>
    </div>
    <!-- end header -->
    <div id="wp-content">
      <div id="content">
        @yield('content')
      </div>
      <div id="id">
        @yield('sidebar')
      </div>
    </div>
    <div id="footer" class="bg-secondary text-center text-warning mt-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            UNITOP.VN - HỌC ĐỂ DẪN ĐẦU
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</div>
</body>

</html>