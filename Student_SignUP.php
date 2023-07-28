<!DOCTYPE html>

<head>
  <title>SignUP</title>
  <style>
    body {
      background-color: #7e40c1;
      font-family: 'Poppins', sans-serif;
    }

    .signup-box {
      width: 400px;
      height: 620px;
      margin: auto;
      background-color: white;
      border-radius: 3px;
    }

    .login-box {
      width: 360px;
      height: 280px;
      margin: auto;
      border-radius: 3px;
      background-color: white;
    }

    h1 {
      text-align: center;
      padding-top: 15px;
    }

    h4 {
      text-align: center;
    }

    form {
      width: 300px;
      margin-left: 20px;
    }

    label {
      display: flex;
      margin-top: 20px;
      font-size: 18px;
    }

    input {
      width: 100%;
      padding: 7px;
      border: none;
      border: 1px solid gray;
      border-radius: 6px;
      outline: none;
    }

    button {
      width: 320px;
      height: 35px;
      margin-top: 20px;
      border: none;
      background-color: #49c1a2;
      color: white;
      font-size: 18px;
    }

    p {
      text-align: center;
      padding-top: 20px;
      font-size: 15px;
    }

    .para-2 {
      text-align: center;
      color: white;
      font-size: 15px;
      margin-top: 30px;
    }

    .para-2 a {
      color: #49c1a2;
    }
    span{
      color: red;
    }
    .last_box {
      display: none;
    }
  </style>
</head>

<body>
  <div class="signup-box">
    <h1>Sign Up</h1>
    <form method="post" action="Send_OTP.php">
      <div class=signup>
        <label>Full Name</label>
        <input type="text" id="fname" placeholder="Name" name="fname" required>
        <label>Roll No.</label>
        <input type="number" id="rollno" placeholder="Roll no" name="rollno" required>
        <label>Choose your course:</label>
        <select name="course" id="course" required>
          <option value="course">Select course</option>
          <option value="BCA">BCA</option>
          <option value="MCA">MCA</option>
          <option value="B.S.C">Bsc</option>
          <option value="M.S.C">Msc</option>

        </select>
        <label>Choose your semester:</label>
        <select name="semester" id="semester" required>
          <option value="semester">Select option</option>
          <option value="first semester">First Semester</option>
          <option value="second semester">Second Semester</option>
          <option value="third semester">Third Semester</option>
          <option value="fourth semester">Fourth Semester</option>
          <option value="fifth semester">Fifth Semester</option>
          <option value="sixth semester">Sixth Semester</option>
        </select>
        <label>Email</label>
        <input type="text" id="email" placeholder="Email" name="email" required>
        <?php if (isset($_GET['error'])) { ?>
          <span class="error">
            <?php echo $_GET['error']; ?>
          </span>
        <?php } ?>
        <label>Password</label>
        <input type="password" id="password" placeholder="Password" required>
        <label>Confirm Password</label>
        <input type="password" placeholder="password" name="password" required>
        <button type="submit" >Send OTP</button>
      </div>

    </form>
  </div>
  <p class="para-2">
    Already have an account? <a href="Student_Login.php">Login here</a>
  </p>
</body>

</html>