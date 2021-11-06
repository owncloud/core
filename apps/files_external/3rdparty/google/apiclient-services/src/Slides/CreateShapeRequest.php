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

namespace Google\Service\Slides;

class CreateShapeRequest extends \Google\Model
{
  protected $elementPropertiesType = PageElementProperties::class;
  protected $elementPropertiesDataType = '';
  public $objectId;
  public $shapeType;

  /**
   * @param PageElementProperties
   */
  public function setElementProperties(PageElementProperties $elementProperties)
  {
    $this->elementProperties = $elementProperties;
  }
  /**
   * @return PageElementProperties
   */
  public function getElementProperties()
  {
    return $this->elementProperties;
  }
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  public function getObjectId()
  {
    return $this->objectId;
  }
  public function setShapeType($shapeType)
  {
    $this->shapeType = $shapeType;
  }
  public function getShapeType()
  {
    return $this->shapeType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateShapeRequest::class, 'Google_Service_Slides_CreateShapeRequest');
