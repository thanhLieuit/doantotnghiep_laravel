<html>
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
        <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/star-rating.css') !!}">




        <link href="https://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet" type="text/css">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="{!! asset('js/star-rating.js') !!}" type="text/javascript"></script>
        
        <title>web bán hàng</title>
    </head>
    <body>
        @include('index.header')
        <div class="container-fluid">
            @yield('content')
        </div>
        
        @include('index.footer')
          <script type="text/javascript">
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;

        // passes on every "a" tag
        $(".main-menu a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
        $(this).parents('li').addClass('parent-active');
            }
        });
    });   


</script>

<script>
function myFunction() {
  var x = document.getElementById('myDIV');
  if (x.style.display == 'block') {
    x.style.display = 'none';
  } else {
    x.style.display = 'block';
  }

}
</script>



 <script>
    (function() {
  // Get all images with the `detail-view` class
  var zoomBoxes = document.querySelectorAll('.detail-view');

  // Extract the URL
  zoomBoxes.forEach(function(image) {
    var imageCss = window.getComputedStyle(image, false),
      imageUrl = imageCss.backgroundImage
                         .slice(4, -1).replace(/['"]/g, '');

    // Get the original source image
    var imageSrc = new Image();
    imageSrc.onload = function() {
      var imageWidth = imageSrc.naturalWidth,
          imageHeight = imageSrc.naturalHeight,
          ratio = imageHeight / imageWidth;

      // Adjust the box to fit the image and to adapt responsively
      var percentage = ratio * 270 + 'px';
      image.style.paddingBottom = percentage;

      // Zoom and scan on mousemove
      image.onmousemove = function(e) {
        // Get the width of the thumbnail
        var boxWidth = image.clientWidth,
            // Get the cursor position, minus element offset
            x = e.pageX - this.offsetLeft,
            y = e.pageY - this.offsetTop,
            // Convert coordinates to % of elem. width & height
            xPercent = x / (boxWidth / 20) + '%',
            yPercent = y / (boxWidth * ratio / 40) + '%';

        // Update styles w/actual size
        Object.assign(image.style, {
          backgroundPosition: xPercent + ' ' + yPercent,
          backgroundSize: imageWidth + 'px'
        });
      };

      // Reset when mouse leaves
      image.onmouseleave = function(e) {
        Object.assign(image.style, {
          backgroundPosition: 'center',
          backgroundSize: 'cover'
        });
      };
    }
    imageSrc.src = imageUrl;
  });
})();
</script>

 <script>
        jQuery(document).ready(function () {
            $("#input-21f").rating({
                starCaptions: function (val) {
                    if (val < 3) {
                        return val;
                    } else {
                        return 'high';
                    }
                },
                starCaptionClasses: function (val) {
                    if (val < 3) {
                        return 'label label-danger';
                    } else {
                        return 'label label-success';
                    }
                },
                hoverOnClear: false
            });
            var $inp = $('#rating-input');

            $inp.rating({
                min: 0,
                max: 5,
                step: 1,
                size: 'lg',
                showClear: false
            });

            $('#btn-rating-input').on('click', function () {
                $inp.rating('refresh', {
                    showClear: true,
                    disabled: !$inp.attr('disabled')
                });
            });


            $('.btn-danger').on('click', function () {
                $("#kartik").rating('destroy');
            });

            $('.btn-success').on('click', function () {
                $("#kartik").rating('create');
            });

            $inp.on('rating.change', function () {
                alert($('#rating-input').val());
            });


            $('.rb-rating').rating({
                'showCaption': true,
                'stars': '3',
                'min': '0',
                'max': '3',
                'step': '1',
                'size': 'xs',
                'starCaptions': {0: 'status:nix', 1: 'status:wackelt', 2: 'status:geht', 3: 'status:laeuft'}
            });
            $("#input-21c").rating({
                min: 0, max: 8, step: 0.5, size: "xl", stars: "8"
            });
        });
    </script>


<script>
    $(document).ready(function(){

        $('#country_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
            var query = $(this).val(); //lấy gía trị ng dùng gõ
            if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                $.ajax({
                    url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{query:query, _token:_token},
                    success:function(data){ //dữ liệu nhận về
                        $('#countryList').fadeIn();
                        $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                        $('#msg_div').hide();
                        $('#msg_div1').hide();
                        $('#msg_div3').hide();
                        $('#msg_div4').hide();
                        $('#msg_div5').hide();
                        $('#msg_div6').hide();
                    }
                });
            }
        });

        $(document).on('click', 'li', function(){
            $('#country_name').val($(this).text());
            $('#countryList').fadeOut();
        });

    });
</script>

<script>
    $(document).ready(function() {
    $(".input-radio").click(function(){
        var parents=$(this).parents(".payment_method_basc");
        if (parents.hasClass('active')) {
            parents.removeClass('active');
        }else{
            parents.addClass('active');
        }
    });
});
</script>
    </body>
</html>