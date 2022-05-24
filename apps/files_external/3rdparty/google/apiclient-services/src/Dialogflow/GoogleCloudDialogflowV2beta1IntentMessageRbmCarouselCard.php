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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2beta1IntentMessageRbmCarouselCard extends \Google\Collection
{
  protected $collection_key = 'cardContents';
  protected $cardContentsType = GoogleCloudDialogflowV2beta1IntentMessageRbmCardContent::class;
  protected $cardContentsDataType = 'array';
  /**
   * @var string
   */
  public $cardWidth;

  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageRbmCardContent[]
   */
  public function setCardContents($cardContents)
  {
    $this->cardContents = $cardContents;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageRbmCardContent[]
   */
  public function getCardContents()
  {
    return $this->cardContents;
  }
  /**
   * @param string
   */
  public function setCardWidth($cardWidth)
  {
    $this->cardWidth = $cardWidth;
  }
  /**
   * @return string
   */
  public function getCardWidth()
  {
    return $this->cardWidth;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1IntentMessageRbmCarouselCard::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmCarouselCard');
