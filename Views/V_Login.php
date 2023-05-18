<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
* {
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
} 
body {
    overflow: hidden;
}
section {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 80vh;
    background-color: linear-gradient(to bottom, #1DB954, #1ED760);
}
section .color {
   position: absolute;
   filter: blur(150px);    
}
section .color:nth-child(1) {
    top: -350;
    width: 600px; height: 600px;
    background-color: #1ED760;
}
section .color:nth-child(2) {
    bottom: -150px; left: 100px;
    width: 500px; height: 500px;
    background-color: #1DB954;
}
section .color:nth-child(3) {
    bottom: 50px; right: 100px;
    width: 300px; height: 300px;
    background-color: #1ED760;
}
section .box {
    position: relative;
}
section .box .square {
    position: absolute;
    backdrop-filter: blur(5px);
    box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    animation: animate 10s linear infinite;
    animation-delay: calc(-1s * var(--i));
}
@keyframes animate {
    0%, 100% {transform: translate(-30px);}
    50% {transform: translate(30px);}
}
section .box .square:nth-child(1) {
    top: -50px;right: -60px;
    width: 100px; height: 100px;
}
section .box .square:nth-child(2) {
    top: 150px; left: -80px;
    width: 100px; height: 100px;
    z-index: 2;
}
section .box .square:nth-child(3) {
    bottom: 50px; right: -60px;
    width: 80px; height: 80px;
    z-index: 2;
}
section .box .square:nth-child(4) {
    bottom: -80px; left: 100px;
    width: 50px; height: 50px;
}
section .box .square:nth-child(5) {
    top: -80px; left: 140px;
    width: 60px; height: 60px;
}
section .container {
    position: relative;
    width: 400px;
    min-height: 400px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(5px);
    box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
}
section .container form {
    position: relative;
    padding: 40px
}
section .container .from h2 {
    position: relative;
    color: #fff;
    font-size: 24px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-left: 40px;
}
section .container .from h2::before {
    content: '';
    position: absolute;
    bottom: -10px;
    width: 80px; height: 4px;
    background: #fff;
}
section .container .from .inputBox {
    width: 100%;
    margin-top: 10px;
}
section .container .from .inputBox input {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    outline: none;
    padding: 10px 20px;
    border-radius: 35px;
    font-size: 16px;
    letter-spacing: 1px;
    color: #fff;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}
section .container .from .inputBox input::placeholder {
    color: #fff;
}
section .container .from .inputBox input[type="submit"] {
    background: #fff;
    color: #666;
    max-width: 100px;
    cursor: pointer;
    margin-bottom: 20px;
    font-weight: 600;
}
section .container .from .forget {
    margin-top: 5px;
    color: #fff;
}
section .container form .forget a {
    color: #fff;
    font-weight: 600;
    text-decoration: underline;
    text-decoration-color: #fff;
    cursor: pointer;
    text-decoration: none;
}


</style>
</head>

<body>
  <section>
    <div class="color"></div>
    <div class="color"></div>
    <div class="color"></div>
    <div class="box">
      <div class="square" style="--i:0;"></div>
      <div class="square" style="--i:1;"></div>
      <div class="square" style="--i:2;"></div>
      <div class="square" style="--i:3;"></div>
      <div class="square" style="--i:4;"></div>
      <div class="container">
        <div class="from">
          <h2>Iniciar</h2>
          <form method="post">
            <div class="inputBox">
              <input name="usuario" type="text" placeholder="Usuario">
            </div>
            <div class="inputBox">
              <input name="password" type="password" placeholder="Contrasena">
            </div>
            <div class="inputBox">
              <input name="btningresar" type="submit" value="Iniciar">
            </div>
            <p class="forget"><a href="#">¿Olvidaste tu contraseña?</a></p>
            <p class="forget"><a href="Controllers/C_Usuarios.php">¿No tienes una cuenta? </a></p>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>