<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="slogin.css">

  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#Member">Member</a></li>
        <li class="tab"><a href="#PemilikKost">Pemilik Kost</a></li>
      </ul>
         <div class="tab-content">  
        <div id="Member">   
  <h3><font color="#FF0000">*</font> Jadilah Member untuk mendapat fasilitas terbaik</h3>
          <form action="simpan.php" method="post">
          
            <div class="field-wrap">
            <label>
              ID<span class="req">*</span>
            </label>
            <input type="text" name="id" required autocomplete="off"/>
          </div><br><br>

           <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off"/>
          </div><br><br>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="pwd" required autocomplete="off"/>
          </div><br><br>

           <img src='captcha.php'><br><br>

                <font color="#EEEEEE">(Masukkan 9 Kode diatas)</font>
<br> <br>
          <div class="field-wrap">
            <label>
              Captcha<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off"/>
          </div> <br><br>
          
          <button class="button button-block"/>Log In</button>
          <br>
 <h3><a href="../daftar/daftarmember.php">Sign Up!</a></h3>
    <br>
          
          </form>
  </div>
          
        <div id="PemilikKost">   
        <h3><font color="#FF0000">*</font> Anda pemilik Kost bergabunglah bersama kami</h3>
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              ID<span class="req">*</span>
            </label>
            <input type="text" name="id"required autocomplete="off"/>
          </div><br><br>
           <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off"/>
          </div><br><br>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="pwd" required autocomplete="off"/>
       
</div><br><br>
 <img src='captcha.php'><br><br>

                <font color="#EEEEEE">(Masukkan 9 Kode diatas)</font>
<br> <br>
          <div class="field-wrap">
            <label>
              Captcha<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off"/>
          </div> <br><br>
          
          <button class="button button-block"/>Log In</button>
          <br><h3><a href="../daftarpemilikkost/daftarpemilikkost.php">Sign Up!</a></h3>
    <br>
          
          </form>
          </div>

        </div>


  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      <script src="js/index.js"></script>

</body>
</html>
