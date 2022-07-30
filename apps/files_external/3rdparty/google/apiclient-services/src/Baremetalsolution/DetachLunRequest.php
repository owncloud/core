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

namespace Google\Service\Baremetalsolution;

class DetachLunRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $lun;
  /**
   * @var bool
   */
  public $skipReboot;

  /**
   * @param string
   */
  public function setLun($lun)
  {
    $this->lun = $lun;
  }
  /**
   * @return string
   */
  public function getLun()
  {
    return $this->lun;
  }
  /**
   * @param bool
   */
  public function setSkipReboot($skipReboot)
  {
    $this->skipReboot = $skipReboot;
  }
  /**
   * @return bool
   */
  public function getSkipReboot()
  {
    return $this->skipReboot;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DetachLunRequest::class, 'Google_Service_Baremetalsolution_DetachLunRequest');
