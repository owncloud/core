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

class AppsPeopleOzExternalMergedpeopleapiInAppReachability extends \Google\Model
{
  /**
   * @var string
   */
  public $appType;
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';
  protected $reachabilityKeyType = AppsPeopleOzExternalMergedpeopleapiInAppReachabilityReachabilityKey::class;
  protected $reachabilityKeyDataType = '';
  /**
   * @var string
   */
  public $status;

  /**
   * @param string
   */
  public function setAppType($appType)
  {
    $this->appType = $appType;
  }
  /**
   * @return string
   */
  public function getAppType()
  {
    return $this->appType;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiInAppReachabilityReachabilityKey
   */
  public function setReachabilityKey(AppsPeopleOzExternalMergedpeopleapiInAppReachabilityReachabilityKey $reachabilityKey)
  {
    $this->reachabilityKey = $reachabilityKey;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiInAppReachabilityReachabilityKey
   */
  public function getReachabilityKey()
  {
    return $this->reachabilityKey;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiInAppReachability::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiInAppReachability');
