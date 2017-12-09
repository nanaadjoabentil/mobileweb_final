function sms()
{
  firebase.auth().languageCode = 'it';

  window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');

  var phoneNumber = getPhoneNumberFromUserInput();
  var appVerifier = window.recaptchaVerifier;
  firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
      .then(function (confirmationResult) {
        // SMS sent. Prompt user to type the code from the message, then sign the
        // user in with confirmationResult.confirm(code).
        window.confirmationResult = confirmationResult;
      }).catch(function (error) {
        // Error; SMS not sent
        // ...
      });

  //If signInWithPhoneNumber results in an error, reset the reCAPTCHA so the user can try again:
  grecaptcha.reset(window.recaptchaWidgetId);

  // Or, if you haven't stored the widget ID:
  window.recaptchaVerifier.render().then(function(widgetId) {
    grecaptcha.reset(widgetId);
  }


  //sign in the user by passing the code to the confirm method of the ConfirmationResult object
  //that was passed to signInWithPhoneNumber's fulfillment handler (that is, its then block)

  var code = getCodeFromUserInput();
  confirmationResult.confirm(code).then(function (result) {
    // User signed in successfully.
    var user = result.user;
    // ...
  }).catch(function (error) {
    // User couldn't sign in (bad verification code?)
    // ...
  });

  //sign out a user
  firebase.auth().signOut().then(function() {
    // Sign-out successful.
  }).catch(function(error) {
    // An error happened.
  });

}
