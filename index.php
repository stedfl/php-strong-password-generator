<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Generator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="main-wrap w-100 d-flex align-items-center justify-content-center">
    <div class="container w-50 p-4 ">
      <h1 class="text-white text-center">Generatore Password Sicure</h1>
      <p class="text-white text-center">Genera una password sicura</p>
      <div class="msg info py-1 px-4">
        <p class="info-psw">Scegliere una password con un minimo di 8 ed un massimo di 32 caratteri</p>
      </div>
      <div class="msg error py-1 px-4">
        <p class="error">Errore! La lunghezza della password deve essere compresa tra un minimo di 8 ed un massimo di 32 caratteri</p>
      </div>
      <div class="settings p-3 mt-3">
        <form action="" method="GET">
          <div class="d-flex align-items-center mb-3">
            <label for="exampleFormControlInput1" class="form-label me-2 w-50">Lunghezza password:</label>
            <input type="number" name="psw_length" class="form-control w-25 " id="exampleFormControlInput1" placeholder="number">
          </div>
          <button class="btn btn-primary" type="submit">Invia</button>
          <button class="btn btn-secondary" type="reset">Annulla</button>
        </form>
      </div>
    </div>
  </div>
  
  
</body>
</html>