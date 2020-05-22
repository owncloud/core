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

class Google_Service_CloudSearch_ObjectDefinition extends Google_Collection
{
  protected $collection_key = 'propertyDefinitions';
  public $name;
  protected $optionsType = 'Google_Service_CloudSearch_ObjectOptions';
  protected $optionsDataType = '';
  protected $propertyDefinitionsType = 'Google_Service_CloudSearch_PropertyDefinition';
  protected $propertyDefinitionsDataType = 'array';

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudSearch_ObjectOptions
   */
  public function setOptions(Google_Service_CloudSearch_ObjectOptions $options)
  {
    $this->options = $options;
  }
  /**
   * @return Google_Service_CloudSearch_ObjectOptions
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param Google_Service_CloudSearch_PropertyDefinition
   */
  public function setPropertyDefinitions($propertyDefinitions)
  {
    $this->propertyDefinitions = $propertyDefinitions;
  }
  /**
   * @return Google_Service_CloudSearch_PropertyDefinition
   */
  public function getPropertyDefinitions()
  {
    return $this->propertyDefinitions;
  }
}
