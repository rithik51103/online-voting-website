<style>
    /* General styles */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Header styles */
    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
    }

    /* Navigation styles */
    nav {
      background-color: #f1f1f1;
      padding: 10px;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      text-align: center;
    }

    li {
      display: inline-block;
    }

    a {
      display: block;
      padding: 10px 20px;
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }

    a:hover {
      background-color: #ddd;
    }

    /* Content styles */
    #welcome {
      padding: 20px;
    }

    /* Responsive styles */
    @media screen and (max-width: 600px) {
      h1 {
        font-size: 24px;
      }

      a {
        padding: 8px 16px;
      }

      #welcome {
        font-size: 14px;
        font-size: 3rem;
        margin-bottom: 20px;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
        color: black;
      }
    }
  </style>
<header>
    <h1>Student Dashboard</h1>
</header>

<nav>
    <ul>
        <li><a href="student_result.php">Results</a></li>
        <li><a href="displaycandidatestud.php">Voting</a></li>
        <li><a href="logout.php?id= 1">Logout</a></li>
    </ul>
</nav>
