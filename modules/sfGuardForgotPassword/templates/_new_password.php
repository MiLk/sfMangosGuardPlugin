<?php use_helper('I18N') ?>
<?php echo __('Hi %username%', array('%username%' => $user->getUsername()), 'sf_guard') ?>,

<?php echo __('Below you will your username and new password:') ?> 

<?php echo __('Username', null, 'sf_guard') ?>: <?php echo $user->getUsername() ?> 
<?php echo __('Password', null, 'sf_guard') ?>: <?php echo $password ?>