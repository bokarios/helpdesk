<div class="sidebar">
  <div class="avatar">
      <div class="profile">
          {{-- <img src="{{ asset('demo/img/avatar/hero.jpg') }}" alt=""> --}}
          <img src="{{ asset(Auth::user()->avatar) }}" alt="oops">
      </div>

      <h6>
          {{ Auth::user()->first_name }}
      </h6>
      <div class="sidebar-links">
          <ul>
              <li>
                  <a href="#">
                      <i class="far fa-edit"></i>
                      الشكاوي الحالية
                  </a>
              </li>

              <li>
                  <a href="#">
                      <i class="far fa-tasks"></i>
                      الشكاوي المفتوحة
                  </a>
              </li>


              <li>
                  <a href="#">
                      <i class="far fa-archive"></i>
                      الشكاوي القديمة
                  </a>
              </li>


          </ul>
      </div>
  </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#sidebar-toggler').addClass('opened')
        });

        $('#sidebar-toggler').on('click', function() {
            if($(this).hasClass('opened')) {
                // console.log('opened')
                $(this).removeClass('opened').addClass('closed')
                $('.sidebar').css('margin-right', '-200px')
            } else {
                // console.log('closed')
                $(this).removeClass('closed').addClass('opened')
                $('.sidebar').css('margin-right', '0px')
            }
        });
    </script>
@endsection