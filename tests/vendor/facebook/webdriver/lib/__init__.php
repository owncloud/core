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

// interface
require_once('WebDriverSearchContext.php');
require_once('JavaScriptExecutor.php');
require_once('WebDriver.php');
require_once('WebDriverElement.php');
require_once('WebDriverCommandExecutor.php');
require_once('WebDriverAction.php');
require_once('WebDriverEventListener.php');
require_once('remote/FileDetector.php');
require_once('WebDriverCapabilities.php');
require_once('remote/ExecuteMethod.php');
require_once('WebDriverTargetLocator.php');

// abstract class
require_once('interactions/internal/WebDriverKeysRelatedAction.php');
require_once('interactions/internal/WebDriverSingleKeyAction.php');

require_once('remote/WebDriverCommand.php');

require_once('net/URLChecker.php');

// class
require_once('WebDriverAlert.php');
require_once('WebDriverBy.php');
require_once('WebDriverDimension.php');
require_once('WebDriverExceptions.php');
require_once('WebDriverExpectedCondition.php');
require_once('WebDriverHasInputDevices.php');
require_once('WebDriverKeys.php');
require_once('WebDriverNavigation.php');
require_once('WebDriverMouse.php');
require_once('WebDriverKeyboard.php');
require_once('WebDriverOptions.php');
require_once('WebDriverPlatform.php');
require_once('WebDriverPoint.php');
require_once('WebDriverSelect.php');
require_once('WebDriverTimeouts.php');
require_once('WebDriverWait.php');
require_once('WebDriverWindow.php');
require_once('interactions/WebDriverActions.php');
require_once('interactions/internal/WebDriverMouseAction.php');
require_once('interactions/WebDriverCompositeAction.php');
require_once('interactions/internal/WebDriverButtonReleaseAction.php');
require_once('interactions/internal/WebDriverClickAction.php');
require_once('interactions/internal/WebDriverClickAndHoldAction.php');
require_once('interactions/internal/WebDriverContextClickAction.php');
require_once('interactions/internal/WebDriverCoordinates.php');
require_once('interactions/internal/WebDriverDoubleClickAction.php');
require_once('interactions/internal/WebDriverMouseMoveAction.php');
require_once('interactions/internal/WebDriverMoveToOffsetAction.php');
require_once('internal/WebDriverLocatable.php');
require_once('chrome/ChromeOptions.php');
require_once('firefox/FirefoxDriver.php');
require_once('firefox/FirefoxProfile.php');
require_once('remote/DriverCommand.php');
require_once('remote/LocalFileDetector.php');
require_once('remote/UselessFileDetector.php');
require_once('remote/RemoteMouse.php');
require_once('remote/RemoteKeyboard.php');

require_once('remote/service/DriverService.php');
require_once('chrome/ChromeDriverService.php');

require_once('remote/RemoteWebDriver.php');
require_once('chrome/ChromeDriver.php');

require_once('remote/RemoteWebElement.php');
require_once('remote/RemoteExecuteMethod.php');
require_once('remote/WebDriverBrowserType.php');
require_once('remote/WebDriverCapabilityType.php');
require_once('remote/DesiredCapabilities.php');
require_once('remote/WebDriverResponse.php');
require_once('remote/RemoteTargetLocator.php');

require_once('remote/HttpCommandExecutor.php');
require_once('remote/service/DriverCommandExecutor.php');

require_once('interactions/internal/WebDriverSendKeysAction.php');
require_once('interactions/internal/WebDriverKeyDownAction.php');
require_once('interactions/internal/WebDriverKeyUpAction.php');

require_once('support/events/EventFiringWebDriver.php');
require_once('support/events/EventFiringWebDriverNavigation.php');
require_once('WebDriverDispatcher.php');
require_once('support/events/EventFiringWebElement.php');

// touch
require_once('interactions/WebDriverTouchScreen.php');
require_once('remote/RemoteTouchScreen.php');
require_once('interactions/WebDriverTouchActions.php');
require_once('interactions/touch/WebDriverTouchAction.php');
require_once('interactions/touch/WebDriverDoubleTapAction.php');
require_once('interactions/touch/WebDriverDownAction.php');
require_once('interactions/touch/WebDriverFlickAction.php');
require_once('interactions/touch/WebDriverFlickFromElementAction.php');
require_once('interactions/touch/WebDriverLongPressAction.php');
require_once('interactions/touch/WebDriverMoveAction.php');
require_once('interactions/touch/WebDriverScrollAction.php');
require_once('interactions/touch/WebDriverScrollFromElementAction.php');
require_once('interactions/touch/WebDriverTapAction.php');
require_once('interactions/touch/WebDriverUpAction.php');
