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

class QualityNsrExperimentalNsrTeamWSJData extends \Google\Model
{
  protected $experimentalNsrTeamDataType = QualityNsrExperimentalNsrTeamData::class;
  protected $experimentalNsrTeamDataDataType = '';
  /**
   * @var string
   */
  public $lookupKey;

  /**
   * @param QualityNsrExperimentalNsrTeamData
   */
  public function setExperimentalNsrTeamData(QualityNsrExperimentalNsrTeamData $experimentalNsrTeamData)
  {
    $this->experimentalNsrTeamData = $experimentalNsrTeamData;
  }
  /**
   * @return QualityNsrExperimentalNsrTeamData
   */
  public function getExperimentalNsrTeamData()
  {
    return $this->experimentalNsrTeamData;
  }
  /**
   * @param string
   */
  public function setLookupKey($lookupKey)
  {
    $this->lookupKey = $lookupKey;
  }
  /**
   * @return string
   */
  public function getLookupKey()
  {
    return $this->lookupKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityNsrExperimentalNsrTeamWSJData::class, 'Google_Service_Contentwarehouse_QualityNsrExperimentalNsrTeamWSJData');
