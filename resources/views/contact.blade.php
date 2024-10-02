<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contacto</title>
  <style>
    body{
        width: 100vw;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: #e5e5e5;
    }
    .form-container{
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: .8rem;
        background: white;
        box-shadow: 5px 5px 10px rgba(0,0,0,0.7);
        padding: 3rem 4rem;
        margin: 5rem 0;
    }
    .form-container h1{
        margin-bottom: 0;
    }
    .form-container p{
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 2rem;
    }
    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
    .form-group{
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    label{
        font-size: 22px;
        font-weight: 600;
        margin-right: 1rem;
    }
    input, select{
        width: 22rem;
        border-radius: .5rem;
        font-size: 20px;
        font-weight: 400;
        padding: .5rem;
    }
    .form-container button{
        font-size: 22px;
        font-weight: bolder;
        background: #23ce2b;
        color: white;
        cursor: pointer;
        border: none;
        border-radius: .5rem;
        padding: .8rem 3rem;
        margin: 1rem 0;
    }
    .form-container button:hover{
        background: #218838;
    }
  </style>
</head>
<body>
    <div class="form-container">
        <h1>Formulario de contacto</h1>
        <p>Registra tus datos para brindarte toda la información</p>
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">Nombre</label>
                <input type="text" id="first_name" name="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="last_name">Apellido</label>
                <input type="text" id="last_name" name="last_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dni">C.I</label>
                <input type="text" id="dni" name="dni" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Correo</label>
                <input type="text" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
            <label for="gender">Género</label>
            <select id="gender" name="gender" class="form-control" required>
                <option value="male">Masculino</option>
                <option value="female">Femenino</option>
            </select>
            </div>
            <div class="form-group">
                <label for="nationality">Nacionalidad</label>
                <input type="text" id="nationality" name="nationality" class="form-control" required>
            </div>

            <div class="form-group ">
                <label for="emergency_phone">Telefono de emergencia</label>
                <input type="text" id="emergency_phone" name="emergency_phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="information">Informacion</label>
                <input type="text" id="information" name="information" class="form-control" required>
            </div>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>