<?php
//incluir la conexión
include("db/conexiones.php");

//validar que el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $nombre   = $_POST['nombre'];
  $correo   = $_POST['email'];
  $telefono = $_POST['telefono'];
  $asunto   = $_POST['asunto'];
  $mensaje  = $_POST['mensaje'];

  // Preparar consulta (SQL Injection seguro)
  $stmt = $conn->prepare("INSERT INTO formulario (nombre, correo, telefono, asunto, mensaje) VALUES (?,?,?,?,?)");
  $stmt-> bind_param ("sssss", $nombre, $correo, $telefono, $asunto, $mensaje);

 if ($stmt->execute()) {
      $msg = "✅ Tu mensaje se envió correctamente.";
      echo "<script>document.addEventListener('DOMContentLoaded', function(){ var m = " . json_encode($msg) . ";
      var d = document.createElement('div');
      d.textContent = m;
      Object.assign(d.style, {position:'fixed', left:'50%', top:'20px', transform:'translateX(-50%)', background:'#1f2937', color:'#fff', padding:'12px 18px', borderRadius:'6px', zIndex:9999, fontSize:'16px', boxShadow:'0 2px 10px rgba(0,0,0,0.2)'});
      document.body.appendChild(d);
      setTimeout(function(){
        try { window.close(); } catch(e) {}
        setTimeout(function(){
        if (!window.closed) { window.location = 'contacto.php'; }
        }, 200);
      }, 3000);
      });</script>";
    } else {
      $err = "❌ Error: " . $stmt->error;
      echo "<script>document.addEventListener('DOMContentLoaded', function(){ var m = " . json_encode($err) . ";
      var d = document.createElement('div');
      d.textContent = m;
      Object.assign(d.style, {position:'fixed', left:'50%', top:'20px', transform:'translateX(-50%)', background:'#7f1d1d', color:'#fff', padding:'12px 18px', borderRadius:'6px', zIndex:9999, fontSize:'16px', boxShadow:'0 2px 10px rgba(0,0,0,0.2)'});
      document.body.appendChild(d);
      setTimeout(function(){
        try { window.close(); } catch(e) {}
        setTimeout(function(){
        if (!window.closed) { window.location = 'contacto.php'; }
        }, 200);
      }, 3000);
      });</script>";
    }
  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es"

<head>
	    <meta charset="UTF-8"
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <title>moto_guia </title>
	 <style>
  /* ======== ESTILOS GENERALES ======== */
  body {
    font-family: "Segoe UI", Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
  }

  /* ======== ENCABEZADO / NAVBAR ======== */
  header {
    background-color: #9D9999;
    color: #fff;
    padding: 15px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  header h1 {
    font-size: 18px;
    margin: 0;
    font-weight: 600;
    text-transform: lowercase;
  }

  nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 25px;
  }

  nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    font-size: 15px;
    transition: color 0.3s ease;
  }

  nav ul li a:hover {
    color: #222;
  }

  /* ======== SECCIÓN DE INICIO ======== */
  .inicio {
    text-align: center;
    padding: 80px 20px;
    background-color: #f9f9f9;
  }

  .inicio h2 {
    font-size: 32px;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
  }

  .inicio p {
    color: #555;
    font-size: 16px;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
  }

  /* ======== SECCIÓN DE CONTENIDO ======== */
  section {
    padding: 60px 20px;
    max-width: 900px;
    margin: 0 auto;
  }

  section h3 {
    color: #333;
    margin-bottom: 15px;
    font-weight: 600;
  }

  section p {
    line-height: 1.6;
    color: #555;
  }

  /* ======== FORMULARIO DE CONTACTO ======== */
  .contact-container {
    background: #fff;
    width: 100%;
    max-width: 700px;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    margin: 40px auto;
  }

  .contact-container h2 {
    text-align: center;
    color: #333;
    text-transform: uppercase;
    margin-bottom: 30px;
    letter-spacing: 1px;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
  }

  .form-group {
    display: flex;
    flex-direction: column;
  }

  label {
    font-weight: 600;
    margin-bottom: 5px;
    color: #333;
    text-transform: capitalize;
  }

  input, textarea {
    border: 2px solid #9D9999;
    border-radius: 10px;
    padding: 10px;
    font-size: 14px;
    transition: 0.3s;
    outline: none;
    font-family: "Segoe UI", Arial, sans-serif;
  }

  input:focus, textarea:focus {
    border-color: #7f7b7b;
    box-shadow: 0 0 6px rgba(157, 153, 153, 0.4);
  }

  textarea {
    min-height: 120px;
    resize: vertical;
  }

  .hint {
    font-size: 13px;
    color: #777;
    margin-top: 5px;
  }

  .actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 20px;
  }

  .btn {
    border: none;
    padding: 8px 18px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.3s;
    font-family: "Segoe UI", Arial, sans-serif;
  }

  .btn-primary {
    background-color: #9D9999;
    color: #fff;
  }

  .btn-primary:hover {
    background-color: #7f7b7b;
  }

  .btn-secondary {
    background-color: #d9d9d9;
    color: #333;
  }

  .btn-secondary:hover {
    background-color: #c5c5c5;
  }

  /* ======== PIE DE PÁGINA ======== */
  footer {
    background-color: #9D9999;
    color: #fff;
    text-align: center;
    padding: 15px 0;
    margin-top: 40px;
    font-size: 14px;
  }

  /* ======== RESPONSIVE ======== */
  @media (max-width: 600px) {
    .form-grid {
      grid-template-columns: 1fr;
    }

    header {
      flex-direction: column;
      align-items: flex-start;
    }

    nav ul {
      flex-direction: column;
      gap: 10px;
      margin-top: 10px;
    }
  }
