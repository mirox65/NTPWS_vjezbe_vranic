<?php
if (isset($action) && $action != '') {
    $query  = "SELECT * FROM ship";
    $query .= " WHERE ship_id=" . $_GET['action'];
    $result = @mysqli_query($MySQL, $query);
    $row = @mysqli_fetch_array($result);
        print '
        <div class="news">
            <img src="pic/ship/' . $row['ship_picture'] . '" alt="' . $row['ship_title'] . '" title="' . $row['ship_title'] . '">
            <h2>' . $row['ship_title'] . '</h2>
            <p>'  . $row['ship_description'] . '</p>
            <time datetime="' . $row['ship_date'] . '">' . pickerDateToMysql($row['ship_date']) . '</time>
            <hr>
            <a href="index.php?menu=2" class="btn btn-info btn-block">Back</a>
        </div>';
}
else {
    print'
    <h2>SHIPS</h2>';
    $query  = "SELECT * FROM ship";
    $query .= " WHERE ship_archive='N'";
    $query .= " ORDER BY ship_date DESC";
    $result = @mysqli_query($MySQL, $query);
    while($row = @mysqli_fetch_array($result)) {
        print '
        <div class="card">
            <div class="row no-gutters">
                <div class="col-auto">
                    <a href="index.php?menu=' . $menu . '&amp;action=' . $row['ship_id'] . '"><img src="pic/ship/'. $row['ship_picture'] . '" class="img-fluid" alt=""></a>
                </div>
                <div class="col">
                    <div class="card-block px-2">
                        <p class="card-text float-right"><time datetime="' . $row['ship_date'] . '">' . pickerDateToMysql($row['ship_date']) . '</time></p>
                        <h4 class="card-title block">' . $row['ship_title'] . '</h4>
                        <p>';
                        if(strlen($row['ship_description']) > 120) {
                            echo substr(strip_tags($row['ship_description']), 0, 120).'...';
                        } else {
                            echo strip_tags($row['ship_description']);
                        }
                        print '
                        </p>
                    </div>
                </div>
            </div>
            <a href="index.php?menu=' . $menu . '&amp;action=' . $row['ship_id'] . '" class="btn btn-info btn-block mt-1">More</a>
        </div>';
    }
}
?>