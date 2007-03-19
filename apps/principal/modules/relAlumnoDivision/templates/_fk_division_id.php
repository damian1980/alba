<?php 
    $c = new Criteria(); 
    $c->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $sf_user->getAttribute('fk_establecimiento_id'));    
    $c->add(TurnosPeer::FK_CICLOLECTIVO_ID, $sf_user->getAttribute('fk_ciclolectivo_id'));
    $c->addJoin(AnioPeer::ID,DivisionPeer::FK_ANIO_ID);
    $c->addJoin(TurnosPeer::ID,DivisionPeer::FK_TURNOS_ID);
    
    //$c->addAscendingOrderByColumn(AlumnoPeer::APELLIDO);
    //$c->addAscendingOrderByColumn(AlumnoPeer::NOMBRE);
    $divisiones = DivisionPeer::doSelect($c);
    $optionsDivisiones = array();
    $optionsDivisiones[""] = "--Seleccione una Divisi&oacute;n--";
    foreach ($divisiones as $division) {
        $optionsDivisiones[$division->getId()] = $division->getAnio()->getDescripcion(). " / " . $division->getDescripcion();
    }
    echo select_tag('rel_alumno_division[fk_division_id]', options_for_select($optionsDivisiones, $rel_alumno_division->getFkDivisionId()) ) ;
?>
