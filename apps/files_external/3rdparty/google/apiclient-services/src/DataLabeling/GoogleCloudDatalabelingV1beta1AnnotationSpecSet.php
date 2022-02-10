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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1AnnotationSpecSet extends \Google\Collection
{
  protected $collection_key = 'blockingResources';
  protected $annotationSpecsType = GoogleCloudDatalabelingV1beta1AnnotationSpec::class;
  protected $annotationSpecsDataType = 'array';
  /**
   * @var string[]
   */
  public $blockingResources;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;

  /**
   * @param GoogleCloudDatalabelingV1beta1AnnotationSpec[]
   */
  public function setAnnotationSpecs($annotationSpecs)
  {
    $this->annotationSpecs = $annotationSpecs;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1AnnotationSpec[]
   */
  public function getAnnotationSpecs()
  {
    return $this->annotationSpecs;
  }
  /**
   * @param string[]
   */
  public function setBlockingResources($blockingResources)
  {
    $this->blockingResources = $blockingResources;
  }
  /**
   * @return string[]
   */
  public function getBlockingResources()
  {
    return $this->blockingResources;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1AnnotationSpecSet::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpecSet');
