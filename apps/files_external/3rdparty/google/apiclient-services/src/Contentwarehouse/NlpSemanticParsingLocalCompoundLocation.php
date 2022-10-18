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

class NlpSemanticParsingLocalCompoundLocation extends \Google\Model
{
  protected $joinerType = NlpSemanticParsingLocalJoiner::class;
  protected $joinerDataType = '';
  protected $location1Type = NlpSemanticParsingLocalLocation::class;
  protected $location1DataType = '';
  protected $location2Type = NlpSemanticParsingLocalLocation::class;
  protected $location2DataType = '';

  /**
   * @param NlpSemanticParsingLocalJoiner
   */
  public function setJoiner(NlpSemanticParsingLocalJoiner $joiner)
  {
    $this->joiner = $joiner;
  }
  /**
   * @return NlpSemanticParsingLocalJoiner
   */
  public function getJoiner()
  {
    return $this->joiner;
  }
  /**
   * @param NlpSemanticParsingLocalLocation
   */
  public function setLocation1(NlpSemanticParsingLocalLocation $location1)
  {
    $this->location1 = $location1;
  }
  /**
   * @return NlpSemanticParsingLocalLocation
   */
  public function getLocation1()
  {
    return $this->location1;
  }
  /**
   * @param NlpSemanticParsingLocalLocation
   */
  public function setLocation2(NlpSemanticParsingLocalLocation $location2)
  {
    $this->location2 = $location2;
  }
  /**
   * @return NlpSemanticParsingLocalLocation
   */
  public function getLocation2()
  {
    return $this->location2;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalCompoundLocation::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalCompoundLocation');
