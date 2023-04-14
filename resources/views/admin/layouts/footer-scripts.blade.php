  <!-- Back to top -->
  <a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>

  <!-- Jquery js-->
  <script src="{{ URL::asset('admin_assets/js/jquery-3.5.1.min.js') }}"></script>

  <!-- Bootstrap4 js-->
  <script src="{{ URL::asset('admin_assets/plugins/bootstrap/popper.min.js') }}"></script>
  <script src="{{ URL::asset('admin_assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

  <!--Othercharts js-->
  <script src="{{ URL::asset('admin_assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

  <!-- Circle-progress js-->
  <script src="{{ URL::asset('admin_assets/js/circle-progress.min.js') }}"></script>

  <!-- Jquery-rating js-->
  <script src="{{ URL::asset('admin_assets/plugins/rating/jquery.rating-stars.js') }}"></script>

  <!--Sidemenu js-->
  <script src="{{ URL::asset('admin_assets/plugins/sidemenu/sidemenu.js') }}"></script>

  <!-- P-scroll js-->
  <script src="{{ URL::asset('admin_assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
  <script src="{{ URL::asset('admin_assets/plugins/p-scrollbar/p-scroll1.js') }}"></script>
  <script src="{{ URL::asset('admin_assets/plugins/p-scrollbar/p-scroll.js') }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <script src="{{ asset('js/app.js') }}"></script>

  <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.signature.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
      $('document').ready(function() {
          var darkmode = localStorage['darkmode'] || 'light';
          if (localStorage['darkmode'] === 'light') {
              $('#dark').hide();
              $('#light').show();
          } else {
              $('body').addClass('dark-mode');
              $('#light').hide();
              $('#dark').show();
          }
      });
      $('#dark').click(function() {
          $('#dark').hide();
          $('#light').show();

          $('body').toggleClass('dark-mode');
          localStorage['darkmode'] = 'light';
      });
      $('#light').click(function() {
          $('#light').hide();
          $('#dark').show();

          $('body').toggleClass('dark-mode');
          localStorage['darkmode'] = 'dark';
      });
  </script>

  <script>
      $(document).ready(function() {
          var msg = '{{ Session::get('alert') }}';
          if (msg == 'verified')
              $('#modaldemo4').modal("show");
          else
              $("#modaldemo4").modal("hide");
      });
  </script>
  <script>
      window.addEventListener('nottif', event => {
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
          })
          Toast.fire({
              icon: event.detail.type,
              title: event.detail.text,
          })
      })
  </script>
  <script>
      window.addEventListener('swal:modal', event => {
          new swal({
              title: event.detail.message,
              icon: event.detail.type,
          });
      });
  </script>
  <script>
      window.addEventListener('swal:confirmDelete', event => {
          new swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.isConfirmed) {
                  Livewire.emit(event.detail.fun);
              }
          })
      });
  </script>
  @yield('js')
  <!-- Simplebar JS -->
  <script src="{{ URL::asset('admin_assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <!-- Custom js-->
  <script src="{{ URL::asset('admin_assets/js/custom.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
