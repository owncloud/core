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

class NlpSemanticParsingModelsShoppingAssistantProductClassification extends \Google\Model
{
  /**
   * @var float
   */
  public $bookConfidence;
  /**
   * @var bool
   */
  public $isVideoGame;
  /**
   * @var float
   */
  public $movieConfidence;
  /**
   * @var float
   */
  public $videoGameConfidence;

  /**
   * @param float
   */
  public function setBookConfidence($bookConfidence)
  {
    $this->bookConfidence = $bookConfidence;
  }
  /**
   * @return float
   */
  public function getBookConfidence()
  {
    return $this->bookConfidence;
  }
  /**
   * @param bool
   */
  public function setIsVideoGame($isVideoGame)
  {
    $this->isVideoGame = $isVideoGame;
  }
  /**
   * @return bool
   */
  public function getIsVideoGame()
  {
    return $this->isVideoGame;
  }
  /**
   * @param float
   */
  public function setMovieConfidence($movieConfidence)
  {
    $this->movieConfidence = $movieConfidence;
  }
  /**
   * @return float
   */
  public function getMovieConfidence()
  {
    return $this->movieConfidence;
  }
  /**
   * @param float
   */
  public function setVideoGameConfidence($videoGameConfidence)
  {
    $this->videoGameConfidence = $videoGameConfidence;
  }
  /**
   * @return float
   */
  public function getVideoGameConfidence()
  {
    return $this->videoGameConfidence;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsShoppingAssistantProductClassification::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsShoppingAssistantProductClassification');
