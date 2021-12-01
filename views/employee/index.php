<?php
require_once "views/head.php";
require_once "views/header.php";
?>
<main class="container-xl mx-auto pb-90">
    <form action="<?php echo constant('BASE_URL'); ?>employee/addEmployee" method="POST" class="container-md">
        <h3>Add new employee: </h3>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input name="name" type="text" class="form-control" id="inputName" value="">
                </div>
                <div class="form-group">
                    <label for="inputMail">Email adress</label>
                    <input required name="email" type="email" class="form-control" id="inputMail" aria-describedby="emailHelp" value="">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="inputCity">City</label>
                    <input required name="city" type="text" class="form-control" id="inputCity" value="">
                </div>
                <div class="form-group">
                    <label for="inputState">State</label>
                    <input required name="state" type="text" class="form-control" id="inputState" value="">
                </div>
                <div class="form-group">
                    <label for="inputPostalCode">Postal Code</label>
                    <input required name="postalCode" type="number" class="form-control" id="inputPostalCode" value="">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="inputLastName">Last Name</label>
                    <input required name="lastName" type="text" class="form-control" id="inputLastName" value="">
                </div>
                <div class="form-group">
                    <label for="inputGender">Gender</label>
                    <select required class="form-control" id="inputGender" name="gender[]">
                        <option value="man">Male</option>
                        <option value="woman">Female</option>
                        <option value="other">Trans</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputStreetAddress">Street Adrress</label>
                    <input required name="streetAddress" type="text" class="form-control" id="inputStreetAddress" value="">
                </div>

                <div class="form-group">
                    <label for="inputAge">Age</label>
                    <input required name="age" type="number" class="form-control" id="inputAge" value="">
                </div>

                <div class="form-group">
                    <label for="inputPhoneNumber">Phone Number</label>
                    <input required name="phoneNumber" type="number" class="form-control" id="inputPhoneNumber" value="">
                </div>
            </div>
        </div>
        <a type="btn" class="btn btn-secondary" href="<?php echo constant('BASE_URL'); ?>dashboard">Back</a>
        <button type="submit" class="btn btn-primary">Submit New Employee</button>
    </form>
</main>

<?php
require_once "views/footer.php";
?>