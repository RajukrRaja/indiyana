<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>FraudXpert AI - Payment</title>
  <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://js.stripe.com/v3/"></script>
  <style>
    body { 
      background: linear-gradient(135deg, #0a0f24 0%, #1a2a44 100%); 
      font-family: 'Poppins', sans-serif; 
      color: #ffffff; 
      margin: 0; 
      padding: 0; 
      overflow-x: hidden; 
    }

    /* Smooth transitions for inputs and buttons */
    input, .btn {
      transition: all 0.3s ease-in-out;
    }

    /* Responsive tweaks */
    @media (max-width: 768px) {
      .payment-section {
        padding: 30px 20px;
        margin: 30px 15px;
      }

      .payment-section h2 {
        font-size: 24px;
        text-align: center;
      }

      .form-control, #card-element {
        font-size: 14px;
      }

      .btn-neon {
        width: 100%;
        padding: 14px;
        font-size: 14px;
      }
    }

    /* Input placeholder style */
    input::placeholder {
      color: rgba(255, 255, 255, 0.4);
    }

    /* Glow on focus */
    input:focus, #card-element.StripeElement--focus {
      outline: none;
      box-shadow: 0 0 12px rgba(0, 247, 255, 0.6);
    }

    /* Stripe card input glow */
    .StripeElement {
      background: rgba(255, 255, 255, 0.05);
      padding: 10px 12px;
      border-radius: 8px;
      border: 1px solid rgba(0, 247, 255, 0.3);
      transition: border 0.3s ease;
      color: #fff;
    }

    .StripeElement--focus {
      border-color: #00f7ff;
    }

    /* Disabled button effect */
    .btn-neon:disabled {
      background: #444;
      color: #aaa;
      box-shadow: none;
      cursor: not-allowed;
    }

    /* Payment message animation */
    #payment-message {
      animation: fadeIn 0.5s ease-in-out;
      margin-top: 15px;
    }

    /* Enhancing success and error messages */
    .success,
    .error,
    .warning {
      padding: 15px;
      border-radius: 10px;
      font-weight: 600;
      margin-top: 20px;
      max-width: 90%;
      margin-left: auto;
      margin-right: auto;
    }

    /* Button pulse animation on hover */
    .btn-neon:hover {
      animation: pulseButton 1s infinite alternate;
    }

    @keyframes pulseButton {
      0% {
        box-shadow: 0 0 20px rgba(0, 247, 255, 0.6);
      }
      100% {
        box-shadow: 0 0 30px rgba(0, 247, 255, 0.9);
      }
    }

    .payment-section { 
      background: linear-gradient(45deg, rgba(10, 15, 36, 0.9), rgba(20, 30, 60, 0.8)); 
      border: 2px solid rgba(0, 247, 255, 0.6); 
      border-radius: 15px; 
      padding: 40px; 
      margin: 60px auto; 
      max-width: 650px; 
      box-shadow: 0 0 25px rgba(0, 247, 255, 0.3); 
      transition: all 0.4s ease-in-out; 
    }
    .payment-section:hover { 
      box-shadow: 0 0 40px rgba(0, 247, 255, 0.5); 
      transform: translateY(-8px); 
    }
    .payment-section h2 { 
      font-family: 'Exo 2', sans-serif; 
      font-size: 28px; 
      font-weight: 800; 
      color: #00f7ff; 
      text-transform: uppercase; 
      letter-spacing: 2px; 
      margin-bottom: 25px; 
      text-shadow: 0 0 15px rgba(0, 247, 255, 0.7); 
    }
    .form-label { 
      font-size: 14px; 
      font-weight: 600; 
      color: #00f7ff; 
      text-shadow: 0 0 5px rgba(0, 247, 255, 0.3); 
    }
    .form-control { 
      background: rgba(255, 255, 255, 0.05); 
      border: 1px solid rgba(0, 247, 255, 0.5); 
      color: #ffffff; 
      border-radius: 8px; 
      transition: all 0.3s ease; 
    }
    .form-control:focus { 
      border-color: #00f7ff; 
      box-shadow: 0 0 10px rgba(0, 247, 255, 0.7); 
      background: rgba(255, 255, 255, 0.1); 
    }
    .form-control.invalid { 
      border-color: #ff0000; 
      box-shadow: 0 0 10px rgba(255, 0, 0, 0.5); 
    }
    .btn-neon { 
      background: linear-gradient(45deg, #00f7ff, #00d4ff); 
      border: none; 
      color: #0a0f24; 
      font-weight: 600; 
      text-transform: uppercase; 
      letter-spacing: 1.5px; 
      padding: 12px 25px; 
      border-radius: 10px; 
      box-shadow: 0 0 20px rgba(0, 247, 255, 0.6); 
      transition: all 0.4s ease-in-out; 
    }
    .btn-neon:hover { 
      transform: scale(1.08); 
      box-shadow: 0 0 30px rgba(0, 247, 255, 0.9); 
      background: #ffffff; 
      color: #0a0f24; 
    }
    .btn-neon:disabled { 
      background: #666; 
      box-shadow: none; 
      cursor: not-allowed; 
    }
    #payment-message { 
      font-size: 16px; 
      padding: 10px; 
      border-radius: 5px; 
      text-align: center; 
      transition: all 0.3s ease; 
    }
    .success { 
      display: flex; 
      align-items: center; 
      justify-content: center; 
      width: 250px; 
      height: 250px; 
      background: #00ff88; 
      color: #ffffff; 
      border-radius: 50%; 
      box-shadow: 0 0 30px rgba(0, 255, 136, 0.7); 
      margin: 20px auto; 
      font-size: 20px; 
      font-weight: 600; 
      position: relative; 
      animation: fadeIn 0.5s ease-in-out; 
    }
    .success::before { 
      content: '\f00c'; 
      font-family: 'bootstrap-icons'; 
      font-size: 80px; 
      color: #ffffff; 
      position: absolute; 
      top: 50%; 
      left: 50%; 
      transform: translate(-50%, -50%); 
    }
    .success span { 
      position: relative; 
      z-index: 1; 
      margin-top: 60px; 
    }
    .error { 
      background: rgba(255, 0, 0, 0.2); 
      color: #ff0000; 
      box-shadow: 0 0 10px rgba(255, 0, 0, 0.3); 
    }
    .warning { 
      background: rgba(255, 215, 0, 0.2); 
      color: #ffd700; 
      box-shadow: 0 0 10px rgba(255, 215, 0, 0.3); 
    }
    .loading { 
      display: none; 
      position: absolute; 
      top: 50%; 
      left: 50%; 
      transform: translate(-50%, -50%); 
      width: 80px; 
      height: 80px; 
      border: 8px solid rgba(0, 247, 255, 0.3); 
      border-top: 8px solid #00f7ff; 
      border-left: 8px solid rgba(0, 247, 255, 0.6); 
      border-radius: 50%; 
      box-shadow: 0 0 30px rgba(0, 247, 255, 0.7); 
      animation: spin 1s ease-in-out infinite, pulse 1.5s infinite; 
    }
    @keyframes spin { 
      0% { transform: translate(-50%, -50%) rotate(0deg); } 
      100% { transform: translate(-50%, -50%) rotate(360deg); } 
    }
    @keyframes pulse { 
      0% { box-shadow: 0 0 30px rgba(0, 247, 255, 0.7); } 
      50% { box-shadow: 0 0 50px rgba(0, 247, 255, 0.9); } 
      100% { box-shadow: 0 0 30px rgba(0, 247, 255, 0.7); } 
    }
    @keyframes fadeIn { 
      0% { opacity: 0; transform: scale(0.8); } 
      100% { opacity: 1; transform: scale(1); } 
    }
  </style>
