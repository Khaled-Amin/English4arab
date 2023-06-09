/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/complete.js":
/*!*************************************************************************************************!*\
  !*** ../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/complete.js ***!
  \*************************************************************************************************/
/***/ ((module) => {

"use strict";


// Class definition
var KTModalOfferADealComplete = function () {
	// Variables
	var startButton;
	var form;
	var stepper;

	// Private functions
	var handleForm = function() {
		startButton.addEventListener('click', function () {
			stepper.goTo(1);
		});
	}

	return {
		// Public functions
		init: function () {
			form = KTModalOfferADeal.getForm();
			stepper = KTModalOfferADeal.getStepperObj();
			startButton = KTModalOfferADeal.getStepper().querySelector('[data-kt-element="complete-start"]');

			handleForm();
		}
	};
}();

// Webpack support
if ( true && typeof module.exports !== 'undefined') {
	module.exports = KTModalOfferADealComplete;
}

/***/ }),

/***/ "../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/details.js":
/*!************************************************************************************************!*\
  !*** ../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/details.js ***!
  \************************************************************************************************/
/***/ ((module) => {

"use strict";


// Class definition
var KTModalOfferADealDetails = function () {
	// Variables
	var nextButton;
	var previousButton;
	var validator;
	var form;
	var stepper;

	// Private functions
	var initForm = function() {
		// Due date. For more info, please visit the official plugin site: https://flatpickr.js.org/
		var dueDate = $(form.querySelector('[name="details_activation_date"]'));
		dueDate.flatpickr({
			enableTime: true,
			dateFormat: "d, M Y, H:i",
		});

		// Expiry year. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="details_customer"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('details_customer');
        });
	}

	var initValidation = function() {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'details_customer': {
						validators: {
							notEmpty: {
								message: 'Customer is required'
							}
						}
					},
					'details_title': {
						validators: {
							notEmpty: {
								message: 'Deal title is required'
							}
						}
					},					
					'details_activation_date': {
						validators: {
							notEmpty: {
								message: 'Activation date is required'
							}
						}
					},
					'details_notifications[]': {
						validators: {
							notEmpty: {
								message: 'Notifications are required'
							}
						}
					}
				},
				
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);
	}

	var handleForm = function() {
		nextButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Disable button to avoid multiple click 
			nextButton.disabled = true;

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						// Show loading indication
						nextButton.setAttribute('data-kt-indicator', 'on');

						// Simulate form submission
						setTimeout(function() {
							// Simulate form submission
							nextButton.removeAttribute('data-kt-indicator');

							// Enable button
							nextButton.disabled = false;
							
							// Go to next step
							stepper.goNext();
						}, 1500);   						
					} else {
						// Enable button
						nextButton.disabled = false;
						
						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}			
		});

		previousButton.addEventListener('click', function () {
			// Go to previous step
			stepper.goPrevious();
		});
	}

	return {
		// Public functions
		init: function () {
			form = KTModalOfferADeal.getForm();
			stepper = KTModalOfferADeal.getStepperObj();
			nextButton = KTModalOfferADeal.getStepper().querySelector('[data-kt-element="details-next"]');
			previousButton = KTModalOfferADeal.getStepper().querySelector('[data-kt-element="details-previous"]');

			initForm();
			initValidation();
			handleForm();
		}
	};
}();

// Webpack support
if ( true && typeof module.exports !== 'undefined') {
	module.exports = KTModalOfferADealDetails;
}

/***/ }),

/***/ "../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/finance.js":
/*!************************************************************************************************!*\
  !*** ../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/finance.js ***!
  \************************************************************************************************/
/***/ ((module) => {

"use strict";


// Class definition
var KTModalOfferADealFinance = function () {
	// Variables
	var nextButton;
	var previousButton;
	var validator;
	var form;
	var stepper;

	// Private functions
	var initValidation = function() {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'finance_setup': {
						validators: {
							notEmpty: {
								message: 'Amount is required'
							},
							callback: {
								message: 'The amount must be greater than $100',
								callback: function(input) {
									var currency = input.value;
									currency = currency.replace(/[$,]+/g,"");

									if (parseFloat(currency) < 100) {
										return false;
									}
								}
							}
						}
					},
					'finance_usage': {
						validators: {
							notEmpty: {
								message: 'Usage type is required'
							}
						}
					},
					'finance_allow': {
						validators: {
							notEmpty: {
								message: 'Allowing budget is required'
							}
						}
					}
				},
				
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Revalidate on change
		KTDialer.getInstance(form.querySelector('#kt_modal_finance_setup')).on('kt.dialer.changed', function() {
			// Revalidate the field when an option is chosen
            validator.revalidateField('finance_setup');
		});
	}

	var handleForm = function() {
		nextButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Disable button to avoid multiple click 
			nextButton.disabled = true;

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						// Show loading indication
						nextButton.setAttribute('data-kt-indicator', 'on');

						// Simulate form submission
						setTimeout(function() {
							// Simulate form submission
							nextButton.removeAttribute('data-kt-indicator');

							// Enable button
							nextButton.disabled = false;
							
							// Go to next step
							stepper.goNext();
						}, 1500);   						
					} else {
						// Enable button
						nextButton.disabled = false;

						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}			
		});

		previousButton.addEventListener('click', function () {
			stepper.goPrevious();
		});
	}

	return {
		// Public functions
		init: function () {
			form = KTModalOfferADeal.getForm();
			stepper = KTModalOfferADeal.getStepperObj();
			nextButton = KTModalOfferADeal.getStepper().querySelector('[data-kt-element="finance-next"]');
			previousButton = KTModalOfferADeal.getStepper().querySelector('[data-kt-element="finance-previous"]');

			initValidation();
			handleForm();
		}
	};
}();

