<?php
    class User
    {
        private static $db;
        private static $userRoles = array();

        public static function setDatabase($db)
        {
            self::$db = $db;
        }

        public function __construct($user_id, $conexion){

            self::setDatabase($conexion);

            //$getUser = self::$db->prepare('SELECT idUsuario, user, password, idRol FROM Usuario WHERE idUsuario = :user_id');
            $sql='SELECT idUsuario, user, password, idRol FROM Usuario WHERE idUsuario ="'.$user_id.'"';
            //$getUser->execute(array(':user_id'=>$user_id));
            $getUser = $conexion->query($sql);
            //$row = $getUser->fetch_array(MYSQLI_ASSOC);
            //echo $row['user'];
            if ($getUser->num_rows == 1) {
                $userData = $getUser->fetch_array(MYSQLI_ASSOC);
                $this->user_id = $user_id;
                $this->username = ucfirst($userData['user']);
                $this->password = ucfirst($userData['pass']);
                self::loadRoles($conexion, $user_id);
            }


        }
        protected static function loadRoles($db, $user_id)
        {
            //$fetchRoles = self::$db->prepare('SELECT Usuario.idUsuario idUsuario, Usuario.idRol idRol, Rol.nombreRol nombreRol FROM Usuario JOIN Rol ON Rol.idRol = Usuario.idRol WHERE Usuario.idUsuario = :user_id');
            $sql = 'SELECT Usuario.idUsuario idUsuario, Usuario.idRol idRol, Rol.nombreRol nombreRol FROM Usuario JOIN Rol ON Rol.idRol = Usuario.idRol WHERE Usuario.idUsuario = "'.$user_id.'"';
            //$fetchRoles->execute(array(':user_id'=> $this->user_id));
            $fetchRoles = $db->query($sql);
            while ($row = $fetchRoles->fetch_array(MYSQLI_ASSOC))
            {
                self::$userRoles[$row['nombreRol']] = Role::getRolePerms($row['idRol'], $db);
            }
        }
        public function hasPermission($permission)
        {
            foreach (self::$userRoles as $role) {
                if($role->hasPerm($permission))
                {
                    return true;
                }
            }
            return false;
        }
        }
 ?>