</head>
<body>
  <section class="payment-section" style="position: relative;">
    <h2>Make a Payment</h2>
    <form id="payment-form">
      <div class="mb-3">
        <label for="amount" class="form-label">Amount ($)</label>
        <input type="number" class="form-control" id="amount" name="amount" step="0.01" min="0.01" required>
      </div>
      <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control" id="location" name="location" value="New York, USA" required>
      </div>
      <div id="card-element" class="form-control p-2 mb-3"></div>
      <button type="submit" class="btn btn-neon" id="pay-button">Pay Now</button>
      <div id="payment-message" class="mt-3"><span></span></div>
    </form>
    <div id="loading" class="loading"></div>
  </section>

  <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const paymentForm = document.getElementById('payment-form');
    const paymentMessage = document.getElementById('payment-message');
    const payButton = document.getElementById('pay-button');
    const loadingSpinner = document.getElementById('loading');
    const amountInput = document.getElementById('amount');
    const locationInput = document.getElementById('location');

    paymentForm.addEventListener('submit', async (event) => {
      event.preventDefault();

      // Client-side validation
      if (amountInput.value <= 0) {
        amountInput.classList.add('invalid');
        paymentMessage.querySelector('span').textContent = 'Amount must be greater than 0.';
        paymentMessage.className = 'error';
        return;
      }
      if (!locationInput.value.trim()) {
        locationInput.classList.add('invalid');
        paymentMessage.querySelector('span').textContent = 'Location is required.';
        paymentMessage.className = 'error';
        return;
      }

      amountInput.classList.remove('invalid');
      locationInput.classList.remove('invalid');

      payButton.disabled = true;
      loadingSpinner.style.display = 'block';
      paymentMessage.querySelector('span').textContent = 'Checking transaction...';
      paymentMessage.className = '';

      const amount = amountInput.value;
      const location = locationInput.value;

      try {
        // Step 1: Process payment
        const response = await fetch('{{ route("payment.process") }}', {
          method: 'POST',
          headers: { 
            'Content-Type': 'application/json', 
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: JSON.stringify({ amount, location })
        });

        if (!response.ok) {
          throw new Error(`Server error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();

        if (data.redirect) {
          paymentMessage.querySelector('span').textContent = `Suspicious activity detected. Amount: $${amount}, Location: ${location}. Redirecting...`;
          paymentMessage.className = 'warning';
          setTimeout(() => window.location.href = data.redirect, 2000);
          return;
        }

        if (!data.client_secret || !data.transaction_id) {
          throw new Error('Missing client_secret or transaction_id from server response');
        }

        // Step 2: Confirm payment with Stripe
        const { error, paymentIntent } = await stripe.confirmCardPayment(data.client_secret, {
          payment_method: { card: cardElement }
        });

        if (error) {
          paymentMessage.querySelector('span').textContent = error.message;
          paymentMessage.className = 'error';
        } else {
          paymentMessage.querySelector('span').textContent = 'Payment successful! Finalizing...';
          paymentMessage.className = 'success';

          // Step 3: Confirm payment with backend
          const confirmResponse = await fetch('{{ route("payment.confirm") }}', {
            method: 'POST',
            headers: { 
              'Content-Type': 'application/json', 
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Accept': 'application/json'
            },
            body: JSON.stringify({ transaction_id: data.transaction_id })
          });

          if (!confirmResponse.ok) {
            throw new Error(`Failed to confirm payment: ${confirmResponse.status} - ${confirmResponse.statusText}`);
          }

          const confirmData = await confirmResponse.json();
          paymentMessage.querySelector('span').textContent = confirmData.message || 'Payment confirmed successfully!';
          paymentMessage.className = 'success';
          setTimeout(() => window.location.href = '{{ route("dashboard") }}', 2000);
        }
      } catch (err) {
        paymentMessage.querySelector('span').textContent = data?.error ? data.error : `Error: ${err.message}. Please try again or contact support.`;
        paymentMessage.className = 'error';
        console.error('Payment Error:', err);
      } finally {
        payButton.disabled = false;
        loadingSpinner.style.display = 'none';
      }
    });

    [amountInput, locationInput].forEach(input => {
      input.addEventListener('input', () => {
        input.classList.remove('invalid');
        paymentMessage.querySelector('span').textContent = '';
        paymentMessage.className = '';
      });
    });
  </script>
</body>
</html>