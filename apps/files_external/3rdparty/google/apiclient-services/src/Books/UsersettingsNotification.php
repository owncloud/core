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

namespace Google\Service\Books;

class UsersettingsNotification extends \Google\Model
{
  protected $matchMyInterestsType = UsersettingsNotificationMatchMyInterests::class;
  protected $matchMyInterestsDataType = '';
  protected $moreFromAuthorsType = UsersettingsNotificationMoreFromAuthors::class;
  protected $moreFromAuthorsDataType = '';
  protected $moreFromSeriesType = UsersettingsNotificationMoreFromSeries::class;
  protected $moreFromSeriesDataType = '';
  protected $priceDropType = UsersettingsNotificationPriceDrop::class;
  protected $priceDropDataType = '';
  protected $rewardExpirationsType = UsersettingsNotificationRewardExpirations::class;
  protected $rewardExpirationsDataType = '';

  /**
   * @param UsersettingsNotificationMatchMyInterests
   */
  public function setMatchMyInterests(UsersettingsNotificationMatchMyInterests $matchMyInterests)
  {
    $this->matchMyInterests = $matchMyInterests;
  }
  /**
   * @return UsersettingsNotificationMatchMyInterests
   */
  public function getMatchMyInterests()
  {
    return $this->matchMyInterests;
  }
  /**
   * @param UsersettingsNotificationMoreFromAuthors
   */
  public function setMoreFromAuthors(UsersettingsNotificationMoreFromAuthors $moreFromAuthors)
  {
    $this->moreFromAuthors = $moreFromAuthors;
  }
  /**
   * @return UsersettingsNotificationMoreFromAuthors
   */
  public function getMoreFromAuthors()
  {
    return $this->moreFromAuthors;
  }
  /**
   * @param UsersettingsNotificationMoreFromSeries
   */
  public function setMoreFromSeries(UsersettingsNotificationMoreFromSeries $moreFromSeries)
  {
    $this->moreFromSeries = $moreFromSeries;
  }
  /**
   * @return UsersettingsNotificationMoreFromSeries
   */
  public function getMoreFromSeries()
  {
    return $this->moreFromSeries;
  }
  /**
   * @param UsersettingsNotificationPriceDrop
   */
  public function setPriceDrop(UsersettingsNotificationPriceDrop $priceDrop)
  {
    $this->priceDrop = $priceDrop;
  }
  /**
   * @return UsersettingsNotificationPriceDrop
   */
  public function getPriceDrop()
  {
    return $this->priceDrop;
  }
  /**
   * @param UsersettingsNotificationRewardExpirations
   */
  public function setRewardExpirations(UsersettingsNotificationRewardExpirations $rewardExpirations)
  {
    $this->rewardExpirations = $rewardExpirations;
  }
  /**
   * @return UsersettingsNotificationRewardExpirations
   */
  public function getRewardExpirations()
  {
    return $this->rewardExpirations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersettingsNotification::class, 'Google_Service_Books_UsersettingsNotification');
