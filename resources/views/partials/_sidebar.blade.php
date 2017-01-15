
@include('partials._head')
<form role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
    </form>
    <ul class="nav menu">
      <li class="active"><a href={{url('/')}}><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
      <li><a href="{{url('pemeriksaan')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-table"></use></svg> Pemeriksaan</a></li>
      <li><a href="{{url('jadwal')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Jadwal </a></li>
      <li><a href="{{url('prediksi')}}"><svg class="glyph stroked table"><use xlink:href="#stroked-line-graph"></use></svg> Prediksi</a></li>
     {{--  <li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li>
      <li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li> --}}
      <li><a href="{{url('comment')}}"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"></use></svg> Comments</a></li> 
      <li><a href="{{url('article')}}"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Articles</a></li> 
      <li class="parent ">
        <a href="#">
          <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Data User
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li>
            <a class="" href="{{url('pasien')}}">
              <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>  Data Pasien
            </a>
          </li>
          <li>
            <a class="" href="{{url('dokter')}}">
              <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Data Dokter
            </a>
          </li>
          <li>
            <a class="" href="{{url('staff')}}">
              <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Data Staff
            </a>
          </li>
        </ul>
      </li>
      <li role="presentation" class="divider"></li>
      <li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout</a></li>
    </ul>