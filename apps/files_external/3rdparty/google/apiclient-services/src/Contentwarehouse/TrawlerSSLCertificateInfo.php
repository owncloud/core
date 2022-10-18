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

class TrawlerSSLCertificateInfo extends \Google\Collection
{
  protected $collection_key = 'ErrorMessages';
  protected $internal_gapi_mappings = [
        "aLPNNegotiatedProtocol" => "ALPNNegotiatedProtocol",
        "certificateChain" => "CertificateChain",
        "errorMessages" => "ErrorMessages",
        "isTruncated" => "IsTruncated",
        "oCSPResponse" => "OCSPResponse",
        "sCTList" => "SCTList",
        "sSLCipherSuite" => "SSLCipherSuite",
        "sSLCipherSuiteName" => "SSLCipherSuiteName",
        "sSLProtocolVersion" => "SSLProtocolVersion",
        "sSLProtocolVersionName" => "SSLProtocolVersionName",
  ];
  /**
   * @var string
   */
  public $aLPNNegotiatedProtocol;
  /**
   * @var string[]
   */
  public $certificateChain;
  /**
   * @var string[]
   */
  public $errorMessages;
  /**
   * @var bool
   */
  public $isTruncated;
  /**
   * @var string
   */
  public $oCSPResponse;
  /**
   * @var string
   */
  public $sCTList;
  /**
   * @var int
   */
  public $sSLCipherSuite;
  /**
   * @var string
   */
  public $sSLCipherSuiteName;
  /**
   * @var int
   */
  public $sSLProtocolVersion;
  /**
   * @var string
   */
  public $sSLProtocolVersionName;

  /**
   * @param string
   */
  public function setALPNNegotiatedProtocol($aLPNNegotiatedProtocol)
  {
    $this->aLPNNegotiatedProtocol = $aLPNNegotiatedProtocol;
  }
  /**
   * @return string
   */
  public function getALPNNegotiatedProtocol()
  {
    return $this->aLPNNegotiatedProtocol;
  }
  /**
   * @param string[]
   */
  public function setCertificateChain($certificateChain)
  {
    $this->certificateChain = $certificateChain;
  }
  /**
   * @return string[]
   */
  public function getCertificateChain()
  {
    return $this->certificateChain;
  }
  /**
   * @param string[]
   */
  public function setErrorMessages($errorMessages)
  {
    $this->errorMessages = $errorMessages;
  }
  /**
   * @return string[]
   */
  public function getErrorMessages()
  {
    return $this->errorMessages;
  }
  /**
   * @param bool
   */
  public function setIsTruncated($isTruncated)
  {
    $this->isTruncated = $isTruncated;
  }
  /**
   * @return bool
   */
  public function getIsTruncated()
  {
    return $this->isTruncated;
  }
  /**
   * @param string
   */
  public function setOCSPResponse($oCSPResponse)
  {
    $this->oCSPResponse = $oCSPResponse;
  }
  /**
   * @return string
   */
  public function getOCSPResponse()
  {
    return $this->oCSPResponse;
  }
  /**
   * @param string
   */
  public function setSCTList($sCTList)
  {
    $this->sCTList = $sCTList;
  }
  /**
   * @return string
   */
  public function getSCTList()
  {
    return $this->sCTList;
  }
  /**
   * @param int
   */
  public function setSSLCipherSuite($sSLCipherSuite)
  {
    $this->sSLCipherSuite = $sSLCipherSuite;
  }
  /**
   * @return int
   */
  public function getSSLCipherSuite()
  {
    return $this->sSLCipherSuite;
  }
  /**
   * @param string
   */
  public function setSSLCipherSuiteName($sSLCipherSuiteName)
  {
    $this->sSLCipherSuiteName = $sSLCipherSuiteName;
  }
  /**
   * @return string
   */
  public function getSSLCipherSuiteName()
  {
    return $this->sSLCipherSuiteName;
  }
  /**
   * @param int
   */
  public function setSSLProtocolVersion($sSLProtocolVersion)
  {
    $this->sSLProtocolVersion = $sSLProtocolVersion;
  }
  /**
   * @return int
   */
  public function getSSLProtocolVersion()
  {
    return $this->sSLProtocolVersion;
  }
  /**
   * @param string
   */
  public function setSSLProtocolVersionName($sSLProtocolVersionName)
  {
    $this->sSLProtocolVersionName = $sSLProtocolVersionName;
  }
  /**
   * @return string
   */
  public function getSSLProtocolVersionName()
  {
    return $this->sSLProtocolVersionName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerSSLCertificateInfo::class, 'Google_Service_Contentwarehouse_TrawlerSSLCertificateInfo');
