<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($sessiontopics as $sessiontopic )
    <pre>
    <?php print_r($sessiontopic->executionDepartment) ?>
    </pre>
    @endforeach
</body>
</html>

