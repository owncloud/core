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

class Google_Service_Apigee_GoogleCloudApigeeV1ResourceEntitlementData extends Google_Collection
{
  protected $collection_key = 'explicitAudiences';
  public $authEntitled;
  protected $explicitAudiencesType = 'Google_Service_Apigee_GoogleCloudApigeeV1AudienceEntitlement';
  protected $explicitAudiencesDataType = 'array';
  public $isPublic;

  public function setAuthEntitled($authEntitled)
  {
    $this->authEntitled = $authEntitled;
  }
  public function getAuthEntitled()
  {
    return $this->authEntitled;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1AudienceEntitlement
   */
  public function setExplicitAudiences($explicitAudiences)
  {
    $this->explicitAudiences = $explicitAudiences;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1AudienceEntitlement
   */
  public function getExplicitAudiences()
  {
    return $this->explicitAudiences;
  }
  public function setIsPublic($isPublic)
  {
    $this->isPublic = $isPublic;
  }
  public function getIsPublic()
  {
    return $this->isPublic;
  }
}
