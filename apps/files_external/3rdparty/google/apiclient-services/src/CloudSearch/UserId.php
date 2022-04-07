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

class UserId extends \Google\Model
{
  /**
   * @var string
   */
  public $actingUserId;
  /**
   * @var string
   */
  public $id;
  protected $originAppIdType = AppId::class;
  protected $originAppIdDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setActingUserId($actingUserId)
  {
    $this->actingUserId = $actingUserId;
  }
  /**
   * @return string
   */
  public function getActingUserId()
  {
    return $this->actingUserId;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param AppId
   */
  public function setOriginAppId(AppId $originAppId)
  {
    $this->originAppId = $originAppId;
  }
  /**
   * @return AppId
   */
  public function getOriginAppId()
  {
    return $this->originAppId;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserId::class, 'Google_Service_CloudSearch_UserId');
