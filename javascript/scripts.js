function validateForm() {
    var fullName = document.getElementById('fullName').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var county = document.getElementById('county').value;
    var subCounty = document.getElementById('subCounty').value;
    var ward = document.getElementById('ward').value;
    var termsCheckbox = document.getElementById('termsCheckbox').checked;
    var password = document.getElementById('password').value;
   

    // Reset previous error messages
    passwordError.textContent = '';

    // Validate that passwords match
    if (password !== confirmPassword) {
        passwordError.textContent = 'Passwords do not match.';
        return false;
    }

    // Other validations or actions can be added here

    // If all validations pass, the form will be submitted
    return true;

    // Basic validation example (you can customize this based on your requirements)
    if (fullName === '' || email === '' || phone === '' || password === '' || confirmPassword === '' || county === '' || subCounty === '' || ward === '' || !termsCheckbox) {
        alert('Please fill in all fields and accept the terms.');
        return false;
    }

    // Validate email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return false;
    }

    // Validate phone number format
    var phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone)) {
        alert('Please enter a valid 10-digit phone number.');
        return false;
    }

    // Validate password length
    if (password.length < 6) {
        alert('Password should be at least 6 characters long.');
        return false;
    }

    // Validate password match
    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return false;
    }

    // Add more validations as needed

    // If all validations pass, the form will be submitted
    return true;
}

   
