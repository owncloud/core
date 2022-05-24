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

namespace Google\Service\Sheets;

class UpdateEmbeddedObjectPositionRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $fields;
  protected $newPositionType = EmbeddedObjectPosition::class;
  protected $newPositionDataType = '';
  /**
   * @var int
   */
  public $objectId;

  /**
   * @param string
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return string
   */
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param EmbeddedObjectPosition
   */
  public function setNewPosition(EmbeddedObjectPosition $newPosition)
  {
    $this->newPosition = $newPosition;
  }
  /**
   * @return EmbeddedObjectPosition
   */
  public function getNewPosition()
  {
    return $this->newPosition;
  }
  /**
   * @param int
   */
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  /**
   * @return int
   */
  public function getObjectId()
  {
    return $this->objectId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateEmbeddedObjectPositionRequest::class, 'Google_Service_Sheets_UpdateEmbeddedObjectPositionRequest');
