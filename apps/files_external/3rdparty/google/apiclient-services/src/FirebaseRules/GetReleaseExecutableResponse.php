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

namespace Google\Service\FirebaseRules;

class GetReleaseExecutableResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $executable;
  /**
   * @var string
   */
  public $executableVersion;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $rulesetName;
  /**
   * @var string
   */
  public $syncTime;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setExecutable($executable)
  {
    $this->executable = $executable;
  }
  /**
   * @return string
   */
  public function getExecutable()
  {
    return $this->executable;
  }
  /**
   * @param string
   */
  public function setExecutableVersion($executableVersion)
  {
    $this->executableVersion = $executableVersion;
  }
  /**
   * @return string
   */
  public function getExecutableVersion()
  {
    return $this->executableVersion;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setRulesetName($rulesetName)
  {
    $this->rulesetName = $rulesetName;
  }
  /**
   * @return string
   */
  public function getRulesetName()
  {
    return $this->rulesetName;
  }
  /**
   * @param string
   */
  public function setSyncTime($syncTime)
  {
    $this->syncTime = $syncTime;
  }
  /**
   * @return string
   */
  public function getSyncTime()
  {
    return $this->syncTime;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GetReleaseExecutableResponse::class, 'Google_Service_FirebaseRules_GetReleaseExecutableResponse');
