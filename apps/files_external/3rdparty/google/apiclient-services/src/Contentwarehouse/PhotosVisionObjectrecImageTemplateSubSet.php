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

class PhotosVisionObjectrecImageTemplateSubSet extends \Google\Collection
{
  protected $collection_key = 'descriptor';
  protected $descriptorDataType = 'array';
  /**
   * @var int
   */
  public $descriptorType;
  /**
   * @var bool
   */
  public $isBinaryDescriptor;
  /**
   * @var int
   */
  public $numDescriptors;

  /**
   * @param PhotosVisionObjectrecLocalDescriptor[]
   */
  public function setDescriptor($descriptor)
  {
    $this->descriptor = $descriptor;
  }
  /**
   * @return PhotosVisionObjectrecLocalDescriptor[]
   */
  public function getDescriptor()
  {
    return $this->descriptor;
  }
  /**
   * @param int
   */
  public function setDescriptorType($descriptorType)
  {
    $this->descriptorType = $descriptorType;
  }
  /**
   * @return int
   */
  public function getDescriptorType()
  {
    return $this->descriptorType;
  }
  /**
   * @param bool
   */
  public function setIsBinaryDescriptor($isBinaryDescriptor)
  {
    $this->isBinaryDescriptor = $isBinaryDescriptor;
  }
  /**
   * @return bool
   */
  public function getIsBinaryDescriptor()
  {
    return $this->isBinaryDescriptor;
  }
  /**
   * @param int
   */
  public function setNumDescriptors($numDescriptors)
  {
    $this->numDescriptors = $numDescriptors;
  }
  /**
   * @return int
   */
  public function getNumDescriptors()
  {
    return $this->numDescriptors;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosVisionObjectrecImageTemplateSubSet::class, 'Google_Service_Contentwarehouse_PhotosVisionObjectrecImageTemplateSubSet');
