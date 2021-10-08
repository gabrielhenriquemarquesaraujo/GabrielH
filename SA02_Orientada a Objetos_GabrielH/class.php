<?php
    class cadastroPaciente{
        private $_con;
        private $pdo;

        /*public function __construct(){
            try {
                $this->_con = new PDO('mysql:host=localhost;dbname=clinica','root','1234');
                $this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        } catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
            }
        }*/

        public function returnConnection(){
            return $this->_con;
        }

        public function getPaciente(){
            $pdo = new PDO('mysql:host=localhost;dbname=clinica','root','123');
            if(isset($_POST['nome'])){
                $nome = htmlspecialchars($_POST['nome']);
                $rua = addslashes($_POST['rua']);
                $logr = addslashes($_POST['logradouro']);
                $comp = addslashes($_POST['complemento']);
                $bai = addslashes($_POST['bairro']);
                $CEP = addslashes($_POST['CEP']);
                $email = addslashes($_POST['email']);
                $tl_fixo = addslashes($_POST['tl_fixo']);
                $cel = addslashes($_POST['cel']);
                $tl_sec = addslashes($_POST['tl_sec']);

                $sql = $pdo->prepare("INSERT INTO tbl_registropaciente (nome, rua, logradouro, complemento, bairro, CEP, email, tl_fixo, cel, tl_sec) 
                VALUES (:nome,:rua,:logr,:comp,:bai,:CEP,:email,:tl_fixo,:cel,:tl_sec)");
                $sql->bindParam(":nome", $nome);
                $sql->bindParam(":rua", $rua);
                $sql->bindParam(":logr", $logr);
                $sql->bindParam(":comp", $comp);
                $sql->bindParam(":bai", $bai);
                $sql->bindParam(":CEP", $CEP);
                $sql->bindParam(":email", $email);
                $sql->bindParam(":tl_fixo", $tl_fixo);
                $sql->bindParam(":cel", $cel);
                $sql->bindParam(":tl_sec", $tl_sec);
                $sql->execute();
                echo 'Inserido com sucesso!';
            }
        }

        /*public function setPaciente(){
            $pdo = new PDO('mysql:host=localhost;dbname=clinica','root','');
            if(isset($_GET['delete'])){
                $id_paciente = (int)$_GET['delete'];
                $pdo->execute("DELETE FROM tbl_registropaciente WHERE id=$id_paciente");
                echo 'Deletado com sucesso o id: '.$id_paciente;
            } if(isset($_POST['nome'])){
                $sql = $pdo->query("SELECT * FROM tbl_registropaciente");
                $sql->execute();

                $fetch_registroPaciente = $sql->fetchAll();

                foreach ($fetch_registroPaciente as $key => $value){
                    echo '<a href="?delete='.$value['id'].'">(X)</a>'.$value['nome'];
                }
            }
        }*/
    }
?>