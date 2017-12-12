<?php
    class Role
    {
        protected $permissions;

        private static $db;

        protected function __construct(){
            $this->$permissions = array();
        }
        public static function setDatabase($db){
            self::$db = $db;
        }

        public static function getRolePerms($idRol){
            $role = new Role();
            $stm = self::$db->prepare('SELECT P.descripcion FROM RolTienePermiso RTP
                    JOIN Permiso P ON RTP.idPermiso = P.idPermiso
                    WHERE RTP.idRol = :idRol');
                //Usar vista creada
            $stm->execute(array(':idRol'=>$idRol));

            while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                $role->permissions[$row['perm_desc']] = true;
            }
            return $role;
        }
        public function hasPerm($permission){
            return isset ($this->permissions[$permission]);
        }
    }
 ?>
