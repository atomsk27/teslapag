<?php
    class Role
    {
        protected $permissions;

        private static $db;

        protected function __construct(){
            $this->permissions = array();
        }
        public static function setDatabase($db){
            self::$db = $db;
        }

        public static function getRolePerms($idRol, $db){
            echo "<br>string";

            $role = new Role();

            echo "<br>", $db->host_info;

            $sql = 'SELECT P.descripcion descripcion FROM RolTienePermiso RTP
                    JOIN Permiso P ON RTP.idPermiso = P.idPermiso
                    WHERE RTP.idRol = "'.$idRol.'"';
                //Usar vista creada
            //$stm->execute(array(':idRol'=>$idRol));
            $stm = $db->query($sql);
            $count = 1;
            while($row = $stm->fetch_array(MYSQLI_ASSOC)){
                $role->permissions[$row['descripcion']] = true;
                echo "<br>",$count,  "\n",$row['descripcion'];
                $count++;
            }
            return $role;
        }
        public function hasPerm($permission){
            echo "<br>hasPerm working";
            return isset($permissions[$permission]);
        }
    }
 ?>
