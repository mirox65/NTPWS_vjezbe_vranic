<?php
    print'
        <h2>SIGN IN</h2>

        <div class="container">';
        if ($_POST['_action_'] == FALSE) {
            print '
            <section class="contact-section my-5">
                <div class="card">
                    <div class="row">

                        <!-- Sing in form -->
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="card-body form">
                                <form class="contact-form" action="" method="POST">
                                    <input type="hidden" id="_action_" name="_action_" value="TRUE">
                                    <label for="username" class="label label-default"><span class="label label-default">Username</span></label>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                    <label for="password" class="label label-default">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <button type="submit" name="submit" class="btn btn-warning btn-block">SIGN IN</button>';
                                    echo $_SESSION['message'];
                                    print'
                                </form>
                            </div>
                        </div>
                    </div>                   
                </div>
            </section>';
        }
        else if ($_POST['_action_'] == TRUE) {
            #print'<p>Provjera podataka</p>';
    
            $query  = "SELECT * FROM user";
            $query .= " WHERE user_username='" .  $_POST['username'] . "' AND user_archive='N'";
            $result = @mysqli_query($MySQL, $query);
            $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            if (password_verify($_POST['password'], $row['user_password'])) {
                #password_verify https://secure.php.net/manual/en/function.password-verify.php
                $_SESSION['user']['valid'] = 'true';
                $_SESSION['user']['id'] = $row['user_id'];
                # 1 - administrator; 2 - editor; 3 - user
                $_SESSION['user']['role'] = $row['user_role'];
                $_SESSION['user']['firstname'] = $row['user_name'];
                $_SESSION['user']['lastname'] = $row['user_surname'];
                $_SESSION['message'] = '';
                # Redirect to homepage
                header("Location: index.php?menu=1");
                #echo $_SESSION['message'];
               # exit;
            }
            
            # Bad username or password
            else {
                unset($_SESSION['user']);
                $_SESSION['message'] = '<p>You entered wrong username or password!</p>';
                header("Location: index.php?menu=6");
                exit;
            }
        }
        print '
    </div>';
?>
