<?php
// auto-generated by sfPropelAdmin
// date: 2007/07/18 17:55:34
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Modificar Horario Escolar', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('horarioescolar/edit_header', array('horarioescolar' => $horarioescolar)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('horarioescolar/edit_messages', array('horarioescolar' => $horarioescolar, 'labels' => $labels)) ?>
<?php include_partial('horarioescolar/edit_form', array('horarioescolar' => $horarioescolar, 'labels' => $labels, 'evento' => $evento)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('horarioescolar/edit_footer', array('horarioescolar' => $horarioescolar)) ?>
</div>

</div>