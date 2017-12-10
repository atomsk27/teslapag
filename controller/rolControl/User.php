<?php
    private $userRoles = array();
    private static $db;

    public static function setDatabase($db)
    {
        self::$db = $db;
    }

    public function __construct($user_id){
        $getUser = $this->db->prepare('SELECT * FROM Usuario WHERE idUsuario = :user_id');
        $getUser->execute(array('_user_id'=>$user_id));
        if ($getUser->rowCount() == 1) {
            $userData = $getUser->fetch (PDO::FETCH_ASSOC);
            $this->user_id = $user_id;
            $this->username = ucfirst($userData['user']);
            $this->password = ucfirst($userData['pass']);
            self::loadRoles();
        }
    protected static function loadRoles()
    {
        $fetchRoles = $this->db->prepare('SELECT Usuario.idUsuario, Usuario.idRol, Rol.nombreRol FROM Usuario JOIN Rol ON Rol.idRol = Usuario.idRol WHERE Usuario.idUsuario = :user_id');
        $fetchRoles->execute(array(':user_id'=> $this->user_id));

        while ($row = $fetchRoles->fetch(PDO::FETCH_ASSOC))
        {
            $this->userRoles[$row['nombreRol']] = Role::getRolePermissions($row['idRol']);
        }
    }
    public function hasPermission($permission)
    {
        foreach ($this->userRoles as $role) {
            if($role->hasPermission($permission))
            {
                return true;
            }
        }
        return false;
    }
    }
 ?>
