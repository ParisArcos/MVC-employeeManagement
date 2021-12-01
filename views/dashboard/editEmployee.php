<?php

require_once "views/header.php";

?>
<main class="container-xl mx-auto pb-90">
    <form action="<?php echo constant('BASE_URL'); ?>employee/updateEmployee" method="POST" class="container-md">
        <input type="hidden" id="id" name="id" value="<?php echo $this->employee['id'] ?>">
        <h3>Edit employee: </h3>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input name="name" type="text" class="form-control" id="inputName" value="<?php echo $this->employee['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputMail">Email adress</label>
                    <input required name="email" type="email" class="form-control" id="inputMail" aria-describedby="emailHelp" value="<?php echo $this->employee['email'] ?>">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="inputCity">City</label>
                    <input required name="city" type="text" class="form-control" id="inputCity" value="<?php echo $this->employee['city'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputState">State</label>
                    <input required name="state" type="text" class="form-control" id="inputState" value="<?php echo $this->employee['state'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputPostalCode">Postal Code</label>
                    <input required name="postalCode" type="number" class="form-control" id="inputPostalCode" value="<?php echo $this->employee['postalCode'] ?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="inputLastName">Last Name</label>
                    <input required name="lastName" type="text" class="form-control" id="inputLastName" value="<?php echo $this->employee['lastName'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputGender">Gender</label>
                    <select required class="form-control" id="inputGender" name="gender[]" value="<?php echo $this->employee['gender'] ?>">
                        <option value="man">Male</option>
                        <option value="woman">Female</option>
                        <option value="other">Trans</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputStreetAddress">Street Adrress</label>
                    <input required name="streetAddress" type="text" class="form-control" id="inputStreetAddress" value="<?php echo $this->employee['streetAddress'] ?>">
                </div>

                <div class="form-group">
                    <label for="inputAge">Age</label>
                    <input required name="age" type="number" class="form-control" id="inputAge" value="<?php echo $this->employee['age'] ?>">
                </div>

                <div class="form-group">
                    <label for="inputPhoneNumber">Phone Number</label>
                    <input required name="phoneNumber" type="number" class="form-control" id="inputPhoneNumber" value="<?php echo $this->employee['phoneNumber'] ?>">
                </div>
            </div>
        </div>
        <a type="btn" class="btn btn-secondary" href="<?php echo constant('BASE_URL'); ?>dashboard">Back</a>
        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</main>