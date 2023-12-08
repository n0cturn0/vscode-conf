<?php
/**
 * Install hook
 *
 * @return boolean
 */
function plugin_psglacre_install() {
   //do some stuff like instanciating databases, default values, ...
   // return true;
  
   global $DB;
   $DB->query("
   CREATE TABLE `glpi_computer_lacre_hystori` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `computer_id` int(11) DEFAULT NULL,
      `lacre_number` varchar(254) DEFAULT NULL,
      `status` int(11) DEFAULT NULL COMMENT '0 = new 1=updated',
      `user_id_alter` int(11) DEFAULT NULL,
      `data_alteracao` datetime DEFAULT NULL,
      `id_ticket` int(11) DEFAULT NULL,
      `obs` varchar(254) DEFAULT NULL,
      `username` varchar(100) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB");
    $DB->query("
    CREATE TABLE `glpi_computers_lacre` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `computer_id` int(11) DEFAULT 0,
      `status` int(11) DEFAULT NULL,
      `nlacre` varchar(254) DEFAULT 0,
      `id_ticket` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB ");
    $DB->query("
    CREATE TABLE `glpi_computers_lacre_group` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `group_id` int(11) DEFAULT 0,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB ");
    $DB->query("
    CREATE TABLE `glpi_computers_lacre_status` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `status_id` int(11) DEFAULT 0,
      PRIMARY KEY (`id`),
      UNIQUE KEY `status_id` (`status_id`)
    ) ENGINE=InnoDB ");
    if (!TableExists("glpi_computers_lacre_justificativa")) {
      $query = "CREATE TABLE `glpi_computers_lacre_justificativa` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `justificativa` text NOT NULL,
          PRIMARY KEY (`id`)
      ) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
      $DB->query($query) or die("Error creating glpi_computers_lacre_justificativa " . $DB->error());
      // Inserir múltiplos valores
      $insert = "INSERT INTO glpi_computers_lacre_justificativa (justificativa) VALUES 
                 ('Equipamento sem garantia'),
                 ('Equipamento sem conserto'),
                 ('Equipamento impossibilitado de lacre')";   
      $DB->query($insert) or die("Error inserting data: " . $DB->error());
  }
    return true;
}

/**
 * Uninstall hook
 *
 * @return boolean
 */
function plugin_psglacre_uninstall() {
   //to some stuff, like removing tables, generated files, ...

   return true;
}