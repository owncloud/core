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

namespace Google\Service\ShoppingContent;

class AccountsLinkRequest extends \Google\Collection
{
  protected $collection_key = 'services';
  /**
   * @var string
   */
  public $action;
  protected $eCommercePlatformLinkInfoType = ECommercePlatformLinkInfo::class;
  protected $eCommercePlatformLinkInfoDataType = '';
  /**
   * @var string
   */
  public $linkType;
  /**
   * @var string
   */
  public $linkedAccountId;
  protected $paymentServiceProviderLinkInfoType = PaymentServiceProviderLinkInfo::class;
  protected $paymentServiceProviderLinkInfoDataType = '';
  /**
   * @var string[]
   */
  public $services;

  /**
   * @param string
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param ECommercePlatformLinkInfo
   */
  public function setECommercePlatformLinkInfo(ECommercePlatformLinkInfo $eCommercePlatformLinkInfo)
  {
    $this->eCommercePlatformLinkInfo = $eCommercePlatformLinkInfo;
  }
  /**
   * @return ECommercePlatformLinkInfo
   */
  public function getECommercePlatformLinkInfo()
  {
    return $this->eCommercePlatformLinkInfo;
  }
  /**
   * @param string
   */
  public function setLinkType($linkType)
  {
    $this->linkType = $linkType;
  }
  /**
   * @return string
   */
  public function getLinkType()
  {
    return $this->linkType;
  }
  /**
   * @param string
   */
  public function setLinkedAccountId($linkedAccountId)
  {
    $this->linkedAccountId = $linkedAccountId;
  }
  /**
   * @return string
   */
  public function getLinkedAccountId()
  {
    return $this->linkedAccountId;
  }
  /**
   * @param PaymentServiceProviderLinkInfo
   */
  public function setPaymentServiceProviderLinkInfo(PaymentServiceProviderLinkInfo $paymentServiceProviderLinkInfo)
  {
    $this->paymentServiceProviderLinkInfo = $paymentServiceProviderLinkInfo;
  }
  /**
   * @return PaymentServiceProviderLinkInfo
   */
  public function getPaymentServiceProviderLinkInfo()
  {
    return $this->paymentServiceProviderLinkInfo;
  }
  /**
   * @param string[]
   */
  public function setServices($services)
  {
    $this->services = $services;
  }
  /**
   * @return string[]
   */
  public function getServices()
  {
    return $this->services;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsLinkRequest::class, 'Google_Service_ShoppingContent_AccountsLinkRequest');
