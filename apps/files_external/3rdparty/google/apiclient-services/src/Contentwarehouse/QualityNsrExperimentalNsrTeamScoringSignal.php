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

namespace Google\Service\Contentwarehouse;

class QualityNsrExperimentalNsrTeamScoringSignal extends \Google\Model
{
  /**
   * @var bool
   */
  public $valueBool;
  public $valueDouble;
  /**
   * @var float
   */
  public $valueFloat;
  /**
   * @var int
   */
  public $valueInt32;
  /**
   * @var string
   */
  public $valueUint32;
  /**
   * @var int
   */
  public $versionId;

  /**
   * @param bool
   */
  public function setValueBool($valueBool)
  {
    $this->valueBool = $valueBool;
  }
  /**
   * @return bool
   */
  public function getValueBool()
  {
    return $this->valueBool;
  }
  public function setValueDouble($valueDouble)
  {
    $this->valueDouble = $valueDouble;
  }
  public function getValueDouble()
  {
    return $this->valueDouble;
  }
  /**
   * @param float
   */
  public function setValueFloat($valueFloat)
  {
    $this->valueFloat = $valueFloat;
  }
  /**
   * @return float
   */
  public function getValueFloat()
  {
    return $this->valueFloat;
  }
  /**
   * @param int
   */
  public function setValueInt32($valueInt32)
  {
    $this->valueInt32 = $valueInt32;
  }
  /**
   * @return int
   */
  public function getValueInt32()
  {
    return $this->valueInt32;
  }
  /**
   * @param string
   */
  public function setValueUint32($valueUint32)
  {
    $this->valueUint32 = $valueUint32;
  }
  /**
   * @return string
   */
  public function getValueUint32()
  {
    return $this->valueUint32;
  }
  /**
   * @param int
   */
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  /**
   * @return int
   */
  public function getVersionId()
  {
    return $this->versionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityNsrExperimentalNsrTeamScoringSignal::class, 'Google_Service_Contentwarehouse_QualityNsrExperimentalNsrTeamScoringSignal');
