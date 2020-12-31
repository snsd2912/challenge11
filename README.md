# INSECURE DESRIALIZATION
To exploit, you can enter code snippet below in the username field:
```
$myfile = fopen("hihi.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("hihi.txt"));
fclose($myfile);
```

Using json to prevent insecure deserialization

Encode example:
```
<?php
$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);

echo json_encode($age);
?>
```

Decode example:
```
<?php
$cars = array("Volvo", "BMW", "Toyota");

echo json_encode($cars);
?>
```

