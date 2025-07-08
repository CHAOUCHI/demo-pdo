<?php 


class UserModel{
    private PDO $conn;

    function __construct()
    {
        $this->conn = new PDO("mysql:host=127.0.0.1;dbname=snapcat","root","root");
        $statment = $this->conn->prepare("CREATE TABLE IF NOT EXISTS User (id INT AUTO_INCREMENT PRIMARY KEY,name TEXT,password TEXT);");
        $result = $statment->execute();
    }

    public function signin(string $email, string $password) : bool {
        try {
            $statment = $this->conn->prepare("INSERT INTO User (name,password) VALUES (?,?)");
            $result = $statment->execute([
                $email,
                $password
            ]);
            return $result;
        } catch (\Throwable $th) {
            //throw $th;
            $log_file = fopen("log","a+");
            fwrite($log_file,$th->getMessage()."\n");
            return false;
        }
    }
}

function main(){
    echo "Hello\n";
    try {
        $userModel = new UserModel();
        $isSignin = $userModel->signin("massi@email.com","1234");
        var_dump($isSignin);
    } catch (\Throwable $th) {
        throw $th;
    }

}
main();


?> 

