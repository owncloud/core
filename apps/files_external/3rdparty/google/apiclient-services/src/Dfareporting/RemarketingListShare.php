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

namespace Google\Service\Dfareporting;

class RemarketingListShare extends \Google\Collection
{
  protected $collection_key = 'sharedAdvertiserIds';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $remarketingListId;
  /**
   * @var string[]
   */
  public $sharedAccountIds;
  /**
   * @var string[]
   */
  public $sharedAdvertiserIds;

  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setRemarketingListId($remarketingListId)
  {
    $this->remarketingListId = $remarketingListId;
  }
  /**
   * @return string
   */
  public function getRemarketingListId()
  {
    return $this->remarketingListId;
  }
  /**
   * @param string[]
   */
  public function setSharedAccountIds($sharedAccountIds)
  {
    $this->sharedAccountIds = $sharedAccountIds;
  }
  /**
   * @return string[]
   */
  public function getSharedAccountIds()
  {
    return $this->sharedAccountIds;
  }
  /**
   * @param string[]
   */
  public function setSharedAdvertiserIds($sharedAdvertiserIds)
  {
    $this->sharedAdvertiserIds = $sharedAdvertiserIds;
  }
  /**
   * @return string[]
   */
  public function getSharedAdvertiserIds()
  {
    return $this->sharedAdvertiserIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RemarketingListShare::class, 'Google_Service_Dfareporting_RemarketingListShare');
