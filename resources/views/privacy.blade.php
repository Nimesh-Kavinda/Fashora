@extends('layouts.app')

@section('content')

<main class="pt-90">
  <div class="mb-4 pb-4"></div>

  <section class="contact-us container">
    <div class="mw-930 text-center">
      <h2 class="page-title">Privacy Policy</h2>
    </div>
  </section>

  <div class="container mb-4">
    <div class="text-center">
      <img src="{{ asset('assets/images/privacy/privacy_banner.png') }}" alt="Privacy Policy Banner" class="img-fluid rounded shadow-md" style="height: 100px; width 100px; object-fit: cover;">
    </div>
  </div>

  <div class="mb-2 pb-4"></div>

  <section class="container mw-930 lh-30">
    <h3 class="mb-4">Privacy Policy</h3>
    <hr>

    <p>At <strong>Fashora</strong>, your privacy is important to us. This Privacy Policy outlines how we collect, use, and protect your personal information when you interact with our website.</p>

    <h5 class="mt-4">1. Information We Collect</h5>
    <ul>
      <li>Personal data such as your name, email address, shipping address, and phone number during registration or checkout.</li>
      <li>Payment and billing information for order processing.</li>
      <li>Usage data including browsing behavior and preferences through cookies and analytics tools.</li>
    </ul>

    <h5 class="mt-4">2. How We Use Your Information</h5>
    <ul>
      <li>To process and fulfill your orders.</li>
      <li>To provide customer service and support.</li>
      <li>To send promotional offers and product updates, if you opt in.</li>
      <li>To enhance your shopping experience through personalization.</li>
    </ul>

    <h5 class="mt-4">3. Data Protection</h5>
    <p>We implement appropriate security measures to safeguard your information from unauthorized access, alteration, or disclosure. Sensitive data such as payment details are encrypted and processed through secure third-party services.</p>

    <h5 class="mt-4">4. Sharing of Information</h5>
    <p>We do not sell or rent your personal information. We may share necessary data with trusted service providers (such as shipping partners and payment gateways) strictly for operational purposes.</p>

    <h5 class="mt-4">5. Use of Cookies</h5>
    <p>Our website uses cookies to improve your browsing experience, analyze site traffic, and personalize content. You can manage cookie preferences through your browser settings.</p>

    <h5 class="mt-4">6. Currency & Transactions</h5>
    <p>All transactions on <strong>Fashora</strong> are conducted in <strong>Sri Lankan Rupees (LKR)</strong>. We currently support payments only in LKR, and prices displayed on the site reflect this currency.</p>

    <h5 class="mt-4">7. Changes to This Policy</h5>
    <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with the revised date at the top. Continued use of our website implies acceptance of the updated policy.</p>

    <h5 class="mt-4">8. Contact Us</h5>
    <p>If you have any questions about our privacy practices, please contact us through our official support page or email us at <span class="fw-bold">fashoraclothsoutlet@gmail.com.</span></p>
  </section>
</main>



@endsection