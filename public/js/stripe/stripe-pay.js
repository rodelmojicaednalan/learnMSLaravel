

// Create a Stripe client.
var stripe = Stripe('pk_test_51IzeWbBz3qaztAjwgWpEIbFm4J6xaCFjA5RagQIcCuN18Brs8BQKvMpYwyo9GAcnODAUPvuoGPq1EELS0eav4L7L00krhf9Wgx');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    padding: '20px',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    },
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
// var button = document.getElementById('donate-btn');

form.addEventListener('submit', function(event) {
  event.preventDefault();
    console.log('event', event)
  $('#donate-btn').attr('disabled', true);

  stripe.createToken(card).then(function(result) {
      console.log(result.error);
    if (result.error) {
      $('#donate-btn').removeAttr('disabled');

      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);

    }
  });
  console.log('After createToken');
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {

    // Insert the token ID into the form so it gets submitted to the server
    $('#stripeToken').val(token.id)

    var formData = $('#payment-form').serialize();

    jQuery.ajax({
        url: $('#payment-form').data('url'),
        type: "POST",
        data: formData,
        success: function(res) {
            console.log(res)
            alert(res.message)
            if(res) {
                window.location.href = res.return_url;
            }
        },
        error: function(err) {
            alert(data.responseJSON.message)
            window.location.href = res.return_url;
        }
    });
}
