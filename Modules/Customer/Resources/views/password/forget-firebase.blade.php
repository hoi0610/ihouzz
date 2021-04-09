@extends('customer::layouts.login-wap')

@section('content')
    <main class="page-login">
        <div class="container" id="phone_input">
            <div class="content-login">
                @include('customer::includes.header-login')

                <div id="sign-in-form">
                    @csrf
                    <div class="form-login">
                        @if(session()->has('message'))
                            <div class="alert alert-warning" style="text-align: center">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <i class="fas fa-user-alt left-icon"></i>
                            <input id="phone-number" name="phone" type="text" class="form-control"
                                   placeholder="{{__('customer.phone_email_input')}}" required autofocus>
                            @if ($errors->has('phone'))
                                <label class="error" for="phone">{{ $errors->first('phone') }}</label>
                            @endif
                        </div>

                        <button id="sign-in-button" type="button" class="btn btn-primary">{!! __('passwords.retrieval') !!}</button>
                    </div>
                </div>
            </div>

            <p class="fix-bottom">{!! __('customer.have_account', ['link' => route('login')]) !!}
                <br>
                <br>
                {!! __('customer.not_account', ['link' => route('register.index')]) !!}</p>
        </div>

        <div id="otp_input" class="container" style="display: none;">
            <div class="content-login otp-content">
                @include('customer::includes.header-login')
                <?php
                $user = auth()->user();
                ?>
                <p>{!! __('common.input_otp') !!}</p>
                <strong class="phone">{{$user['phone']??''}}</strong>
                <form id="verification-code-form" action="" method="post" class="form-horizontal">
                    <div class="form-login">
                        <div class="form-group">
                            <input class="form-control inputs" name="otp[0]" type="number" maxlength="1">
                            <input class="form-control inputs" name="otp[1]" type="number" maxlength="1">
                            <input class="form-control inputs" name="otp[2]" type="number" maxlength="1">
                            <input class="form-control inputs" name="otp[3]" type="number" maxlength="1">
                            <input class="form-control inputs" name="otp[4]" type="number" maxlength="1">
                            <input class="form-control inputs" name="otp[5]" type="number" maxlength="1">
                        </div>
                        <input type="hidden" id="verification-code">
                        <p>{!! __('common.not_yet_receiving_otp') !!} <a href="#" id="cancel-verify-code-button" class="btn-resend-otp">{!! __('common.resend') !!}</a></p>
                    </div>
                    <button type="submit" id="verify-code-button" class="btn btn-primary">{!! __('common.continue') !!}</button>
                </form>
            </div>
        </div>

        <!-- Button that handles sign-out -->
        <button class="mdl-button mdl-js-button mdl-button--raised" id="sign-out-button" style="display: none;">Sign-out</button>
        <!-- Container for the sign in status and user info -->
        <div style="display: none;" id="user-details-card" class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
            <div class="mdl-card__title mdl-color--light-blue-600 mdl-color-text--white">
                <h2 class="mdl-card__title-text">User sign-in status</h2>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                <!-- Container where we'll display the user details -->
                <div class="user-details-container">
                    Firebase sign-in status: <span id="sign-in-status">Unknown</span>
                    <div>Firebase auth <code>currentUser</code> object value:</div>
                    <pre><code id="account-details">null</code></pre>
                </div>
            </div>
        </div>
    </main>
@stop

