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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1ProcessorVersion extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  protected $deprecationInfoType = GoogleCloudDocumentaiV1ProcessorVersionDeprecationInfo::class;
  protected $deprecationInfoDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $googleManaged;
  /**
   * @var string
   */
  public $kmsKeyName;
  /**
   * @var string
   */
  public $kmsKeyVersionName;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $state;

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
   * @param GoogleCloudDocumentaiV1ProcessorVersionDeprecationInfo
   */
  public function setDeprecationInfo(GoogleCloudDocumentaiV1ProcessorVersionDeprecationInfo $deprecationInfo)
  {
    $this->deprecationInfo = $deprecationInfo;
  }
  /**
   * @return GoogleCloudDocumentaiV1ProcessorVersionDeprecationInfo
   */
  public function getDeprecationInfo()
  {
    return $this->deprecationInfo;
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
   * @param bool
   */
  public function setGoogleManaged($googleManaged)
  {
    $this->googleManaged = $googleManaged;
  }
  /**
   * @return bool
   */
  public function getGoogleManaged()
  {
    return $this->googleManaged;
  }
  /**
   * @param string
   */
  public function setKmsKeyName($kmsKeyName)
  {
    $this->kmsKeyName = $kmsKeyName;
  }
  /**
   * @return string
   */
  public function getKmsKeyName()
  {
    return $this->kmsKeyName;
  }
  /**
   * @param string
   */
  public function setKmsKeyVersionName($kmsKeyVersionName)
  {
    $this->kmsKeyVersionName = $kmsKeyVersionName;
  }
  /**
   * @return string
   */
  public function getKmsKeyVersionName()
  {
    return $this->kmsKeyVersionName;
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
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1ProcessorVersion::class, 'Google_Service_Document_GoogleCloudDocumentaiV1ProcessorVersion');
