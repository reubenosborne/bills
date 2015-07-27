$(document).ready(function() {

	// Tooltip
	
	$('[data-toggle="tooltip"]').tooltip();
	
});


// ---------- Form Validation ----------

// Login Form

$("#loginForm").validate({
	rules: {
		email: {
			required: true,
			email: true
		},
		password: {
			required: true
		}
	},
	messages: {
		email: {
			required: "Please enter your email address.",
			email: "Please enter a valid email."
		},
		password: {
			required: "Please enter your password."
		}
	}
});

//  Register Form

$("#registerForm").validate({
	rules: {
		name: "required",
		email: {
			required: true,
			email: true
		},
		password: {
			required: true
		},
		confirm_password: {
			required: true,
			equalTo: "#password"
		}
	},
	messages: {
		email: {
			required: "Please enter an email address.",
			email: "Please enter a valid email."
		},
		password: {
			required: "Please enter a password."
		}
	}
});

// Forgotten Password Form

$("#forgotForm").validate({
	rules: {
		email: {
			required: true,
			email: true
		}
	},
	messages: {
		email: {
			required: "Please enter your email address.",
			email: "Please enter a valid email."
		}
	}
});

// Reset Password Form

$("#resetForm").validate({
	rules: {
		password: {
			required: true
		}
	},
	messages: {
		password: {
			required: "Please enter a new password.",
		}
	}
});