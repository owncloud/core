<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

final class WebDriverCurlException extends Exception {} // When curls fail

class WebDriverException extends Exception {

  private $results;

  /**
   * @param string $message
   * @param mixed $results
   */
  public function __construct($message, $results = null) {
    parent::__construct($message);
    $this->results = $results;
  }

  /**
   * @return mixed
   */
  public function getResults() {
    return $this->results;
  }

  /**
   * Throw WebDriverExceptions.
   * For $status_code >= 0, they are errors defined in the json wired protocol.
   * For $status_code < 0, they are errors defined in php-webdriver.
   *
   * @param int $status_code
   * @param string $message
   * @param mixed $results
   */
  public static function throwException($status_code, $message, $results) {
    switch ($status_code) {
      case -1:
        throw new WebDriverCurlException($message);
      case 0:
        // Success
        break;
      case 1:
        throw new IndexOutOfBoundsException($message, $results);
      case 2:
        throw new NoCollectionException($message, $results);
      case 3:
        throw new NoStringException($message, $results);
      case 4:
        throw new NoStringLengthException($message, $results);
      case 5:
        throw new NoStringWrapperException($message, $results);
      case 6:
        throw new NoSuchDriverException($message, $results);
      case 7:
        throw new NoSuchElementException($message, $results);
      case 8:
        throw new NoSuchFrameException($message, $results);
      case 9:
        throw new UnknownCommandException($message, $results);
      case 10:
        throw new StaleElementReferenceException($message, $results);
      case 11:
        throw new ElementNotVisibleException($message, $results);
      case 12:
        throw new InvalidElementStateException($message, $results);
      case 13:
        throw new UnknownServerException($message, $results);
      case 14:
        throw new ExpectedException($message, $results);
      case 15:
        throw new ElementNotSelectableException($message, $results);
      case 16:
        throw new NoSuchDocumentException($message, $results);
      case 17:
        throw new UnexpectedJavascriptException($message, $results);
      case 18:
        throw new NoScriptResultException($message, $results);
      case 19:
        throw new XPathLookupException($message, $results);
      case 20:
        throw new NoSuchCollectionException($message, $results);
      case 21:
        throw new TimeOutException($message, $results);
      case 22:
        throw new NullPointerException($message, $results);
      case 23:
        throw new NoSuchWindowException($message, $results);
      case 24:
        throw new InvalidCookieDomainException($message, $results);
      case 25:
        throw new UnableToSetCookieException($message, $results);
      case 26:
        throw new UnexpectedAlertOpenException($message, $results);
      case 27:
        throw new NoAlertOpenException($message, $results);
      case 28:
        throw new ScriptTimeoutException($message, $results);
      case 29:
        throw new InvalidCoordinatesException($message, $results);
      case 30:
        throw new IMENotAvailableException($message, $results);
      case 31:
        throw new IMEEngineActivationFailedException($message, $results);
      case 32:
        throw new InvalidSelectorException($message, $results);
      case 33:
        throw new SessionNotCreatedException($message, $results);
      case 34:
        throw new MoveTargetOutOfBoundsException($message, $results);
      default:
        throw new UnrecognizedExceptionException($message, $results);
    }
  }
}

class IndexOutOfBoundsException extends WebDriverException {} // 1
class NoCollectionException extends WebDriverException {} // 2
class NoStringException extends WebDriverException {} // 3
class NoStringLengthException extends WebDriverException {} // 4
class NoStringWrapperException extends WebDriverException {} // 5
class NoSuchDriverException extends WebDriverException {} // 6
class NoSuchElementException extends WebDriverException {} // 7
class NoSuchFrameException extends WebDriverException {} // 8
class UnknownCommandException extends WebDriverException {} // 9
class StaleElementReferenceException extends WebDriverException {} // 10
class ElementNotVisibleException extends WebDriverException {} // 11
class InvalidElementStateException extends WebDriverException {} // 12
class UnknownServerException extends WebDriverException {} // 13
class ExpectedException extends WebDriverException {} // 14
class ElementNotSelectableException extends WebDriverException {} // 15
class NoSuchDocumentException extends WebDriverException {} // 16
class UnexpectedJavascriptException extends WebDriverException {} // 17
class NoScriptResultException extends WebDriverException {} // 18
class XPathLookupException extends WebDriverException {} // 19
class NoSuchCollectionException extends WebDriverException {} // 20
class TimeOutException extends WebDriverException {} // 21
class NullPointerException extends WebDriverException {} // 22
class NoSuchWindowException extends WebDriverException {} // 23
class InvalidCookieDomainException extends WebDriverException {} // 24
class UnableToSetCookieException extends WebDriverException {} // 25
class UnexpectedAlertOpenException extends WebDriverException {} // 26
class NoAlertOpenException extends WebDriverException {} // 27
class ScriptTimeoutException extends WebDriverException {} // 28
class InvalidCoordinatesException extends WebDriverException {}// 29
class IMENotAvailableException extends WebDriverException {} // 30
class IMEEngineActivationFailedException extends WebDriverException {}// 31
class InvalidSelectorException extends WebDriverException {} // 32
class SessionNotCreatedException extends WebDriverException {} // 33
class MoveTargetOutOfBoundsException extends WebDriverException {} // 34

// Fallback
class UnrecognizedExceptionException extends WebDriverException {}

class UnexpectedTagNameException extends WebDriverException {

  /**
   * @param string $expected_tag_name
   * @param string $actual_tag_name
   */
  public function __construct(
      $expected_tag_name,
      $actual_tag_name) {
    parent::__construct(
      sprintf(
        "Element should have been \"%s\" but was \"%s\"",
        $expected_tag_name, $actual_tag_name
      )
    );
  }
}

class UnsupportedOperationException extends WebDriverException {}
