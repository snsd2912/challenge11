<?php
    ini_set('display_errors', 0);
    include("user.php");
    $user = new User();
    $encodeString = "";
    $sri = "";

    if(isset($_POST["submit"])){
        $user->set_username($_POST["username"]);
        $user->set_email($_POST["email"]);
        $user->set_dob($_POST["date"]);
        $user->set_gender($_POST["gender"]);
        $encodeString = base64_encode(json_encode($user));
    }
    

    if(isset($_POST["decode"])){
        $sri = str_replace(["\n", "\r"], '', $_POST["string"]);
        $user_decode =  json_decode(base64_decode($sri));
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="">
                    <input type="text" name="username"  placeholder="Username" value="<?php echo $user->get_username(); ?>"  required> <br> <br>
                    <input type="text" name="email"  placeholder="Email" value="<?php echo $user->get_email(); ?>"  required> <br> <br>
                    <input type="date" name="date" value="<?php echo $user->get_dob(); ?>" required> <br> <br>
                    <input list="gender" name="gender" value="<?php echo $user->get_gender(); ?>" required> 
                        <datalist id="gender">
                            <option value="Male">
                            <option value="Female">
                            <option value="Other">
                        </datalist>
                        <br> <br>
                    <input type="submit" value="Submit" name="submit"> <br> <br>
                </form>
                <p id='encodeString'>
                    <?php
                        if($encodeString!="") {
                            echo $encodeString;
                        }
                    ?>
                </p>
                <button onclick="copyToClipboard('#encodeString')">Copy</button>
          
            </div>

            <div class="col-sm-6">
                <div class="content ">
                    <form method="post" action="">
                        <label for="string">Base64 String</label><br><br>
                        <input type="text" name="string"  placeholder="Enter base64 string here..." value='<?php echo $sri; ?>' required> <br> <br>
                        <input type="submit" value="Submit" name="decode"> <br> <br>
                    </form>
                </div>

                <?php if($sri!=""){?>
                    <div class="content">
                        <table>
                            <tr>
                                <td>Name: </td>
                                <td><?php echo $user_decode->username; ?></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td> <?php echo $user_decode->email; ?> </td>
                            </tr>
                            <tr>
                                <td>DOB: </td>
                                <td> <?php echo $user_decode->dob; ?> </td>
                            </tr>
                            <tr>
                                <td>Gender: </td>
                                <td> <?php echo $user_decode->gender; ?> </td>
                            </tr>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }
  </script>
</body>
</html>