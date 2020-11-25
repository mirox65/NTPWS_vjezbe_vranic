<?php
    if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false'){
        header("Location: index.php?menu=6");
    }
    else if($_SESSION['user']['valid'] == 'true'){
        if (isset($_POST['edit']) && $_POST['_action_'] == 'TRUE') {
            $query  = "UPDATE ship SET ship_title='" . $_POST['title'] . "', ship_description='" . $_POST['article'] . "', ship_picture='" . $_POST['picture'] . "'";
            $query .= " WHERE ship_id=" . (int)$_POST['edit'];
            $query .= " LIMIT 1";
            $result = @mysqli_query($MySQL, $query);
            # Close MySQL connection
            @mysqli_close($MySQL);
            
            $_SESSION['message'] = '<p>You successfully changed ship article!</p>';
            
            # Redirect
            header("Location: index.php?menu=10&action=1");
        }
        if (isset($_GET['delete']) && $_GET['delete'] != '') {
            if ($_SESSION['user']['role'] == 1) {
            $query  = "DELETE FROM ship";
            $query .= " WHERE ship_id=".(int)$_GET['delete'];
            $query .= " LIMIT 1";
            $result = @mysqli_query($MySQL, $query);

            $_SESSION['message'] = '<p>You successfully deleted ship article!</p>';
            
            # Redirect
            header("Location: index.php?menu=10&action=1");
            }
        }
        else if (isset($_GET['edit']) && $_GET['edit'] != '') {
            if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
                $query  = "SELECT * FROM ship";
                $query .= " WHERE ship_id=".$_GET['edit'];
                $result = @mysqli_query($MySQL, $query);
                $row = @mysqli_fetch_array($result);
                $checked_archive = false;
                
                print '
                <h2>Edit ship article</h2>
                <section class="contact-section my-5">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body form">
                                    <h4 class="mt-4">Edit article # ' . $row['ship_id'] . '</h4>
                                    <form class="contact-form" action="" method="POST">
                                        <input type="hidden" id="_action_" name="_action_" value="TRUE">
                                        <input type="hidden" id="edit" name="edit" value="' . $_GET['edit'] . '">
                                        <input type="text" name="title" class="form-control" value="' . $row['ship_title'] . '" placeholder="Title">
                                        <textarea type="text" name="article" rows="5" class="form-control mb-3" placeholder="Story">
                                        ' . $row['ship_description'] .'                                    
                                        </textarea>
                                        <input type="file" name="picture" class="form-control" value="' . $row['ship_picture'] . '" placeholder="Picture">
                                        <button type="submit" name="submit" class="btn btn-warning btn-block">SAVE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <p><a href="index.php?menu='.$menu.'&amp;action='.$action.'" class="btn btn-info btn-block">Back</a></p>';
            }
            else {
                print '<p>Zabranjeno</p>';
            }
        }
        else{
        print'
        <h2>List of users</h2>
        <a class="btn btn-success mr-2 my-1 float-right" href="index.php?menu=8&action=0">New article</a>
        <table class="table table-hover table-responsive-lg">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Picture</th>';
                    if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2){
                        print'
                    <th></th>';
                    }
                    if ($_SESSION['user']['role'] == 1){
                        print'
                    <th></th>';
                    }
                    print'
                </tr>
            </thead>
            <tbody>';
            $query  = "SELECT * FROM ship";
            $result = @mysqli_query($MySQL, $query);
            while($row = @mysqli_fetch_array($result)) {
                print '
                <tr>
                    <th scope="row">' . $row['ship_id'] . '</th>
                    <td><strong>' . $row['ship_title'] . '</strong></td>
                    <td>';
                        if(strlen($row['ship_description']) > 20) {
                            echo substr(strip_tags($row['ship_description']), 0, 20).'...';
                        } else {
                            echo strip_tags($row['ship_description']);
                        }
                        print'
                    </td>
                    <td>' . $row['ship_picture'] . '</td>';
                    if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2){
                        print'
                            <td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['ship_id']. '"><i class="fas fa-edit btn btn-warning"></a></i></td>';
                    }
                    if ($_SESSION['user']['role'] == 1){
                        print'
                            <td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['ship_id']. '"><i class="fas fa-trash-alt btn btn-danger"></a></i></td>';
                    }
                    print'              
                </tr>';
                }
                print'
            </tbody>
        </table>';
        }
    }
    @mysqli_close($MySQL);
?>