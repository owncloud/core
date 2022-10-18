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

class QualityActionsCustomizedNotification extends \Google\Collection
{
  protected $collection_key = 'buttons';
  protected $buttonsType = QualityActionsCustomizedNotificationButton::class;
  protected $buttonsDataType = 'array';
  /**
   * @var string
   */
  public $surfaceType;
  protected $tapActionType = QualityActionsCustomizedNotificationPayload::class;
  protected $tapActionDataType = '';
  /**
   * @var string
   */
  public $text;

  /**
   * @param QualityActionsCustomizedNotificationButton[]
   */
  public function setButtons($buttons)
  {
    $this->buttons = $buttons;
  }
  /**
   * @return QualityActionsCustomizedNotificationButton[]
   */
  public function getButtons()
  {
    return $this->buttons;
  }
  /**
   * @param string
   */
  public function setSurfaceType($surfaceType)
  {
    $this->surfaceType = $surfaceType;
  }
  /**
   * @return string
   */
  public function getSurfaceType()
  {
    return $this->surfaceType;
  }
  /**
   * @param QualityActionsCustomizedNotificationPayload
   */
  public function setTapAction(QualityActionsCustomizedNotificationPayload $tapAction)
  {
    $this->tapAction = $tapAction;
  }
  /**
   * @return QualityActionsCustomizedNotificationPayload
   */
  public function getTapAction()
  {
    return $this->tapAction;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityActionsCustomizedNotification::class, 'Google_Service_Contentwarehouse_QualityActionsCustomizedNotification');
