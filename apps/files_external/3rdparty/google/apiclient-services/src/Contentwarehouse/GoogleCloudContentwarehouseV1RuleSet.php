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

class GoogleCloudContentwarehouseV1RuleSet extends \Google\Collection
{
  protected $collection_key = 'rules';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $name;
  protected $rulesType = GoogleCloudContentwarehouseV1Rule::class;
  protected $rulesDataType = 'array';
  /**
   * @var string
   */
  public $source;

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
  /**
   * @param GoogleCloudContentwarehouseV1Rule[]
   */
  public function setRules($rules)
  {
    $this->rules = $rules;
  }
  /**
   * @return GoogleCloudContentwarehouseV1Rule[]
   */
  public function getRules()
  {
    return $this->rules;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1RuleSet::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1RuleSet');
