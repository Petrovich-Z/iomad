<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Уведомление о несовместимом браузере.
 *
 * @package    auth_mailtoken
 * @copyright  2019 Andrey Zobov
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../config.php');

redirect_if_major_upgrade_required();

$testsession = optional_param('testsession', 0, PARAM_INT); // test session works properly
$anchor      = optional_param('anchor', '', PARAM_RAW);      // Used to restore hash anchor to wantsurl.

$context = context_system::instance();
$PAGE->set_url("$CFG->wwwroot/login/browser.php");
$PAGE->set_context($context);
$PAGE->set_pagelayout('login');

// Ignore any active pages in the navigation/settings.
// We do this because there won't be an active page there, and by ignoring the active pages the
// navigation and settings won't be initialised unless something else needs them.
$PAGE->navbar->ignore_active();
$loginsite = get_string("loginsite");
$PAGE->navbar->add($loginsite);

$PAGE->set_title("Не совместимый браузер"); //get_string('getlinktitle', 'auth_mailtoken')
$PAGE->set_heading($site->fullname);

echo $OUTPUT->header();

echo $OUTPUT->box_start("row justify-content-center");
  echo $OUTPUT->box_start("col-xl-6 col-sm-8");
    echo $OUTPUT->box_start("card");
      echo $OUTPUT->box_start("card-block");
        echo $OUTPUT->heading("Ваш браузер не поддерживается", 2 ,"card-header text-center");
        echo $OUTPUT->box_start("card-body");

          echo $OUTPUT->box("К сожалению вы не можете продолжить работу в системе онлайн образования в этом браузере. Он не поддерживает необходимые web-стандарты для полноценного обучения. Рекомендуем воспользоваться браузером <a href='https://www.mozilla.org/' target='_blank'>Firefox</a> или <a href='https://www.google.ru/chrome/' target='_blank'>Chrome</a>.", 'text-center'); //get_string('getlink_desc', 'auth_mailtoken')
          //require_once('request_token_form.php');
          //$selfUrl = "$CFG->wwwroot/login/browser.php";

        echo $OUTPUT->box_end();
      echo $OUTPUT->box_end();
    echo $OUTPUT->box_end(); 
  echo $OUTPUT->box_end();
echo $OUTPUT->box_end();

//$theme = $PAGE->theme->name;
//echo $OUTPUT->box("Current Theme:". print_r($theme, true));

//$form->display();
echo $OUTPUT->footer();
