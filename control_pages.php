<?php
    require "components/dbconn.php";
    session_start();
if ($_SESSION['logged_in'] != true) {
    session_abort();
    echo '<script>
    if(confirm("Please login first!")){
        window.location.href = "loginPage.php";

    }
    else{
        window.location.href = "loginPage.php"; 
    }
    </script>';
}
    function getbooleanvalue($isSomethingTrue,$getPara){
        global $conn;
        if ($isSomethingTrue == 0) {
            $boolValue = 1;
            $btnText = "Off";
            $btnColor = "red";
        }
        else {
            $boolValue = 0;
            $btnText = "On";
            $btnColor = "blue";
        }
        if ($getPara == 0) {
            return $boolValue;
        }
        else if ($getPara == 1) {
            return $btnText;
        }
        else if ($getPara == 2) {
            return $btnColor;
        }
        // 0 = boolValue, 1 = btnText, 2 = btnColor;
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .newbox {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }

        .text {
            margin-right: 20px;
        }

        .btn-border, .btn-mess_reciept, #control_value, .form-group input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-border:hover, .btn-mess_reciept:hover, #control_value:hover, .form-group input[type="submit"]:hover {
            background-color: #4CAF50;
            color: white;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group label {
            width: 150px;
            text-align: right;
            margin-right: 20px;
        }

        .form-group select, .form-group input[type="text"], .form-group input[type="submit"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-group.submit {
            justify-content: center;
        }
         .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        @media only screen and (max-width: 600px) {
            .form-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-group label {
                margin: 0 0 5px 0;
                text-align: left;
            }

            .btn-border, .btn-mess_reciept, #control_value, .form-group input[type="submit"] {
                width: 100%;
            }
        }
    <?php
    require "components/nav.php";
    require "components/adminNav.php";
    function selected_month($month_val){
        Global $month_value;
        if ($month_value == $month_val) {
            echo "selected";
        }
        return 0;
    }
    function selected_year($year_val){
        Global $year;
        if ($year_val == $year) {
            echo "selected";
        }
        return 0;
    }
    ?>
    <div class="container">
        <!-- Your PHP code here -->

        <div class="newbox">
            <p class="text">New Borders Entry:</p>
            <div class="text">
                <form action="components/control_process.php" method="post">
                    <input type="text" name="Sln" id="Sln" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value="1" required>
                    <input type="text" name="control_value" id="control_value" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value='<?php echo getbooleanvalue($isNewBorderTrue,0);?>' required>
                    <input class="btn-border" type="submit" value="<?php echo getbooleanvalue($isNewBorderTrue,1); ?>">
                </form>
            </div>
        </div>

        <div class="newbox">
            <p class="text">New Mess Receipt Entry:</p>
            <div class="text">
                <form action="components/control_process.php" method="post">
                    <input type="text" name="Sln" id="Sln" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value="2" required>
                    <input type="text" name="control_value" id="control_value" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value='<?php echo getbooleanvalue($isNewMessRecieptTrue,0);?>' required>
                    <input class="btn-mess_reciept" type="submit" value="<?php echo getbooleanvalue($isNewMessRecieptTrue,1); ?>">
                </form>
            </div>
        </div>

        <div class="newbox">
            <form action="components/control_process.php" method="post">
                <div class="form-group">
                    <label for="control_value">Change the month:</label>
                    <select name="control_value" id="control_value">
                        <option value="1" <?php selected_month(1); ?>>January</option>
                        <option value="2" <?php selected_month(2); ?>>February</option>
                        <option value="3" <?php selected_month(3); ?>>March</option>
                        <option value="4" <?php selected_month(4); ?>>April</option>
                        <option value="5" <?php selected_month(5); ?>>May</option>
                        <option value="6" <?php selected_month(6); ?>>June</option>
                        <option value="7" <?php selected_month(7); ?>>July</option>
                        <option value="8" <?php selected_month(8); ?>>August</option>
                        <option value="9" <?php selected_month(9); ?>>September</option>
                        <option value="10" <?php selected_month(10); ?>>October</option>
                        <option value="11" <?php selected_month(11); ?>>November</option>
                        <option value="12" <?php selected_month(12); ?>>December</option>
                    </select>
                </div>
                <input type="text" name="Sln" id="Sln" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value="3" required>
                <div class="form-group submit">
                    <input type="submit" value="Change">
                </div>
            </form>
        </div>
        <div class="newbox">
            <form action="components/control_process.php" method="post">
        <div class="form-group">
                    <label for="control_value">Change the year:</label>
                    <select name="control_value" id="control_value">
                        <?php 
                            $current_year = date("Y")-1;
                            for ($i = $current_year; $i <= $current_year + 10; $i++) {
                                echo "<option value='$i' ";
                                selected_year($i);
                                echo ">$i</option>";
                            }
                        ?>
                    </select>
                </div>
                <input type="text" name="Sln" id="Sln" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value="4" required>
                <div class="form-group submit">
                    <input type="submit" value="Change">
                </div>
                        </form>
                        </div>
                        <div class="newbox">
            <p class="text">Download Excel file for the month:</p>
            <div class="text">
                    <Button class="btn-border" onclick="download_excell()">Download</Button>
            </div>
        </div>
                       <div class="newbox">
            <p class="text">Download recipts for the month:</p>
            <div class="text">
                <Button class="btn-border" onclick="openModal()">Download</Button>
            </div>
        </div>
        <div class="newbox">
            <p class="text">Delete Previous month data:</p>
            <div class="text">
                    <Button class="btn-border" onclick="delete_materials()">Delete</Button>
            </div>
        </div>
        <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Download Receipts</h2>
            <div><button class="btn-border" onclick="downloadReceipts('118-216')">Download for room no. 118-216</button></div>
            <br>
            <div><button class="btn-border" onclick="downloadReceipts('217-227')">Download for room no. 217-227</button></div>
            <br>
            <div><button class="btn-border" onclick="downloadReceipts('228-242')">Download for room no. 228-242</button></div>
            <br>
            <div><button class="btn-border" onclick="downloadReceipts('243')">Download for room no. 243-others</button></div>
            <br>
            <!-- Add more buttons as needed -->
        </div>
    </div>
    <script>
        function download_excell() {
            window.open("components/create_csv.php","_blank");
        }
         function openModal() {
            document.getElementById('myModal').style.display = "block";
        }
        
        function closeModal() {
            document.getElementById('myModal').style.display = "none";
        }

        function downloadReceipts(roomNumbers) {
            window.open("components/download_zip.php?rooms=" + roomNumbers, "_blank");
        }
        function delete_materials() {
            if(confirm("Did you download the excel file, reciepts and keep the record of final defaulters?")){
                window.location.href = "components/delete_recipts.php";
            }
        }
    </script>
</body>
</html>