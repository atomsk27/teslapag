<?php
    class Role
    {
        protected $permissions;

        protected function __construct(){
            $this->$permissions = array();
        }

        public static function getRolePerms($idRol){
            $role = new Role();
            $sql = 'SELECT P.descripcion FROM RolTienePermiso RTP
                    JOIN Permiso P ON RTP.idPermiso = P.idPermiso
                    WHERE RTP.idRol = :idRol';
            $sth = $GLOBALS['DB']->prepare($sql);
            $sth->execute(array(':idRol'=>$idRol));

            while($row = $sth->fetch(PDO::FETCH_ASSOC)){
                $role->permissions[$row['perm_desc']] = true;
            }
            return $role;
        }
        public function hasPerm($permissions){
            return isset ($this->permissions[$permissions]);
        }
    }
 ?>
