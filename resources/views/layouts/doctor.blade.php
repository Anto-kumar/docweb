  <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @foreach($doctor as $doctors)
        <div class="item">
        <div class="card-doctor">
                <div class="header">
                    <img src="../assets/img/doctors/doctor_1.jpg" alt="">
                    <div class="meta">
                        <a href="#"><span class="mai-call"></span></a>
                        <a href="#"><span class="mai-logo-whatsapp"></span></a>
                    </div>
                </div>
                <div class="body" style="background-color: lightblue;">
                    <p class="text-xl mb-0">Dr.  {{$doctors->name}}</p>
                    <span class="text-sm text-grey">Specialist : {{$doctors->speciality}}</span>
                    <p class="text-sm text-grey">Phone : {{$doctors->phone}}</p>
                </div>
            </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>