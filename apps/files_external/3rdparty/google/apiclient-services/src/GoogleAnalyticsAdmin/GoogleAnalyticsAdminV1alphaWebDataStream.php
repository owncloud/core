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

class GoogleAnalyticsAdminV1alphaWebDataStream extends \Google\Model
{
  public $createTime;
  public $defaultUri;
  public $displayName;
  public $firebaseAppId;
  public $measurementId;
  public $name;
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDefaultUri($defaultUri)
  {
    $this->defaultUri = $defaultUri;
  }
  public function getDefaultUri()
  {
    return $this->defaultUri;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setFirebaseAppId($firebaseAppId)
  {
    $this->firebaseAppId = $firebaseAppId;
  }
  public function getFirebaseAppId()
  {
    return $this->firebaseAppId;
  }
  public function setMeasurementId($measurementId)
  {
    $this->measurementId = $measurementId;
  }
  public function getMeasurementId()
  {
    return $this->measurementId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaWebDataStream::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream');
