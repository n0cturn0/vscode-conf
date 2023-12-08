<html>

<head>
   <style>
      .hidden {
         display: none;
      }
   </style>
</head>

<body>

   <?php
   include("../../../inc/includes.php");
   $id = $_GET['ticket_id'];
   if (!empty($_GET['ticket_id'])) {
      $ticket_id = intval((filter_var($id, FILTER_SANITIZE_NUMBER_INT)));
   }

   global $DB;
   $justificativas = $DB->query("SELECT * from  glpi_computers_lacre_justificativa");
   $result = $DB->query("SELECT items_id, tickets_id 
                     FROM glpi_items_tickets 
                     JOIN glpi_computers ON
                     glpi_computers.id = glpi_items_tickets.items_id
                     WHERE tickets_id='$ticket_id' AND itemtype='Computer' 
                     AND glpi_computers.computertypes_id= 1");


   if ($result->num_rows != 0) {
      foreach ($result as $value) {
         $data['ticketid'][] = $value['items_id'];
      }
      $contador = count($data['ticketid']);
   }




   $config = PluginPsglacreMaketab::getConfig();
   Html::header(
      __('Perception', 'perception'),
      $_SERVER['PHP_SELF'],
      'assets',
      PluginPsglacreMaketab::class
   );
   echo "<form id='formLacre' class='validation-form' action='" . $CFG_GLPI["root_doc"] . "/plugins/psglacre/front/maketab.form.php' method='post'>";
   echo Html::hidden('_glpi_csrf_token', ['value' => Session::getNewCSRFToken()]);
   ?>

   <table class="tab_cadre_fixehov">
      <tbody>
         <?php
         $numero_lacre = '';
         $tem_lacre = false;
         for ($i = 0; $i < $contador; $i++) {
            foreach ($data as  $value) {
               $consulta_lacre = $DB->query("select * from glpi_computer_lacre_hystori where computer_id = " . $value[$i]);
               if ($consulta_lacre->num_rows > 0) {
                  foreach ($consulta_lacre as $t) {
                     $numero_lacre = $t['lacre_number'];
                     $tem_lacre = true;
                  }
               } else {
                  $numero_lacre = '';
               }
               $consulta_inventario = $DB->query("select  otherserial from glpi_computers where id = " . $value[$i]);
               if ($consulta_inventario->num_rows > 0) {
                  foreach ($consulta_inventario as $t) {
                     if (!empty($t['otherserial'])) {
                        $inventario = $t['otherserial'];
                     } else {
                        $inventario = 'Sem número de inventário';
                     }
                  }
               } else {
                  $inventario = 'Computador sem número de inventário@@';
               }
         ?>
               <tr class="noHover">
                  <th colspan="<?php echo (!empty($numero_lacre)) ? '4' : '4'; ?>">
                     <label>Número de inventário: </label>
                     <input disabled type="text" readonly name="" value="<?php echo  $inventario; ?>">
                  </th>
                  <?php if (!empty($numero_lacre)) { ?>
                     <th colspan="<?php echo (!empty($numero_lacre)) ? '4' : '8'; ?>">
                        <input onclick="esconderOpcoes()" id="validar_<?php echo $value[$i]; ?>" checked type="radio" name="acao_lacre[<?php echo  $value[$i]; ?>]" value="validar" class="acao_lacre">
                        <label for="validar_<?php echo $value[$i]; ?>">Validar</label>
                        <input onclick="esconderOpcoes()" id="alterar_<?php echo $value[$i]; ?>" type="radio" name="acao_lacre[<?php echo  $value[$i]; ?>]" value="alterar" class="acao_lacre">
                        <label for="alterar_<?php echo $value[$i]; ?>">Alterar</label>

                        <input onclick="mostrarOpcoes()" name="acao_lacre[<?php echo  $value[$i]; ?>]" id="radioAssinar" type="radio" name="acao_lacre[<?php echo  $value[$i]; ?>]" value="justificar" class="acao_lacre">
                        <label for="alterar_<?php echo $value[$i]; ?>">Jus<u>tific</u>ar</label>
                        <div id="opcoesAssinatura" class="hidden">
                           <select name="justificativa_id" id="selectStatus" onchange="mostrarTexto()">
                              <option value="0" selected>Selecione uma justificativa</option>
                              <?php foreach ($justificativas as $justificativa) { ?>
                                 <option value="<?php echo $justificativa['id']; ?>" data-observacao="<?= $justificativa['observacao'] ?>"><?php echo $justificativa['justificativa'] ?></option>
                              <?php } ?>
                           </select>
                           <div id="campoTexto" class="hidden">
                              <label>
                                 Digite o motivo:
                                 <textarea name="texto_justificativo" id="texto_justificativo" rows="4" cols="50"></textarea>
                              </label>
                           </div>
                        </div>
                     </th>
                  <?php } else { ?>
                     <th colspan="4"> <input type="text" style="display:none;" readonly name="acao_lacre[<?php echo  $value[$i]; ?>]" value="inserir"> </th>
                  <?php } ?>
                  <th colspan="<?php echo (!empty($numero_lacre)) ? '4' : '4'; ?>">
                     <label>Número do lacre: </label>
                     <input type="number" required="" minlength="7" maxlength="7" id="lacre_<?php echo $i; ?>" ; min="1" name="numero_lacre[<?php echo  $value[$i]; ?>]" value="<?php echo $numero_lacre; ?>" class="numero_lacre " <?php echo (!empty($numero_lacre)) ? ' readonly="readonly" style="background-color: rgb(224, 224, 224);"' : ''; ?>>
                  </th>
               </tr>
         <?php
            }
         }
         ?>
         <tr class="noHover">
            <th colspan="16">
               <input type="hidden" name="ticke_id" value="<?= $ticket_id ?>">
               <input type="submit" value="Salvar" name="salvar" class="submit">
            </th>
         </tr>
      </tbody>
   </table>
   </form>
   <?php
   if (isset($_POST["salvar"])) {
      $username =  $_SESSION['glpiname'];
      $userid = $_SESSION['glpiID'];
      $id_ticket = $_POST['ticke_id'];
      $today = date("Y-m-d H:i:s");
      $error = false;
      $duplicado = false;

      $contador_lacres = array();
      foreach ($_POST['numero_lacre'] as $computer_id => $lacre) {
         if (!isset($contador_lacres[$lacre])) {
            $contador_lacres[$lacre] = 1;
         } else {
            $contador_lacres[$lacre]++;
         }
      }
      foreach ($contador_lacres as $lacre => $contador) {
         if ($contador > 1) {
            $error = true;
            $lacre_missing["nostring"] .= 'Número de lacre: ' . $lacre . ' duplicado<br>';
            $message = sprintf(
               __('Por favor corrija: %s'),
               implode(", ", $lacre_missing)
            );
         }
      }
      /* 
         Id de status       
         1 - Primeiro lacre
         2 - Validado lacre (lacre ja existente)
         3 - Lacre alterado
      */
      foreach ($_POST['acao_lacre'] as $computer_id => $acao) {
         switch ($variable) {
            case 'validar':
               $verifica_lacre = $DB->query("SELECT * 
            FROM 
               glpi_computer_lacre_hystori 
            WHERE 
               id_ticket = '" . $_POST['ticke_id'] . "'
            
            ");


               $cont_lacre = ($verifica_lacre->num_rows);
               if ($cont_lacre > 0) {
                  foreach ($verifica_lacre as $registro_atual) {
                     if (!is_numeric($registro_atual['lacre_number'])) {
                        $error = true;
                        $lacre_missing["digito"] .= 'O número do lacre deve conter apenas números<br>';
                        $message = sprintf(
                           __('Por favor corrija: %s'),
                           implode(", ", $lacre_missing)
                        );
                     } elseif (strlen($registro_atual['lacre_number']) != 7) {
                        # igual a sete
                        $lacre_missing["digito"] .= 'O número do lacre deve conter 7 númerais<br>';
                        $message = sprintf(
                           __('Por favor corrija: %s'),
                           implode(", ", $lacre_missing)
                        );
                     }
                  }
               } else {
                  $error = true;
                  $lacre_missing["nostring"] .= 'Lacre: ' . $_POST['numero_lacre'][$computer_id] . ' diferente do cadastrado<br>';
                  $message = sprintf(
                     __('Por favor corrija: %s'),
                     implode(", ", $lacre_missing)
                  );
               }
               break;
            case 'alterar':
               $acao_lacre = $_POST['acao_lacre'];
               $valorLacre = $_POST['numero_lacre'];
               $lacres_a_alterar = [];
               foreach ($acao_lacre as $key => $value) {
                  if ($value === 'alterar') {
                     $lacres_a_alterar[] = $valorLacre[$key];
                  }
               }


               $verifica_lacre = $DB->query("SELECT * 
         FROM 
           glpi_computer_lacre_hystori 
         WHERE
         lacre_number IN ('" . implode("', '", $lacres_a_alterar) . "')");
               $cont_lacre = ($verifica_lacre->num_rows);
               if ($cont_lacre > 0) {
                  $error = true;
                  $lacre_missing["nostring"] .= 'Ja existe um lacre cadastrado com o número: ' . $_POST['numero_lacre'][$computer_id] . '<br>';
                  $message = sprintf(
                     __('Por favor corrija: %s'),
                     implode(", ", $lacre_missing)
                  );
               }
               break;
            case 'inserir':
               if (!is_numeric($_POST['numero_lacre'][$computer_id])) {
                  $error = true;
                  $lacre_missing["digito"] .= 'O número do lacre deve conter apenas números<br>';
                  $message = sprintf(
                     __('Por favor corrija: %s'),
                     implode(", ", $lacre_missing)
                  );
               } elseif (strlen($_POST['numero_lacre'][$computer_id]) != 7) {
                  # igual a sete
                  $error = true;
                  $lacre_missing["digito"] .= 'O número do lacre deve conter 7 númerais<br>';
                  $message = sprintf(
                     __('Por favor corrija: %s'),
                     implode(", ", $lacre_missing)
                  );
               }
               $verifica_lacre = $DB->query("SELECT * 
            FROM 
               glpi_computer_lacre_hystori 
            WHERE
               lacre_number = '" . $_POST['numero_lacre'][$computer_id] . "' 
            ORDER BY 
               id DESC LIMIT 1");
               $cont_lacre = ($verifica_lacre->num_rows);
               if ($cont_lacre > 0) {
                  $error = true;
                  $lacre_missing["nostring"] .= 'Ja existe um lacre cadastrado com o número: ' . $_POST['numero_lacre'][$computer_id] . '<br>';
                  $message = sprintf(
                     __('Por favor corrija: %s'),
                     implode(", ", $lacre_missing)
                  );
               }
               break;
            default:
               # code...
               break;
         }
      }
      if ($error) {
         Session::addMessageAfterRedirect($message, false, ERROR);
         Html::redirect($CFG_GLPI["root_doc"] . "/plugins/psglacre/front/maketab.form.php?ticket_id=" . $id_ticket);
      } else {
         if (isset($_POST["salvar"])) {


            foreach ($_POST['acao_lacre'] as $computer_id => $acao) {
               PluginPsglacreMaketab::processAcaoLacre($acao, $computer_id, $DB, $username, $userid, $id_ticket, $today);
            }

            // foreach ($_POST['acao_lacre'] as $computer_id => $acao) {
            //    switch ($acao) {
            //       case 'validar':
            //          $ValidarLacreUpdate = $DB->query("SELECT * 
            //          FROM 
            //             glpi_computer_lacre_hystori 
            //          WHERE
            //          id_ticket = '$ticket_id'
            //          AND
            //          computer_id = '" . $computer_id . "'
            //          ORDER BY id DESC LIMIT 1");
            //          foreach ($ValidarLacreUpdate as $registro_atual) {
            //             $hystori = "
            //                   INSERT INTO 
            //                      glpi_computer_lacre_hystori 
            //                   SET
            //                      computer_id = '" . $registro_atual['computer_id'] . "',
            //                      lacre_number = '" . $registro_atual['lacre_number'] . "',
            //                      status = 2,
            //                      username = '$username',
            //                      id_ticket = $id_ticket,
            //                      user_id_alter = '$userid',
            //                      data_alteracao = '$today'
            //                ";
            //             $DB->query($hystori);
            //          }
            //          break;

            //       case 'alterar':
            //             $hystori = "
            //             INSERT INTO 
            //                glpi_computer_lacre_hystori 
            //             SET
            //                computer_id = '" . $computer_id . "',
            //                lacre_number = '" . $_POST['numero_lacre'][$computer_id] . "',
            //                status = 3,
            //                username = '$username',
            //                user_id_alter = '$userid',
            //                id_ticket = $id_ticket,
            //                data_alteracao = '$today'";
            //                $DB->query($hystori);
            //       break;
            //       case 'inserir':
            //             $insere_lacre = "
            //             INSERT INTO 
            //                glpi_computers_lacre 
            //             SET
            //                computer_id = '$computer_id',
            //                status = 1,
            //                nlacre ='" . $_POST['numero_lacre'][$computer_id] . "',
            //                id_ticket = $id_ticket
            //             ";
            //          $DB->query($insere_lacre);
            //          $hystori = "
            //          INSERT INTO 
            //             glpi_computer_lacre_hystori 
            //          SET
            //             computer_id = '$computer_id',
            //             lacre_number = '" . $_POST['numero_lacre'][$computer_id] . "',
            //             status = 1,
            //             id_ticket = $id_ticket,
            //             username = '$username',
            //             user_id_alter = '$userid',
            //             data_alteracao = '$today'
            //          ";
            //          $DB->query($hystori);

            //       break;
            //       // default:
            //       //    # code...
            //       //    break;
            //    }

            // }
         }
         Html::redirect("{$CFG_GLPI['root_doc']}/front/ticket.form.php?id=$id_ticket");
      }
   }
   ?>
   <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
   <script>
      jQuery.extend(jQuery.validator.messages, {
         required: "<br>Este campo é obrigatório.",
         remote: "Please fix this field.",
         email: "Please enter a valid email address.",
         url: "Please enter a valid URL.",
         date: "Please enter a valid date.",
         dateISO: "Please enter a valid date (ISO).",
         number: "<br>Campo somente para números.",
         digits: "Please enter only digits.",
         creditcard: "Please enter a valid credit card number.",
         equalTo: "Please enter the same value again.",
         accept: "Please enter a value with a valid extension.",
         maxlength: jQuery.validator.format("<br>Por favor é preciso de {0} dígitos."),
         minlength: jQuery.validator.format("<br>Por favor é preciso de {0} dígitos."),
         rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
         range: jQuery.validator.format("Please enter a value between {0} and {1}."),
         max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
         min: jQuery.validator.format("<br>Número inválido,por favor corrija.")
      });
   </script>
   <script type="text/javascript">
      $(".acao_lacre").click(function() {
         if ($(this).val() === 'validar') {
            $(this).parent().parent().find('.numero_lacre').attr('readonly', true);
            $(this).parent().parent().find('.numero_lacre').css('background-color', '#e0e0e0');
         } else {
            $(this).parent().parent().find('.numero_lacre').removeAttr('readonly');
            $(this).parent().parent().find('.numero_lacre').css('background-color', 'field');
         }
      });
      $('form.validation-form').validate();
   </script>

   <script type="text/javascript">
      $(".acao_lacre").click(function() {
         if ($(this).val() === 'justificar') {
            $(this).parent().parent().find('.numero_lacre').attr('readonly', true);
            $(this).parent().parent().find('.numero_lacre').css('background-color', '#e0e0e0');
         } else {
            $(this).parent().parent().find('.numero_lacre').removeAttr('readonly');
            $(this).parent().parent().find('.numero_lacre').css('background-color', 'field');
         }
      });
      $('form.validation-form').validate();
   </script>


   <script>
      function mostrarOpcoes() {
         // var opcoesAssinatura = document.getElementById("opcoesAssinatura");
         // if (document.getElementById("radioAssinar").checked) {
         //    opcoesAssinatura.classList.remove("hidden");
         //    // document.getElementById("selectStatus").value = "assinar";
         //    mostrarTexto();
         // } else {
         //    opcoesAssinatura.classList.add("hidden");
         // }

         var opcoesAssinatura = document.getElementById("opcoesAssinatura");
         var radioAssinar = document.getElementById("radioAssinar");
         var numeroLacreInput = document.getElementById("lacre_<?php echo $i; ?>");

         if (radioAssinar.checked) {
            // Oculta o campo de input
            numeroLacreInput.style.display = "none";

            // Define o valor como "0000001"
            numeroLacreInput.value = "0000001";

            // Opcionalmente, você pode ocultar outros elementos ou realizar ações adicionais aqui
         } else {
            // Exibe o campo de input
            numeroLacreInput.style.display = "block";

            // Redefine o valor para o valor original, se necessário
            numeroLacreInput.value = "<?php echo $numero_lacre; ?>";
         }
      }




      function mostrarTexto() {
         const campoTexto = document.getElementById("campoTexto");
         const selectStatus = document.getElementById("selectStatus");
         const selectedOption = selectStatus.options[selectStatus.selectedIndex];
         const observacao = selectedOption.dataset.observacao;




         if (observacao == 1) {
            campoTexto.classList.remove("hidden");
            return;
         }
         campoTexto.value = '';
         campoTexto.classList.add("hidden");

      }

      function esconderOpcoes() {
         var opcoesAssinatura = document.getElementById("opcoesAssinatura");
         opcoesAssinatura.classList.add("hidden");

      }
   </script>

   <body>

</html>