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

class NlpSemanticParsingLocalStarRatings extends \Google\Model
{
  /**
   * @var bool
   */
  public $five;
  /**
   * @var bool
   */
  public $four;
  /**
   * @var bool
   */
  public $fourAndAHalf;
  /**
   * @var bool
   */
  public $one;
  /**
   * @var bool
   */
  public $oneAndAHalf;
  /**
   * @var bool
   */
  public $orFewer;
  /**
   * @var bool
   */
  public $orMore;
  /**
   * @var bool
   */
  public $three;
  /**
   * @var bool
   */
  public $threeAndAHalf;
  /**
   * @var bool
   */
  public $two;
  /**
   * @var bool
   */
  public $twoAndAHalf;
  /**
   * @var bool
   */
  public $unspecified;

  /**
   * @param bool
   */
  public function setFive($five)
  {
    $this->five = $five;
  }
  /**
   * @return bool
   */
  public function getFive()
  {
    return $this->five;
  }
  /**
   * @param bool
   */
  public function setFour($four)
  {
    $this->four = $four;
  }
  /**
   * @return bool
   */
  public function getFour()
  {
    return $this->four;
  }
  /**
   * @param bool
   */
  public function setFourAndAHalf($fourAndAHalf)
  {
    $this->fourAndAHalf = $fourAndAHalf;
  }
  /**
   * @return bool
   */
  public function getFourAndAHalf()
  {
    return $this->fourAndAHalf;
  }
  /**
   * @param bool
   */
  public function setOne($one)
  {
    $this->one = $one;
  }
  /**
   * @return bool
   */
  public function getOne()
  {
    return $this->one;
  }
  /**
   * @param bool
   */
  public function setOneAndAHalf($oneAndAHalf)
  {
    $this->oneAndAHalf = $oneAndAHalf;
  }
  /**
   * @return bool
   */
  public function getOneAndAHalf()
  {
    return $this->oneAndAHalf;
  }
  /**
   * @param bool
   */
  public function setOrFewer($orFewer)
  {
    $this->orFewer = $orFewer;
  }
  /**
   * @return bool
   */
  public function getOrFewer()
  {
    return $this->orFewer;
  }
  /**
   * @param bool
   */
  public function setOrMore($orMore)
  {
    $this->orMore = $orMore;
  }
  /**
   * @return bool
   */
  public function getOrMore()
  {
    return $this->orMore;
  }
  /**
   * @param bool
   */
  public function setThree($three)
  {
    $this->three = $three;
  }
  /**
   * @return bool
   */
  public function getThree()
  {
    return $this->three;
  }
  /**
   * @param bool
   */
  public function setThreeAndAHalf($threeAndAHalf)
  {
    $this->threeAndAHalf = $threeAndAHalf;
  }
  /**
   * @return bool
   */
  public function getThreeAndAHalf()
  {
    return $this->threeAndAHalf;
  }
  /**
   * @param bool
   */
  public function setTwo($two)
  {
    $this->two = $two;
  }
  /**
   * @return bool
   */
  public function getTwo()
  {
    return $this->two;
  }
  /**
   * @param bool
   */
  public function setTwoAndAHalf($twoAndAHalf)
  {
    $this->twoAndAHalf = $twoAndAHalf;
  }
  /**
   * @return bool
   */
  public function getTwoAndAHalf()
  {
    return $this->twoAndAHalf;
  }
  /**
   * @param bool
   */
  public function setUnspecified($unspecified)
  {
    $this->unspecified = $unspecified;
  }
  /**
   * @return bool
   */
  public function getUnspecified()
  {
    return $this->unspecified;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalStarRatings::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalStarRatings');
