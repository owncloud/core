$(function () {
	// Pass the auth token with any request
	$.ajaxSetup({
		headers: {'X-Updater-Auth': loginToken}
	});

	
	$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
		//disallow requests that don't match endpoint
		var endpoint = $('#meta-information').data('endpoint');
		if (endpoint && originalOptions.url.match(endpoint)===null){
			jqXHR.abort();
		}
	});

	// Setup a global AJAX error handler
	$(document).ajaxError(
			function (event, xhr, options, thrownError) {
				$('#error').text('Server error '
						+ xhr.status
						+ ': '
						+ xhr.statusText
						+ "\n"
						+ 'Message: '
						+ thrownError
						+ 'See your webserver logs for details.'

						).show();
			}
	);

	var accordion = {
		setCurrent: function (stepId) {
			$('#progress .step').removeClass('current-step');
			if (typeof stepId !== 'undefined') {
				$(stepId).addClass('current-step')
					.removeClass('passed-step')
					.removeClass('failed-step');
			}
		},
		setDone: function (stepId) {
			$(stepId).removeClass('current-step')
					.removeClass('failed-step')
					.addClass('passed-step');
		},
		setFailed: function (stepId) {
			$(stepId).removeClass('current-step')
					.removeClass('passed-step')
					.addClass('failed-step');
		},
		setContent: function (stepId, content, append) {
			var oldContent;
			if (typeof append !== 'undefined' && append) {
				oldContent = $(stepId).find('.output').html();
			} else {
				oldContent = '';
			}
			$(stepId).find('.output').html(oldContent + content);
		},
		showContent: function (stepId) {
			$(stepId).find('.output').show();
		},
		hideContent: function (stepId) {
			$(stepId).find('.output').hide();
		},
		toggleContent: function (stepId) {
			$(stepId).find('.output').toggle();
		}
	},
	handleResponse = function (response, callback, node) {
		if (typeof node === 'undefined') {
			if (response.error_code !== 0) {
				node.text('Error ' + response.error_code).show();
			} else {
				$('#error').hide();
			}
			$('#output').html($('#output').html() + response.output).show();
		} else {
			accordion.setContent(node, response.output);
			if (response.error_code !== 0) {
				accordion.showContent(node);
				accordion.setFailed(node);
			} else {
				accordion.hideContent(node);
				accordion.setDone(node);
			}
		}
		if (typeof callback === 'function') {
			callback();
		}
	},
			init = function () {
				accordion.setCurrent('#step-init');
				$.post($('#meta-information').data('endpoint'), {command: 'upgrade:detect --only-check --exit-if-none'})
						.then(function (response) {
							handleResponse(
								response, 
								function () {
									accordion.showContent('#step-init');
								}, 
								'#step-init'
							);
							accordion.setDone('#step-init');
							accordion.setCurrent();
							if (!response.error_code) {
								accordion.setContent('#step-init', '<button id="start-upgrade" class="button">Start</button>', true);
							} else {
								accordion.setContent('#step-init', '<button id="recheck" class="button">Recheck</button>', true);
							}
							
						});
			};

	//setup handlers
	$(document).on('click', '#create-checkpoint', function () {
		$(this).attr('disabled', true);
		$.post(
				$('#meta-information').data('endpoint'),
				{
					command: 'upgrade:checkpoint --create'
				},
				function (response) {
					$('#create-checkpoint').attr('disabled', false);
					handleResponse(response);
				}
		);
	});

	$(document).on('click', '#progress h2', function () {
		if ($(this).parent('li').hasClass('passed-step')) {
			accordion.toggleContent('#' + $(this).parent('li').attr('id'));
		}
	});

	$(document).on('click', '#start-upgrade', function () {
		$('#output').html('');
		$(this).attr('disabled', true);
		accordion.setCurrent('#step-check');
		$.post($('#meta-information').data('endpoint'), {command: 'upgrade:checkSystem'})
				.then(function (response) {
					if (response.error_code === 0){
						accordion.setCurrent('#step-checkpoint');
					}
					handleResponse(response, function () {}, '#step-check');
					return response.error_code === 0
							? $.post($('#meta-information').data('endpoint'), {command: 'upgrade:checkpoint --create'})
							: $.Deferred()
							;
				})
				.then(function (response) {
					if (response.error_code === 0){
						accordion.setCurrent('#step-download');
					}
					handleResponse(response, function () {}, '#step-checkpoint');
					return response.error_code === 0
							? $.post($('#meta-information').data('endpoint'), {command: 'upgrade:detect'})
							: $.Deferred()
							;
				})
				.then(function (response) {
					if (response.error_code === 0){
						accordion.setCurrent('#step-coreupgrade');
					}
					handleResponse(response, function () {}, '#step-download');
					return response.error_code === 0
							? $.post($('#meta-information').data('endpoint'), {command: 'upgrade:executeCoreUpgradeScripts'})
							: $.Deferred()
							;
				})
				.then(function (response) {
					handleResponse(
						response,
						function () {
							accordion.showContent('#step-coreupgrade');
						}, 
						'#step-coreupgrade'
					);
					return response.error_code === 0
							? accordion.setCurrent('#step-coreupgrade')
							  || $.post($('#meta-information').data('endpoint'), {command: 'upgrade:executeCoreUpgradeScripts'})
							: $.Deferred()
							;
				})
				.then(function (response) {
					if (response.error_code === 0){
						accordion.setCurrent('#step-finalize');
					}
					handleResponse(response, function () {}, '#step-appupgrade');
					return response.error_code === 0
							? $.post($('#meta-information').data('endpoint'), {command: 'upgrade:restartWebServer'})
							: $.Deferred()
							;
				})
				.then(function (response) {
					handleResponse(
						response, 
						function () {
							accordion.showContent('#step-finalize');
						},
						'#step-finalize'
					);
					return (response.error_code === 0
							?  accordion.setCurrent('#step-finalize')
							  || $.post($('#meta-information').data('endpoint'), {command: 'upgrade:postUpgradeCleanup'})
							: $.Deferred()
					);
				})
				.then(function (response) {
					handleResponse(response, function () {}, '#step-finalize');
					if (response.error_code === 0){
						accordion.setDone('#step-done');
						accordion.setContent('#step-done', 'All done! Redirecting you to your ownCloud.');
						accordion.showContent('#step-done');
						setTimeout(
							function(){
								window.location.href = $('#meta-information').data('endpoint').replace(/\/updater\/.*$/, '');
							},
							3000
						);
					}
				});
	});

	$(document).on('click', '#recheck', init);
	init();
});
