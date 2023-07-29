		<!--dodavanje resursa-->
		<?php
		//primjer ubacivanja template-a
		include('templates/footer.php');
		?>
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/scripts.js" type="module"></script>
		<!--dodavanje resursa-->
		<script>
			//validacija kontakt forme
			// $('#contact-form').validator();
			$('#contact-form').on('submit', function(e) {
				// e.preventDefault();
				if (e.isDefaultPrevented()) {
					// handle the invalid form...
				} else {
					grecaptcha.ready(function() {
						grecaptcha.execute('6LdKF0YjAAAAAPh5asW9ZV3IZMxTOnxs6QdXXvhJ', {
							action: 'submit'
						}).then(function(token) { //upisati odgovarajuci site key
							var recaptchaResponse = document.getElementById('recaptchaResponse');
							recaptchaResponse.value = token;
							console.log($('#contact-form').serialize());
							// Making the simple AJAX call to capture the data and submit
							$.ajax({
								url: './includes/mailer.php',
								type: 'post',
								data: $('#contact-form').serialize(),
								dataType: 'json',
								success: function(response) {
									//console.log('succes');
									console.log(response);
									$("#contact-form")[0].reset();
									var error = response.error;
									var success = response.success;
									if (error != "") {
										$('#contact-form .messages').html(error);
										$('#contact-form .messages').addClass('error-msg');
									}

								 setTimeout(function(){
										window.open("thank-you-page.php", "_parent");
									 }, 200)
								},
								error: function(jqXhr, json, errorThrown) {
									console.log('error');
									var error = jqXhr.responseText;
									$('#contact-form .messages').html(error);
								    $('#contact-form .messages').addClass('error-msg');
							}});
						});
					});
				}
			});

			//Prevent the default form submission
			$('form').submit(function(event) {
				event.preventDefault();
			});
		</script>
		</body>
		</html>