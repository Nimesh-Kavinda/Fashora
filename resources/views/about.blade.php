@extends('layouts.app')

@section('content')

 <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
      <div class="mw-930">
        <h2 class="page-title">About US</h2>
      </div>

      <div class="about-us__content pb-5 mb-5">
        <p class="mb-5">
          <img loading="lazy" class="w-100 h-auto d-block" src="{{ asset('assets/images/about/about.jpg') }}" width="1410"
            height="550" alt="" />
        </p>
        <div class="mw-930">
              <h3 class="mb-4">OUR STORY</h3>
              <p class="fs-6 fw-medium mb-4">Fashora was born from a passion for fashion and a love for Sri Lankan culture. We aim to blend modern trends with timeless elegance, offering customers a one-stop destination for stylish clothing that reflects both personality and heritage.</p>
              <p class="mb-4">Rooted in the vibrant heart of Sri Lanka, Fashora began as a small dream to make fashion more accessible and inspiring for everyone. With a curated collection of handpicked pieces,
                 we empower individuals to express themselves confidently. Our journey has just begun, and each design we release carries a story of creativity, culture, and care. At Fashora, fashion is more than style—it's identity, purpose, and passion woven into every thread.</p>
              <div class="row mb-3">
                <div class="col-md-6">
                  <h5 class="mb-3">Our Mission</h5>
                  <p class="mb-3">To redefine fashion in Sri Lanka by offering high-quality, trendy, and affordable clothing that inspires confidence and celebrates individuality.</p>
                </div>
                <div class="col-md-6">
                  <h5 class="mb-3">Our Vision</h5>
                  <p class="mb-3">To become the leading online fashion destination in Sri Lanka, known for innovation, sustainability, and a strong connection with our customers.</p>
                </div>
              </div>
            </div>
        <div class="mw-930 d-lg-flex align-items-lg-center">
          <div class="image-wrapper col-lg-6">
            <img class="h-auto" loading="lazy" src="{{ asset('assets/images/about/about.jpg') }}" width="450" height="500" alt="">
          </div>
          <div class="content-wrapper col-lg-6 px-lg-4">
            <h5 class="mb-3">The Company</h5>
            <p>Fashora is a proudly Sri Lankan online fashion brand dedicated to bringing contemporary style to everyday wear. From casual essentials to elegant statement pieces, 
               we provide carefully selected collections that cater to every personality and occasion. Our team combines creativity, quality, and affordability to offer clothing that inspires confidence and self-expression. With a strong digital presence and customer-first mindset, Fashora continues to grow as a trusted name in the local fashion industry.</p>
          </div>
        </div>
      </div>
    </section>


  </main>

@endsection