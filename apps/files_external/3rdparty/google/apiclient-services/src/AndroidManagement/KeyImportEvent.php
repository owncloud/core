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

namespace Google\Service\AndroidManagement;

class KeyImportEvent extends \Google\Model
{
  /**
   * @var int
   */
  public $applicationUid;
  /**
   * @var string
   */
  public $keyAlias;
  /**
   * @var bool
   */
  public $success;

  /**
   * @param int
   */
  public function setApplicationUid($applicationUid)
  {
    $this->applicationUid = $applicationUid;
  }
  /**
   * @return int
   */
  public function getApplicationUid()
  {
    return $this->applicationUid;
  }
  /**
   * @param string
   */
  public function setKeyAlias($keyAlias)
  {
    $this->keyAlias = $keyAlias;
  }
  /**
   * @return string
   */
  public function getKeyAlias()
  {
    return $this->keyAlias;
  }
  /**
   * @param bool
   */
  public function setSuccess($success)
  {
    $this->success = $success;
  }
  /**
   * @return bool
   */
  public function getSuccess()
  {
    return $this->success;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KeyImportEvent::class, 'Google_Service_AndroidManagement_KeyImportEvent');
