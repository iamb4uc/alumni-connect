<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/aluminiform.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 id="title" class="text-center">Alumni Connect Registration Form</h1>
            <p id="description" class="description text-center">
                Thank you for Connecting to the Alumni network
            </p>
        </header>
        <form id="alumni-form">
            <div class="form-group">
                <label id="name-label" for="name">First Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required />
            </div>
            <div class="form-group">
                <label id="name-label" for="name">Last Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required />
            </div>
            <div class="form-group">
                <label id="email-label" for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" required />
            </div>
            <div class="form-group">
                <p>Program of study at Karimganj College</p>
                <select id="dropdown" name="role" class="form-control" required>
                    <option disabled selected value>Course Name</option>
                    <option value="option1">B.Sc (Computer Science)</option>
                    <option value="option2">BCA</option>
                    <option value="option3">B.Sc (Statistics)</option>
                    <option value="option4">B.Sc (Botany)</option>
                    <option value="option5">B.Sc (Physics)</option>
                    <option value="option6">B.A (Political Science)</option>
                    <option value="option7">B.com</option>
                    <option value="option8">Class 12</option>

                </select>
            </div>
            <div class="form-group">
                <label id="number-label" for="number">Phone Number</label>
                <input type="tel" name="mobile_no" id="phone" class="form-control" maxlength="10" placeholder="Phone Number" />
            </div>

            <div class="form-group">
                <label id="batch_yrs" for="date">Batch Years</label>
                <input type="date" name="batch_yrs" id="batch_yrs" class="form-control" placeholder="" />
            </div>

            <div class="form-group">
                <button type="submit" id="submit" class="submit-button">
                    Submit
                </button>
            </div>
        </form>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>
    </head>

</html>
</body>

</html>