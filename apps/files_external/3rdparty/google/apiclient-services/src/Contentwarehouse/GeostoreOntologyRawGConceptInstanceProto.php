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

class GeostoreOntologyRawGConceptInstanceProto extends \Google\Model
{
  protected $instanceType = GeostoreGConceptInstanceProto::class;
  protected $instanceDataType = '';
  /**
   * @var bool
   */
  public $isAddedByEdit;
  /**
   * @var bool
   */
  public $isInferred;
  /**
   * @var string
   */
  public $provider;
  /**
   * @var string
   */
  public $sourceDataset;

  /**
   * @param GeostoreGConceptInstanceProto
   */
  public function setInstance(GeostoreGConceptInstanceProto $instance)
  {
    $this->instance = $instance;
  }
  /**
   * @return GeostoreGConceptInstanceProto
   */
  public function getInstance()
  {
    return $this->instance;
  }
  /**
   * @param bool
   */
  public function setIsAddedByEdit($isAddedByEdit)
  {
    $this->isAddedByEdit = $isAddedByEdit;
  }
  /**
   * @return bool
   */
  public function getIsAddedByEdit()
  {
    return $this->isAddedByEdit;
  }
  /**
   * @param bool
   */
  public function setIsInferred($isInferred)
  {
    $this->isInferred = $isInferred;
  }
  /**
   * @return bool
   */
  public function getIsInferred()
  {
    return $this->isInferred;
  }
  /**
   * @param string
   */
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  /**
   * @return string
   */
  public function getProvider()
  {
    return $this->provider;
  }
  /**
   * @param string
   */
  public function setSourceDataset($sourceDataset)
  {
    $this->sourceDataset = $sourceDataset;
  }
  /**
   * @return string
   */
  public function getSourceDataset()
  {
    return $this->sourceDataset;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreOntologyRawGConceptInstanceProto::class, 'Google_Service_Contentwarehouse_GeostoreOntologyRawGConceptInstanceProto');
