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

class SocialGraphApiProtoPartialNameOptionsParsedDisplayNameSpec extends \Google\Model
{
  /**
   * @var bool
   */
  public $allInitialsFromParsedName;
  /**
   * @var bool
   */
  public $firstInitialAndVeryLastName;
  /**
   * @var bool
   */
  public $knowledgeGraphNameShortening;
  /**
   * @var string
   */
  public $truncationIndicator;
  /**
   * @var bool
   */
  public $veryFirstNameAndAllInitials;
  /**
   * @var bool
   */
  public $veryFirstNameOnly;

  /**
   * @param bool
   */
  public function setAllInitialsFromParsedName($allInitialsFromParsedName)
  {
    $this->allInitialsFromParsedName = $allInitialsFromParsedName;
  }
  /**
   * @return bool
   */
  public function getAllInitialsFromParsedName()
  {
    return $this->allInitialsFromParsedName;
  }
  /**
   * @param bool
   */
  public function setFirstInitialAndVeryLastName($firstInitialAndVeryLastName)
  {
    $this->firstInitialAndVeryLastName = $firstInitialAndVeryLastName;
  }
  /**
   * @return bool
   */
  public function getFirstInitialAndVeryLastName()
  {
    return $this->firstInitialAndVeryLastName;
  }
  /**
   * @param bool
   */
  public function setKnowledgeGraphNameShortening($knowledgeGraphNameShortening)
  {
    $this->knowledgeGraphNameShortening = $knowledgeGraphNameShortening;
  }
  /**
   * @return bool
   */
  public function getKnowledgeGraphNameShortening()
  {
    return $this->knowledgeGraphNameShortening;
  }
  /**
   * @param string
   */
  public function setTruncationIndicator($truncationIndicator)
  {
    $this->truncationIndicator = $truncationIndicator;
  }
  /**
   * @return string
   */
  public function getTruncationIndicator()
  {
    return $this->truncationIndicator;
  }
  /**
   * @param bool
   */
  public function setVeryFirstNameAndAllInitials($veryFirstNameAndAllInitials)
  {
    $this->veryFirstNameAndAllInitials = $veryFirstNameAndAllInitials;
  }
  /**
   * @return bool
   */
  public function getVeryFirstNameAndAllInitials()
  {
    return $this->veryFirstNameAndAllInitials;
  }
  /**
   * @param bool
   */
  public function setVeryFirstNameOnly($veryFirstNameOnly)
  {
    $this->veryFirstNameOnly = $veryFirstNameOnly;
  }
  /**
   * @return bool
   */
  public function getVeryFirstNameOnly()
  {
    return $this->veryFirstNameOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialGraphApiProtoPartialNameOptionsParsedDisplayNameSpec::class, 'Google_Service_Contentwarehouse_SocialGraphApiProtoPartialNameOptionsParsedDisplayNameSpec');
