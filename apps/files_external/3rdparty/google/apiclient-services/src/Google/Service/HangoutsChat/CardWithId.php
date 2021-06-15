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

class Google_Service_HangoutsChat_CardWithId extends Google_Model
{
  protected $cardType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Card';
  protected $cardDataType = '';
  public $cardId;

  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1Card
   */
  public function setCard(Google_Service_HangoutsChat_GoogleAppsCardV1Card $card)
  {
    $this->card = $card;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1Card
   */
  public function getCard()
  {
    return $this->card;
  }
  public function setCardId($cardId)
  {
    $this->cardId = $cardId;
  }
  public function getCardId()
  {
    return $this->cardId;
  }
}
