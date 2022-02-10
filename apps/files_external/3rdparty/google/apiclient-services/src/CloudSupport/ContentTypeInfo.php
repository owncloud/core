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

namespace Google\Service\CloudSupport;

class ContentTypeInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $bestGuess;
  /**
   * @var string
   */
  public $fromBytes;
  /**
   * @var string
   */
  public $fromFileName;
  /**
   * @var string
   */
  public $fromHeader;
  /**
   * @var string
   */
  public $fromUrlPath;

  /**
   * @param string
   */
  public function setBestGuess($bestGuess)
  {
    $this->bestGuess = $bestGuess;
  }
  /**
   * @return string
   */
  public function getBestGuess()
  {
    return $this->bestGuess;
  }
  /**
   * @param string
   */
  public function setFromBytes($fromBytes)
  {
    $this->fromBytes = $fromBytes;
  }
  /**
   * @return string
   */
  public function getFromBytes()
  {
    return $this->fromBytes;
  }
  /**
   * @param string
   */
  public function setFromFileName($fromFileName)
  {
    $this->fromFileName = $fromFileName;
  }
  /**
   * @return string
   */
  public function getFromFileName()
  {
    return $this->fromFileName;
  }
  /**
   * @param string
   */
  public function setFromHeader($fromHeader)
  {
    $this->fromHeader = $fromHeader;
  }
  /**
   * @return string
   */
  public function getFromHeader()
  {
    return $this->fromHeader;
  }
  /**
   * @param string
   */
  public function setFromUrlPath($fromUrlPath)
  {
    $this->fromUrlPath = $fromUrlPath;
  }
  /**
   * @return string
   */
  public function getFromUrlPath()
  {
    return $this->fromUrlPath;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContentTypeInfo::class, 'Google_Service_CloudSupport_ContentTypeInfo');
