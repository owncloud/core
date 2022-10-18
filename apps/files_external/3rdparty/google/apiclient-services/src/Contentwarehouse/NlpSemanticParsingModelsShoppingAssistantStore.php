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

class NlpSemanticParsingModelsShoppingAssistantStore extends \Google\Model
{
  /**
   * @var string
   */
  public $id;
  protected $locationType = NlpSemanticParsingLocalLocation::class;
  protected $locationDataType = '';
  /**
   * @var string
   */
  public $name;

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
   * @param NlpSemanticParsingLocalLocation
   */
  public function setLocation(NlpSemanticParsingLocalLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return NlpSemanticParsingLocalLocation
   */
  public function getLocation()
  {
    return $this->location;
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
class_alias(NlpSemanticParsingModelsShoppingAssistantStore::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsShoppingAssistantStore');
