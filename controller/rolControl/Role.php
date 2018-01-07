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

            $role = new Role();

            $sql = 'SELECT P.descripcion descripcion FROM RolTienePermiso RTP
                    JOIN Permiso P ON RTP.idPermiso = P.idPermiso
                    WHERE RTP.idRol = "'.$idRol.'"';
                //Usar vista creada
            //$stm->execute(array(':idRol'=>$idRol));
            $stm = $db->query($sql);
            $count = 1;
            while($row = $stm->fetch_array(MYSQLI_ASSOC)){
                $role->permissions[$row['descripcion']] = true;
                $count++;
            }
            return $role;
        }
        public function hasPerm($permission){
            return isset($this->permissions[$permission]);
        }
    }
 ?>
