@extends('layout.index')
@section('content')
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(http://127.0.0.1:8000/introducts/store.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Liên hệ</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact</span></p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section contact-section">
  <div class="container mt-5">
    <div class="row block-9">
      <div class="col-md-4 contact-info ftco-animate">
        <div class="row">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Thông tin liên hệ</h2>
          </div>
          <div class="col-md-12 mb-3">
            <p><span>Địa chỉ:</span> 75 Nguyễn Thị Minh Khai, Tân Lập, Thành phố Nha Trang, Khánh Hòa</p>
          </div>
          <div class="col-md-12 mb-3">
            <p><span>Điện thoại:</span> <a href="tel://1234567920">+ 908 046 188</a></p>
          </div>
          <div class="col-md-12 mb-3">
            <p><span>Email:</span> <a href="mailto:leotea@gmail.com">leotea@gmail.com</a></p>
          </div>
          <div class="col-md-12 mb-3">
            <p><span>Facebook:</span> <a href="https://www.facebook.com/trasualeotea/">leotea@gmail.com</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6 ftco-animate">
        <form action="#" class="contact-form">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Họ và tên">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Điện thoại">
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Chủ đề">
          </div>
          <div class="form-group">
            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Nội dung"></textarea>
          </div>
          <div class="form-group">
            <input="submit" value="Send Message" class="btn btn-primary py-3 px-5"><a href="leotea@gmail.com">Gửi đến chúng tôi</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container mt-5">
    <div class="row block-9">
      <div class="col-md-4 contact-info ftco-animate">
          <h3><span class="glyphicon glyphicon-globe"></span><h2 class="mb-4 text-center">Leo Tea</h2></h3>
          <div class="break"></div><br>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.153509434048!2d109.1888222141283!3d12.23788333386488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3170670b8914cf27%3A0x3c1ccc0758047b5c!2zNzUgTmd1eeG7hW4gVGjhu4sgTWluaCBLaGFpLCBUw6JuIEzhuq1wLCBUaMOgbmggcGjhu5EgTmhhIFRyYW5nLCBLaMOhbmggSMOyYSA2NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1638462070452!5m2!1svi!2s" width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
    </div>
  </div>
</section>

@endsection
