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

namespace Google\Service\CloudSearch;

class AppsDynamiteSharedJustification extends \Google\Collection
{
  protected $collection_key = 'topics';
  /**
   * @var string
   */
  public $actionTime;
  /**
   * @var string
   */
  public $actionType;
  protected $documentOwnerType = AppsDynamiteSharedJustificationPerson::class;
  protected $documentOwnerDataType = '';
  /**
   * @var string[]
   */
  public $topics;

  /**
   * @param string
   */
  public function setActionTime($actionTime)
  {
    $this->actionTime = $actionTime;
  }
  /**
   * @return string
   */
  public function getActionTime()
  {
    return $this->actionTime;
  }
  /**
   * @param string
   */
  public function setActionType($actionType)
  {
    $this->actionType = $actionType;
  }
  /**
   * @return string
   */
  public function getActionType()
  {
    return $this->actionType;
  }
  /**
   * @param AppsDynamiteSharedJustificationPerson
   */
  public function setDocumentOwner(AppsDynamiteSharedJustificationPerson $documentOwner)
  {
    $this->documentOwner = $documentOwner;
  }
  /**
   * @return AppsDynamiteSharedJustificationPerson
   */
  public function getDocumentOwner()
  {
    return $this->documentOwner;
  }
  /**
   * @param string[]
   */
  public function setTopics($topics)
  {
    $this->topics = $topics;
  }
  /**
   * @return string[]
   */
  public function getTopics()
  {
    return $this->topics;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedJustification::class, 'Google_Service_CloudSearch_AppsDynamiteSharedJustification');
