<?php
    print'
        <h2>CONTACT US</h2>
        <!-- Contact form, data and map location -->
        <div class="container">
            <section class="contact-section my-5">
                <div class="card">
                    <div class="row">

                        <!-- Contact form -->
                        <div class="col-lg-12">
                            <div class="card-body form">
                                <form class="contact-form" action="test.php" method="POST">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                    <input type="text" name="surname" class="form-control" placeholder="Surname">
                                    <input type="text" name="mail" class="form-control" placeholder="e-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                    <input type="text" name="address" class="form-control" placeholder="Address">
                                    <select class="form-control">
                                        <option value="">Select country</option>';
                                        $query  = "SELECT * FROM country";
				                        $result = @mysqli_query($MySQL, $query);
				                        while($row = @mysqli_fetch_array($result)) {
					                        print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
                                        }
                                    print '
                                    </select>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="subject" placeholder="Write something.."></textarea>
                                    <button type="submit" name="submit" class="btn btn-warning btn-block mt-3">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <!-- Contact data and map location -->
                        <div class="col-lg-12">
                            <div class="card-body contact text-center h-100 white-text">
                                <h3 class="my-4 pb-2">Visit us</h3>
                                <div class="text-center">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d183351.2001759674!2d-117.64702644613799!3d47.61157673344339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x549e3b25f62e157b%3A0x545497ad53efce12!2sUtopia%20Planitia%20Villam!5e1!3m2!1sen!2shr!4v1605456179715!5m2!1sen!2shr" 
                                        width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>';
    @mysqli_close($MySQL);
?>
