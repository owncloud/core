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

namespace Google\Service\CertificateAuthorityService;

class CertificateIdentityConstraints extends \Google\Model
{
  public $allowSubjectAltNamesPassthrough;
  public $allowSubjectPassthrough;
  protected $celExpressionType = Expr::class;
  protected $celExpressionDataType = '';

  public function setAllowSubjectAltNamesPassthrough($allowSubjectAltNamesPassthrough)
  {
    $this->allowSubjectAltNamesPassthrough = $allowSubjectAltNamesPassthrough;
  }
  public function getAllowSubjectAltNamesPassthrough()
  {
    return $this->allowSubjectAltNamesPassthrough;
  }
  public function setAllowSubjectPassthrough($allowSubjectPassthrough)
  {
    $this->allowSubjectPassthrough = $allowSubjectPassthrough;
  }
  public function getAllowSubjectPassthrough()
  {
    return $this->allowSubjectPassthrough;
  }
  /**
   * @param Expr
   */
  public function setCelExpression(Expr $celExpression)
  {
    $this->celExpression = $celExpression;
  }
  /**
   * @return Expr
   */
  public function getCelExpression()
  {
    return $this->celExpression;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CertificateIdentityConstraints::class, 'Google_Service_CertificateAuthorityService_CertificateIdentityConstraints');
