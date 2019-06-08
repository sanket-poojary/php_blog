<html>
<head>
<title>Register Form</title>
</head>
<body>

<?php 
if (isset($error)) {
	echo $error;
}
echo form_open('Users/register'); ?>
<label>UserName :</label>
<input type="text" name="username" id="name" placeholder="username"/><br /><br />
<label>Password :</label>
<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
<label>Confirm Password :</label>
<input type="password" name="passconf" id="passconf" placeholder="**********"/><br/><br />
<label>Email :</label>
<input type="email" name="email" id="email" placeholder="Email"/><br/><br />
<input type="submit" value=" Register " name="submit"/><br />
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>