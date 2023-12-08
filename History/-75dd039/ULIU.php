<?php

class PluginPsglacreMaketab extends CommonDBTM
{
   static $config = array();
   public static $rightname = 'computers';

   static function getTypeName($ps = 0)
   {
      return 'Lacre do computador';
   }

   function getTabNameForItem(CommonGLPI $item, $withtemplate = 0)
   {
      switch ($item::getType()) {
         case Computer::getType():
            return 'Lacre do computador';
            break;
      }
      return '';
   }

   static function displayTabContentForItem(CommonGLPI $item, $tabnum = 1, $withtemplate = 0)
   {
      switch ($item::getType()) {
         case Computer::getType():
            self::displayTab($item);
            break;
      }
      return true;
   }



   static function displayTab($item)
   {
      global $CFG_GLPI;
      global $DB;

      $computador = $item->getID();
      $result = $DB->query("SELECT *, glpi_computers.otherserial FROM glpi_computer_lacre_hystori
                    INNER JOIN glpi_computers ON
                            glpi_computers.id = glpi_computer_lacre_hystori.computer_id where computer_id = " . $computador . " ORDER BY glpi_computer_lacre_hystori.id DESC");
      $cont = ($result->num_rows);

      echo '<br><br><hr>';
      echo '<h2>Históricos das alterações do lacre deste dispositivo</h2>';
      echo '<table class="tab_cadre_fixehov">';
      if ($cont == 0) {
         echo '
         <tbody>
         <tr class="noHover">
         <th colspan="8">';
         echo 'Sem Registro de lacres para esse computador';
         echo '</th>
        </tr>
        
        </tr>
        </tbody>
        </table>';
      } else {


         $color = '#FF0000';
         $lcolor = '#00008B';
         foreach ($result as $key => $value) {
            switch ($value['status']) {
               case 1:
                  if (empty($value['otherserial'])) {
                     $msg = "O computador <font color='" . $lcolor . "'>sem número de inventário encontrado.</font> foi <b><n>lacrado<n></b> pela primeira vez, com o lacre de <font color='" . $lcolor . "'>número "  . $value['lacre_number'] . "</font>" . "através do chamado <font color='" . $lcolor . "'>" . $value['id_ticket'] . "</font>" . ", pelo usuário " . $value['username'] . " em " . date('d/m/Y H:i:s', strtotime($value['data_alteracao']));
                  } else {
                     $msg = "O computador com inventário <font color='" . $lcolor . "'>" . $value['otherserial'] . "</font>, foi lacrado pela primeira vez, com o lacre de número <font color='" . $lcolor . "'>"  . $value['lacre_number'] . ",</font> através do chamado <font color='" . $lcolor . "'>" . $value['id_ticket'] . "</font>" . ", pelo usuário " . $value['username'] . " em " . date('d/m/Y H:i:s', strtotime($value['data_alteracao']));
                  }

                  break;
               case 2:
                  if (empty($value['otherserial'])) {
                     $msg =   $msg = "O computador <font color='" . $lcolor . "'>sem número de inventário encontrado.</font>teve seu lacre <b>validado</b> mantendo o <font color='" . $lcolor . "'>número "  . $value['lacre_number'] . "</font>" . "através do chamado <font color='" . $lcolor . "'>" . $value['id_ticket'] . "</font>" . ", pelo usuário " . $value['username'] . " em " . date('d/m/Y H:i:s', strtotime($value['data_alteracao']));
                  } else {
                     $msg = "O computador com o inventário  <font color='" . $lcolor . "'>" . $value['otherserial'] . "</font>, teve seu lacre validado mantendo o número<font color='" . $lcolor . "'> "  . $value['lacre_number'] . ",</font> através do chamado  <font color='" . $lcolor . "'>" . $value['id_ticket'] . "</font>" . ", pelo usuário " . $value['username'] . " em " . date('d/m/Y H:i:s', strtotime($value['data_alteracao']));
                  }

                  break;
               case 3:
                  if (empty($value['otherserial'])) {
                     $msg =   $msg = "O computador <font color='" . $lcolor . "'>sem número de inventário encontrado.</font>Teve seu lacre substituído pelo de número<font color='" . $lcolor . "'> "  . $value['lacre_number'] . "</font>" . "através do chamado <font color='" . $lcolor . "'>" . $value['id_ticket'] . "</font>" . ", pelo usuário " . $value['username'] . " em " . date('d/m/Y H:i:s', strtotime($value['data_alteracao']));
                  } else {
                     $msg = "O computador com o inventário  <font color='" . $lcolor . "'>" . $value['otherserial'] . "</font>, teve seu lacre substituído como o lacre número<font color='" . $lcolor . "'> "  . $value['lacre_number'] . ",</font> através do chamado  <font color='" . $lcolor . "'>" . $value['id_ticket'] . "</font>" . ", pelo usuário " . $value['username'] . " em " . date('d/m/Y H:i:s', strtotime($value['data_alteracao']));
                  }
               default:
                  # code...
                  break;
            }

            echo '
        <tbody>
        <tr class="noHover">
        <th colspan="8">';
            echo $msg;
         }
      }
      echo  '</th>
        </tr>
        </tr>
        </tbody>
        </table>';
   }


   public static function getConfig()
   {
      if (count(self::$config)) {
         return self::$config;
      }
   }
   public static function processAcaoLacre($acao, $computer_id, $DB, $username, $userid, $id_ticket, $today)
   {
      switch ($acao) {
         case 'validar':
            $ValidarLacreUpdate = $DB->query("SELECT * 
                     FROM 
                        glpi_computer_lacre_hystori 
                     WHERE
                        id_ticket = '$id_ticket'
                        AND
                        computer_id = '" . $computer_id . "'
                     ORDER BY id DESC LIMIT 1");

            foreach ($ValidarLacreUpdate as $registro_atual) {
               $hystori = "
                        INSERT INTO 
                           glpi_computer_lacre_hystori 
                        SET
                           computer_id = '" . $registro_atual['computer_id'] . "',
                           lacre_number = '" . $registro_atual['lacre_number'] . "',
                           status = 2,
                           username = '$username',
                           id_ticket = $id_ticket,
                           user_id_alter = '$userid',
                           data_alteracao = '$today'
                     ";
               $DB->query($hystori);
            }
            break;

         case 'alterar':
            $hystori = "
                     INSERT INTO 
                        glpi_computer_lacre_hystori 
                     SET
                        computer_id = '" . $computer_id . "',
                        lacre_number = '" . $_POST['numero_lacre'][$computer_id] . "',
                        status = 3,
                        username = '$username',
                        user_id_alter = '$userid',
                        id_ticket = $id_ticket,
                        data_alteracao = '$today'";
            $DB->query($hystori);
            break;

         case 'justificar':


            $justifica_lacre = "
                        INSERT INTO 
                        glpi_computers_lacre 
                     SET
                        computer_id = '$computer_id',
                        status = 99,
                        nlacre ='" . $_POST['numero_lacre'][$computer_id] . "',
                        id_ticket = $id_ticket,
                        justificativas_id = $test,
                        justificativa_texto = '" . $_POST['texto_justificativo'] . "',
                  ";

            $DB->query($justifica_lacre);
            $hystori = "
                     INSERT INTO 
                        glpi_computer_lacre_hystori 
                     SET
                        computer_id = '$computer_id',
                        lacre_number = '0000000',
                        status = 99,
                        id_ticket = $id_ticket,
                        username = '$username',
                        user_id_alter = '$userid',
                        data_alteracao = '$today'
                  ";
            $DB->query($hystori);
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            exit();
            break;

         case 'inserir':
            $insere_lacre = "
                     INSERT INTO 
                        glpi_computers_lacre 
                     SET
                        computer_id = '$computer_id',
                        status = 1,
                        nlacre ='123456789 ',
                        id_ticket = $id_ticket
                  ";
            $DB->query($insere_lacre);
            $hystori = "
                     INSERT INTO 
                        glpi_computer_lacre_hystori 
                     SET
                        computer_id = '$computer_id',
                        lacre_number = '" . $_POST['numero_lacre'][$computer_id] . "',
                        status = 1,
                        id_ticket = $id_ticket,
                        username = '$username',
                        user_id_alter = '$userid',
                        data_alteracao = '$today'
                  ";
            $DB->query($hystori);
            break;
      }
   }
}
