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

namespace Google\Service\AnalyticsReporting;

class Activity extends \Google\Collection
{
  protected $collection_key = 'customDimension';
  /**
   * @var string
   */
  public $activityTime;
  /**
   * @var string
   */
  public $activityType;
  protected $appviewType = ScreenviewData::class;
  protected $appviewDataType = '';
  /**
   * @var string
   */
  public $campaign;
  /**
   * @var string
   */
  public $channelGrouping;
  protected $customDimensionType = CustomDimension::class;
  protected $customDimensionDataType = 'array';
  protected $ecommerceType = EcommerceData::class;
  protected $ecommerceDataType = '';
  protected $eventType = EventData::class;
  protected $eventDataType = '';
  protected $goalsType = GoalSetData::class;
  protected $goalsDataType = '';
  /**
   * @var string
   */
  public $hostname;
  /**
   * @var string
   */
  public $keyword;
  /**
   * @var string
   */
  public $landingPagePath;
  /**
   * @var string
   */
  public $medium;
  protected $pageviewType = PageviewData::class;
  protected $pageviewDataType = '';
  /**
   * @var string
   */
  public $source;

  /**
   * @param string
   */
  public function setActivityTime($activityTime)
  {
    $this->activityTime = $activityTime;
  }
  /**
   * @return string
   */
  public function getActivityTime()
  {
    return $this->activityTime;
  }
  /**
   * @param string
   */
  public function setActivityType($activityType)
  {
    $this->activityType = $activityType;
  }
  /**
   * @return string
   */
  public function getActivityType()
  {
    return $this->activityType;
  }
  /**
   * @param ScreenviewData
   */
  public function setAppview(ScreenviewData $appview)
  {
    $this->appview = $appview;
  }
  /**
   * @return ScreenviewData
   */
  public function getAppview()
  {
    return $this->appview;
  }
  /**
   * @param string
   */
  public function setCampaign($campaign)
  {
    $this->campaign = $campaign;
  }
  /**
   * @return string
   */
  public function getCampaign()
  {
    return $this->campaign;
  }
  /**
   * @param string
   */
  public function setChannelGrouping($channelGrouping)
  {
    $this->channelGrouping = $channelGrouping;
  }
  /**
   * @return string
   */
  public function getChannelGrouping()
  {
    return $this->channelGrouping;
  }
  /**
   * @param CustomDimension[]
   */
  public function setCustomDimension($customDimension)
  {
    $this->customDimension = $customDimension;
  }
  /**
   * @return CustomDimension[]
   */
  public function getCustomDimension()
  {
    return $this->customDimension;
  }
  /**
   * @param EcommerceData
   */
  public function setEcommerce(EcommerceData $ecommerce)
  {
    $this->ecommerce = $ecommerce;
  }
  /**
   * @return EcommerceData
   */
  public function getEcommerce()
  {
    return $this->ecommerce;
  }
  /**
   * @param EventData
   */
  public function setEvent(EventData $event)
  {
    $this->event = $event;
  }
  /**
   * @return EventData
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param GoalSetData
   */
  public function setGoals(GoalSetData $goals)
  {
    $this->goals = $goals;
  }
  /**
   * @return GoalSetData
   */
  public function getGoals()
  {
    return $this->goals;
  }
  /**
   * @param string
   */
  public function setHostname($hostname)
  {
    $this->hostname = $hostname;
  }
  /**
   * @return string
   */
  public function getHostname()
  {
    return $this->hostname;
  }
  /**
   * @param string
   */
  public function setKeyword($keyword)
  {
    $this->keyword = $keyword;
  }
  /**
   * @return string
   */
  public function getKeyword()
  {
    return $this->keyword;
  }
  /**
   * @param string
   */
  public function setLandingPagePath($landingPagePath)
  {
    $this->landingPagePath = $landingPagePath;
  }
  /**
   * @return string
   */
  public function getLandingPagePath()
  {
    return $this->landingPagePath;
  }
  /**
   * @param string
   */
  public function setMedium($medium)
  {
    $this->medium = $medium;
  }
  /**
   * @return string
   */
  public function getMedium()
  {
    return $this->medium;
  }
  /**
   * @param PageviewData
   */
  public function setPageview(PageviewData $pageview)
  {
    $this->pageview = $pageview;
  }
  /**
   * @return PageviewData
   */
  public function getPageview()
  {
    return $this->pageview;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Activity::class, 'Google_Service_AnalyticsReporting_Activity');
