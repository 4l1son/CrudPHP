
<?php 
   //POST
   $name="";
   $email="";
   $phone="";
   $address="";

   $errorMessage="";
   $SuccesMessage="";

   if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $name = $_POST["name"];
       $email = $_POST["email"];
       $phone = $_POST["phone"];
       $address = $_POST["address"];
   }
   do{
       if(empty($name) || empty($email) || empty($phone) || empty($address)){
       $errorMessage = "Todos campos são necessarios ser preenchidos";
       break;
       }
       $servename = "localhost";
       $username = "root";
       $password = "a1m1n1p0";
       $database = "usuario_api";

       $connection = new mysqli($servename,$username,$password,$database);
       if($connection ->connect_error){
           die("Conexao falhou " . $connection->connect_error);
       }


       $sqlInsert =  "INSERT INTO clients (name,email,phone,address)" . 
       "VALUES ('$name','$email','$phone','$address')";
       $result1 = $connection->query($sqlInsert);

   $name="";
   $email="";
   $phone="";
   $address="";
   $SuccesMessage = "Adicionado corretamente";

   }
   while(false);

   //adicionando no banco de dados
   
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Crud-PHP</title>
</head>
<body>
        <div class="container my-5">
            <h2>Lista de clientes</h2>
                
                <?php
                      if(!empty($errorMessage)){
                        echo "<strong> $errorMessage</strong>";
                      }              
                ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Novo cliente</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Novos cadastros</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" id="Nome-name" name="name" value="<?php echo $name ?>">
                        </div>
                        <div class="form-group">
                            <label for="email-text" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email-name" name="email" value="<?php echo $email ?>">
                        
                         </div>
                         <div class="form-group">
                            <label for="telefone-name" class="col-form-label">Telefone:</label>
                            <input type="number" class="form-control" id="Number-name" name="phone" value="<?php echo $phone ?>">
                        </div>
                        <div class="form-group">
                            <label for="endereco-text" class="col-form-label">Endereço:</label>
                            <input type="text" class="form-control" id="endereco-name" name="address" value=" <?php echo $address ?>">
                        
                         </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" value="Submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                    </form>
                    
                    </div>
                </div>
                </div>

            <br>
            <table class="table" id="c">
                <thread>
                    <tr>
                        <th>ID:</th>
                        
                        <th>Nome:</th>
                    
                        <th>Email:</th>
                    
                        <th>Telefone:</th>
                    
                        <th>Endereço:</th>
                    
                        <th>Criação:</th>
                    
                        <th>Action:</th>
                    
                    </tr>
                </thread>
                <tbody>
                    <?php
                        $servename = "localhost";
                        $username = "root";
                        $password = "a1m1n1p0";
                        $database = "usuario_api";

                        $connection = new mysqli($servename,$username,$password,$database);
                        if($connection ->connect_error){
                            die("Conexao falhou " . $connection->connect_error);
                        }

                    
                        //put

                    
                        //get
                        $sql = "SELECT * FROM clients";
                        $result = $connection->query($sql);

                        if(!$result){
                            die("Invalida query: " .$connection->error);
                        }
                        while ($row = $result->fetch_assoc() ) {
                            echo "
                                
                <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                    
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo'>Edite </button>
                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo'>Delete</button>
                    
                    </td>
                </tr>
                            ";
                            
                        }

                     
                    ?>
                    
                </tbody>
            </table>
        </div>
        <script>
            var node = document.getElementById("conteudo");
            if (node.parentNode) {
                node.parentNode.removeChild(node);  
            }
        </script>
</body>
</html>