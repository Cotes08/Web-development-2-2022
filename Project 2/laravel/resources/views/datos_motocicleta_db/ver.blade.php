<!DOCTYPE html>

<html lang="en">
    <body>
        <h1>Mostrando la motocicleta DB:</h1>
       <?php foreach($motocicleta as $moto)
            {
                echo "Matricula: ".$moto->Matricula."<br> Marca: ".$moto->Marca."<br> Modelo: "
                .$moto->Modelo."<br> Anyo: ".$moto->Anyo."<br> Color: ".$moto->Color." <br> Id Cliente: ". $moto->Id_Cliente;
            }
       ?>
    </body>
</html>