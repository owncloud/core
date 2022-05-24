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

class ContaineranalysisGoogleDevtoolsCloudbuildV1BuiltImage extends \Google\Model
{
  /**
   * @var string
   */
  public $digest;
  /**
   * @var string
   */
  public $name;
  protected $pushTimingType = ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan::class;
  protected $pushTimingDataType = '';

  /**
   * @param string
   */
  public function setDigest($digest)
  {
    $this->digest = $digest;
  }
  /**
   * @return string
   */
  public function getDigest()
  {
    return $this->digest;
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
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan
   */
  public function setPushTiming(ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan $pushTiming)
  {
    $this->pushTiming = $pushTiming;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan
   */
  public function getPushTiming()
  {
    return $this->pushTiming;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContaineranalysisGoogleDevtoolsCloudbuildV1BuiltImage::class, 'Google_Service_ContainerAnalysis_ContaineranalysisGoogleDevtoolsCloudbuildV1BuiltImage');
