<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Books;

class Usersettings extends \Google\Model
{
  /**
   * @var string
   */
  public $kind;
  protected $notesExportType = UsersettingsNotesExport::class;
  protected $notesExportDataType = '';
  protected $notificationType = UsersettingsNotification::class;
  protected $notificationDataType = '';

  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param UsersettingsNotesExport
   */
  public function setNotesExport(UsersettingsNotesExport $notesExport)
  {
    $this->notesExport = $notesExport;
  }
  /**
   * @return UsersettingsNotesExport
   */
  public function getNotesExport()
  {
    return $this->notesExport;
  }
  /**
   * @param UsersettingsNotification
   */
  public function setNotification(UsersettingsNotification $notification)
  {
    $this->notification = $notification;
  }
  /**
   * @return UsersettingsNotification
   */
  public function getNotification()
  {
    return $this->notification;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Usersettings::class, 'Google_Service_Books_Usersettings');
