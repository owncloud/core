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

namespace Google\Service\Firebaseappcheck;

class GoogleFirebaseAppcheckV1betaPublicJwk extends \Google\Model
{
  /**
   * @var string
   */
  public $alg;
  /**
   * @var string
   */
  public $e;
  /**
   * @var string
   */
  public $kid;
  /**
   * @var string
   */
  public $kty;
  /**
   * @var string
   */
  public $n;
  /**
   * @var string
   */
  public $use;

  /**
   * @param string
   */
  public function setAlg($alg)
  {
    $this->alg = $alg;
  }
  /**
   * @return string
   */
  public function getAlg()
  {
    return $this->alg;
  }
  /**
   * @param string
   */
  public function setE($e)
  {
    $this->e = $e;
  }
  /**
   * @return string
   */
  public function getE()
  {
    return $this->e;
  }
  /**
   * @param string
   */
  public function setKid($kid)
  {
    $this->kid = $kid;
  }
  /**
   * @return string
   */
  public function getKid()
  {
    return $this->kid;
  }
  /**
   * @param string
   */
  public function setKty($kty)
  {
    $this->kty = $kty;
  }
  /**
   * @return string
   */
  public function getKty()
  {
    return $this->kty;
  }
  /**
   * @param string
   */
  public function setN($n)
  {
    $this->n = $n;
  }
  /**
   * @return string
   */
  public function getN()
  {
    return $this->n;
  }
  /**
   * @param string
   */
  public function setUse($use)
  {
    $this->use = $use;
  }
  /**
   * @return string
   */
  public function getUse()
  {
    return $this->use;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirebaseAppcheckV1betaPublicJwk::class, 'Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaPublicJwk');