@section('after_scripts')
    <script type="text/javascript">

        /**
         * Set up UI event listeners and registering Firebase auth listeners.
         */
        window.onload = function() {
            // Listening for auth state changes.
            firebase.auth().onAuthStateChanged(function(user) {
                if (user) {
                    // User is signed in.
                    var uid = user.uid;
                    var email = user.email;
                    var photoURL = user.photoURL;
                    var phoneNumber = user.phoneNumber;
                    var isAnonymous = user.isAnonymous;
                    var displayName = user.displayName;
                    var providerData = user.providerData;
                    var emailVerified = user.emailVerified;
                }
                updateSignInButtonUI();
                updateSignInFormUI();
                updateSignOutButtonUI();
                updateSignedInUserStatusUI();
                updateVerificationCodeFormUI();
            });

            // Event bindings.
            document.getElementById('sign-out-button').addEventListener('click', onSignOutClick);
            document.getElementById('phone-number').addEventListener('keyup', updateSignInButtonUI);
            document.getElementById('phone-number').addEventListener('change', updateSignInButtonUI);
            document.getElementById('verification-code').addEventListener('keyup', updateVerifyCodeButtonUI);
            document.getElementById('verification-code').addEventListener('change', updateVerifyCodeButtonUI);
            document.getElementById('verification-code-form').addEventListener('submit', onVerifyCodeSubmit);
            document.getElementById('cancel-verify-code-button').addEventListener('click', cancelVerification);

            // [START appVerifier]
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
                'size': 'invisible',
                'callback': function(response) {
                    // reCAPTCHA solved, allow signInWithPhoneNumber.
                    onSignInSubmit();
                }
            });
            // [END appVerifier]

            recaptchaVerifier.render().then(function(widgetId) {
                window.recaptchaWidgetId = widgetId;
                updateSignInButtonUI();
            });

            $('.inputs').on('change', function () {
                var tmp = '';
                $( ".inputs" ).each(function( index ) {
                    tmp += $( this ).val();
                });
                $('#verification-code').val(tmp).trigger('change');
                updateVerifyCodeButtonUI();
            });
        };

        /**
         * Function called when clicking the Login/Logout button.
         */
        function onSignInSubmit() {
            if (isPhoneNumberValid()) {
                window.signingIn = true;
                updateSignInButtonUI();
                var phoneNumber = getPhoneNumberFromUserInput();
                var appVerifier = window.recaptchaVerifier;
                firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                    .then(function (confirmationResult) {
                        // SMS sent. Prompt user to type the code from the message, then sign the
                        // user in with confirmationResult.confirm(code).
                        window.confirmationResult = confirmationResult;
                        window.signingIn = false;
                        updateSignInButtonUI();
                        updateVerificationCodeFormUI();
                        updateVerifyCodeButtonUI();
                        updateSignInFormUI();
                    }).catch(function (error) {
                    // Error; SMS not sent
                    console.error('Error during signInWithPhoneNumber', error);
                    window.alert('Error during signInWithPhoneNumber:\n\n'
                        + error.code + '\n\n' + error.message);
                    window.signingIn = false;
                    updateSignInFormUI();
                    updateSignInButtonUI();
                });
            }
        }

        /**
         * Function called when clicking the "Verify Code" button.
         */
        function onVerifyCodeSubmit(e) {
            e.preventDefault();
            // custom
            var flag = 0;
            $('.form-control.inputs').each(function( index ) {
                if($( this ).val()=='') {
                    $( this ).focus();
                    flag = 1;
                    return false;
                }
            });
            if (flag) {
                return false;
            }
            // end custom

            if (!!getCodeFromUserInput()) {
                window.verifyingCode = true;
                updateVerifyCodeButtonUI();
                var code = getCodeFromUserInput();
                confirmationResult.confirm(code).then(function (result) {
                    // User signed in successfully.
                    var user = result.user;
                    window.verifyingCode = false;
                    window.confirmationResult = null;
                    updateVerificationCodeFormUI();
                }).catch(function (error) {
                    // User couldn't sign in (bad verification code?)
                    console.error('Error while checking the verification code', error);
                    window.alert('Error while checking the verification code:\n\n'
                        + error.code + '\n\n' + error.message);
                    window.verifyingCode = false;
                    updateSignInButtonUI();
                    updateVerifyCodeButtonUI();
                });
            }
        }

        /**
         * Cancels the verification code input.
         */
        function cancelVerification(e) {
            e.preventDefault();
            window.confirmationResult = null;
            updateVerificationCodeFormUI();
            updateSignInFormUI();
        }

        /**
         * Signs out the user when the sign-out button is clicked.
         */
        function onSignOutClick() {
            firebase.auth().signOut();
        }

        /**
         * Reads the verification code from the user input.
         */
        function getCodeFromUserInput() {
            return document.getElementById('verification-code').value;
        }

        /**
         * Reads the phone number from the user input.
         */
        function getPhoneNumberFromUserInput() {
            return document.getElementById('phone-number').value;
        }

        /**
         * Returns true if the phone number is valid.
         */
        function isPhoneNumberValid() {
            var pattern = /^\+[0-9\s\-\(\)]+$/;
            var phoneNumber = getPhoneNumberFromUserInput();
            var tmp = phoneNumber.search(pattern) !== -1;
            return tmp;
        }

        /**
         * Re-initializes the ReCaptacha widget.
         */
        function resetReCaptcha() {
            if (typeof grecaptcha !== 'undefined'
                && typeof window.recaptchaWidgetId !== 'undefined') {
                grecaptcha.reset(window.recaptchaWidgetId);
            }
        }

        /**
         * Updates the Sign-in button state depending on ReCAptcha and form values state.
         */
        function updateSignInButtonUI() {
            document.getElementById('sign-in-button').disabled =
                !isPhoneNumberValid()
                || !!window.signingIn;
        }

        /**
         * Updates the Verify-code button state depending on form values state.
         */
        function updateVerifyCodeButtonUI() {
            document.getElementById('verify-code-button').disabled =
                !!window.verifyingCode
                || !getCodeFromUserInput();
        }

        /**
         * Updates the state of the Sign-in form.
         */
        function updateSignInFormUI() {
            if (firebase.auth().currentUser || window.confirmationResult) {
                // document.getElementById('sign-in-form').style.display = 'none';
                document.getElementById('phone_input').style.display = 'none';
            } else {
                resetReCaptcha();
                // document.getElementById('sign-in-form').style.display = 'block';
                document.getElementById('phone_input').style.display = 'block';
            }
        }

        /**
         * Updates the state of the Verify code form.
         */
        function updateVerificationCodeFormUI() {
            if (!firebase.auth().currentUser && window.confirmationResult) {
                // document.getElementById('verification-code-form').style.display = 'block';
                document.getElementById('otp_input').style.display = 'block';
                var phoneNumber = getPhoneNumberFromUserInput();
                $('#otp_input .phone').html(phoneNumber);
            } else {
                // document.getElementById('verification-code-form').style.display = 'none';
                document.getElementById('otp_input').style.display = 'none';
            }
        }

        /**
         * Updates the state of the Sign out button.
         */
        function updateSignOutButtonUI() {
            if (firebase.auth().currentUser) {
                // document.getElementById('sign-out-button').style.display = 'block';
            } else {
                // document.getElementById('sign-out-button').style.display = 'none';
            }
        }

        /**
         * Updates the Signed in user status panel.
         */
        function updateSignedInUserStatusUI() {
            var user = firebase.auth().currentUser;
            if (user) {
                firebase.auth().currentUser.getIdToken().then(function(idToken) {
                    location.href = '{{route('password.reset-via-phone')}}?id-token='+idToken;
                }).catch(function(error) {
                    console.log(error+'--'); // Nothing
                });
                // document.getElementById('sign-in-status').textContent = 'Signed in';
                // document.getElementById('account-details').textContent = JSON.stringify(user, null, '  ');
            } else {
                // document.getElementById('sign-in-status').textContent = 'Signed out';
                // document.getElementById('account-details').textContent = 'null';
            }
        }
    </script>
@stop
