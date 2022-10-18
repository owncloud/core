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

class SocialGraphApiProtoPartialNameOptionsNamePartSpec extends \Google\Model
{
  /**
   * @var bool
   */
  public $hideAll;
  /**
   * @var bool
   */
  public $showAll;
  /**
   * @var int
   */
  public $showFirstNChars;
  /**
   * @var bool
   */
  public $showInitial;
  /**
   * @var string
   */
  public $truncationIndicator;

  /**
   * @param bool
   */
  public function setHideAll($hideAll)
  {
    $this->hideAll = $hideAll;
  }
  /**
   * @return bool
   */
  public function getHideAll()
  {
    return $this->hideAll;
  }
  /**
   * @param bool
   */
  public function setShowAll($showAll)
  {
    $this->showAll = $showAll;
  }
  /**
   * @return bool
   */
  public function getShowAll()
  {
    return $this->showAll;
  }
  /**
   * @param int
   */
  public function setShowFirstNChars($showFirstNChars)
  {
    $this->showFirstNChars = $showFirstNChars;
  }
  /**
   * @return int
   */
  public function getShowFirstNChars()
  {
    return $this->showFirstNChars;
  }
  /**
   * @param bool
   */
  public function setShowInitial($showInitial)
  {
    $this->showInitial = $showInitial;
  }
  /**
   * @return bool
   */
  public function getShowInitial()
  {
    return $this->showInitial;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialGraphApiProtoPartialNameOptionsNamePartSpec::class, 'Google_Service_Contentwarehouse_SocialGraphApiProtoPartialNameOptionsNamePartSpec');
