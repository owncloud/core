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

class AppsPeopleOzExternalMergedpeopleapiRawDeviceContactAnalyticalInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $dataSet;
  /**
   * @var bool
   */
  public $dirty;
  /**
   * @var bool
   */
  public $sourceIdExist;
  protected $syncInfoType = SocialGraphApiProtoSyncInfo::class;
  protected $syncInfoDataType = '';

  /**
   * @param string
   */
  public function setDataSet($dataSet)
  {
    $this->dataSet = $dataSet;
  }
  /**
   * @return string
   */
  public function getDataSet()
  {
    return $this->dataSet;
  }
  /**
   * @param bool
   */
  public function setDirty($dirty)
  {
    $this->dirty = $dirty;
  }
  /**
   * @return bool
   */
  public function getDirty()
  {
    return $this->dirty;
  }
  /**
   * @param bool
   */
  public function setSourceIdExist($sourceIdExist)
  {
    $this->sourceIdExist = $sourceIdExist;
  }
  /**
   * @return bool
   */
  public function getSourceIdExist()
  {
    return $this->sourceIdExist;
  }
  /**
   * @param SocialGraphApiProtoSyncInfo
   */
  public function setSyncInfo(SocialGraphApiProtoSyncInfo $syncInfo)
  {
    $this->syncInfo = $syncInfo;
  }
  /**
   * @return SocialGraphApiProtoSyncInfo
   */
  public function getSyncInfo()
  {
    return $this->syncInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiRawDeviceContactAnalyticalInfo::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiRawDeviceContactAnalyticalInfo');
