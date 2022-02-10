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

namespace Google\Service\Script;

class Version extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $scriptId;
  /**
   * @var int
   */
  public $versionNumber;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setScriptId($scriptId)
  {
    $this->scriptId = $scriptId;
  }
  /**
   * @return string
   */
  public function getScriptId()
  {
    return $this->scriptId;
  }
  /**
   * @param int
   */
  public function setVersionNumber($versionNumber)
  {
    $this->versionNumber = $versionNumber;
  }
  /**
   * @return int
   */
  public function getVersionNumber()
  {
    return $this->versionNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Version::class, 'Google_Service_Script_Version');
