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

namespace Google\Service\Reports;

class UsageReportParameters extends \Google\Collection
{
  protected $collection_key = 'msgValue';
  /**
   * @var bool
   */
  public $boolValue;
  /**
   * @var string
   */
  public $datetimeValue;
  /**
   * @var string
   */
  public $intValue;
  /**
   * @var array[]
   */
  public $msgValue;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $stringValue;

  /**
   * @param bool
   */
  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  /**
   * @return bool
   */
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  /**
   * @param string
   */
  public function setDatetimeValue($datetimeValue)
  {
    $this->datetimeValue = $datetimeValue;
  }
  /**
   * @return string
   */
  public function getDatetimeValue()
  {
    return $this->datetimeValue;
  }
  /**
   * @param string
   */
  public function setIntValue($intValue)
  {
    $this->intValue = $intValue;
  }
  /**
   * @return string
   */
  public function getIntValue()
  {
    return $this->intValue;
  }
  /**
   * @param array[]
   */
  public function setMsgValue($msgValue)
  {
    $this->msgValue = $msgValue;
  }
  /**
   * @return array[]
   */
  public function getMsgValue()
  {
    return $this->msgValue;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  /**
   * @return string
   */
  public function getStringValue()
  {
    return $this->stringValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsageReportParameters::class, 'Google_Service_Reports_UsageReportParameters');
