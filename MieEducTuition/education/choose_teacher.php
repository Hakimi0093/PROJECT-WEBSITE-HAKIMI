<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Teacher</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Choose Your Teacher</h2>
        <form action="submit_form.html" method="POST">
            <!-- Select Teacher -->
            <div class="mb-3">
                <label for="teacher" class="form-label">Select a Teacher</label>
                <select class="form-select" id="teacher" name="teacher" required>
                    <option value="" selected disabled>Choose a teacher</option>
                    <option value="Encik Hakimi Amri">Encik Hakimi Amri</option>
                    <option value="Puan Puteri Nur Batrisyia">Puan Puteri Nur Batrisyia</option>
                    <option value="Puan Halili Alia">Puan Halili Alia</option>
                    <option value="Puan Norhaliza Yaakob">Puan Norhaliza Yaakob</option>
                    <option value="Encik Nur Imran">Encik Nur Imran</option>
                    <option value="Encik Nik Muhammad">Encik Nik Muhammad</option>
                </select>
            </div>
            
            <!-- Customer Details -->
            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>

            <div class="mb-3">
                <label for="educationLevel" class="form-label">Education Level</label>
                <select class="form-select" id="educationLevel" name="educationLevel" required>
                    <option value="" selected disabled>Choose your education level</option>
                    <option value="Grade 1">Grade 1</option>
                    <option value="Grade 2">Grade 2</option>
                    <option value="Grade 3">Grade 3</option>
                    <option value="Grade 4">Grade 4</option>
                    <option value="Grade 5">Grade 5</option>
                    <option value="Grade 6">Grade 6</option>
                    <option value="Form 1">Form 1</option>
                    <option value="Form 2">Form 2</option>
                    <option value="Form 3">Form 3</option>
                    <option value="Form 4">Form 4</option>
                    <option value="Form 5">Form 5</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="additionalNotes" class="form-label">Additional Notes (Optional)</label>
                <textarea class="form-control" id="additionalNotes" name="additionalNotes" rows="3" placeholder="Enter any additional information..."></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <p><a href="submit_successful.php" class="btn btn-primary btn-lg btn-reg">Submit</a></p>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
