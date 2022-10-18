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

namespace Google\Service\HangoutsChat;

class CardWithId extends \Google\Model
{
  protected $cardType = GoogleAppsCardV1Card::class;
  protected $cardDataType = '';
  /**
   * @var string
   */
  public $cardId;

  /**
   * @param GoogleAppsCardV1Card
   */
  public function setCard(GoogleAppsCardV1Card $card)
  {
    $this->card = $card;
  }
  /**
   * @return GoogleAppsCardV1Card
   */
  public function getCard()
  {
    return $this->card;
  }
  /**
   * @param string
   */
  public function setCardId($cardId)
  {
    $this->cardId = $cardId;
  }
  /**
   * @return string
   */
  public function getCardId()
  {
    return $this->cardId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CardWithId::class, 'Google_Service_HangoutsChat_CardWithId');
