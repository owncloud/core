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

class Google_Service_FirebaseHosting_ServingConfig extends Google_Collection
{
  protected $collection_key = 'rewrites';
  public $appAssociation;
  public $cleanUrls;
  protected $headersType = 'Google_Service_FirebaseHosting_Header';
  protected $headersDataType = 'array';
  protected $redirectsType = 'Google_Service_FirebaseHosting_Redirect';
  protected $redirectsDataType = 'array';
  protected $rewritesType = 'Google_Service_FirebaseHosting_Rewrite';
  protected $rewritesDataType = 'array';
  public $trailingSlashBehavior;

  public function setAppAssociation($appAssociation)
  {
    $this->appAssociation = $appAssociation;
  }
  public function getAppAssociation()
  {
    return $this->appAssociation;
  }
  public function setCleanUrls($cleanUrls)
  {
    $this->cleanUrls = $cleanUrls;
  }
  public function getCleanUrls()
  {
    return $this->cleanUrls;
  }
  /**
   * @param Google_Service_FirebaseHosting_Header
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return Google_Service_FirebaseHosting_Header
   */
  public function getHeaders()
  {
    return $this->headers;
  }
  /**
   * @param Google_Service_FirebaseHosting_Redirect
   */
  public function setRedirects($redirects)
  {
    $this->redirects = $redirects;
  }
  /**
   * @return Google_Service_FirebaseHosting_Redirect
   */
  public function getRedirects()
  {
    return $this->redirects;
  }
  /**
   * @param Google_Service_FirebaseHosting_Rewrite
   */
  public function setRewrites($rewrites)
  {
    $this->rewrites = $rewrites;
  }
  /**
   * @return Google_Service_FirebaseHosting_Rewrite
   */
  public function getRewrites()
  {
    return $this->rewrites;
  }
  public function setTrailingSlashBehavior($trailingSlashBehavior)
  {
    $this->trailingSlashBehavior = $trailingSlashBehavior;
  }
  public function getTrailingSlashBehavior()
  {
    return $this->trailingSlashBehavior;
  }
}
