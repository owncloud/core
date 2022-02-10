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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaDataStream extends \Google\Model
{
  protected $androidAppStreamDataType = GoogleAnalyticsAdminV1alphaDataStreamAndroidAppStreamData::class;
  protected $androidAppStreamDataDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $displayName;
  protected $iosAppStreamDataType = GoogleAnalyticsAdminV1alphaDataStreamIosAppStreamData::class;
  protected $iosAppStreamDataDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $updateTime;
  protected $webStreamDataType = GoogleAnalyticsAdminV1alphaDataStreamWebStreamData::class;
  protected $webStreamDataDataType = '';

  /**
   * @param GoogleAnalyticsAdminV1alphaDataStreamAndroidAppStreamData
   */
  public function setAndroidAppStreamData(GoogleAnalyticsAdminV1alphaDataStreamAndroidAppStreamData $androidAppStreamData)
  {
    $this->androidAppStreamData = $androidAppStreamData;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaDataStreamAndroidAppStreamData
   */
  public function getAndroidAppStreamData()
  {
    return $this->androidAppStreamData;
  }
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
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaDataStreamIosAppStreamData
   */
  public function setIosAppStreamData(GoogleAnalyticsAdminV1alphaDataStreamIosAppStreamData $iosAppStreamData)
  {
    $this->iosAppStreamData = $iosAppStreamData;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaDataStreamIosAppStreamData
   */
  public function getIosAppStreamData()
  {
    return $this->iosAppStreamData;
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
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
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
  /**
   * @param GoogleAnalyticsAdminV1alphaDataStreamWebStreamData
   */
  public function setWebStreamData(GoogleAnalyticsAdminV1alphaDataStreamWebStreamData $webStreamData)
  {
    $this->webStreamData = $webStreamData;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaDataStreamWebStreamData
   */
  public function getWebStreamData()
  {
    return $this->webStreamData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaDataStream::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaDataStream');
