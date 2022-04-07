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

class Id extends \Google\Model
{
  /**
   * @var string
   */
  public $creatorUserId;
  /**
   * @var string
   */
  public $localId;
  /**
   * @var int
   */
  public $nameSpace;

  /**
   * @param string
   */
  public function setCreatorUserId($creatorUserId)
  {
    $this->creatorUserId = $creatorUserId;
  }
  /**
   * @return string
   */
  public function getCreatorUserId()
  {
    return $this->creatorUserId;
  }
  /**
   * @param string
   */
  public function setLocalId($localId)
  {
    $this->localId = $localId;
  }
  /**
   * @return string
   */
  public function getLocalId()
  {
    return $this->localId;
  }
  /**
   * @param int
   */
  public function setNameSpace($nameSpace)
  {
    $this->nameSpace = $nameSpace;
  }
  /**
   * @return int
   */
  public function getNameSpace()
  {
    return $this->nameSpace;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Id::class, 'Google_Service_CloudSearch_Id');
