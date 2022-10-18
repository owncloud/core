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

class LegalCitationCourtDocumentCourt extends \Google\Collection
{
  protected $collection_key = 'namecomponent';
  protected $internal_gapi_mappings = [
        "displayName" => "DisplayName",
        "level" => "Level",
        "name" => "Name",
        "originalName" => "OriginalName",
  ];
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var int
   */
  public $level;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $originalName;
  protected $namecomponentType = LegalCitationCourtDocumentCourtNameComponent::class;
  protected $namecomponentDataType = 'array';

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
   * @param int
   */
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return int
   */
  public function getLevel()
  {
    return $this->level;
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
   * @param string
   */
  public function setOriginalName($originalName)
  {
    $this->originalName = $originalName;
  }
  /**
   * @return string
   */
  public function getOriginalName()
  {
    return $this->originalName;
  }
  /**
   * @param LegalCitationCourtDocumentCourtNameComponent[]
   */
  public function setNamecomponent($namecomponent)
  {
    $this->namecomponent = $namecomponent;
  }
  /**
   * @return LegalCitationCourtDocumentCourtNameComponent[]
   */
  public function getNamecomponent()
  {
    return $this->namecomponent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LegalCitationCourtDocumentCourt::class, 'Google_Service_Contentwarehouse_LegalCitationCourtDocumentCourt');
