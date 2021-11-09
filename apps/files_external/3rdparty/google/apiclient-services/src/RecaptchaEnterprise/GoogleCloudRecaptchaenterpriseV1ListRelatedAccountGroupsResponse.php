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

namespace Google\Service\RecaptchaEnterprise;

class GoogleCloudRecaptchaenterpriseV1ListRelatedAccountGroupsResponse extends \Google\Collection
{
  protected $collection_key = 'relatedAccountGroups';
  public $nextPageToken;
  protected $relatedAccountGroupsType = GoogleCloudRecaptchaenterpriseV1RelatedAccountGroup::class;
  protected $relatedAccountGroupsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param GoogleCloudRecaptchaenterpriseV1RelatedAccountGroup[]
   */
  public function setRelatedAccountGroups($relatedAccountGroups)
  {
    $this->relatedAccountGroups = $relatedAccountGroups;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1RelatedAccountGroup[]
   */
  public function getRelatedAccountGroups()
  {
    return $this->relatedAccountGroups;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecaptchaenterpriseV1ListRelatedAccountGroupsResponse::class, 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1ListRelatedAccountGroupsResponse');
