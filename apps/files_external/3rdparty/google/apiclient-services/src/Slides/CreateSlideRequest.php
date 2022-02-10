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

class CreateSlideRequest extends \Google\Collection
{
  protected $collection_key = 'placeholderIdMappings';
  /**
   * @var int
   */
  public $insertionIndex;
  /**
   * @var string
   */
  public $objectId;
  protected $placeholderIdMappingsType = LayoutPlaceholderIdMapping::class;
  protected $placeholderIdMappingsDataType = 'array';
  protected $slideLayoutReferenceType = LayoutReference::class;
  protected $slideLayoutReferenceDataType = '';

  /**
   * @param int
   */
  public function setInsertionIndex($insertionIndex)
  {
    $this->insertionIndex = $insertionIndex;
  }
  /**
   * @return int
   */
  public function getInsertionIndex()
  {
    return $this->insertionIndex;
  }
  /**
   * @param string
   */
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  /**
   * @return string
   */
  public function getObjectId()
  {
    return $this->objectId;
  }
  /**
   * @param LayoutPlaceholderIdMapping[]
   */
  public function setPlaceholderIdMappings($placeholderIdMappings)
  {
    $this->placeholderIdMappings = $placeholderIdMappings;
  }
  /**
   * @return LayoutPlaceholderIdMapping[]
   */
  public function getPlaceholderIdMappings()
  {
    return $this->placeholderIdMappings;
  }
  /**
   * @param LayoutReference
   */
  public function setSlideLayoutReference(LayoutReference $slideLayoutReference)
  {
    $this->slideLayoutReference = $slideLayoutReference;
  }
  /**
   * @return LayoutReference
   */
  public function getSlideLayoutReference()
  {
    return $this->slideLayoutReference;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateSlideRequest::class, 'Google_Service_Slides_CreateSlideRequest');