</style>
</head>

<body>
	

	<main>
    <div class="contact-container">
       <h2>contacto</h2>

       <!--formulario: ajusta action y method según tu backend -->
       <form action="contacto.php" method="post" novalidate>
         <div class="form-grid">
            <div class="form-group">
              <label for="nombre">nombre completo</label>
              <input id= "nombre" name="nombre" type="text" placeholder="tu nombre" required>
            </div>

       <div class="form-group"
         <label for="email">correo electrónico</label>
         <input id="email" name="email" type="email" placeholder="tucorreo@ejemplo.com" required>
       </div>

       <div class="form-group">
        <label for="telefono">teléfono (opcional)</label>
        <input id="telefono" name="telefono" type="text" placeholder="+57 000 000 00 00">
      </div>

      <div class="form-group"
        <label for="asunto">asunto</label>
        <input id="asunto" name="asunto" type="text" placeholder="breve resumen" required>
      </div>

      <div class="form-group">
        <label for="mensaje">mensaje</label>
        <textarea id="mensaje" name="mensaje" placeholder="escribe tu mensaje..." required></textarea>
        <div class="hint">máximo 2000 caracteres.</div>
      </div>

      <div class="actions">
        <button type="reset" class="btn btn-secondary">limpiar</button>
        <button type="submit" class="btn btn-primary">enviar mensaje</button>
      </div>
    </form>
  </div>
</main>


     
	</main>
	 
	<footer>
	 <p>Realizado por mateo </p>
	</footer>
  <script>
      (function(){
        var mensaje = document.getElementById('mensaje');
        var counter = document.getElementById('counter');
        var form = document.querySelector('.contact-form');
        var submit = document.getElementById('submitBtn');

        function updateCount(){
          var len = mensaje.value.length;
          counter.textContent = len + ' / ' + (mensaje.maxLength || 2000);
          if(len > (mensaje.maxLength - 20)){
            counter.style.color = '#b45309';
          } else {
            counter.style.color = '';
          }
        }
        mensaje.addEventListener('input', updateCount);
        updateCount();

        // simple client-side validation feedback
        form.addEventListener('submit', function(e){
          if(!form.checkValidity()){
            e.preventDefault();
            // focus first invalid
            var firstInvalid = form.querySelector(':invalid');
            if(firstInvalid) firstInvalid.focus();
            // visual hint
            submit.textContent = 'Corrige los campos';
            setTimeout(function(){ submit.textContent = 'Enviar mensaje'; }, 1800);
          } else {
            // prevent double submit UX: disable button briefly while submitting
            submit.disabled = true;
            submit.style.opacity = '.7';
            setTimeout(function(){ submit.disabled = false; submit.style.opacity = ''; }, 3000);
          }
        });

        // reset handler
        document.getElementById('resetBtn').addEventListener('click', function(){
          setTimeout(updateCount, 10);
        });
      })();
    </script>
<script>

    </script>
</body>

</html>