// Webpack support
if ( true && typeof module.exports !== 'undefined') {
	module.exports = KTModalOfferADealFinance;
}

/***/ }),

/***/ "../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/main.js":
/*!*********************************************************************************************!*\
  !*** ../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/main.js ***!
  \*********************************************************************************************/
/***/ ((module) => {

"use strict";


// Class definition
var KTModalOfferADeal = function () {
    // Private variables
	var stepper;
	var stepperObj;
	var form;	

	// Private functions
	var initStepper = function () {
		// Initialize Stepper
		stepperObj = new KTStepper(stepper);
	}

	return {
		// Public functions
		init: function () {
			stepper = document.querySelector('#kt_modal_offer_a_deal_stepper');
			form = document.querySelector('#kt_modal_offer_a_deal_form');

			initStepper();
		},

		getStepper: function () {
			return stepper;
		},

		getStepperObj: function () {
			return stepperObj;
		},
		
		getForm: function () {
			return form;
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	if (!document.querySelector('#kt_modal_offer_a_deal')) {
		return;
	}

    KTModalOfferADeal.init();
    KTModalOfferADealType.init();
    KTModalOfferADealDetails.init();
    KTModalOfferADealFinance.init();
    KTModalOfferADealComplete.init();
});

// Webpack support
if ( true && typeof module.exports !== 'undefined') {
	module.exports = KTModalOfferADeal;
}

/***/ }),

/***/ "../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/type.js":
/*!*********************************************************************************************!*\
  !*** ../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/type.js ***!
  \*********************************************************************************************/
/***/ ((module) => {

"use strict";


// Class definition
var KTModalOfferADealType = function () {
	// Variables
	var nextButton;
	var validator;
	var form;
	var stepper;

	// Private functions
	var initValidation = function() {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'offer_type': {
						validators: {
							notEmpty: {
								message: 'Offer type is required'
							}
						}
					}
				},
				
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);
	}

	var handleForm = function() {
		nextButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Disable button to avoid multiple click 
			nextButton.disabled = true;

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						// Show loading indication
						nextButton.setAttribute('data-kt-indicator', 'on');

						// Simulate form submission
						setTimeout(function() {
							// Simulate form submission
							nextButton.removeAttribute('data-kt-indicator');

							// Enable button
							nextButton.disabled = false;
							
							// Go to next step
							stepper.goNext();
						}, 1000);   						
					} else {
						// Enable button
						nextButton.disabled = false;
						
						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}			
		});
	}

	return {
		// Public functions
		init: function () {
			form = KTModalOfferADeal.getForm();
			stepper = KTModalOfferADeal.getStepperObj();
			nextButton = KTModalOfferADeal.getStepper().querySelector('[data-kt-element="type-next"]');

			initValidation();
			handleForm();
		}
	};
}();

// Webpack support
if ( true && typeof module.exports !== 'undefined') {
	module.exports = KTModalOfferADealType;
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!************************************************************************************!*\
  !*** ../../../themes/metronic/html/tools/webpack/js/custom/modals/offer-a-deal.js ***!
  \************************************************************************************/
window.KTModalOfferADealComplete = __webpack_require__(/*! @/src/js/custom/modals/offer-a-deal/bundle/complete.js */ "../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/complete.js");
window.KTModalOfferADealDetails = __webpack_require__(/*! @/src/js/custom/modals/offer-a-deal/bundle/details.js */ "../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/details.js");
window.KTModalOfferADealFinance = __webpack_require__(/*! @/src/js/custom/modals/offer-a-deal/bundle/finance.js */ "../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/finance.js");
window.KTModalOfferADealType = __webpack_require__(/*! @/src/js/custom/modals/offer-a-deal/bundle/type.js */ "../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/type.js");
window.KTModalOfferADeal = __webpack_require__(/*! @/src/js/custom/modals/offer-a-deal/bundle/main.js */ "../../../themes/metronic/html/demo10/src/js/custom/modals/offer-a-deal/bundle/main.js");

})();

/******/ })()
;
//# sourceMappingURL=offer-a-deal.bundle.js.map