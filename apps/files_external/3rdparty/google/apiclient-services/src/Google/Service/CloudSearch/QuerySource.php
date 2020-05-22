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

class Google_Service_CloudSearch_QuerySource extends Google_Collection
{
  protected $collection_key = 'operators';
  public $displayName;
  protected $operatorsType = 'Google_Service_CloudSearch_QueryOperator';
  protected $operatorsDataType = 'array';
  public $shortName;
  protected $sourceType = 'Google_Service_CloudSearch_Source';
  protected $sourceDataType = '';

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_CloudSearch_QueryOperator
   */
  public function setOperators($operators)
  {
    $this->operators = $operators;
  }
  /**
   * @return Google_Service_CloudSearch_QueryOperator
   */
  public function getOperators()
  {
    return $this->operators;
  }
  public function setShortName($shortName)
  {
    $this->shortName = $shortName;
  }
  public function getShortName()
  {
    return $this->shortName;
  }
  /**
   * @param Google_Service_CloudSearch_Source
   */
  public function setSource(Google_Service_CloudSearch_Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_CloudSearch_Source
   */
  public function getSource()
  {
    return $this->source;
  }
}
