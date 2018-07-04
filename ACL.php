<?php
// Définition des éléments
$acl = new Acl();
$admin = new Role('1');
$resource = new Resource('supprimer', 'news');
// A partir de l'acl
$acl->allow($statut, $resource);
// ou à partir du role
$admin->allow($resource);
// ou a partir de la resource
$resource->allow($admin);

?>