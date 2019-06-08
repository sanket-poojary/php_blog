<html>
<head>
<title>Login Form</title>
</head>
<body>
<?php 
if (isset($error)) {
	echo $error;
}
echo form_open('Users/login'); ?>
<label>UserName :</label>
<input type="text" name="username" id="name" placeholder="username"/><br /><br />
<label>Password :</label>
<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
<select name="user_type">
  <option value="admin">admin</option>
  <option value="user">user</option>
</select>
<br>
<input type="submit" value=" Login " name="submit"/><br />

<a href="<?php echo base_url() ?>index.php/Users/register">To SignUp Click Here</a>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>