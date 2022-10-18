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

class AppsPeopleOzExternalMergedpeopleapiIdentityInfo extends \Google\Collection
{
  protected $collection_key = 'sourceIds';
  /**
   * @var string[]
   */
  public $originalLookupToken;
  /**
   * @var string[]
   */
  public $previousPersonId;
  protected $sourceIdsType = AppsPeopleOzExternalMergedpeopleapiSourceIdentity::class;
  protected $sourceIdsDataType = 'array';

  /**
   * @param string[]
   */
  public function setOriginalLookupToken($originalLookupToken)
  {
    $this->originalLookupToken = $originalLookupToken;
  }
  /**
   * @return string[]
   */
  public function getOriginalLookupToken()
  {
    return $this->originalLookupToken;
  }
  /**
   * @param string[]
   */
  public function setPreviousPersonId($previousPersonId)
  {
    $this->previousPersonId = $previousPersonId;
  }
  /**
   * @return string[]
   */
  public function getPreviousPersonId()
  {
    return $this->previousPersonId;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiSourceIdentity[]
   */
  public function setSourceIds($sourceIds)
  {
    $this->sourceIds = $sourceIds;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiSourceIdentity[]
   */
  public function getSourceIds()
  {
    return $this->sourceIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiIdentityInfo::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiIdentityInfo');
