<?php
    class User
    {
        private $userRoles = array();
        private static $db;

        public static function setDatabase($db)
        {
            self::$db = $db;
        }

        public function __construct($user_id, $conexion){

            echo "esta en el constructor";
            self::setDatabase($conexion);
            echo $conexion->host_info;

            //$getUser = self::$db->prepare('SELECT idUsuario, user, password, idRol FROM Usuario WHERE idUsuario = :user_id');
            $sql='SELECT idUsuario, user, password, idRol FROM Usuario WHERE idUsuario ="'.$user_id.'"';
            //$getUser->execute(array(':user_id'=>$user_id));
            $getUser = $conexion->query($sql);
            //$row = $getUser->fetch_array(MYSQLI_ASSOC);
            //echo $row['user'];
            if ($getUser->num_rows == 1) {
                echo "entro en el if";
                $userData = $getUser->fetch_array(MYSQLI_ASSOC);
                $this->user_id = $user_id;
                $this->username = ucfirst($userData['user']);
                $this->password = ucfirst($userData['pass']);
                self::loadRoles($conexion, $user_id);
            }


        }
        protected static function loadRoles($db, $user_id)
        {
            echo "\n <br> asd";
            //$fetchRoles = self::$db->prepare('SELECT Usuario.idUsuario idUsuario, Usuario.idRol idRol, Rol.nombreRol nombreRol FROM Usuario JOIN Rol ON Rol.idRol = Usuario.idRol WHERE Usuario.idUsuario = :user_id');
            $sql = 'SELECT Usuario.idUsuario idUsuario, Usuario.idRol idRol, Rol.nombreRol nombreRol FROM Usuario JOIN Rol ON Rol.idRol = Usuario.idRol WHERE Usuario.idUsuario = "'.$user_id.'"';
            //$fetchRoles->execute(array(':user_id'=> $this->user_id));
            echo $db->host_info;
            $fetchRoles = $db->query($sql);
            echo 'paso la consulta de loadRoles';
            while ($row = $fetchRoles->fetch_array(MYSQLI_ASSOC))
            {
                echo "esta en el whiel <br>";
                $userRoles[$row['nombreRol']] = Role::getRolePerms($row['idRol'], $db);
                echo "pasoUSerroles<br>";

            }
        }
        public function hasPermission($permission)
        {
            echo "<br>User.hasPermission working";
            foreach ($userRoles as $role) {
                echo "string";
                if($role->hasPerm($permission))
                {
                    return true;
                }
            }
            return false;
        }
        }
 ?>
