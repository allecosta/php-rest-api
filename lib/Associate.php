<?php

class Associate 
{
    private $conn;
    private $dbTable = "associates";
    public $id;
    public $name;
    public $email;
    public $age;
    public $designation;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    /**
     * Método responsavel por listar os associados
     *
     * @return array                                                                                                                                                                                                
     */
    public function getAssociates() 
    {
        $sqlQuery = "SELECT id, name, email, age, designation, created_at FROM " . $this->dbTable . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();

        return $stmt;
    }

    /**
     * Método resposavel por criar um novo associado
     *
     * @return bool
     */
    public function createAssociate() 
    {
        $sqlQuery = "INSERT INTO 
                        " . $this->dbTable . "
                    SET
                        name = :name,
                        email = :email,                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                        age = :age,
                        designation = :designation,
                        created_at = :created_at";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->designation = htmlspecialchars(strip_tags($this->designation));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));
    
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":designation", $this->designation);
        $stmt->bindParam(":created_at", $this->created_at);

        if ($stmt->execute()) {
            return true;
        }

        return false;
                    
    }

    /**
     * Método responsavel por obter um único associado
     *
     * @return array
     */
    public function getSingleAssociate() 
    {
        $sqlQuery = "SELECT 
                        id,
                        name,
                        email,
                        age,
                        designation,
                        created_at
                    FROM 
                        ". $this->dbTable ."
                    WHERE
                        id = ?
                    LIMIT 1";
        
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];
        $this->email = $dataRow['email'];
        $this->age = $dataRow['age'];
        $this->designation = $dataRow['designation'];
        $this->created_at = $dataRow['created_at'];
    }

    /**
     * Método responsavel por atualizar associados
     *
     * @return bool
     */
    public function updateAssociate() 
    {
        $sqlQuery = "UPDATE 
                        ". $this->dbTable ."
                        SET 
                            name = :name,
                            email = :email,
                            age = :age,
                            designation = :designation,
                            created_at = :created_at
                        WHERE
                            id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->designation = htmlspecialchars(strip_tags($this->designation));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":designation", $this->designation);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
  
    }

    /**
     * Método responsavel por deletar associados
     *
     * @return bool
     */
    public function deleteAssociate() 
    {
        $sqlQuery = "DELETE FROM " . $this->dbTable . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
