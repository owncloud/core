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

namespace Google\Service\ContainerAnalysis;

class WindowsDetail extends \Google\Collection
{
  protected $collection_key = 'fixingKbs';
  /**
   * @var string
   */
  public $cpeUri;
  /**
   * @var string
   */
  public $description;
  protected $fixingKbsType = KnowledgeBase::class;
  protected $fixingKbsDataType = 'array';
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setCpeUri($cpeUri)
  {
    $this->cpeUri = $cpeUri;
  }
  /**
   * @return string
   */
  public function getCpeUri()
  {
    return $this->cpeUri;
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
   * @param KnowledgeBase[]
   */
  public function setFixingKbs($fixingKbs)
  {
    $this->fixingKbs = $fixingKbs;
  }
  /**
   * @return KnowledgeBase[]
   */
  public function getFixingKbs()
  {
    return $this->fixingKbs;
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
class_alias(WindowsDetail::class, 'Google_Service_ContainerAnalysis_WindowsDetail');
