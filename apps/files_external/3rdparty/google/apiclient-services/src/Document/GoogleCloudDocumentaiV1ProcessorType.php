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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1ProcessorType extends \Google\Collection
{
  protected $collection_key = 'availableLocations';
  public $allowCreation;
  protected $availableLocationsType = GoogleCloudDocumentaiV1ProcessorTypeLocationInfo::class;
  protected $availableLocationsDataType = 'array';
  public $category;
  public $launchStage;
  public $name;
  public $type;

  public function setAllowCreation($allowCreation)
  {
    $this->allowCreation = $allowCreation;
  }
  public function getAllowCreation()
  {
    return $this->allowCreation;
  }
  /**
   * @param GoogleCloudDocumentaiV1ProcessorTypeLocationInfo[]
   */
  public function setAvailableLocations($availableLocations)
  {
    $this->availableLocations = $availableLocations;
  }
  /**
   * @return GoogleCloudDocumentaiV1ProcessorTypeLocationInfo[]
   */
  public function getAvailableLocations()
  {
    return $this->availableLocations;
  }
  public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
  }
  public function setLaunchStage($launchStage)
  {
    $this->launchStage = $launchStage;
  }
  public function getLaunchStage()
  {
    return $this->launchStage;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1ProcessorType::class, 'Google_Service_Document_GoogleCloudDocumentaiV1ProcessorType');
