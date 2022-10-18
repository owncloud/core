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

class RepositoryWebrefWebrefStatus extends \Google\Model
{
  /**
   * @var string
   */
  public $dataEpoch;
  protected $utilStatusType = UtilStatusProto::class;
  protected $utilStatusDataType = '';
  /**
   * @var int
   */
  public $version;

  /**
   * @param string
   */
  public function setDataEpoch($dataEpoch)
  {
    $this->dataEpoch = $dataEpoch;
  }
  /**
   * @return string
   */
  public function getDataEpoch()
  {
    return $this->dataEpoch;
  }
  /**
   * @param UtilStatusProto
   */
  public function setUtilStatus(UtilStatusProto $utilStatus)
  {
    $this->utilStatus = $utilStatus;
  }
  /**
   * @return UtilStatusProto
   */
  public function getUtilStatus()
  {
    return $this->utilStatus;
  }
  /**
   * @param int
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return int
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefWebrefStatus::class, 'Google_Service_Contentwarehouse_RepositoryWebrefWebrefStatus');
