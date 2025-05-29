<style>
  .image{
    opacity: -1;
  }
</style>
<footer class="d-footer">
  <div class="row align-items-center justify-content-between">
    <div class="col-auto">
      <p class="mb-0">© 2024 WowDash. All Rights Reserved.</p>
    </div>
    <div class="col-auto">
      <p class="mb-0">Made by <span class="text-primary-600">wowtheme7</span></p>
    </div>
  </div>
</footer>
</main>
<!-- jQuery library js -->
 
<script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <!-- Bootstrap js -->
  <script src="{{asset('js/lib/bootstrap.bundle.min.js')}}"></script>
  <!-- Apex Chart js -->
  <script src="{{asset('js/lib/apexcharts.min.js')}}"></script>
  <!-- Data Table js -->
  <script src="{{asset('js/lib/dataTables.min.js')}}"></script>
  <!-- Iconify Font js -->
  <script src="{{asset('js/lib/iconify-icon.min.js')}}"></script>
  <!-- jQuery UI js -->
  <script src="{{asset('js/lib/jquery-ui.min.js')}}"></script>
  <!-- Vector Map js -->
  <script src="{{asset('js/lib/jquery-jvectormap-2.0.5.min.js')}}"></script>
  <script src="{{asset('js/lib/jquery-jvectormap-world-mill-en.js')}}"></script>
  <!-- Popup js -->
  <script src="{{asset('js/lib/magnifc-popup.min.js')}}"></script>
  <!-- Slick Slider js -->
  <script src="{{asset('js/lib/slick.min.js')}}"></script>
  <!-- prism js -->
  <script src="{{asset('js/lib/prism.js')}}"></script>
  <!-- file upload js -->
  <script src="{{asset('js/lib/file-upload.js')}}"></script>
  <!-- audioplayer -->
  <script src="{{asset('js/lib/audioplayer.js')}}"></script>
  
  <!-- main js -->
  <script src="{{asset('js/app.js')}}"></script>

<script src="{{asset('js/homeThreeChart.js')}}"></script>


<!-- Initialize Flasher -->

<script>
   var options = { 
      series: [60, 40],
      colors: ['#53f41e', '#487FFF'],
      labels: ['Active', 'Inactive'] ,
      legend: {
          show: false 
      },
      chart: {
        type: 'donut',    
        height: 260,
        sparkline: {
          enabled: true // Remove whitespace
        },
        margin: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        },
        padding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        }
      },
      stroke: {
        width: 0,
      },
      dataLabels: {
        enabled: false
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200
          },
          legend: {
            position: 'bottom'
          }
        }
      }],
    };

    var chart = new ApexCharts(document.querySelector("#statisticsDonutChart"), options);
    chart.render();
</script>
<script>
  let table = new DataTable('#dataTable');

   // Arrow Carousel
   $('.arrow-carousel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: true,
        autoplay: false,
        autoplaySpeed: 2000,
        speed: 600,
        prevArrow: '<button type="button" class="slick-prev"><iconify-icon icon="ic:outline-keyboard-arrow-left" class="menu-icon"></iconify-icon></button>',
        nextArrow: '<button type="button" class="slick-next"><iconify-icon icon="ic:outline-keyboard-arrow-right" class="menu-icon"></iconify-icon></button>',
        rtl: rtlDirection
    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        jQuery('select[name="category_id"]').on('change', function() {
            var categoryID = jQuery(this).val();
            if (categoryID) {
                jQuery.ajax({
                    url: 'SubCategories-get/' + categoryID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        jQuery('select[name="subcategory_id"]').html(
                            ' <option selected>select </option>');
                        jQuery.each(data, function(key, value) {
                            console.log(value);

                            $('select[name="subcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="subcategory_id"]').empty();
            }
        });
    });


 $(document).ready(function() {
        $('#listModal').modal('hide');
    });

    function getfeature(endpoint, productId) {
        console.log(endpoint);
        $('.addproductid').attr('data-product-id',productId);

        $.ajax({
            url: endpoint ,  
            method: "GET",
            success: function(response) {
                console.log(response);
                var html =''
                if(response.length==0){
                    html+= `
                      <div class="card-body p-24">
                          <label class="upload-file-multiple h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-file-multiple">
                            <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                            <span class="fw-semibold text-secondary-light">Upload</span>
                            <input   id="upload-file-multiple" type="file" hidden="" data-product-id="${productId}"  onchange='getimage(this)' multiple>
                          </label>
                        </div>
                      </div>`;  
                }
                response.map((item, index)=>{
                    var imageUrl = item.name;
                    const baseurl ='http://127.0.0.1:8000/uploads/'
                    html+= `
                      <div class="card-body p-24">
                        <div class="upload-image-wrapper d-flex align-items-center gap-3 flex-wrap">
                          <div class="uploaded-imgs-container d-flex gap-3 flex-wrap">
                            <img src="${baseurl+imageUrl}" class="img-fluid" alt="Product Image">
                          </div>
    
                          <label class="upload-file-multiple h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-file-multiple">
                            <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                            <span class="fw-semibold text-secondary-light">Upload</span>
                            <input  class= "image" id="upload-file-${item.id}" type="file"  data-id="${item.id}" data-product-id="${item.product_id}" onchange='getimage(this)' >

                          </label>
                        </div>
                      </div>`;
                })
                $(".list").html(html);
                $('#listModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }

   function getimage(element){
       console.log(element);
      var productId = $(element).data('product-id');
      var imageId = $(element).data('id');
      console.log("Product ID: " + productId);
      console.log("Image ID: " + imageId);
      var files = $(element)[0].files; 
      var formData = new FormData();
      if(files.length > 1) {
          $.each(files, function(i, file) {
              formData.append('images[]', file);  
              formData.append('id', productId);   
          });
      } else {
          $.each(files, function(i, file) {
              formData.append('images', file); 
              formData.append('id', productId); 
              formData.append('pid', imageId);  
          });
      }
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
              }
          });
          $.ajax({
                  url: '{{route('productfeatureaddimage')}}' ,  
                  method: "POST",
                  data: formData,
                  processData: false, 
                  contentType: false,
                  success: function(response) {
                    alert('Images uploaded successfully!');
                  },
                  error: function(xhr, status, error) {
                      console.error("Error:", error);
                  }
              });
        }
</script>

</body>

<!-- Mirrored from wowdash.wowtheme7.com/demo/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Oct 2024 10:04:47 GMT -->
</html>





