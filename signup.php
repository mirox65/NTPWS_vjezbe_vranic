<?php
    print '
        <h2>SIGN UP</h2>
        <!-- Sign up form -->
        <div class="container">';

        if ($_POST['_action_'] == FALSE) {
            print '
            <section class="contact-section my-5">
                <div class="card">
                    <div class="row">
                        <!-- Register-->
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card-body form">
                                <h3 class="mt-4">Your data</h3>
                                <form class="contact-form" action="" name="registration_form" method="POST">
                                    <input type="hidden" id="_action_" name="_action_" value="TRUE">
                                    <input type="text" name="username" class="form-control userpass" placeholder="Username" required>
                                    <input type="password" name="password" class="form-control userpass" placeholder="Password" required>
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    <input type="text" name="surname" class="form-control" placeholder="Surname" required>
                                    <input type="text" name="email" class="form-control" placeholder="e-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                    <select name="country" class="form-control">
                                        <option value="">Select country</option>';
                                        $query  = "SELECT * FROM country";
				                        $result = @mysqli_query($MySQL, $query);
				                        while($row = @mysqli_fetch_array($result)) {
					                        print '<option value="' . $row['country_id'] . '">' . $row['country_name'] . '</option>';
                                        }
                                    print '
                                    </select>
                                    <button type="submit" name="submit" class="btn btn-warning btn-block">Sign up!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
        }
        else if ($_POST['_action_'] == TRUE) {

            $query  = "SELECT * FROM user";
            $query .= " WHERE user_email='" .  $_POST['email'] . "'";
            $query .= " OR user_username='" .  $_POST['username'] . "'";
            $result = @mysqli_query($MySQL, $query);
            $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            if ($row['user_email'] == '' || $row['user_username'] == '') {
                # password_hash https://secure.php.net/manual/en/function.password-hash.php
                # password_hash() creates a new password hash using a strong one-way hashing algorithm
                $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
                
                $query  = "INSERT INTO user (user_name, user_surname, user_username, user_password, user_email, user_country)";
                $query .= " VALUES ('" . $_POST['name'] . "', '" . $_POST['surname'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['email'] . "', '" . $_POST['country'] . "')";
                $result = @mysqli_query($MySQL, $query);
                
                # ucfirst() — Make a string's first character uppercase
                # strtolower() - Make a string lowercase
                echo '<p>' . ucfirst(strtolower($_POST['name'])) . ' ' .  ucfirst(strtolower($_POST['surname'])) . ', thank you for registration </p>
                <hr>';
            }
            else {
                echo '<p>User with this email or username already exist!</p>';
            }
        }
        print'
        </div>';
?>