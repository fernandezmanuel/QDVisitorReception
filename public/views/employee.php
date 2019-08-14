<?php include_once '../helpers/helper.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Console</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/visitor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body class="body">

<div class="login-page">
    <div class="form">
        <form method="post" action="../process/proc_emp.php" >
            <span class="visitor-title">-&nbsp; Employee &nbsp;-</span>
            <input name="visitorname" name="text" placeholder="Full name"/>
            <input name="visitormail" type="email" placeholder="Email"/>
            <input name="visitororg" type="text" placeholder="Organization"/>
            <button type="submit" value="Submit">SIGN UP</button>
        </form>
        <a href="../index.html"><button>RETURN</button></a>
    </div>
</div>

<?php subview('footer.php'); ?>

<br/>
<br/>
</body>
</html>